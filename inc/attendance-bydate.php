<?php
include('/../functions.php');


	global $studentClass, $userid;
	$conf = "../config.ini";
		//$studentId = $studentClass->getRFIDNumber($_POST['user_id'], $conf);
		$studentAttendance = $studentClass->showAttendanceFiltered($_GET["date"], $_GET['userid'], $conf);
	if($studentAttendance[0] != "") :
	?>
		<table class="table table-striped table-hover table-responsive table-responsive">
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
		</table>
		<script src="js/bootstrap.min.js"></script>