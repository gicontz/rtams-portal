<?php
include('/../functions.php');


	global $studentClass;
	if (!isset($_POST["date"])) {
		$studentId = $studentClass->getRFIDNumber($_SESSION['users_details']['user_id'], "config.ini");
		$studentAttendance = $studentClass->showAttendance($studentId, "config.ini");
	} else {
		$studentId = $studentClass->getRFIDNumber($_POST['user_id'], "config.ini");
		$studentAttendance = $studentClass->showAttendanceFiltered($studentId, "config.ini");
	}
	if($studentAttendance[0] != "") :
	?>
		<tr>
			<th>Time in</th>
			<th>Time out</th>
			<th>Date</th>
			<th>Remarks</th>
		</tr>

		<?php
		foreach($studentAttendance as $attendance){
		?>
		<tr>
			<td><?php echo $attendance['time_in']== "" ? "<span class='red'>No time in</span>" : $attendance['time_in']; ?></td>
			<td><?php echo $attendance['time_out']== "" ? "<span class='red'>No time out</span>" : $attendance['time_out']; ?></td>
			<td><?php echo $attendance['date_in']; ?></td>
			<td></td>
		</tr>
		<?php
		}
		?>
	<?php

	else:
		echo "<h4>No Attendance yet.</h4>";

	endif;

?>