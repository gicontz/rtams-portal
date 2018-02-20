<?php


class Student extends XDLINE{

	public function getStudentNumber($userid, $configfile){
		return parent::select("student_number", "students_table", "user_id = $userid", $configfile)[0]['student_number'];
	}

	public function showAttendance($rfid_number, $configfile){
		return parent::select("time_in, time_out, date_in", "attendance_table", "rfid_number = $rfid_number ORDER BY date_in", $configfile);
	} 

	public function getRFIDNumber($userid, $configfile){
		return parent::select("rfid_number", "students_table", "user_id = $userid", $configfile)[0]['rfid_number'];
	}

	public function showAttendanceFiltered($date_in, $userid, $configfile){
		$rfid = $this->getRFIDNumber($userid, $configfile);		
		return parent::select("time_in, time_out, date_in", "attendance_table", "date_in LIKE '%$date_in%' and rfid_number = $rfid", $configfile);
	}
}