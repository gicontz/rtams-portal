<?php
ob_start();
session_start();
include 'db.php'; 

if(!isset($_SESSION['student_id']))
{
header('location: login.php');
}

$session_student_id = $_SESSION['student_id'];
$query = "select * from tbl_student where student_id = '$session_student_id' "; //GET NG DATA GALING SA DATABASE AT ILALABAS SA MGA DAPAT ILABAS
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);

$id = $row['id'];
$date = getdate($row['date']);
$day = $date['mday'];
$month = substr($date['month'],0,3);
$year = $date['year'];

$student_id = $row['student_id'];
$email = $row['email'];
$firstname = $row['firstname'];
$middlename = $row['middlename'];
$lastname = $row['lastname'];
$image = $row['image'];
$contact = $row['contact'];

if(isset($_GET['edit']))
{
$edit_id = $_GET['edit'];
$edit_query = "select * from tbl_student where id = $edit_id";
$edit_query_run = mysqli_query($con, $edit_query);
    
if(mysqli_num_rows($edit_query_run) > 0)
{
$edit_row = mysqli_fetch_array($edit_query_run);
$e_image = $edit_row['image'];
}       
}
//Edit

if(isset($_POST['update_profile']))
{
$up_email = mysqli_real_escape_string($con,$_POST['email']); 
$up_password = mysqli_real_escape_string($con,$_POST['password']);
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$up_contact = mysqli_real_escape_string($con,$_POST['contact']);

if(empty($image))
{
$image = $e_image;
}

$up_password = md5($up_password);
$update_query = "UPDATE `tbl_student` SET  `email` = '$up_email', `image` = '$image', `contact` = '$up_contact'";
  
if(isset($up_password))
{
$update_query .= ",`password` = '$up_password'";
}
        
$update_query .= "WHERE `id` = $edit_id";
        
if(mysqli_query($con, $update_query))
{
echo "<script language='javascript'>alert('Your Profile has been Updated!')</script>";
header("refresh:0; url=profile-student.php");
            
if(!empty($image))
{
move_uploaded_file($image_tmp, "system-img/$image");
}          
} 
else
{
echo "<script language='javascript'>alert('There's Something Wrong in the Code!')</script>"; 
header("refresh:0; url=profile-student.php?edit=$edit_id");
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <title>Student Control</title>
    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<link rel="icon" type="image/png" href="images/tmp-icon.png">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.css">
<!--<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">--> 
<?php 
include("css-all/userts-css.php");
include("inc/datatabletop.php");
?>

</head>

<body>
<div class="container-fluid">
<div class="col-md-4">
<?php include("inc/sidebar-student.php"); ?>    
</div> 

<div class="col-md-8">
<div class="panel panel-success">
<div class="panel panel-heading" style="font-weight:bold; color:#006400; text-align:center;"><i class="fa fa-user" aria-hidden="true"></i> Profile</div>
<div class="panel-body"> 
<center>
<img src="system-img/<?php echo $image;?>" alt="prof-image" width="200px" height="200px;" class="img img-circle">
<h4 style="font-weight:bolder;color:#006400;">Account Details</h4>
</center>

<center>
<div class="row">
<div class="col-xs-12">
      
<table class="table table-responsive table-bordered"> 
<tr>
<td width="20%"><b>User ID:</b></td>
<td width="30%"><?php echo $id;?></td>
<td width="20%"><b>Signup Date:</b></td>
<td width="30%"><?php echo "$day $month $year";?></td>
</tr>
   
<tr>
<td width="20%"><b>Student ID:</b></td>
<td width="30%"><?php echo $student_id;?></td>
<td width="20%"><b>Email:</b></td>
<td width="30%"><?php echo $email;?></td>
</tr>   
     
<tr>
<td width="20%"><b>Firstname:</b></td>
<td width="30%"><?php echo $firstname;?></td>
<td width="20%"><b>Middlename:</b></td>
<td width="30%"><?php echo $middlename;?></td>
</tr>
    
<tr>
<td width="20%"><b>Lastname:</b></td>
<td width="30%"><?php echo $lastname;?></td>
<td width="20%"><b>Contact:</b></td>
<td width="30%"><?php echo $contact;?></td>
</tr>
</table>  
 <a href="profile-student.php?edit=<?php echo $id;?>" class="btn btn-default pull-right raised btn-sm">Update Profile</a>
    
</div>
</div>  
</center>
                                  
</div> <!--panel body end-->                                
</div> <!--panel end-->  

<?php
if(isset($_GET['edit']))
{   
$edit_id = $_GET['edit'];
$edit_query = "select * from `tbl_student` where id = $edit_id";
$edit_query_run = mysqli_query($con, $edit_query);
    
if(mysqli_num_rows($edit_query_run) > 0)
{
$edit_row = mysqli_fetch_array($edit_query_run);
$e_student_id = $edit_row['student_id'];
$e_email = $edit_row['email'];
$e_contact = $edit_row['contact'];
  
?>         
<div class="panel panel-default">
<div class="panel panel-heading">Update Profile</div>
<div class="panel-body">  

<form action="" method="post" enctype="multipart/form-data">
<div class="col-md-6">

<div class="form-group">
<label for="email">Email</label> 
<input type="email" name="email" class="form-control" placeholder="Email" id="email" value="<?php if(isset($e_email)){echo $e_email;} ?>" required>   
</div> <!--UPDATE EMAIL-->

<div class="form-group">
<label for="Password">Password:</label> 
<input type="password" name="password" class="form-control" placeholder="Password" id="password" required>   
</div> <!--UPDATE PASSWORD--> 

</div> <!--COL-MD-6 END-->
  
<div class="col-md-6">
<div class="form-group">
<label for="contact">Contact</label> 
<input type="number" name="contact" class="form-control" placeholder="Email" value="<?php if(isset($e_contact)){echo $e_contact;} ?>" required>   
</div> <!--UPDATE EMAIL-->

<img src="system-img/<?php if($e_image == "") {echo "empty.png";} else {echo $e_image;}?>" width="100px;" height="100px;">
<div class="form-group">
<label for="image">Profile Pictures</label> 
<input type="file" name="image" id="image">   
</div> <!--UPDATE IMAGE-->

<div class="form-group">
<label>Contact:</label> 
<input type="number" name="contact" class="form-control" placeholder="Contact Number" value="<?php if(isset($e_contact)){echo $e_contact;} ?>" required>   
</div> <!--ADD LASTNAME-->

</div> <!--COL-MD-6 END-->

<div class="col-md-12">       
<center><input type="submit" value="Update Profile" name="update_profile" class="btn btn-default btn-md"></center>
<hr>
</div> 
</form> 

<?php }}  ?> 
</div> <!--panel body end-->                                
</div> <!--panel end-->  
<!--UPDATE TEACHER ACCOUNT-->
  
   
     
</div> <!--md-8 end-->            
</div> <!--container end-->

<?php 
include("inc/bot/javascript.php"); //BOOTSTRAP AND CHECKBOX
include ("datatable/datatable-bot.php"); //Datatable
?> 

</body>
</html>