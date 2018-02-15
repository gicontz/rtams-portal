<?php
ob_start();
session_start();
include 'db.php'; 

if(isset($_POST['login']))
{
$username =  mysqli_real_escape_string($con, strtolower($_POST['username']));
$password =  mysqli_real_escape_string($con,$_POST['password']);
$password = md5($password);
$sql = "select * from `tbl_admin` where username = '$username' and password = '$password'";
$result = mysqli_query($con, $sql);
      
if(mysqli_num_rows($result) == 1)
{
$row = mysqli_fetch_array($result);
$db_username = $row['username'];
$db_password = $row['password'];
$db_image = $row['image'];
    
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$fullname = "$firstname $lastname";  
$id = $row['id'];
$acct_status = $row['acct_status'];
//Pang call sa database / Session
         
if($acct_status == 'deactivate')
{
$deac = "Sorry $fullname your account is temporarily deactivated by Another Admin";  
echo "<script language='javascript'>alert('$deac')</script>";    
}

else if($acct_status == 'activate')
{
if($username == $db_username && $password == $db_password) //&& TAG -- PAG MAY MALI NA ISA.. MALI NA PAREHO, T-T = T, F-F = F, T-F = F
{
$_SESSION['id'] = $role_id;
header("location:homepage-admin.php?logid=$id");
$_SESSION['username'] = $db_username;
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['image'] = $db_image;
} 
}  
}   
else
{   
$text = "Username or Password is Incorrect or You`re not Registered as Administrator";          
echo "<script language='javascript'>alert('$text')</script>";
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
<!--<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">--> 
<?php include("css-all/login-css.php"); ?>

<!--<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>-->
</head>

<body>

<div class="container login">
<div class="row vertical-offset-100">           
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-default">
                        
<div class="panel-body">
<h4 style="font-weight:bold; color:#006400; text-align:center;">LOGIN AS ADMIN:</h4>
<form action="" method="post">
<div class="form-group">
<label>Username</label>
<input type="text" class="form-control" placeholder="Your Username" name="username">
</div>
             
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" placeholder="Your Password" name="password">
</div>
             
 <center><button type="submit" class="btn btn-default" name="login">Login</button></center>
</form>                          
</div>
</div>
</div>
</div>
</div>
     
<?php include("inc/bot/javascript.php"); ?> <!--BOOTSTRAP AND CHECKBOX-->
</body>
</html>