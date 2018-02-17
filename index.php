<!DOCTYPE html>
<?php
include './php/post/postMainscreen.php';
include './php/connectdb.php';
session_start();
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PhysX - Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog2.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">

    #postContent {
    resize: none;
    height: 350px;
    width: 575px;
    }

    #postTitle {
        height: 35px;
        width: 575px;
    }

</style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <!--<li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="post.html">Sample Post</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>-->
                    

                    <?php

                    if (!isset($_SESSION['loggedIn'])) {
                        echo '

                        <li>
                        <a id="1" style="color:orange" onmouseover="trigger1()" data-toggle="modal" data-target="#loginModal">Login</a>
                        </li>

                        <li>
                        <a id="2" style="color:orange" onmouseover="trigger2()" data-toggle="modal" data-target="#registerModal">Register</a>
                        </li>

                        ';
                    } else {
                        echo '

                        <li>
                        <a  style="color:lightgreen" data-toggle="modal" data-target="#postModal">Post</a>
                        </li>

                        <li>
                        <a style="color:orange" href="./php/reglog/logoutuser.php">Logout</a>
                        </li>

                        ';
                        
                    }
                    
                    //                        <li>
                    //    <a style="color:orange" href="./pages/profile.php?id='.$_SESSION["loggedIn"].'">My Profile</a>
                    //   </li>

                    
                    ?>

                    <script type="text/javascript">
                    function trigger1() {
                        $(document).ready(function(){
                        $("#1").hover(function(){
                            $(this).css("color", "#f2bf68");
                            }, function(){
                            $(this).css("color", "orange");
                            });
                            });
                            }

                                        function trigger2() {
                        $(document).ready(function(){
                        $("#2").hover(function(){
                            $(this).css("color", "#f2bf68");
                            }, function(){
                            $(this).css("color", "orange");
                            });
                            });
                            }



                    </script>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                            <h1><span style="color:brown;">P</span><span style="color:orange;">h<span style="color:brown;">y</span>s</span><span style="color:brown;">X</span></h1>
                        <hr class="small">
                        <span class="subheading">The site made for physicist</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
            <?php if(!empty($_SESSION['errMsg'])) {
            echo $_SESSION['errMsg']; } ?>
            </div>
            <?php unset($_SESSION['errMsg']); ?>

    <!-- Main Content -->
        <?php
          getPosts($connect)
        ?>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="https://www.instagram.com/physxcompany/" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; PhysX 2017</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>



  <!-- Modal 1 Login start-->
  <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal 1 content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Already have an account?<br>Login!</h4>
        </div>
        <div class="modal-body">
            <form action="./php/reglog/loginuser.php" method="POST">
                
                <h5>What was your username again?</h5>
                <input type="text" required placeholder="username" name="uid"><br>
               
                <h5>What's your password?</h5>
                <input type="password" required placeholder="password" name="pwd"><br>

                <h5>All set? let's login!</h5>
                <button type="submit" class="btn btn-default">Login</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

           </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
    <!--Modal 1 end-->



  <!-- Modal 2 Register start-->
  <div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal 2 content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Don't have an account?<br>Register!</h4>
        </div>
        <div class="modal-body">
            <form action="./php/reglog/registeruser.php" method="POST">

                <h5>What do you want your username to be?</h5>
                <input type="text" required placeholder="username" name="uid"><br>

                <h5>Let's create a password, make sure it's a strong one!</h5>
                <input type="password" required placeholder="password" name="pwd"><br>

                <h5>Let's type it out one more time to make sure it's good.</h5>
                <input type="password" required placeholder="confirm password" name="cpwd"><br>

                <h5>All done? <i>Hit</i> that register button</h5>
                <button class="btn btn-default" type="submit">Register</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

           </form>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
    <!--Modal 2 end-->


      <!-- Modal 3 Post start-->
  <div class="modal fade" id="postModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal 3 content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Do you want to post something?
        </div>
        <div class="modal-body">
            <form action="./php/post/submitPost.php" method="POST">

                <h5>What do you want your title of the post to be?</h5>
                <input id="postTitle" type="text" required placeholder="Post Title [max 25 characters]" name="postTitle"><br>

                <h5>What is your post's subtitle going to be?</h5>
                <input id="postTitle" type="text" required placeholder="Post Title [max 24 characters]" name="postSubtitle"><br>

                <h5>Let's create the content now!</h5>
                <textarea id="postContent" required name="postContent"></textarea><br>

                <h5>Done? Make sure it's a quality post!</h5>
                <button class="btn btn-default" type="submit">Post</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

           </form>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
    <!--Modal 3 end-->

</html>
