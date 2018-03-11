<?php
include('../lib/XDLINE.php');
include('../lib/students.php');
$stud = "Student";
$student = new $stud("../config.ini");

$thestudent = $student->showStudentbyId($_REQUEST['uid']);
foreach($thestudent as $singlestud){
?>
<div class="row">
	<div class="col-md-6">
		<input type="hidden" name="userid" value="<?php echo $_REQUEST['uid']; ?>" id="uid">
		<div class="form-group">
			<label>Username:</label> 
			<input type="text" name="username" class="form-control" placeholder="Username" 
			value="<?php echo $singlestud['username'];?>" id="username" required>   
		</div> <!--ADD Username-->

		<div class="form-group">
			<label>Password:</label> 
			<input type="password" name="password" class="form-control"
			value="passwordmoto12342" id="password" required>   
		</div> <!--ADD Password-->

		<div class="form-group">
			<label>Confirm Password:</label> 
			<input type="password" name="pass_conf" size="32" class="form-control" placeholder="Confirm Password" 
			value="" required>   
		</div> <!--ADD Confirm Password-->

		<div class="form-group">
			<label for="stud_id">Student ID:</label> 
			<input type="number" name="stud_id" class="form-control" placeholder="20111111" id="stud_id" 
			value="<?php echo $singlestud['student_number'];?>" required>
		</div> <!--STUDENT ID-->

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
	</div> <!--COL-MD-6 END-->

	<div class="col-md-6">
		<div class="form-group">
			<label>Firstname:</label>           
			<input type="text" name="firstname" class="form-control" placeholder="Firstname" 
			value="<?php echo $singlestud['first_name'];?>" id="firstname" required>   
		</div> <!--ADD FIRSTNAME-->

		<div class="form-group">
			<label>Middlename:</label>           
			<input type="text" name="middlename" class="form-control" placeholder="Middlename" 
			value="<?php echo $singlestud['middle_name'];?>" id="middlename" required>
		</div> <!--ADD FIRSTNAME-->

		<div class="form-group">
			<label>Lastname:</label> 
			<input type="text" name="lastname" class="form-control" placeholder="Lastname" 
			value="<?php echo $singlestud['last_name'];?>" id="lastname" required> 
		</div> <!--ADD LASTNAME-->

		<div class="form-group">
			<label>Extension: *(optional)</label> 
			<select name="extension_name" class="form-control" id="ext">
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
			<input type="number" name="contact_no" class="form-control" placeholder="Contact Number" 
			value="<?php echo $singlestud['contact_number'];?>" id="contact" required>   
		</div> <!--ADD CONTACT-->

	</div> <!--COL-MD-6 END-->
	<div class="text-center col-sm-12">
		<button type="button" class="btn btn-submit close" id="btn-update-student" data-dismiss="modal">
			<i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp Update</button>
		</div>
	</div>
	<?php
}
?>
<script type="text/javascript">
	$("#btn-update-student").click(function(){
		var student_info = [
			$("#editStudentModal #stud_id").val(),
			$("#editStudentModal #firstname").val(),
			$("#editStudentModal #lastname").val(),
			$("#editStudentModal #middlename").val(),
			$("#editStudentModal #sections").val(),
			$("#editStudentModal #ext").val(),
			$("#editStudentModal #contact").val(),
			$("#editStudentModal #password").val(),
			$("#editStudentModal #username").val(),
			$("#editStudentModal #uid").val(),
			];
		$.ajax({
			type: "post",
			url: "inc/updateStudent.php",
			data: {
				studinfo: student_info
			},
			success: function(data){       
				$("#student_list").load("inc/student_list.php");
			}
		});
	});
</script>