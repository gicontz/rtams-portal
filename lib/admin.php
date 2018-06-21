<?php


class Admin extends XDLINE{

	public function addAdmin($username, $password, $firstname, $lastname, $middlename, $ext, $type, $configfile){
			return parent::insert("users_table", array(
				'account_type' => $type,
				'first_name' => $firstname,
				'last_name' => $lastname,
				'middle_name' => $middlename,
				'extension' => $ext,
				'username' => $username,
				'password' => parent::encrypt_password($password),
			), "1", "0", $configfile);
	}
}