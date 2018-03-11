<?php
include('../lib/XDLINE.php');
include('../lib/students.php');
$stud = "Student";
$student = new $stud("../config.ini");

$info = $_POST['studinfo'];

echo $student->updateStudent(
	$info[0],
	$info[1],
	$info[2],
	$info[3],
	$info[4],
	$info[5],
	$info[6],
	$info[7],
	$info[8],
	$info[9]
);

