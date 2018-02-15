<?php
ob_start();
session_start();
include 'db.php';
$session_username2 = $_SESSION['username'];
$session_id = $_SESSION['id'];


if(!isset($_SESSION['username']))
{
header('location: login-admin.php');
}

//Checkboxes
if(isset($_POST['checkboxes']))
{
foreach($_POST['checkboxes'] as $user_id)
{
$bulk_option = $_POST['bulk-options'];

if ($bulk_option == 'activate')
{
$bulk_activate_query = "UPDATE `tbl_student` SET `acct_status` = 'activate' WHERE `id` = $user_id";
mysqli_query($con, $bulk_activate_query);
}
    
else if ($bulk_option == 'deactivate')
{
$bulk_deactivate_query = "UPDATE `tbl_student` SET `acct_status` = 'deactivate' WHERE `id` = $user_id";
mysqli_query($con, $bulk_deactivate_query);
}
    
else if($bulk_option == 'delete')
{
$bulk_del_query = "DELETE FROM `tbl_student` WHERE `id` = $user_id";
mysqli_query($con, $bulk_del_query);
}
}
}
//FUNCTION PARA SA CHECKBOXES

if(isset($_GET['edit'])) //GET NG INFORMATION GALING SA DATABASE
{
$edit_id = $_GET['edit'];
$edit_query = "select * from tbl_student where id = $edit_id";
$edit_query_run = mysqli_query($con, $edit_query);
    
if(mysqli_num_rows($edit_query_run) > 0)
{
$edit_row = mysqli_fetch_array($edit_query_run); 
$e_student_id = $edit_row['student_id'];
$e_email = $edit_row['email']; 
$e_firstname = $edit_row['firstname'];
$e_middlename = $edit_row['middlename'];
$e_lastname = $edit_row['lastname']; 
$e_image = $edit_row['image'];  
$e_contact = $edit_row['contact'];  
}   
else
{
header('location: tbl-student.php');
}    
}

if(isset($_POST['update_student']))
{
$up_student_id = mysqli_real_escape_string($con,$_POST['student_id']);
$up_password = mysqli_real_escape_string($con,$_POST['password']);
$up_email = mysqli_real_escape_string($con,$_POST['email']);  
$up_firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$up_middlename = mysqli_real_escape_string($con, $_POST['middlename']);
$up_lastname = mysqli_real_escape_string($con,$_POST['lastname']);
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$up_contact = mysqli_real_escape_string($con,$_POST['contact']);

if(empty($image))
{
$image = $e_image;
}

$up_password = md5($up_password);
$update_query = "UPDATE `tbl_student` SET  `student_id` = '$up_student_id', `email` = '$up_email', `firstname` = '$up_firstname', `middlename` = '$up_middlename', `lastname` = '$up_lastname', `image` = '$image', `contact` = '$up_contact'";
  
if(isset($up_password))
{
$update_query .= ",`password` = '$up_password'";
}
        
$update_query .= "WHERE `id` = $edit_id";
        
if(mysqli_query($con, $update_query))
{
echo "<script language='javascript'>alert('Student Account has been Updated!')</script>";
header("refresh:0; url=tbl-student.php");
            
if(!empty($image))
{
move_uploaded_file($image_tmp, "system-img/$image");
}          
} 
else
{
echo "<script language='javascript'>alert('There's Something Wrong in the Code!')</script>"; 
header("refresh:0; url=tbl-student.php?edit=$edit_id");
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <title>Admin Control</title>
    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<link rel="icon" type="image/png" href="images/tmp-icon.png">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.css">
<!--<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">--> 
<?php 
include("css-all/useradmin-css.php");
include("inc/datatabletop.php");
?>

</head>

<body>
<?php include("inc/navbar.php"); ?>

<div class="container-fluid">
<div class="col-md-4">
<?php include("inc/sidebar-admin.php"); ?>    
</div> 

<div class="col-md-8">
<div class="panel panel-success">
<?php include("inc/breadcrumbs-tbl.php");?>
<div class="panel-body">                                        

<?php
    
$query = "select * from `tbl_student` order by id asc";
$run = mysqli_query($con, $query);
if(mysqli_num_rows($run) > 0)
{   
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="row">
<div class="col-sm-8"> 
<div class="row">
<div class="col-xs-4">

<div class="form-group">  
<select name="bulk-options" id="" class="form-control">
<option value="activate">Activate</option> 
<option value="deactivate">Deactivate</option>
<option value="delete">Delete</option>        
                                 
</select>
</div> 
</div>              

<input type="submit" class="btn btn-default btn-md" value="Apply">
 
</div>          
</div>                        
</div> 
<!--END ROW FOR ACTIVATION-->
                                           
<table class="table table-bordered table-filtered display nowrap" cellspacing="0" width="100%" id="datatable" style="text-align:center;">
<thead>
<tr>
 
<th><input type="checkbox" id="selectallboxes"></th>
<th>Update</th>
<th>Status</th>  
<th>Date of Reg.</th>
<th>Student ID</th>
<th>Email</th>
<th>Firstname</th>
<th>Middlename</th>
<th>Lastname</th>
<th>Contact</th>
<th>Image</th>
</tr>
</thead>
                                  
<tbody>  
       
<?php
while($row = mysqli_fetch_array($run))
{
$tbl_id = $row['id'];
$date = getdate($row['date']);
$day = $date['mday'];
$month = substr($date['month'],0,3);
$year = $date['year'];
$tbl_student_id = $row['student_id'];  
$tbl_email = $row['email'];
$tbl_firstname = ucfirst($row['firstname']);
$tbl_middlename = ucfirst($row['middlename']);
$tbl_lastname = ucfirst($row['lastname']);
$tbl_image = $row['image'];
$tbl_contact = $row['contact'];
$tbl_acct_status = $row['acct_status'];      
?>
    
<tr> 
<td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $tbl_id;?>"></td>
<td><a href="tbl-student.php?edit=<?php echo $tbl_id;?>"?edit style="color:#006400;"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a></td> 

<td><span style="font-weight:bold;color:<?php 
    
if($tbl_acct_status == 'activate')
{
echo 'green';
}
    
else if($tbl_acct_status = 'deactivate')
{
echo 'red';
}
?>;"><?php echo ucfirst($tbl_acct_status);?></span></td>
<td><?php echo "$day $month $year";?></td>
<td><?php echo $tbl_student_id;?></td>
<td><?php echo $tbl_email;?></td>
<td><?php echo $tbl_firstname;?></td>
<td><?php echo $tbl_middlename;?></td>
<td><?php echo $tbl_lastname;?></td>
<td><?php echo $tbl_contact;?></td>
<td><img src="system-img/<?php echo $tbl_image;?>" width="20px" height="20px;"></td>     
</tr>

<?php } ?>
</tbody>
</table>
 

<?php 

}
else
{
echo "<center><h4 style='color:red'>No Student Account</h4></center>";
}
           
?>
</form> 

</div> <!--panel body end-->                                
</div> <!--panel end--> 
<!--View Table Student END-->
 
  
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
$e_firstname = $edit_row['firstname'];
$e_middlename = $edit_row['middlename'];
$e_lastname = $edit_row['lastname'];
$e_contact = $edit_row['contact'];
  
?>  
<div class="panel panel-success">
<div class="panel panel-heading">Update Student Account</div>
<div class="panel-body">     

<form action="" method="post" enctype="multipart/form-data">
<div class="col-md-6">
<div class="form-group">
<label for="student_id">Student ID:</label> 
<input type="number" name="student_id" class="form-control" placeholder="Student ID" value="<?php if(isset($e_student_id)){echo $e_student_id;}?>" required> 
</div> <!--UPDATE USERNAME-->

<div class="form-group">
<label for="Password">Password:</label> 
<input type="password" name="password" class="form-control" placeholder="Password" id="password" required>   
</div> <!--UPDATE PASSWORD--> 

<div class="form-group">
<label for="email">Email</label> 
<input type="email" name="email" class="form-control" placeholder="Email" id="email" value="<?php if(isset($e_email)){echo $e_email;} ?>" required>   
</div> <!--UPDATE EMAIL-->

<div class="form-group">
<label>Firstname:</label>           
<input type="text" name="firstname" class="form-control" placeholder="Firstname" value="<?php if(isset($e_firstname)){echo $e_firstname;} ?>" required>   
</div> <!--UPDATE FIRSTNAME-->

</div> <!--COL-MD-6 END-->
  
<div class="col-md-6">

<div class="form-group">
<label>Middlename:</label>           
<input type="text" name="middlename" class="form-control" placeholder="Middlename" value="<?php if(isset($e_middlename)){echo $e_middlename;} ?>" required>   
</div> <!--UPDATE MIDDLENAME-->

<div class="form-group">
<label>Lastname:</label> 
<input type="text" name="lastname" class="form-control" placeholder="Lastname" value="<?php if(isset($e_lastname)){echo $e_lastname;} ?>" required>   
</div> <!--UPDATE LASTNAME-->

<div class="form-group">
<label for="image">Profile Pictures</label> 
<input type="file" name="image" id="image">   
</div> <!--UPDATE IMAGE-->

<div class="form-group">
<label>Contact:</label> 
<input type="number" name="contact" class="form-control" placeholder="Contact Number" value="<?php if(isset($e_contact)){echo $e_contact;} ?>" required>   
</div> <!--UPDATE LASTNAME-->

</div> <!--COL-MD-6 END-->

<div class="col-md-12">       
<center><input type="submit" value="Update Student Account" name="update_student" class="btn btn-default btn-md"></center>
<hr>
</div> 
</form> 
<!--UPDATE STUDENT ACCOUNT-->
<?php }} ?> 
</div> <!--panel body end-->                                
</div> <!--panel end-->       
</div> <!--md-8 end-->            
</div> <!--container end-->



<?php 
include("inc/bot/javascript.php"); //BOOTSTRAP AND CHECKBOX
include ("datatable/datatable-bot.php"); //Datatable
?> 

</body>
</html>