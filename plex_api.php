<?php

    function call_endpoint($url, $method = 'GET', $args = false)
    {
        $postdata = ($args) ? json_encode($args) : '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($postdata)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return ($response);
    }
	function update_plex_user($login = '', $libs = [])
	{
		// Configuration
		$token = 'wHy36xcKAjCDqPtLvDJX';
		$server_id = '238e1475afe95b2597fcbb4744a61b5c3c2d5210';
		// Valid token
		if ($token === 'YOUR ADMIN PLEX TOKEN')
			return (array('ERROR_TOKEN'));
		
		// Valid Server id
		if ($server_id === 'YOUR SERVER ID')
			return (array('ERROR_SERVER_ID'));

		// Login parsing
		$login = trim(strtolower($login));
		if (empty($login))
			return (array('ERROR_LOGIN'));

		// Get user list
		$list_xml = trim(strtolower(@file_get_contents('https://plex.tv/api/users?X-Plex-Token='.$token)));
		if (empty($list_xml))
			return (array('ERROR_LIST'));

		// Extract Server Link ID
		$link_id = false;
		if (strpos($list_xml, $login) !== false)
		{
			$link_id = explode('username="'.$login.'"', $list_xml)[1];
			$link_id = explode('</user>', $link_id)[0];
			if (strpos($link_id, '<server') !== false)
			{
				$link_id = explode('" serverid="', $link_id)[0];
				$link_id = explode('<server id="', $link_id)[1];
			}
			else
				$link_id = false;
		}

		// Extract User ID
		$user_id = false;
		if (strpos($list_xml, $login) !== false)
		{
			$user_id = explode('username="'.$login.'"', $list_xml)[0];
			$user_id = explode('<user id="', $user_id);
			if (isset($user_id[count($user_id) - 1]))
			{
				$user_id = $user_id[count($user_id) - 1];
				$user_id = explode('"', $user_id)[0];
			}
			else
				$user_id = false;
		}

		// Delete mode
		if (count($libs) === 0)
		{
			if ($link_id != false)
			{
				$http_method = 'DELETE';
				$http_link = 'https://plex.tv/api/servers/'.$server_id.'/shared_servers/'.$link_id.'?X-Plex-Token='.$token;
				$http_body = false;
				$http_return = 'SUCCESS_DELETE';
			}
			else
				return (array('ERROR_DELETE_NO_SERVER'));
		}
		// Edit / Add mode
		else
		{
			// Server update
			if ($link_id)
			{
				$http_method = 'PUT';
				$http_link = 'https://plex.tv/api/servers/'.$server_id.'/shared_servers/'.$link_id.'?X-Plex-Token='.$token;
				$http_body = array(
					"server_id" => $server_id,
					"shared_server" => array(
						"library_section_ids" => $libs
					)
				);
				$http_return = 'SUCCESS_UPDATE_LINK_ID';
			}
			// User update
			elseif ($user_id)
			{
				$http_method = 'POST';
				$http_link = 'https://plex.tv/api/servers/'.$server_id.'/shared_servers?X-Plex-Token='.$token;
				$http_body = array(
					"server_id" => $server_id,
					"shared_server" => array(
						"library_section_ids" => $libs,
						"invited_id" => $user_id
					)
				);
				$http_return = 'SUCCESS_UPDATE_USER_ID';
			}
			// User create
			else ($login)
			{
				$http_method = 'POST';
				$http_link = 'https://plex.tv/api/servers/'.$server_id.'/shared_servers?X-Plex-Token='.$token;
				$http_body = array(
					"server_id" => $server_id,
					"shared_server" => array(
						"library_section_ids" => $libs,
						"invited_email" => $login,
						"sharing_settings" => json_decode('{}')
					)
				);
				$http_return = 'SUCCESS_CREATE_USER';
			}
		}

		// Execute request
		if (isset($http_method) && isset($http_link))
		{
			$cb = call_endpoint($http_link, $http_method, $http_body);
			return (array($http_return, $cb));
		}

		// Unknown error
		return (array('UNKNOWN_ERROR'));
	}

	
	// Set libs to a specific user:
	// update_plex_user('Toto', [123, 256, 289]);
	//
	// Delete libs to a specific user:
	// update_plex_user('Toto', []);
	?>