<?php
require 'vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);
ob_start();

// Connect to MongoDB Atlas
$mongoClient = new MongoDB\Client("mongodb+srv://Clyde:Bsit123@cluster0.832ttzt.mongodb.net/");

// Select the database and collection
$database = $mongoClient->EJEEP;
$collection = $database->users;

$errorMsg = ""; // Initialize an error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query for the user
    $query = ["username" => $username, "password" => $password];
    $user = $collection->findOne($query);

    if ($user) {
        // Successful login, set session variables or redirect to a protected area
        header("Location: ../home/index.html");
        
    } else {
        // Invalid login, display an error message
        echo '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blue Background Page</title>
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
<h1> Invalid username or password </h1>
<a href="../index.html">Go Back</a>
</center>
</body>
</html>
';
        
    }
}
ob_end_flush();
?>
