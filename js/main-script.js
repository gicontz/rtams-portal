function filterStudentAttendance (userid, date) {
	$.post("lib/attendance.php", {
    date: date,
	   userid: userid},
    function(callback){  
      $('#student-attendance').load(callback);
      alert(callback);
      }
    );
}

$(document).ready(function(){
	$('.datepicker').datepicker({ dateFormat: 'MM dd, yy' });
    $('#filter-attendance').click(function(){
    	filterStudentAttendance();
    });
});
