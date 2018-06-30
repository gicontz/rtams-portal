<?php
ob_start();
session_start();
include 'functions.php';
if (isset($_SESSION['users_details'])) {
      $accessibility = $_SESSION['users_details']['account_type'];
      switch ($_SESSION['users_details']['account_type']) {
              case 'teacher':
                //header('Location: '. $domain_header . '/homepage-teacher');
                break;
              case 'student':
                header('Location: '. $domain_header . '/homepage-student');
                break;
                case 'admin':
                header('Location: '. $domain_header . '/homepage-admin');
                break;
            }
    }else{    	
                header('Location: '. $domain_header);
    }

$menu_tab = "";
if(isset($_REQUEST['menu'])) :
  $menu_tab = $_REQUEST['menu'];
endif;
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <title>Teacher Control</title>
    
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
<?php //include("inc/navbar.php"); ?>
<div class="container-fluid">
<div class="col-md-4">
<?php include("inc/sidebar-teacher.php"); ?>    
</div> 

<?php 
  if ($menu_tab == "advisory") {
    ?>
      <div class="col-md-8">
      <div class="panel panel-success">
      <div class="panel panel-heading" style="font-weight:bold; color:#006400; text-align:center;"><i class="fa fa-users" aria-hidden="true"></i> Advisory Attendance</div>
      <div class="panel-body"> 
                                               
        <table class="table table-striped">
          
            <?php 
              global $studentClass;
              $advisoryData = $studentClass->getAdvisory();
              if ($advisoryData[0] != "") {
                ?>
                    <thead>
                      <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Student Number</th>
                        <th>Contact Number</th>
                        <th>RFID Number</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                foreach ($advisoryData as $key => $value) {
                  ?>
                    <tr>
                      <td><button class="btn btn-default" data-target="#attendance-<?php echo $value["user_id"] ?>" data-toggle="modal"><i class="fa fa-book"></i></button></td>
                      <td><?php echo ucfirst($value['last_name']).", ".ucfirst($value["first_name"])." ".ucfirst($value["middle_name"]); ?></td>
                      <td><?php echo $value['student_number']; ?></td>
                      <td><?php echo $value['contact_number']; ?></td>
                      <td><?php echo $value['rfid_number']; ?></td>
                    </tr>

                    
                  <?php
                }
              }else {
                echo "<center><h4>No advisory yet</h4></center>";
              }

             ?>
           
          </tbody>
        </table>

<?php 

  foreach ($advisoryData as $key => $value) {
                ?>
                  <div id="attendance-<?php echo $value["user_id"] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><?php echo ucfirst($value['first_name'])." ".ucfirst($value["middle_name"])." ".ucfirst($value["last_name"]); ?></h4>
                        </div>
                        <div class="modal-body" style="overflow-x: auto;">
                          <table class="table">
                            
                           <?php

                              $studentAttendance = $studentClass->showAttendance($value['rfid_number'], "config.ini");
                              if($studentAttendance[0] != ""){
                              ?>
                              <thead>
                                <tr>
                                  <th>Time in</th>
                                  <th>Time out</th>
                                  <th>Date</th>
                                  <th>Remarks</th>
                                </tr>
                              </thead>

                                <?php
                                foreach($studentAttendance as $attendance){
                                ?>
                                <tr>
                                  <td><?php echo $attendance['time_in'] == "" ? "<span class='red'>No time in</span>" : $attendance['time_in']; ?></td>
                                  <td><?php echo $attendance['time_out'] == "" ? "<span class='red'>No time out</span>" : $attendance['time_out']; ?></td>
                                  <td><?php echo $attendance['date_in']; ?></td>
                                  <td></td>
                                </tr>
                                <?php
                                }
                                ?>
                                
                              <?php
                              }else{
                                echo "<h4>No Attendance yet.</h4>";
                              }
                          ?>

                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
                <?php
              }
 ?>
      </div> <!--panel body end-->                                
      </div> <!--panel end-->   
      </div> <!--md-8 end--> 
    <?php
  }else {
    ?>
      <div class="col-md-8">
      <div class="panel panel-success">
      <div class="panel panel-heading" style="font-weight:bold; color:#006400; text-align:center;"><i class="fa fa-user-plus" aria-hidden="true"></i> Attendance</div>
      <div class="panel-body"> 
                                               
      <h1 style="text-align:center;">BLANK</h1>

      </div> <!--panel body end-->                                
      </div> <!--panel end-->   
      </div> <!--md-8 end--> 
    <?php
  }
 ?>           
</div> <!--container end-->

<?php 
include("inc/bot/javascript.php"); //BOOTSTRAP AND CHECKBOX
include ("datatable/datatable-bot.php"); //Datatable
?> 

</body>
</html>