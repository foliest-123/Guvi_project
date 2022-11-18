$("#login").click(function () {

    $.ajax({
        method: "POST",
        url: "php/login.php",
        data: $("#formlogin").serialize(),
        success: function (msg) {
            if (msg["success"]) {
                $(location).attr("href", "/php_guvi/profile.html");
                localStorage.setItem("key",msg["mail"]);
            }
        },
        error: function (message) {
            console.log(message);
        }
    });
});


