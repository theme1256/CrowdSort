<?php
    include "/var/www/crowdsort/include/top.php";
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
        <title>Crowdsorting - Collaborative photosorting</title>
        <meta charset="utf-8">
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="Pragma" content="no-cache"/>
        <link rel="shortcut icon" href="<?php echo IMG;?>favicon.png"/>
        <link rel="icon" type="image/png" href="<?php echo HOME;?>img/favicon.png"/>
        <meta name="description" content="Online Collaborative sorting of albums. Get help sorting bad, unfocused or shaky images, so that the good ones may flourish."/>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/theme-style.css" rel='stylesheet' type='text/css' />
   		 <script src="js/jquery.easing.min.js"></script>
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!----webfonts---->
			<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,300,500,700,800,900,600,200' rel='stylesheet' type='text/css'>
		    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,700' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<script src="js/modernizr.custom.js" type="text/javascript"></script>
		<script type="text/javascript" 	src="js/jquery.smint.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $('.subMenu').smint({
			    	'scrollSpeed' : 1000
			    });
			});
		</script>
	</head>
	<body>
		<!----start-container---->
		<div class="head-bg sTop">
			<div class="conatiner">
				<div class="header-note">
					<span class="border"> </span>
					<h1>Changing The face of Photosorting</h1>
					<p>Crowdsorting is here to help you get a large number of images checked. With the help of your friends, it's faster than ever to look through an album.</p>
				</div>
			</div>
		</div>
		<!----//End-container---->
		<!----start-top-nav---->
		<nav id="secondBar" class="subMenu navbar-custom navbar-scroll-top" role="navigation">
	        <div class="container">
	            <div class="navbar-header page-scroll">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
	                    <img src="img/menu-icon.png" title="drop-down-menu" /> 
	                </button>
	            </div>
	            <div class="h_logo">
	            <div class="logo1">
	            	  <a id="s3"  href="#">Crowdsort</a>
	            </div>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse navbar-main-collapse top-nav">
	                <ul class="nav navbar-nav full-nav-top">
	                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
	                    <li class="">
	                        <a id="sTop" class="subNavBtn menu" href="#">Crowdsort</a>
	                    </li>
	                    <li class="page-scroll">
	                        <a id="s2" class="subNavBtn menu" href="#">Idea</a>
	                    </li>
	                    <li class="page-scroll">
	                        <a id="s3" class="subNavBtn menu" href="#">Concept</a>
	                    </li>
	                    <li class="page-scroll active">
	                        <a id="s5" class="subNavBtn menu" href="/login">Login</a>
	                    </li>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	            <div class="clearfix"> </div>
	        </div>
	        <!-- /.container -->
   	  	</nav>
		<!----//End-top-nav---->