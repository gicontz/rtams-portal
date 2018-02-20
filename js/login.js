// If the popped up login button is clicked 
$("#btn-login-login").click(function(){
    loginCheck();
});

$(".enterInputSignin").keypress(function(e) {
    if(e.which == 13) {
        loginCheck();
    }
});



$(".btn-modals, .closebtn").click(function(){
    $('.alert').addClass('hide');
});



function loginCheck(){

	$("#login-loading").show();
    $("#btn-login-login").hide();
    //$('.alert').addClass('hide');

    setTimeout(function(){

    	var data = new Object();
    	data["request_type"] = "request-login";
    	data["username"] = $("#btn-login-username").val();
    	data["password"] = $("#btn-login-password").val();

        $.post("lib/login.php", {data: data}, function(callback){
            if(callback == "GOTO PROFILE teacher"){
            	window.open("homepage-instructor", '_self');
            }else if (callback == "GOTO PROFILE student") {
                window.open("homepage-student", '_self');
            }else if (callback == "GOTO PROFILE admin") {
                window.open("homepage-admin", '_self');
            }else{
                $("#login-loading").hide();
                $('.alert').removeClass('hide');
                $("#btn-login-login").show();
            }
        });
    }, 1000);
}
