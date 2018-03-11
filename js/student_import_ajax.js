function Import(str) {
    $.ajax({
    type: "post",
    url: "inc/student_import.php",
    data: {
        student_info: str
    },
    success: function(data){             
        alert(data);
        $("#student_list").load("inc/student_list.php");
        $("#alert_modal span").text(data);
        $("#alert_modal").removeClass("hidden");
     }
});
}