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
        $notif = $_POST['notif'];
 
    


        // Define the filter to identify the document to update based on the username
        $filter = ['username' => $username];

        // Define the update operation based on the user input
        $update = [
            '$set' => [
                'notif' => $notif,


            ],
        ];

        // Update data in the collection
        $result = $collection->updateOne($filter, $update);

        if ($result->getModifiedCount() > 0) {
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <title>Blue Background Page</title>
              <style>
                body {
                  background-color: #4A5A9B; /* Set the background color to blue */
                  color: white; /* Set text color to white for better visibility */
                  font-family: Arial, sans-serif; /* Set font for better readability */
                  margin: 0; /* Remove default margin */
                  padding: 20px; /* Add some padding for content */
                }
              </style>
            </head>
            <body>
            <center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1> Document updated successfully.. </h1>
            <button><a href="../home/gallery.html">Go Back</a><
            </center>
            </body>
            </html>
            ';




        
            
            
        } else {
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <title>Blue Background Page</title>
              <style>
                body {
                  background-color: #4A5A9B; /* Set the background color to blue */
                  color: white; /* Set text color to white for better visibility */
                  font-family: Arial, sans-serif; /* Set font for better readability */
                  margin: 0; /* Remove default margin */
                  padding: 20px; /* Add some padding for content */
                }
              </style>
            </head>
            <body>
            <center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1> Document not updated. </h1>
            <button><a href="../home/gallery.html">Go Back</a><
            </center>
            </body>
            </html>
            ';





        }
    } else {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <title>Blue Background Page</title>
          <style>
            body {
              background-color: #4A5A9B; /* Set the background color to blue */
              color: white; /* Set text color to white for better visibility */
              font-family: Arial, sans-serif; /* Set font for better readability */
              margin: 0; /* Remove default margin */
              padding: 20px; /* Add some padding for content */
            }
          </style>
        </head>
        <body>
        <center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1> Please submit the form to update user information. </h1>
        <button><a href="../home/gallery.html">Go Back</a><
        </center>
        </body>
        </html>
        ';


        
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>
