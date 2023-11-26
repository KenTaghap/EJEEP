<?php
require 'vendor/autoload.php'; // Load Composer's autoloader

// MongoDB connection configuration
$mongoURI = "mongodb+srv://Clyde:Bsit123@cluster0.832ttzt.mongodb.net/";
$dbName = "EJEEP";
$collectionName = "publish";

// Create a MongoDB client
$mongoClient = new MongoDB\Client($mongoURI);

// Select database and collection
$database = $mongoClient->$dbName;
$collection = $database->$collectionName;

// Find all documents in the collection
$cursor = $collection->find([]);

// Fetch data and store in an array for HTML rendering
$productData = [];
foreach ($cursor as $document) {
    $productData[] = [
        'date' => $document->date,
        'name' => $document->name,
        'title' => $document->title,
		'content' => $document->content,
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Farmers Monitor</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<style>
        body {
  background-color: #0077b6; 
}
        /* Basic CSS styling for the product list */
        ul.product-list {
            list-style-type: none;
            padding: 0;
        }

        li.product-item {
            border: 2px solid white;
            margin-bottom: 10px ;
            padding: 10px ;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }



        
    </style>
</head>
<body>
<center>
	<h1 style="color: white;">Product List</h1>
    <ul class="product-list">
        <?php foreach ($productData as $product) : ?>
            <li class="product-item">
            <div class="product-details">
                <span class="product-name" style="color: wheat;">Date</span>
				&nbsp; &nbsp;&nbsp; &nbsp;
           <span class="product-name" style="color: white;"><?php echo $product['date']; ?></span>
            </div>
        </li>
		<li class="product-item">
            <div class="product-details">
                <span class="product-name" style="color: wheat;">Name</span>
				&nbsp; &nbsp;&nbsp; &nbsp;
          <span class="product-quantity" style="color: white;"><?php echo $product['name']; ?></span>
            </div>
        </li>
		<li class="product-item">
            <div class="product-details">
                <span class="product-name" style="color: wheat;">Title</span>
				&nbsp; &nbsp;&nbsp; &nbsp;
          <span class="product-price" style="color: white;"><?php echo $product['title']; ?></span>
            </div>
        </li>	
			<li class="product-item">
            <div class="product-details">
                <span class="product-name" style="color: wheat;">Title</span>
				&nbsp; &nbsp;&nbsp; &nbsp;
          <span class="product-price" style="color: white;"><?php echo $product['content']; ?></span>
            </div>
        </li>
			  <br><br>
        <?php endforeach; ?>
    </ul>
	
    </center>
    <button><a href="../home/index.html" class="register">Back</a></button>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>