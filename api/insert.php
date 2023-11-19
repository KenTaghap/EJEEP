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
        echo "<center>";
        echo "Username already exists.";
        echo "</center>";
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
            'Rfid' => "none",

        ];
        $collection->insertOne($newUser);
        echo "<center>";
        echo "<h1> Registration successful! </h1>";
        echo "</center>";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ejeep</title>
  <style>
    body {
      background-color: lightblue; /* Set the background color to blue */
      color: white; /* Set text color to white for better visibility */
      font-family: Arial, sans-serif; /* Set font for better readability */
      margin: 0; /* Remove default margin */
      padding: 20px; /* Add some padding for content */
    }
  </style>
</head>
<body>
<center>
<div id="center_button"><button onclick="location.href='../index.html'">Procced to Login</button></div>
<center>
</body>
</html>





