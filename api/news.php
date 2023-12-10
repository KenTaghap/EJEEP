<?php
require 'vendor/autoload.php'; // Load Composer's autoloader

error_reporting(E_ERROR | E_PARSE);

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
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>E-jeep</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../home/css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="../home/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../home/css/responsive.css" rel="stylesheet" />
  <style>
        body {
            font-family: Arial, sans-serif;
    background-color: #07447d;
    color: white;
    margin: 0;
    padding: 20px;
        }

        h1 {
            text-align: center;
        }

        ul.product-list {
            list-style-type: none;
            padding: 0;
        }

        li.product-item {
            background-color: #023e8a;
    border-radius: 10px;
    margin-bottom: 20px;
    padding: 20px;
    text-align: left;
    transition: background-color 0.3s ease; /* Smooth transition */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adding a box shadow */
        }

        li.product-item:hover {
    background-color: #03045e; /* Color change on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Adjusted shadow on hover */
    transform: translateY(-5px); /* Slight lift on hover */
}
        .product-details {
            margin-bottom: 10px;
            text-align: left; /* Align the details text to the left */
        }

        .product-info {
            color: wheat;
            display: inline-block; /* Display the info as inline block */
            text-align: left; /* Align the text to the left */
        }

        .product-info span {
            font-weight: bold;
            margin-right: 10px;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #03045e;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container d-block">
          <div class="main_nav_menu">
            <div class="fk_width">
              <div class="custom_menu-btn">
                <button onclick="openNav()">
                  <span class="s-1"> </span>
                  <span class="s-2"> </span>
                  <span class="s-3"> </span>
                </button>
              </div>
              <div id="myNav" class="overlay">
                <div class="overlay-content">
                  <a class="" href="../home/index.html">Home <span class="sr-only">(current)</span></a>
                  <a class="" href="../api/news.php">News & Update </a>
                  <a class="" href="../home/about.html">About </a>
                  <a class="" href="../home/gallery.html">Notification </a>
                  <a class="" href="../api/blog.php">Accounts </a>
                  <a class="" href="../home/emer.html">Emergency </a>
                  <a class="" href="../index.html">Logout </a>
                </div>
              </div>
            </div>
 <br>
 <br>
             
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->


	
    <!-- end slider section -->
  </div>
  <center>
  <h1>
                E-jeep Terminal Managemnt System 
    </h1>
    <center>
        <br>
  <!-- about section -->
  
<!-- Product List -->
<h4>News and Update</h4>
<ul class="product-list">
    <?php foreach ($productData as $product) : ?>
        <li class="product-item">
            <div class="product-details">
                <span>Date:</span>
                <span class="product-info"><?php echo $product['date']; ?></span>
            </div>
            <div class="product-details">
                <span>Name:</span>
                <span class="product-info"><?php echo $product['name']; ?></span>
            </div>
            <div class="product-details">
                <span>Title:</span>
                <span class="product-info"><?php echo $product['title']; ?></span>
            </div>
            <div class="product-details">
                <span>Content:</span>
                <span class="product-info"><?php echo $product['content']; ?></span>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
 

  <!-- end about section -->

  <!-- gallery section -->
  
        
  <!-- end gallery section -->

  <!-- blog section -->


  <!-- end blog section -->

  <!-- client section -->

  
  <!-- end client section -->

  <!-- info section -->

 

  <!-- end info section -->

  <!-- footer section -->
  <footer class="footer_section ">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved. Design by
        <a href="#">Group 4</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <script src="../home/js/jquery-3.4.1.min.js"></script>
  <script src="../home/js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="../home/js/custom.js"></script>
</body>

</html>








































