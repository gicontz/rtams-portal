<?php

include('lib/XDLINE.php');
include('lib/variables.php');
//include('lib/subjects.php');
//include('lib/instructors.php');
//include('lib/students.php');

$XDLINE = "XDLINE";
$subjects = "Subjects";
$instructors = "Instructor";
$students = "Student";
$XDL = new $XDLINE;	
//$subjectClass = new $subjects;
//$instructorClass = new $instructors;
//$studentClass = new $students;

function getHeaderAssets(){
	?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/profile.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<script src = "js/jquery.min.js"></script>
	<script src = "js/bootstrap.min.js"></script>
	<?php
	include_once('inc/session_checker.php');
}

function getFooterContents(){
	?>
	<footer class="footer col-md-12" style="background-color: white;">
		<h2><br>RTAMS</h2>
		<p>Real Time Attendance Monitoring System <br/>Allrights reserved 2018 &copy;</p><br><br>
	</footer>
	<?php
}

function inject_asset($type, $url){
	if ($type == 'stylesheet') {
	?>
	<script type="text/javascript">
		$('head').append('<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>">');
	</script>
	<?php
	}
	else if ($type=='script') {
	?>
	<script type="text/javascript">
		$('head').append('<script type="text/javascript" src="<?php echo $url; ?>"><\/script>');
	</script>
	<?php
	}
}

function getproperfullname($userArray){
		return $userArray['last_name'] . ", " . $userArray['first_name'] . " " . $userArray['middle_name'];
}