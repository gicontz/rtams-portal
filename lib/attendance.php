<?php


	global $studentClass, $userid;
	$conf = "config.ini";
	$studentId = $studentClass->getRFIDNumber($userid, $conf);
	$studentAttendance = $studentClass->showAttendance($studentId, $conf);
	
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