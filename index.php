<?php 
include('functions.php');
    session_start();
    if (isset($_SESSION['users_details'])) {
      $accessibility = $_SESSION['users_details']['account_type'];
      switch ($_SESSION['users_details']['account_type']) {
              case 'teacher':
                header('Location: '. $domain_header . '/homepage-teacher');
                break;
              case 'student':
                header('Location: '. $domain_header . '/homepage-student');
                break;
                case 'admin':
                header('Location: '. $domain_header . '/homepage-admin');
                break;
            }
    }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Area</title>  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<link rel="icon" type="image/png" href="images/tmp-icon.png">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<!--<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">--> 
<?php include("css-all/login-css.php"); ?>
<!--<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>-->
</head>

<body>


<div class="container login">
<div class="row vertical-offset-100">           
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-default">

<div class="panel-heading">                                
<div class="row-fluid user-row"><a href="index.php"><img src="images/rtams-logo.png" class="img-responsive"></a></div>
</div>
                        
<div class="panel-body">
<a class="btn btn-lg btn-green center-block" data-toggle="modal" data-target="#lgmodal">LOGIN</a><br>                              
</div>
</div>
</div>
</div>
</div>
     
     
<div class="modal fade" id="lgmodal" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top: 140px;">
          <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Hello There!</center></h4>
        </div>

        <div class="modal-body">
            <div class="form-horizontal">

              <div class="form-group">
                <label class="control-label col-sm-8">Username or Student No.</label>
                <div class="col-sm-12">
                  <input type="Username" class="form-control enterInputSignin" id="btn-login-username" placeholder="Username" autofocus>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-8" for="pwd">Password:</label>
                <div class="col-sm-12"> 
                  <input type="password" class="form-control enterInputSignin" id="btn-login-password" placeholder="Enter password" >
                </div>
              </div>

               <div class="form-group">
                <div class="col-sm-12">
                  <div class="alert fade in hide">
                  <span class="closebtn">&times;</span> 
                    <p>Wrong Password or Username.</p>
                  </div>
                </div>  
                </div>  

              <div class="form-group"> 
                <div class="col-sm-offset-1 col-sm-10">
                  <button type="submit" class="btn btn-submit" id="btn-login-login">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp Log in</button>
                    <img width="100%" height="10px" src="images/loading.gif" id="login-loading">
                </div>
              </div>

            </div>
        </div>
      </div>
    </div>
</div>
<!--Student Modal Login End--> 
      

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>
</body>
</html>