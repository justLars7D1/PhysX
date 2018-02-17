<?php
include './php/connectdb.php';
session_start();
ob_start();

$selectPost = mysqli_query($connect, "SELECT * FROM post WHERE post_id = '".$_GET['id']."'");
$fetchPost = $selectPost->fetch_assoc();

if (empty($_GET['id'])) {

  $_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
    <strong>Post:</strong> The post you were looking for does not exist.
  </div>';
  header('Location: index.php');
  
} elseif (empty($fetchPost['post_id'])) {

  $_SESSION['errMsg'] = '<div class="alert alert-danger" role="alert">
    <strong>Post:</strong> The post you were looking for does not exist.
  </div>';
  header('Location: index.php');

}

?>
<html lang="en">
  <head>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

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

    <title>
      forum
    </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/chat.css">

    <style type="text/css">

    .my-2 {
      background-color:black;
    }

    .my-3 {
      background-color: #d1d1d1;
    }

    .padding {
      padding-top: 7em;
    }

    #postCreator:hover {
      color:#014C8C;
      text-decoration: none;
    }

    </style>

  </head>

  <body>
<!-- Navigation -->
    <style type="text/css">.navbar {background-color:#000000;}</style>
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
                        <a style="color:orange" data-toggle="modal" data-target="#loginModal">Login</a>
                        </li>

                        <li>
                        <a style="color:orange" data-toggle="modal" data-target="#registerModal">Register</a>
                        </li>

                        ';
                    } else {
                        echo '

                        <li>
                        <a style="color:orange" href="./php/reglog/logoutuser.php">Logout</a>
                        </li>

                        <li>
                        <a style="color:orange" href="./pages/profile.php?id='.$_SESSION["loggedIn"].'">My Profile</a>
                        </li>
                        ';
                        
                    }
                    
                    
                    ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <div class='container-fluid'>
      <div class="col-md-10">

        <div class="padding">
          <hr class="my-3">
<?php
$query = mysqli_query($connect, "SELECT * FROM post WHERE post_id='".$_GET['id']."'");
$fetchQuery = $query->fetch_assoc();

   echo " <h1 class='display-3 TitlePost'>Title: 
          ".$fetchQuery['post_title']."
          <h3>Subtitle: ".$fetchQuery['post_subtitle']."</h3>
          </h1>";
          
    echo '<h4>By <a href="#" id="postCreator">'.$fetchQuery['post_creator'].'</a></h4><br>';
    echo "<h3>".chunk_split(nl2br($fetchQuery['post_content']), 100)."</h3>";
?>
          <hr class="my-2">
          <div>

<?php
include './php/comment/displayComment.php';

?>

<style type="text/css">

button {
     background:none!important;
     border:none; 
     padding:0!important;
     font: inherit;
     cursor: pointer;
}

.deleteComment {
  position: absolute;
  left: 94%;
}
  .editComment {
  position: absolute;
  left: 91%; 
}

.deleteComment:hover {
  color: #014C8C;
  font-weight: bold;
  cursor: pointer;
}
  .editComment:hover {
  color: #014C8C;
  font-weight: bold;
  cursor: pointer;
}





</style>


        </div>

            <hr class="my-2">
            <form name="commentForm" method="POST" action="./php/comment/submitComment.php">
          <textarea type='text' class='form-control lead ContentPost' id='TextToSend' cols='5' rows='10' placeholder='My comment ...' name='commentContent' required></textarea>
          <div id="SendDiv"> <!-- TODO send text on click -->
            <p id="Send">
              Send
            </p>
           <?php 
           echo '<input name="postId" type="hidden" value="'.$_GET['id'].'">';
           ?>
          </form>
          </div>
          </form>

                <script type="text/javascript">

      document.getElementById('SendDiv').onclick = function() {
        if (document.getElementById('TextToSend').value.length > 0) {
         document.forms['commentForm'].submit();
        } else {
          alert('The comment was empty...')
        }
      }



      </script>

        </div>

      </div>
    </div>


  </body>

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
                            <a href="https://www.facebook.com/PhysX-Company-488517987989998/" target="_blank">
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