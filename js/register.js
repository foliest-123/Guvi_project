

$("#register").click(function () {

    var email = $("#email").val();
    var pass = $("#password").val();
    var re_pass = $("#re-password").val();
    var phno = $("#phoneno").val();
    var age = $("#age").val();
    var msg = $("#msg");
    var email_regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
    var password_regex1 = /([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])+([!,%,&,@,#,$,^,*,?,_,~])/;
    var password_regex2 = /([0-9])/;
    var password_regex3 = /([!,%,&,@,#,$,^,*,?,_,~])/;
    var phno_regex = /([0-9])/;
    var age_regex = /([0-9])/;

 
    if (email_regex.test(email) == false) {
       $("#msgem").appendTo(".error");
        
        message();
        return false;
    }
    //pass.length<8 
    else if (password_regex1.test(pass) == false || password_regex2.test(pass) == false || password_regex3.test(pass) == false) {
       var a= $("#msgem").appendTo(".error1");
        $("#msgem").remove();
        message();
        return false;
    }
    else if (re_pass != pass) {
        $("#msgem").appendTo(".error2");
        message();
        return false;
    }
    else {

        data_post();
    }

});

function message($display) {
    $("#msgem").fadeIn();
    $("#msgem").fadeOut();
    $("#msgem").fadeIn(5000);
    $("#msgem").fadeOut(10000);

}

function data_post() {

    $.ajax({
        method: "POST",
        url: "php/register.php",
        data: $("#form").serialize(),
        success: function (msg) {
            console.log(msg);
            
        },
        error: function (message) {
            console.log(message);
        }
    });
    $(location).attr("href","../login.html");



}



