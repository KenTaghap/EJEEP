<?php
require 'vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);

use MongoDB\Client;

// Replace with your MongoDB Atlas connection string
$connectionString = "mongodb+srv://Clyde:Bsit123@cluster0.832ttzt.mongodb.net/";

try {
    $client = new Client($connectionString);
    $collection = $client->EJEEP->users; // Replace with your database and collection names

    if (isset($_POST['username'])) {
        $Username = $_POST['username'];
        $filter = ['username' => $Username];
        $userInfo = $collection->findOne($filter);

        // Continue with the rest of your code
        $userfname = $userInfo['fname'];
        $userlname = $userInfo['lname'];
        $userbday = $userInfo['bday'];
        $usergender = $userInfo['gender'];
        $userpnumber = $userInfo['pnumber'];
        $userid = $userInfo['id'];
        $userpassword = $userInfo['password'];
    } else {
        // Handle the case where "Username" is not set in the POST request
        // You can display an error message or take appropriate action.
        $userfname = "";
        $userlname = "";
        $userbday = "";
        $usergender = "";
        $userpnumber = "";
        $userid = "";
		$userid = "";
        $userpassword = "";
    }

    if (isset($_POST['display'])) {
        // Handle the "Display" button click
        // You can keep your existing display logic here
    } elseif (isset($_POST['update'])) {

      $Username = $_POST['username'];
        // Handle the "Update" button click
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $bday = $_POST['bday'];
        $gender = $_POST['gender'];
        $pnumber = $_POST['pnumber'];
        $id = $_POST['id'];
        $password = $_POST['password'];

        // Create an update filter based on the username
        $filter = ['username' => $Username];

        // Create an update document with the new values
        $updateDocument = [
            '$set' => [
                'fname' => $fname,
                'lname' => $lname,
                'bday' => $bday,
                'gender' => $gender,
                'pnumber' => $pnumber,
                'id' => $id,
                'password' => $password
            ]
        ];

        // Perform the update in the MongoDB database
        $result = $collection->updateOne($filter, $updateDocument);

        if ($result->getModifiedCount() > 0) {
            // The update was successful
            echo "User information updated successfully!";
        } else {
            // The update did not modify any documents (username not found)
            echo "User not found or no changes were made.";
        }
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    $fname = "";
        $lname = "";
        $bday = "";
        $gender = "";
        $pnumber = "";
        $id = "";
		$username = "";
        $password = "";
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

  <title>Ejeep</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../home/css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="../home/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../home/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
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
                  <a class="" href="../home/about.html">About </a>
                  <a class="" href="../home/gallery.html">Notification </a>
                  <a class="" href="#">Accounts </a>
                  <a class="" href="../home/emer.html">Emergency </a>
                  <a class="" href="../index.html">Logout </a>
                </div>
              </div>
            </div>
            <a class="navbar-brand" href="index.html">
              <span>
                My Accounts
              </span>
            </a>
           
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <div class="layout_padding-bottom">

    <!-- blog section -->
 <center>
       <form action="blog.php" method="POST">
       <h4>(please click display button to show your other info.)<h4><br>
                                       
                                    <div>
                                       
                                            <h4 style="color:white;">Username<input type="text" name="username"
                                                id="username" class="input-text" readonly></h4>
                                                <script>
					// Retrieve the name from localStorage
					var name = localStorage.getItem("username");
			
					// Display the name on page2.html
					if (name) {
						document.getElementById("username").value = name;
					}
				</script>

                                            
                                    </div>
                                    <div>
                                        <input  type="string" value="<?= $userfname ?>" placeholder="Firstname" id="fname"
                                            name="fname" />
                                    </div>
                                    <div>
                                        <input type="string" value="<?= $userlname ?>" placeholder="Lastname" id="lname"
                                            name="lname" />
                                    </div>
                                    <div>
                                        <input type="string" value="<?= $userbday ?>" placeholder="Birthday" id="bday" name="bday" />
                                    </div>
                                    <div>
                                        <input type="string" value="<?= $usergender ?>" placeholder="gender" id="gender"
                                            name="gender"/>
                                    </div>
                                    <div>
                                        <input type="string" value="<?= $userpnumber ?>"
                                            placeholder="Contact Number" id="pnumber" name="pnumber"/>
                                    </div>
                                    <div>
                                        <input type="string" value="<?= $userid ?>" placeholder="id" id="id"
                                            name="id"/>
                                    </div>
                                    <div>
                                        <input type="string" value="<?= $userpassword ?>" placeholder="Password" id="password"
                                            name="password" />
                                    </div>
                                    <br><br>
                                    <div class="d-flex">
									<center>
                                        <button type="submit" id="display" name="display" class="btn btn-primary" onclick="showElements()">Display</button>
										&nbsp;&nbsp;

  </script>
                                        <button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
										</center>
                                    </div>
								
                                </form>
	 </center>

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
