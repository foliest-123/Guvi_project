


function call(){
$.ajax({
    url: 'php/profile.php',
    type: "GET",
    success: function (data) {
        console.log(JSON.parse(data));
        var d=(JSON.parse(data));
        console.log(d.name);   
        for (const [key, value] of Object.entries(d)) {
            $(`input[name=${key}]`).val(value);
            console.log(`${value}`)
          }
     
    },
      // Error handling 
    error: function (error) {
        console.log(`Error ${error}`);
    }
});
}
call()

$.ajax({
  method: "POST",
  url: "php/profile.php",
  data: $("#form").serialize(),
  success: function (msg) {
      console.log(msg);
  },
  error: function (message) {
      console.log(message);
  }
});
