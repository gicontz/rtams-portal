<?php
	include('../functions.php');
	global $studentClass;
	$conf = "../config.ini";


	if ($_FILES["image"] != "" || $_FILES["image"] != null) {
		$data = file_get_contents($_FILES["image"]["tmp_name"]);
		$extensionArray = explode(".", strtolower($_FILES["image"]["name"]));
		$fileExtension = end($extensionArray);

		$filename = "profile_".$_POST["stud_id"].".".$fileExtension;
		$new = '../system-img/'.$filename;
		file_put_contents($new, $data);

		$studentClass->addStudent($_POST["stud_id"], $_POST['firstname'], $_POST['lastname'], $_POST['middlename'], $_POST['section'], $_POST['extension_name'], $_POST['contact_no'], $filename, $conf);

	}else {
		$studentClass->addStudent($_POST["stud_id"], $_POST['firstname'], $_POST['lastname'], $_POST['middlename'], $_POST['section'], $_POST['extension_name'], $_POST['contact_no'], "", $conf);
	}

	header('Location: '. $domain_header . '/homepage-admin');
?>
