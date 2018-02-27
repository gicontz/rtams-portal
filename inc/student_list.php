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
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="stud_id">Student ID:</label> 
							<input type="number" name="stud_id" class="form-control" placeholder="20111111" id="stud_id" value="" required> 
						</div> <!--STUDENT ID-->

						<div class="form-group">
							<label>Firstname:</label>           
							<input type="text" name="firstname" class="form-control" placeholder="Firstname" value="" required>   
						</div> <!--ADD FIRSTNAME-->

						<div class="form-group">
							<label>Middlename:</label>           
							<input type="text" name="middlename" class="form-control" placeholder="Middlename" value="" required>
						</div> <!--ADD FIRSTNAME-->

						<div class="form-group">
							<label>Lastname:</label> 
							<input type="text" name="lastname" class="form-control" placeholder="Lastname" value="" required> 
						</div> <!--ADD LASTNAME-->
					</div> <!--COL-MD-6 END-->

					<div class="col-md-6">
						<div class="form-group">
							<label>Section:</label>
							<select id="sections" name="section" class="form-control">
								<option value="" default>Choose section</option>
								<?php
								$sections  = $student->showAllSection("../config.ini");
								foreach($sections as $section){ 
									$program = $section['course_main_title'];
									$year = $section['year'];
									?>
									<?php
									$year = $program == "Kindergarten" || $program == "Preparatory" ? "" : $year;
									?>
									<option value="<?php echo $section['section_id']; ?>"><?php echo $program; ?> <?php echo $year; ?> <?php echo $section['section']; ?></option>            
									<?php
								}
								?>        
							</select>
						</div> <!--ADD LASTNAME-->

						<div class="form-group">
							<label>Extension: *(optional)</label> 
							<select name="extension_name" class="form-control">
								<option value="" default>Choose extension name</option>
								<option value="Jr.">Jr.</option>
								<option value="Sr.">Sr.</option>
								<option value="I">I</option>
								<option value="II">II</option>
								<option value="III">III</option>
								<option value="IV">IV</option>
								<option value="V">V</option>
							</select>   
						</div> <!--ADD EXTENSION-->

						<div class="form-group">
							<label>Contact Number:</label> 
							<input type="number" name="contact_no" class="form-control" placeholder="Contact Number" value="" required>   
						</div> <!--ADD LASTNAME-->

					</div> <!--COL-MD-6 END-->
					<div class="text-center col-sm-12">
						<button type="submit" class="btn btn-submit" id="btn-update-student">
							<i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp Update</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".delete-student").on('click', function(){
				
			});
		});
	</script>