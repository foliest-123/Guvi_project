<?php

// require '../vendor/autoload.php';
require '../assets/vendor/autoload.php';

use MongoDB\Driver\ServerApi;
$servername = "localhost";
$username = "root";
$password = "1234";

// Create connection
$conn = new mysqli($servername, $username, $password, "guvi");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// my sql opereations
$stmt = $conn->prepare("INSERT INTO user_login (email_id, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email_id, $password_data);


$email_id = $_POST["email_id"];
$password_data = $_POST["password_data"];
echo $password_data;
// $email_id ="vija1234";
// $password_data="123456";

$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();






// mongodb operations

$serverApi = new ServerApi(ServerApi::V1);
$client = new MongoDB\Client(
  'mongodb+srv://vijay:1234@cluster0.zitfve9.mongodb.net/?retryWrites=true&w=majority',
  [],
  ['serverApi' => $serverApi]
);
$db = $client->register_details;

$collections = $db->user_details;

 echo "New records created successfully";

$email=$_POST['email_id'];
 $name = $_POST['firstname'];
 $phoneno = $_POST['phoneno'];
 $gender = $_POST['gender'];
 $age = $_POST['age'];
 $address = $_POST['address'];
 $currenteducation = $_POST['currenteducation'];
 
//  echo $name;
  if($collections->count(['firstname' => $name])){
    //update existing document
    $collections->updateOne(
        ["email" => $email],
        ['$set' =>
            [
               "email" =>$email,
               "name" => $name,
               "phoneno" => $phoneno,
               "gender" => $gender,
               "age" => $age,
               "address" => $address,
               "currenteducation" => $currenteducation,
            ]
        ]
    );
}else{
    //inser new document
    $collections->insertOne([
      "email" =>$email,
      "name" => $name,
      "phoneno" => $phoneno,
      "gender" => $gender,
      "age" => $age,
      "address" => $address,
      "currenteducation" => $currenteducation,
    
      ]);

    }


?>