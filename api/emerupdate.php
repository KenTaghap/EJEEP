<?php
// Include the MongoDB PHP driver
require 'vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);

use MongoDB\Client;

$connectionString = "mongodb+srv://Clyde:Bsit123@cluster0.832ttzt.mongodb.net/";
try {
    // Create a MongoDB client instance
    $client = new Client($connectionString);

    // Select the database and collection
    $database = $client->EJEEP; // Replace with your database name
    $collection = $database->users; // Replace with your collection name

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get user input from the form
        $username = $_POST['Username'];
        $title = $_POST['title'];
        $emer = $_POST['emer'];
    


        // Define the filter to identify the document to update based on the username
        $filter = ['username' => $username];

        // Define the update operation based on the user input
        $update = [
            '$set' => [
                'emergency' => $title,
                'context' => $emer,

            ],
        ];

        // Update data in the collection
        $result = $collection->updateOne($filter, $update);

        if ($result->getModifiedCount() > 0) {


            echo "Document updated successfully.";
        echo '<br>';
        echo '<a href="../home/gallery.html">Go Back</a>';
        
            
            
        } else {

            echo "Document not updated.";
        echo '<br>';
          echo '<a href="../home/gallery.html">Go Back</a>';
        }
    } else {
        echo "Please submit the form to update user information.";
        echo '<br>';
          echo '<a href="../home/gallery.html">Go Back</a>';
        
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>
