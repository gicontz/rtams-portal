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
<div class="col-md-4 show-image">
<img src='system-img/<?php 
          
if($session_image == "")
{
echo $none;
}
else
{
echo $session_image;
} ?>' width='100px;' height='100px'; class="img-circle" style="object-fit: cover;">
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#changepic">Change</button>
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
<script type="text/javascript" src="dist/jquery.cropit.js"></script>

<script>
  $(function() {
    $('.image-editor').cropit({
      exportZoom: 1.25,
      imageBackground: true,
      imageBackgroundBorderWidth: 20,
      imageState: {
        src: 'http://lorempixel.com/500/400/',
      },
    });

    $('.rotate-cw').click(function() {
      $('.image-editor').cropit('rotateCW');
    });
    $('.rotate-ccw').click(function() {
      $('.image-editor').cropit('rotateCCW');
    });

    $('#change_current_dp').click(function() {
      var imageData = $('.image-editor').cropit('export');
      var data = new Object();
      data["request_type"] = "update-profile-picture";
      data["imageData"] = imageData;

      $.post("lib/login.php", {data: data}, function(callback){
        location.reload(true);
        window.history.forward(1);
        // console.log(callback);
      });

    });
  });

  $('#image-cropper').cropit({ imageBackground: true });

</script>
<?php include "java-all/java-clock.php"; ?>