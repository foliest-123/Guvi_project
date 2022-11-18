<?php

// require '../vendor/autoload.php';
require '../assets/vendor/autoload.php';

use MongoDB\Driver\ServerApi;
use MongoDB\Operation\FindOne;


$serverApi = new ServerApi(ServerApi::V1);
$client = new MongoDB\Client(
    'mongodb+srv://vijay:1234@cluster0.zitfve9.mongodb.net/?retryWrites=true&w=majority',
    [],
    ['serverApi' => $serverApi]
);



$db = $client->register_details;

$collections = $db->user_details;

$email = $_POST["email"];
$servername = "localhost";
$username = "root";
$dbpassword = "1234";

// // Create connection
// $conn = new mysqli($servername, $username, $dbpassword, "guvi");
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// $sql = "select * from user_login where email_id = '$email'";
// $result = $conn->query($sql);



//i am not perform get that specific value so that i give manual data where it stored on mongodb
$res =  $collections->find(["email" => $email],['limit'=>1]);
foreach ($res as $document) {
    $data = array(
        "name" => $document["name"],
        "age" => $document["age"],
        "gender" => $document["gender"],
        "address" => $document["address"],
        "currenteducation" => $document["currenteducation"],
        "phno" => $document["phoneno"]
    ); 
}
$response = $data;
header('Content-type: application/json');
echo json_encode($response);

?>