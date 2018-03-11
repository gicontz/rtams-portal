<?php 
ob_start();
include("css-all/sidebar-css.php"); 
$session_username2 = $_SESSION['users_details']['username'];
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
<div class="panel panel-heading" style="font-weight:bold; color:#006400; text-align:center;"><i class="fa fa-user-plus" aria-hidden="true"></i><a href="homepage-admin.php" style="text-decoration:none; color:#234F2C;"> Dashboard Admin</a></div>

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

  </div>
<div class="menu_sidebar" style="display: none">
<span href="#" class="list-group-item"> Menu <span class="pull-right" id="slide-submenu">
</span></span>
       
<a href="homepage-admin" class="list-group-item"> ADD <i class="fa fa-plus pull-right" aria-hidden="true"></i></a>
<a href="user-table" class="list-group-item"> MANAGE USER ACCOUNT <i class="fa fa-pencil pull-right" aria-hidden="true"></i></a>
<a href="record" class="list-group-item"> RECORD <i class="fa fa-file pull-right" aria-hidden="true"></i> </a> 
<a href="profile-admin.php" class="list-group-item"> PROFILE <i class="fa fa-user pull-right" aria-hidden="true"></i> </a> 
</div> <!--end list group-->
        
</div> <!--end row-->

<?php include "java-all/java-clock.php"; ?>