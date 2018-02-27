function Import(str) {
    $.ajax({
    type: "post",
    url: "inc/student_import.php",
    data: {
        student_info: str
    },
    success: function(data){              
            $("#alert_modal span").text(data);
            $("#alert_modal").removeClass("hidden");
     }
});
}