<?php
include("../functions.php");
session_start();

$studentinfo = $_POST["student_info"]["studentinfo"];
$existingcount = 0;
$studentnum_exist = array();
$status = "";
for($index = 1; $index <= sizeof($studentinfo) - 1; $index++){
$orig_sn = str_replace("-", "", $studentinfo[$index][0]);
$fn = $studentinfo[$index][1];
$ln = $studentinfo[$index][2];
$mn = $studentinfo[$index][3];
$ext = $studentinfo[$index][4];
$cn = $studentinfo[$index][5];
$secid = $studentinfo[$index][6];

$existing_Student = $XDL::select("*", "students_table", "student_number = $orig_sn", "../config.ini");

if($existing_Student[0] == ""){
	$result = $studentClass->addStudent(
		$orig_sn,
		$fn,
		$ln,
		$mn,
		$secid,
		$ext,
		$cn,
		"../config.ini"
	);
	if($result == "1") : $status = "Success"; endif;
}else{
	$studentnum_exist[$existingcount] = $orig_sn;
	$existingcount++;
	$status = "Failed";
}
}

echo $status;
echo "<br/>";
foreach($studentnum_exist as $stud){
	echo $stud . "<br/>";
}
?>
