<?php
include('../lib/XDLINE.php');
include('../lib/students.php');
$stud = "Student";
$student = new $stud("../config.ini");
$students = $student->showAllStudents();
?>

<table class="table table-hover">
	<tr>
		<th>Action</th>
		<th>Student Number</th>
		<th>Username</th>
		<th>RFID Number</th>
		<th>Name</th>
		<th>Contact Number</th>
	</tr>

	<?php
	foreach($students as $studd){
		?>
		<tr>
			<?php
			$rfid = $studd['rfid_number'];
			$uid = $studd['user_id'];
			?>
			<td><i class="icon-danger fa fa-trash delete-student" data-user="<?php echo $uid; ?>"></i> <i class="icon-primary fa fa-edit edit-student" data-user="<?php echo $uid; ?>" data-toggle="modal" data-target="#editStudentModal"></i></td>
			<td><?php echo $studd['student_number'];?></td>
			<td><?php echo $studd['username'];?></td>
			<td><?php echo $rfid == 0 ? "<span class='text-danger'>No RFID Number</span>" : $rfid;?></td>
			<td><?php echo "{$studd['first_name']} {$studd['middle_name']}. {$studd['last_name']} {$studd['extension']}";?></td>
			<td><?php echo $studd['contact_number'];?></td>
			<?php
		}
		?>
	</tr>
</table>

<div class="modal fade" id="editStudentModal" role="dialog">
	<div class="modal-dialog modal-lg" style="margin-top: 140px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>Edit Student</center></h4>
			</div>

			<div class="modal-body">
				

				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".delete-student").on('click', function(){
				
			});

			$(".edit-student").on('click', function(){
				var userid = $(this).attr('data-user');
				$("#editStudentModal .modal-body").load('inc/showSingleStudent.php?uid=' + userid);
			});
		});
	</script>