<?php
ob_start();
session_start();
include 'db.php'; 

if(isset($_POST['login_teacher']))
{
$teacher_code =  mysqli_real_escape_string($con, strtolower($_POST['teacher_code']));
$password =  mysqli_real_escape_string($con,$_POST['password']);
$password = md5($password);
$sql = "select * from `tbl_teacher` where teacher_code = '$teacher_code' and password = '$password'";
$result = mysqli_query($con, $sql);
      
if(mysqli_num_rows($result) == 1)
{
$row = mysqli_fetch_array($result);
$db_teacher_code = $row['teacher_code'];
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
$deac = "Sorry $fullname your account is temporarily deactivated by Admin";  
echo "<script language='javascript'>alert('$deac')</script>";    
}

else if($acct_status == 'activate')
{
if($teacher_code == $db_teacher_code && $password == $db_password) //&& TAG -- PAG MAY MALI NA ISA.. MALI NA PAREHO, T-T = T, F-F = F, T-F = F
{
$_SESSION['id'] = $role_id;
header("location:homepage-teacher.php?logid=$id");
$_SESSION['teacher_code'] = $db_teacher_code;
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['image'] = $db_image;
} 
}  
}   
else
{   
$text = "Username or Password is Incorrect or You`re not Registered as Teacher";          
echo "<script language='javascript'>alert('$text')</script>";
}
}
//Teacher Login


if(isset($_POST['login_student']))
{
$student_id =  mysqli_real_escape_string($con, strtolower($_POST['student_id']));
$password =  mysqli_real_escape_string($con,$_POST['password']);
$password = md5($password);
$sql = "select * from `tbl_student` where student_id = '$student_id' and password = '$password'";
$result = mysqli_query($con, $sql);
      
if(mysqli_num_rows($result) == 1)
{
$row = mysqli_fetch_array($result);
$db_student_id = $row['student_id'];
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
$deac = "Sorry $fullname your account is temporarily deactivated by Admin";  
echo "<script language='javascript'>alert('$deac')</script>";    
}

else if($acct_status == 'activate')
{
if($student_id == $db_student_id && $password == $db_password) //&& TAG -- PAG MAY MALI NA ISA.. MALI NA PAREHO, T-T = T, F-F = F, T-F = F
{
$_SESSION['id'] = $role_id;
header("location:homepage-student.php?logid=$id");
$_SESSION['student_id'] = $db_student_id;
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['image'] = $db_image;
} 
}  
}   
else
{   
$text = "Username or Password is Incorrect or You`re not Registered as Student";          
echo "<script language='javascript'>alert('$text')</script>";
}
}
//Student Login
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

<div class="panel-heading">                                
<div class="row-fluid user-row"><a href="index.php"><img src="images/tmp-icon.png" class="img-responsive"></a></div>
</div>
                        
<div class="panel-body">
<h4 style="font-weight:bold; color:#006400; text-align:center;">LOGIN AS:</h4>
<a class="btn btn-lg btn-green center-block" data-toggle="modal" data-target="#teacherlogin">TEACHER</a><br>
<a class="btn btn-lg btn-green center-block" data-toggle="modal" data-target="#studentlogin">STUDENT</a><br>                              
</div>
</div>
</div>
</div>
</div>
     
<!--Teacher Modal Login-->
<div class="modal fade" id="teacherlogin" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
<center><h3 class="modal-title" id="lineModalLabel">Login as Teacher</h3></center>
</div>
    
<div class="modal-body">
<!-- content goes here -->
<form action="" method="post">
<div class="form-group">
<label for="exampleInputEmail1">Teacher Code:</label>
<input type="text" class="form-control" placeholder="Your Code" name="teacher_code">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" placeholder="Your Password" name="password">
</div>
<center><button type="submit" class="btn btn-default" name="login_teacher">Login</button></center>
</form>

</div>
</div>
</div>
</div>
<!--Teacher Modal Login End--> 
     
<!--Student Modal Login-->
<div class="modal fade" id="studentlogin" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
<center><h3 class="modal-title" id="lineModalLabel">Login as Student</h3></center>
</div>
  
<div class="modal-body">
<!-- content goes here -->
<form action="" method="post">
<div class="form-group">
<label>Student Number:</label>
<input type="number" class="form-control" placeholder="Your Student Number" name="student_id">
</div>
             
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" placeholder="Your Password" name="password">
</div>
<center><button type="submit" class="btn btn-default" name="login_student">Login</button></center>
</form>
    
</div>
</div>
</div>
</div>
<!--Student Modal Login End--> 
      
<?php include("inc/bot/javascript.php"); ?> <!--BOOTSTRAP AND CHECKBOX-->
</body>
</html>