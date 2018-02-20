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
} ?>' width='100px;' height='100px'; class="img-circle">
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

<?php include "java-all/java-clock.php"; ?>