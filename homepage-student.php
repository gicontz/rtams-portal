<?php
ob_start();
session_start();
include 'functions.php';
if (isset($_SESSION['users_details'])) {
      $accessibility = $_SESSION['users_details']['account_type'];
      switch ($_SESSION['users_details']['account_type']) {
              case 'teacher':
                header('Location: '. $domain_header . '/homepage-teacher');
                break;
              case 'student':
                //header('Location: '. $domain_header . '/homepage-student');
                break;
                case 'admin':
                header('Location: '. $domain_header . '/homepage-admin');
                break;
            }
    }else{    	
                header('Location: '. $domain_header);
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

<!-- <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="css/datepicker.css"> -->

<!--<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">--> 

<?php 
include("css-all/userts-css.php");
getHeaderAssets();
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
	<div class="panel-body filter-select"> 
		<form action="" method="get">
			<div class="form-group">
				<label for="filterdate">Filter by:</label>  
				<input class="datepicker" name="date" data-date-format="MM dd yyyy">
				<input type="hidden" name="userid" value="<?php echo $_SESSION['users_details']['user_id'];?>">
				<button type="button" id="filter-attendance" class="btn btn-default" name="select">Select</button>
			</div>
		</form>
	</div>
<div class="panel-body"> 

	<div id="student-attendance">	
		<table class="table table-striped table-hover table-responsive table-responsive">
	        <?php 
	        $userid = $_SESSION['users_details']['user_id'];
	        include('lib/attendance.php'); ?>
		</table>
	</div>


</div> <!--panel body end-->                                
</div> <!--panel end-->   
</div> <!--md-8 end-->            
</div> <!--container end-->

<?php 
include("inc/bot/javascript.php"); //BOOTSTRAP AND CHECKBOX
?> 


</body>
</html>