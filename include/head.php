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
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="<?php echo CSS;?>style.css" type="text/css" media="all"/>
        <link href="<?php echo CSS;?>bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo CSS;?>bootstrap.min.css" rel='stylesheet' type='text/css' />
         <!-- Custom Theme files -->
        <link href="<?php echo CSS;?>theme-style.css" rel='stylesheet' type='text/css' />
         <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!----webfonts---->
            <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,300,500,700,800,900,600,200' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,700' rel='stylesheet' type='text/css'>
        <!----//webfonts---->
        <script src="<?php echo JS;?>modernizr.custom.js" type="text/javascript"></script>
        <script type="text/javascript"  src="<?php echo JS;?>jquery.smint.js"></script>
        <?php if(curPageName() == "register"){?>
        <script type="text/javascript">
            $(function(){
                var tjekker = setInterval("tjekker()", 500);
                CheckEmpty("alias");
                CheckEmpty("email");
                CheckEmpty("pass1");
                CheckEmpty("pass2");
                $("#pass1").blur(function(){
                    pass();
                });
                $("#pass2").blur(function(){
                    pass();
                });
            });

            function pass(){
                if($("#pass1").val() != $("#pass2").val()){
                    if($("#pass1").val()){
                        $("#pass1").css("border-color", "#E74C3C");
                    }
                    if($("#pass2").val()){
                        $("#pass2").css("border-color", "#E74C3C");
                    }
                }
                else{
                    if($("#pass1").val()){
                        $("#pass1").css("border-color", "#D2D1CF");
                    }
                    if($("#pass2").val()){
                        $("#pass2").css("border-color", "#D2D1CF");
                    }
                }
            }

            function CheckEmpty(id){
                $("#"+id).blur(function(){
                    if(!$(this).val()){
                        $(this).css("border-color", "#E74C3C");
                    }
                    else{
                        $(this).css("border-color", "#D2D1CF");
                    }
                });
                $("#"+id).keyup(function(){
                    if(!$(this).val()){
                        $(this).css("border-color", "#E74C3C");
                    }
                    else{
                        $(this).css("border-color", "#D2D1CF");
                    }
                });
            }

            function tjekker(){
                var e = 0;
                if($("#alias").css("border-color") == "rgb(231, 76, 60)" || !$("#alias").val()){e++;}
                if($("#email").css("border-color") == "rgb(231, 76, 60)" || !$("#email").val()){e++;}
                if($("#pass1").css("border-color") == "rgb(231, 76, 60)" || !$("#pass1").val()){e++;}
                if($("#pass2").css("border-color") == "rgb(231, 76, 60)" || !$("#pass2").val()){e++;}
                if(grecaptcha.getResponse() == ""){e++;}
                if(e == 0){
                    $("input[type='submit']").removeAttr("disabled");
                }
                else{
                    $("input[type='submit']").attr("disabled", "disabled");
                }
            }
        </script>
        <?php }elseif(curPageName() == "album" && !isset($_GET['ID'])){?>
        <script type="text/javascript">
            $(function(){
                $("#name").blur(function(){
                    if($(this).val() != ""){
                        $.post("<?php echo AJAX;?>newAlbum.php", {name: $(this).val()}).done(function(resultat){
                            if(resultat.indexOf("Error: ") >= 0){
                                alert("Oops an error occurred: "+resultat);
                            }
                            else{
                                $("#newAlbum2").show();
                            }
                        });
                    }
                });
            });
        </script>
        <?php }?>
        <script type="text/javascript">
            var iTop = false;
            var iBund = false;
            $(function(){
                iTop = setInterval("TOP()", 100);
                iBund = setInterval("Height()", 100);
                $('.subMenu').smint({
                    'scrollSpeed' : 1000
                });
            });

            $(window).resize(function(){
                iBund = setInterval("Height()", 100);
            });
            
            function TOP(){
                $("#secondBar").css("top", 0);
                if($("#secondBar").css("top") == 0){
                    clearInterval(iTop);
                }
            }

            function Height(){
                var Total = $(window).height();
                var current = $("#container").height() + 80 + 32 + $(".footer").height();
                if(current < Total){
                    var x = Total - 80 - 32 - $(".footer").height();
                    $("#container").height(x);
                }
                else{
                    clearInterval(iBund);
                }
            }
        </script>
    </head>
    <body>
        <!----start-top-nav---->
        <nav id="secondBar" class="subMenu navbar-custom navbar-scroll-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <img src="/img/menu-icon.png" title="drop-down-menu" /> 
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
                        <?php if(checkAccess()){ $uID = $_SESSION['userID']; $r = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM Logins WHERE userID=$uID"));?>
                        <li class="">
                            <a class="subNavBtn menu" href="/home">Crowdsort</a>
                        </li>
                        <?php $a = array('home', 'user', 'about', 'friends'); if(in_array(curPageName(), $a) || (curPageName() == "album" && !isset($_GET['ID']))){?>
                        <li class="">
                            <p style="margin: 0; cursor: pointer;" onclick="window.location.href='/user';">Welcome <?php echo $_SESSION['alias'];?></p>
                            Score: <?php echo $_SESSION['score'];?>
                        </li>
                        <?php }elseif(curPageName() == "album" && isset($_GET['ID'])){?>
                        <li>
                            Album: <?php ?><br/>
                            <p style="margin: 0; cursor: pointer;" onclick="window.location.href='/user/<?php //alias?>';">Owner: <?php //alias?></p>
                        </li>
                        <?php }elseif(curPageName() == "image"){?>
                        <li>
                            <p style="margin: 0; cursor: pointer;" onclick="window.location.href='/album/<?php //albumID?>';">Album: <?php //albumnavn?></p>
                            <p style="margin: 0; cursor: pointer;" onclick="window.location.href='/user/<?php //alias?>';">Owner: <?php //alias?></p>
                        </li>
                        <?php }?>
                        <li class="">
                            <a class="subNavBtn menu" href="/logout">Logout</a>
                        </li>
                        <?php }else{?>
                        <li class="">
                            <a class="subNavBtn menu" href="/">Crowdsort</a>
                        </li>
                        <li class="">
                            <a class="subNavBtn menu" href="/about">About</a>
                        </li>
                        <li class="active">
                            <a class="subNavBtn menu" href="/login">Login</a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <div class="clearfix"> </div>
            </div>
            <!-- /.container -->
        </nav>
        <!----//End-top-nav---->
        <div id="container">