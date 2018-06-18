<?php

class Student extends XDLINE{

	var $configfile;

	function __construct(){
		$args = func_get_args();
		switch (func_num_args()) {
			case 1:
				self::__construct1($args[0]);
				break;
			
			default:
				break;
		}
	}

	function __construct1($conf){
		$this->configfile = $conf;
	}

	public function getStudentNumber($userid, $configfile){
		return parent::select("student_number", "students_table", "user_id = $userid", $configfile)[0]['student_number'];
	}

	public function showAttendance($rfid_number, $configfile){
		return parent::select("time_in, time_out, date_in", "attendance_table", "rfid_number = $rfid_number ORDER BY date_in", $configfile);
	} 

	public function getSection($userid, $configfile){
		$sectArray = parent::select("course_main_title, year, section", "students_table inner join sections_table on students_table.section_id = sections_table.section_id inner join courses_table on sections_table.course_id = courses_table.course_id", "user_id = $userid", $configfile);
		?>
		<script type="text/javascript"> alert(<?php print_r($sectArray[0]['course_main_title']); ?>);</script>
		<?php 
		return $sectArray[0];
	}

	public function showAllSection($configfile){
		return parent::select("section_id, course_main_title, year, section", "courses_table inner join sections_table on courses_table.course_id = sections_table.course_id", "", $configfile);
	}

	public function getRFIDNumber($userid, $configfile){
		return parent::select("rfid_number", "students_table", "user_id = $userid", $configfile)[0]['rfid_number'];
	}

	public function showAttendanceFiltered($date_in, $userid, $configfile){
		$rfid = $this->getRFIDNumber($userid, $configfile);		
		return parent::select("time_in, time_out, date_in", "attendance_table", "date_in LIKE '%$date_in%' and rfid_number = $rfid", $configfile);
	}

	public function showAllStudents(){
		return parent::select("*", "students_table inner join users_table on students_table.user_id = users_table.user_id ORDER BY username", "", $this->configfile);
	}
	
	public function showStudentbyId($user_id){
		return parent::select("*", "students_table inner join users_table on students_table.user_id = users_table.user_id", "students_table.user_id = $user_id", $this->configfile);
	}
	public function addStudent($student_id, $firstname, $lastname, $middlename, $section, $ext, $contact_number, $configfile){
		$uid = parent::select("MAX(user_id)", "users_table", "", $configfile)[0]['MAX(user_id)'];
		$stud_info = parent::select("student_number, contact_number", "students_table", "student_number = $student_id or contact_number = $contact_number", $configfile)[0];
		if($stud_info == ""):
			$res = parent::insert("users_table", array(
				'account_type' => 'student',
				'first_name' => $firstname,
				'last_name' => $lastname,
				'middle_name' => $middlename,
				'extension' => $ext,
				'username' => "student" . ($uid + 1),
				'password' => parent::encrypt_password('12345678'),
			), "1", "0", $configfile);

			if($res == "1"):
				$uid = parent::select("MAX(user_id)", "users_table", "", $configfile)[0]["MAX(user_id)"];
				return parent::insert("students_table", array(
					'student_number' => $student_id,
					'user_id' => $uid,
					'rfid_number' => 0,
					'section_id' => $section,
					'contact_number' => $contact_number
				), "1", "0", $configfile);
			endif;
			return "0";
		endif;
	}

	public function updateStudent($student_id, $firstname, $lastname, $middlename, $section, $ext, $contact_number, $password, $username, $uid){
		
			$ress = parent::update("users_table", array(
				'first_name' => $firstname,
				'last_name' => $lastname,
				'middle_name' => $middlename,
				'extension' => $ext,
				'password' => parent::encrypt_password($password),
				'username' => $username
			), "user_id = $uid", "1", "error", $this->configfile);

			if($ress == "1"):
				return parent::update("students_table", array(
					'student_number' => $student_id,
					'section_id' => $section,
					'contact_number' => $contact_number
				), "user_id = $uid", "1", "error", $this->configfile);
			endif;

			return $ress;
	}
}