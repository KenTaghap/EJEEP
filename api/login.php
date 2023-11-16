<?php
require 'vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);

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
      

        echo "Successfully log in!";
        echo '<br>';
        echo '<a href="../home/index.html">Go Back</a>';
        
    } else {
        // Invalid login, display an error message
        echo "Invalid username or password";
        echo '<br>';
        echo '<a href="../index.html">Go Back</a>';
        
    }
}
?>
