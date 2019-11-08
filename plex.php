<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
    	<!-- meta charec set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- Page Title -->
        <title>Skeavs Plex Server</title>		
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Google Font -->
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
		<!-- Twitter Bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- jquery.fancybox  -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
		<!-- animate -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">
		<!-- media-queries -->
        <link rel="stylesheet" href="css/media-queries.css">

		<!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>

    </head>
	
    <body>
	
		<!-- preloader -->
		<div id="preloader">
			<img src="img/preloader.gif" alt="Preloader">
		</div>
		<!-- end preloader -->

        <!-- 
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-fixed-top navbar">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
                    <a class="navbar-brand" href="#body">
						<h1 id="logo">
							<span class="far fa-hdd"> Skeavs Plex Server </span>
						</h1>
					</a>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="navbar-right">
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="./index.html" class="fas fa-home" style="color:#fc05e2"> Home</a></li>
                        <li><a href="./android.html" class="fab fa-android" style="color: #3aca2d"> Android</a></li>
                        <li><a href="./iPhone.html" class="fab fa-apple" style="color: #afafaf"> iPhone</a></li>
                        <li><a href="https://www.plex.tv/sign-up" class="fas fa-angle-right" style="color:#f3991d"> Plex Sign-Up</a></li>
                        <li><a href="./plex.html" class="fas fa-server" style="color:#1da8f3"> Join Our Server</a></li>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->
		
		
		
        <!--
        Home Slider
        ==================================== -->
		
			
					<!-- single slide -->
						<div class="carousel-caption" >
							<h2 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated"><span>Welcome</span>!</h2>
							<p data-wow-duration="1000ms" class="wow slideInLeft animated">For android Users Click Android, For iPhone users Click iPhone</p>
							<form method="POST" action="plex_api.php" class="create user">
							<p><input type="text" id="login" name="login" placeholder="Email Address" style="color:#f00" value="<?php echo $login; ?>"></p>
							<p><button type="submit" id="submit" name="submit" style="color:#f00">Join Server!</button><p>
							</form>
						</div>
				

		
        <!--
        End Home SliderEnd
        ==================================== -->

		<!-- Essential jQuery Plugins
		================================================== -->
		<!-- Main jQuery -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="js/jquery.fancybox.pack.js"></script>
		<!-- jquery.mixitup.min -->
        <script src="js/jquery.mixitup.min.js"></script>
		<!-- jquery.parallax -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.countTo -->
        <script src="js/jquery-countTo.js"></script>
		<!-- jquery.appear -->
        <script src="js/jquery.appear.js"></script>
		<!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
		<!-- jquery easing -->
        <script src="js/wow.min.js"></script>
		<!-- Custom Functions -->
        <script src="js/custom.js"></script>
		

    </body>
</html>
