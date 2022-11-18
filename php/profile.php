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

// $email = $_POST["email_id"];
$servername = "localhost";
$username = "root";
$dbpassword = "1234";

$email=$_POST['email'];

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, "guvi");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "select * from user_login where email_id = '$email'";
$result = $conn->query($sql);



$pass=array();

$data = $collections->findOne(["name" => "hari"]);
foreach ($data as $key => $value) {
    // echo "$key = $value";
    
}
$response = $data;
echo json_encode($response)

?>