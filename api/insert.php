<?php
// Include MongoDB PHP library
require 'vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);


// Set up MongoDB connection
$client = new MongoDB\Client('mongodb+srv://Clyde:Bsit123@cluster0.832ttzt.mongodb.net/');
$database = $client->selectDatabase('EJEEP');
$collection = $database->selectCollection('users');

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST["fname"];
	$lname = $_POST["lname"];
    $bday = $_POST["bday"];
	$gender = $_POST["gender"];
	$pnumber = $_POST["pnumber"];
    $id = $_POST["id"];
	$username = $_POST["username"];
	$password = $_POST["password"];

    // Check if username already exists
    $existingUser = $collection->findOne(['username' => $username]);
    if ($existingUser) {
        echo "Username already exists.";
    } else {
        // Insert new user into MongoDB
        $newUser = [
            'fname' => $fname,
			'lname' => $lname,
            'bday' => $bday,
			'gender' => $gender,
			'pnumber' => $pnumber,
            'id' => $id,
			'username' => $username,
            'password' => $password,

        ];
        $collection->insertOne($newUser);
        echo "Registration successful!";
    }
}



?>
<div id="center_button"><button onclick="location.href='../index.html'">Back to Home</button></div>
