<?php
	include('/../functions.php');
	global $studentClass;
	$conf = "../config.ini";
	$studentClass->addStudent($_POST["stud_id"], $_POST['firstname'], $_POST['lastname'], $_POST['middlename'], $_POST['section'], $_POST['extension_name'], $_POST['contact_no'], $conf);

	header('Location: '. $domain_header . '/homepage-admin');
?>
