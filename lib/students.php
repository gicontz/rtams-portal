<?php


class Student extends XDLINE{

	public function getStudentNumber($userid, $configfile){
		return parent::select("student_number", "students_table", "user_id = $userid", $configfile)[0]['student_number'];
	}

	public function showAttendance($rfid_number, $configfile){
		return parent::select("time_in, time_out, date_in","attendance_table", "rfid_number = $rfid_number", $configfile);
	} 

	public function getRFIDNumber($userid, $configfile){
		$student_number = $this->getStudentNumber($userid, $configfile);
		return parent::select("rfid_number", "students_table", "student_number = $student_number", $configfile)[0]['rfid_number'];
	}
}