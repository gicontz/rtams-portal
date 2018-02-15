<?php
ob_start();
session_start();
include 'db.php'; 
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
<div class="panel panel-heading" style="font-weight:bold; color:#006400; text-align:center;"><i class="fa fa-user-plus" aria-hidden="true"></i> Attendance</div>
<div class="panel-body"> 

                                         
<h1 style="text-align:center;">BLANK</h1>


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