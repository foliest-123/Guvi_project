<?php
 // require "../vendor/autoload.php";
 require '../assets/vendor/autoload.php';


 // use MongoDB\Driver\ServerApi;
 

 $email_id = $_POST["email_login"];
 $password = $_POST["password_login"];
 $servername = "localhost";
 $username = "root";
 $dbpassword = "1234";

 // Create connection
 $conn = new mysqli($servername, $username, $dbpassword, "guvi");
 // Check connection
 if ($conn->connect_error) {
    header('HTTP/1.1 500');
     die("Connection failed: " . $conn->connect_error);
 }

 $sql = "SELECT * from user_login";
 $result = $conn->query($sql);
 $success = false;
 if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
         if ($row['email_id'] == $email_id) {
             if ($row['password'] == $password) {
                 $success = true;         
             }
         }
     }
 }
 header('Content-Type: application/json');
 header('HTTP/1.1 200 OK');
 $response = array(
     "success" => $success,
     "mail" => $email_id
    
    );
 echo json_encode($response);
 ?>