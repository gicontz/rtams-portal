function filterStudentAttendance (userid, date) {
  var date = $(".datepicker").val();
  date = date.replace(/ /g, "%20");
  var userid = $("[name = 'userid']").val(); 
      $('#student-attendance').load("inc/attendance-bydate.php?date="+date+"&userid="+userid);
}

$(document).ready(function(){
	$('.datepicker').datepicker({ dateFormat: 'MM dd, yy' });
    $('#filter-attendance').click(function(){
    	filterStudentAttendance();
    });
});
