<?php
ob_start();
include 'functions.php';
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

 <?php 
 getHeaderAssets();
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

          <div class="tab-contents">
            <div id="admin-tab" class="tab-content current">
              <form action="inc/add-admin.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="username">Username:</label> 
                    <input type="text" name="username" class="form-control" placeholder=" Username" id="username" value="" required> 
                  </div> <!--ADD USERNAME-->

                  <div class="form-group">
                    <label for="Password">Password:</label> 
                    <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>   
                  </div> <!--ADD PASSWORD--> 

                  <div class="form-group">
                    <label>Firstname:</label>           
                    <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="" required>   
                  </div> <!--ADD FIRSTNAME-->

                  <div class="form-group">
                    <label>Middlename:</label>           
                    <input type="text" name="middlename" class="form-control" placeholder="Middlename" value="" required>   
                  </div> <!--ADD FIRSTNAME-->
                </div> <!--COL-MD-6 END-->
                

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Lastname:</label> 
                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="" required>   
                  </div> <!--ADD LASTNAME-->

                  <div class="form-group">
                    <label>Extension: *(optional)</label> 
                    <select name="extension_name" class="form-control">
                      <option value="" default>Choose extension name</option>
                      <option value="Jr.">Jr.</option>
                      <option value="Sr.">Sr.</option>
                      <option value="I">I</option>
                      <option value="II">II</option>
                      <option value="III">III</option>
                      <option value="IV">IV</option>
                      <option value="V">V</option>
                    </select>   
                  </div> <!--ADD EXTENSION-->

                  <div class="form-group">
                    <label for="image">Profile Pictures</label> 
                    <input type="file" name="image" id="image">   
                  </div> <!--ADD IMAGE-->

                </div> <!--COL-MD-6 END-->

                <div class="col-md-12">       
                  <center><input type="submit" value="Create Admin Account" name="add_admin" class="btn btn-default btn-md"></center>
                </div> 
              </form> 
              <!--ADD USER ACCOUNT-->
            </div>

            <div id="teacher-tab" class="tab-content">

            </div>
            <div id="student-tab" class="tab-content">
              <form action="inc/add-student.php" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="stud_id">Student ID:</label> 
                      <input type="number" name="stud_id" class="form-control" placeholder="20111111" id="stud_id" value="" required> 
                    </div> <!--STUDENT ID-->

                    <div class="form-group">
                      <label>Firstname:</label>           
                      <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="" required>   
                    </div> <!--ADD FIRSTNAME-->

                    <div class="form-group">
                      <label>Middlename:</label>           
                      <input type="text" name="middlename" class="form-control" placeholder="Middlename" value="" required>
                    </div> <!--ADD FIRSTNAME-->

                    <div class="form-group">
                      <label>Lastname:</label> 
                      <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="" required> 
                    </div> <!--ADD LASTNAME-->
                  </div> <!--COL-MD-6 END-->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Section:</label>
                      <select id="sections" name="section" class="form-control">
                        <option value="" default>Choose section</option>
                        <?php
                        $sections  = $studentClass->showAllSection("config.ini");
                        foreach($sections as $section){ 
                          $program = $section['course_main_title'];
                          $year = $section['year'];
                          ?>
                          <?php
                          $year = $program == "Kindergarten" || $program == "Preparatory" ? "" : $year;
                          ?>
                          <option value="<?php echo $section['section_id']; ?>"><?php echo $program; ?> <?php echo $year; ?> <?php echo $section['section']; ?></option>            
                          <?php
                        }
                        ?>        
                      </select>
                    </div> <!--ADD LASTNAME-->

                    <div class="form-group">
                      <label>Extension: *(optional)</label> 
                      <select name="extension_name" class="form-control">
                        <option value="" default>Choose extension name</option>
                        <option value="Jr.">Jr.</option>
                        <option value="Sr.">Sr.</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                      </select>   
                    </div> <!--ADD EXTENSION-->

                    <div class="form-group">
                      <label>Contact Number:</label> 
                      <input type="number" name="contact_no" class="form-control" placeholder="Contact Number" value="" required>   
                    </div> <!--ADD LASTNAME-->

                  </div> <!--COL-MD-6 END-->

                  <div class="col-md-12">       
                    <div class="text-center">
                      <input type="submit" value="Add Student" name="add_admin" class="btn btn-default btn-md">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importStudentModal">Import Students</button>
                    </div>
                  </div>  
                </div>
              </form> 

              <div class="modal fade" id="importStudentModal" role="dialog">
                <div class="modal-dialog modal-sm" style="margin-top: 140px;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><center>Import Students</center></h4>
                    </div>

                    <div class="modal-body">
                      <input type="file" name="student_info_file">
                      <buttn class="btn btn-primary">Import File</buttn>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="student_list">
                </div>
                <!--ADD STUDENT ACCOUNT-->
              </div>
            </div>
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