$("#login").click(function () {

    $.ajax({
        method: "POST",
        url: "php/login.php",
        data: $("#formlogin").serialize(),
        success: function (msg) {
            if (msg["success"]) {
                $(location).attr("href", "/php_guvi/profile.html?");
            }
        },
        error: function (message) {
            console.log(message);
        }
    });
});


