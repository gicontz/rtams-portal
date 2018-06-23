<?php 
	
include("XDLINE.php");
$data = $_POST['data'];

if ($data['request_type'] == "request-login") {
	login($data['username'], $data['password']);
}else if ($data['request_type'] == "update-profile-picture") {
	profilePicture($data['imageData']);
}

function login($username, $password){
	session_start();
	$XDLINE = "XDLINE";
	$XDL = new $XDLINE;	
	$password = $XDL->encrypt_password($password);
	$users_details = $XDLINE::select("*", "users_table, university_table", "users_table.username = '$username' AND users_table.password = '$password'")[0];

	if ($users_details == "") {
		echo "FAILED";
		session_destroy();
	}else {
		$_SESSION['users_details'] = $users_details;
		echo "GOTO PROFILE " . $_SESSION['users_details']['account_type'];
	}
};

function profilePicture($imageLink){
	session_start();
	$XDLINE = "XDLINE";
	$XDL = new $XDLINE;

	$data = file_get_contents($imageLink);
	$user_id = $_SESSION['users_details']['user_id'];
	$filename = hash('MD2', $user_id).'.png';
	$new = '../system-img/'.$filename;
	file_put_contents($new, $data);

	$updatePicture = $XDLINE::update("users_table", array('img_src' => $filename), "`user_id` = '$user_id'");
	$_SESSION['users_details']['img_src'] = $filename;
};


?>