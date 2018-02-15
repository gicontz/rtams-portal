<?php include("css-all/breadcrumbs-css.php"); ?>

<ol class="breadcrumb"> 

<?php if($session_role2 == 'admin') { ?> 
<li><a href="user-admin.php"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Back to Menu</a></li>
<li><a href="profile-admin.php"><i class="fa fa-user" aria-hidden="true"></i> Profile </a></li>
<?php } ?>

<?php if($session_role2 == 'teacher') { ?> 
<li><a href="homepage-teacher.php"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Back to Menu</a></li>
<li><a href="profile-teacher.php"><i class="fa fa-user" aria-hidden="true"></i> Profile </a></li>
<?php } ?>
     
<?php if($session_role2 == 'student') { ?> 
<li><a href="homepage-student.php"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Back to Menu</a></li>
      
<li><a href="profile-student.php"><i class="fa fa-user" aria-hidden="true"></i> Profile </a></li>
<?php } ?>
     
<?php if($session_role2 == 'parent') { ?> 
<li><a href="homepage-teacher.php"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Back to Menu</a></li>
<?php } ?>


</ol>