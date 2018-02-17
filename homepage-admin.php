<?php
ob_start();
include 'functions.php';
session_start();
if (isset($_SESSION['users_details'])) {
      $accessibility = $_SESSION['users_details']['account_type'];
      switch ($_SESSION['users_details']['account_type']) {
              case 'teacher':
                header('Location: '. $domain_header . '/homepage-instructor');
                break;
              case 'student':
                header('Location: '. $domain_header . '/homepage-student');
                break;
                case 'admin':
                //header('Location: '. $domain_header . '/homepage-admin');
                break;
            }
    }else{    	
                header('Location: '. $domain_header);
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
<?php include("inc/breadcrumbs.php");?>
<div class="panel-body">                                        
<form action="" method="post" enctype="multipart/form-data">
<div class="col-md-6">
<div class="form-group">
<label for="username">Username:</label> 
<input type="text" name="username" class="form-control" placeholder=" Username" id="username" value="<?php if(isset($username)){echo $username;}?>" required> 
</div> <!--ADD USERNAME-->

<div class="form-group">
<label for="Password">Password:</label> 
<input type="password" name="password" class="form-control" placeholder="Password" id="password" required>   
</div> <!--ADD PASSWORD--> 

<div class="form-group">
<label for="email">Email</label> 
<input type="email" name="email" class="form-control" placeholder="Email" id="email" value="<?php if(isset($email)){echo $email;} ?>" required>   
</div> <!--ADD EMAIL-->

</div> <!--COL-MD-6 END-->

<div class="col-md-6">
<div class="form-group">
<label>Firstname:</label>           
<input type="text" name="firstname" class="form-control" placeholder="Firstname" value="<?php if(isset($firstname)){echo $firstname;} ?>" required>   
</div> <!--ADD FIRSTNAME-->

<div class="form-group">
<label>Middlename:</label>           
<input type="text" name="middlename" class="form-control" placeholder="Middlename" value="<?php if(isset($middlename)){echo $middlename;} ?>" required>   
</div> <!--ADD FIRSTNAME-->

<div class="form-group">
<label>Lastname:</label> 
<input type="text" name="lastname" class="form-control" placeholder="Lastname" value="<?php if(isset($lastname)){echo $lastname;} ?>" required>   
</div> <!--ADD LASTNAME-->

<div class="form-group">
<label for="image">Profile Pictures</label> 
<input type="file" name="image" id="image">   
</div> <!--ADD IMAGE-->

</div> <!--COL-MD-6 END-->

<div class="col-md-12">       
<center><input type="submit" value="Create Admin Account" name="add_admin" class="btn btn-default btn-md"></center>
<hr>
</div> 
</form> 
<!--ADD USER ACCOUNT-->


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