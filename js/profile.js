


$(document).ready(function(){
$.ajax({
    url: 'php/profile.php',
    type: "post",
    data: {"email": localStorage.getItem("key")},
    success: function (response) {
      $('input[name="name"]').val(response["name"]);
      $('input[name="age"]').val(response["age"]);
      $('input[name="currenteducation"]').val(response["currenteducation"]);
      $('input[name="gender"]').val(response["gender"]);
      $('input[name="phoneno"]').val(response["phno"]);
      $('input[name="address"]').val(response["address"]);
     
    },
      // Error handling 
    error: function (error) {
        console.log(JSON.stringify(error));
    }

});
});