<?php
	include('../functions.php');
	global $adminClass;
	$conf = "../config.ini";

	if ($_FILES["image"] != "" || $_FILES["image"] != null) {
		$data = file_get_contents($_FILES["image"]["tmp_name"]);
		$extensionArray = explode(".", strtolower($_FILES["image"]["name"]));
		$fileExtension = end($extensionArray);

		$filename = "profile_".$_POST["username"].".".$fileExtension;
		$new = '../system-img/'.$filename;
		file_put_contents($new, $data);

		$result = $adminClass->addAdmin($_POST["username"], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['middlename'], $_POST['extension_name'], $_REQUEST['type'], $filename, $conf);

	}else {
		$adminClass->addAdmin($_POST["username"], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['middlename'], $_POST['extension_name'], $_REQUEST['type'], "", $conf);
	}


	header('Location: '. $domain_header . '/homepage-admin');
?>
