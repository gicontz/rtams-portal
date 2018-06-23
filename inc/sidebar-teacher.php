<?php include("css-all/sidebar-css.php"); 
$session_firstname = $_SESSION['users_details']['first_name'];
$session_lastname = $_SESSION['users_details']['last_name'];
$session_image = $_SESSION['users_details']['img_src'];
$none = "empty.png";
?>
     
<div class="row">

<div class="mini-submenu">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</div>


<div class="list-group">

<div class="panel panel-success">
<div class="panel panel-heading" style="font-weight:bold; color:#006400; text-align:center;"><i class="fa fa-user-plus" aria-hidden="true"></i><a href="homepage-teacher.php" style="text-decoration:none; color:#234F2C;"> Dashboard Teacher</a></div>

<div class="panel-body"> 
<div class="col-md-4">
<img src='system-img/<?php 
          
if($session_image == "")
{
echo $none;
}
else
{
echo $session_image;
} ?>' width='100px;' height='100px'; class="img-circle" style="object-fit: cover;">
</div>

<div class="col-md-8">
<ul class="nav navbar-nav nav-clock">
<li><b>Welcome:</b> <i class="fa fa-user"></i> <?php echo strtoupper("$session_firstname $session_lastname")."<br>";?> <span id="clockbox"></span></li>
</ul>

</div>
   
         
</div> <!--end panel body-->
</div> <!--end panel success--> 

<span href="#" class="list-group-item"> Menu <span class="pull-right">
</span></span>
       
<a href="http://www.feucavite.edu.ph/" target="_blank" class="list-group-item"><i class="fa fa-globe" aria-hidden="true"></i> F.E.U. Cavite Website </a>
<a href="https://www.facebook.com/FEUCaviteBasicEducationDepartment/" target="_blank" class="list-group-item"><i class="fa fa-facebook-square" aria-hidden="true"></i> F.E.U. Cavite (BED) Facebook </a> 
<!--Total ng lahat ng account-->

<a href="http://www.feucavite.edu.ph/index.php/directory/" target="_blank" class="list-group-item"><i class="fa fa-phone-square" aria-hidden="true"></i> Contact Us  </a>

<a href="http://www.feucavite.edu.ph/index.php/directory/" target="_blank" class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i> Location</a>

<a href="profile-teacher.php" class="list-group-item"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>

<a href="lib/logout" class="list-group-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
</div> <!--end list group-->
  
        
</div> <!--end row-->
<!-- modal start -->
<div id="changepic" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Profile Picture</h4>
      </div>
      <div class="modal-body">

        <link rel="stylesheet" type="text/css" href="css/cropit.css">

        <nav class="navbar navbar-default">
        <center>
          <div class="image-editor">
            <br>
            <input type="file" class="cropit-image-input"><br>
            <div class="cropit-preview"></div>
            <div class="image-size-label">
              Resize image
            </div>
            <input type="range" class="cropit-image-zoom-input" style="width: 50%">
            <button class="rotate-ccw fa fa-undo btn btn-success"></button>
            <button class="rotate-cw fa fa-repeat btn btn-success"></button>

            <button class="export btn btn-info" id="change_current_dp">Apply Changes</button>
          </div>
        </center>
        <br>
        </nav>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- modal end -->
<?php include "java-all/java-clock.php"; ?>