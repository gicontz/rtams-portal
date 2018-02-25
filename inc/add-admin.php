<?php
	include('/../functions.php');
	global $adminClass;
	$conf = "../config.ini";
	$adminClass->addAdmin($_POST["username"], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['middlename'], $_POST['extension_name'], $conf);

	header('Location: '. $domain_header . '/homepage-admin');
?>
