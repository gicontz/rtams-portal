<?php 
ob_start();
session_start();
include 'db.php'; 
$session_role2 = $_SESSION['role'];
$session_username2 = $_SESSION['username'];
?>

<?php
if(!isset($_SESSION['username']))
{
header('location: index.php');
}
// HINDI PWEDE BUKSAN ANG LINK NG DIREKTA.. PAG TYPE NG LOCAHOST/CAPS/HOMEPAGE.PHP REDIRECT ITO SA INDEX.PHP FILE AT NEED NYA MAG LOGIN BAGO MAKAPASOK SA SYSTEM.
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <title>Homepage</title>
    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<link rel="icon" type="image/png" href="images/tmp-icon.png">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.css">
<!--<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">--> 
<?php include("css-all/homepage-css.php"); ?>

</head>

<body>
<?php include("inc/navbar.php"); ?>

<div class="container">
<center><img src="images/tmp-icon.png" alt="logo"></center>


<div class="col-md-12 centered">
<div class="row "> <!---row start--->

<div class="col-lg-4"> <!---col-md-g col-lg-3 start--->       
<div class="panel panel-default tag-boxes"> <!---panel panel-primary start--->        
         
<div class="panel-heading"> <!---panel-heading start--->
<div class="row"> <!---row2 start--->         
 
                          
<div class="col-xs-12">
<center>
<i class="fa fa-users fa-5x" aria-hidden="true"></i>  
</center>  
</div>   
              
</div> <!---row2 end--->   
</div>  <!---panel-heading end--->
            
<a href="user-admin.php">
<div class="panel-footer"> <!---panel-footer start--->
<span><b>Admin Accounts</b></span>
<div class="clearfix"></div>  
</div> <!---panel-footer end--->
</a>       
                    
</div>  <!---panel panel-primary end--->         
</div> 
<!--admin account box-->

<div class="col-lg-4"> <!---col-md-g col-lg-3 start--->       
<div class="panel panel-default tag-boxes"> <!---panel panel-primary start--->        
         
<div class="panel-heading"> <!---panel-heading start--->
<div class="row"> <!---row2 start--->         
 
                          
<div class="col-xs-12">
<center>
<i class="fa fa-users fa-5x" aria-hidden="true"></i>  
</center>  
</div>   
              
</div> <!---row2 end--->   
</div>  <!---panel-heading end--->
            
<a href="user-student.php">
<div class="panel-footer"> <!---panel-footer start--->
<span><b>Student Accounts</b></span>
<div class="clearfix"></div>  
</div> <!---panel-footer end--->
</a>       
                    
</div>  <!---panel panel-primary end--->         
</div> 
<!--student account box-->

<div class="col-lg-4"> <!---col-md-g col-lg-3 start--->       
<div class="panel panel-default tag-boxes"> <!---panel panel-primary start--->        
         
<div class="panel-heading"> <!---panel-heading start--->
<div class="row"> <!---row2 start--->         
 
                          
<div class="col-xs-12">
<center>
<i class="fa fa-users fa-5x" aria-hidden="true"></i>  
</center>  
</div>   
              
</div> <!---row2 end--->   
</div>  <!---panel-heading end--->
            
<a href="user-teacher.php">
<div class="panel-footer"> <!---panel-footer start--->
<span><b>Teacher Accounts</b></span>
<div class="clearfix"></div>  
</div> <!---panel-footer end--->
</a>       
                    
</div>  <!---panel panel-primary end--->         
</div> 
<!--teacher account box-->

<div class="col-lg-4"> <!---col-md-g col-lg-3 start--->       
<div class="panel panel-default tag-boxes"> <!---panel panel-primary start--->        
         
<div class="panel-heading"> <!---panel-heading start--->
<div class="row"> <!---row2 start--->         
 
                          
<div class="col-xs-12">
<center>
<i class="fa fa-users fa-5x" aria-hidden="true"></i>  
</center>  
</div>   
              
</div> <!---row2 end--->   
</div>  <!---panel-heading end--->
            
<a href="user-parent.php">
<div class="panel-footer"> <!---panel-footer start--->
<span><b>Parent Accounts</b></span>
<div class="clearfix"></div>  
</div> <!---panel-footer end--->
</a>       
                    
</div>  <!---panel panel-primary end--->         
</div> 
<!--parent account box-->

<div class="col-lg-4"> <!---col-md-g col-lg-3 start--->       
<div class="panel panel-default tag-boxes"> <!---panel panel-primary start--->        
         
<div class="panel-heading"> <!---panel-heading start--->
<div class="row"> <!---row2 start--->         
 
                          
<div class="col-xs-12">
<center>
<i class="fa fa-users fa-5x" aria-hidden="true"></i>  
</center>  
</div>   
              
</div> <!---row2 end--->   
</div>  <!---panel-heading end--->
            
<a href="#">
<div class="panel-footer"> <!---panel-footer start--->
<span><b>Manage Post</b></span>
<div class="clearfix"></div>  
</div> <!---panel-footer end--->
</a>       
                    
</div>  <!---panel panel-primary end--->         
</div> 
<!--Post-->

<div class="col-lg-4"> <!---col-md-g col-lg-3 start--->       
<div class="panel panel-default tag-boxes"> <!---panel panel-primary start--->        
         
<div class="panel-heading"> <!---panel-heading start--->
<div class="row"> <!---row2 start--->         
 
                          
<div class="col-xs-12">
<center>
<i class="fa fa-users fa-5x" aria-hidden="true"></i>  
</center>  
</div>   
              
</div> <!---row2 end--->   
</div>  <!---panel-heading end--->
            
<a href="#">
<div class="panel-footer"> <!---panel-footer start--->
<span><b>Manage Attendace</b></span>
<div class="clearfix"></div>  
</div> <!---panel-footer end--->
</a>       
                    
</div>  <!---panel panel-primary end--->         
</div> 
<!--Attendance-->
       
</div> <!--row end -->   
</div> <!---col-md-12 end--->
</div>


<?php 
include("inc/bot/javascript.php"); //BOOTSTRAP AND CHECKBOX
include("java-all/java-sidebar.php"); //Sidebar
?> 
</body>
</html>