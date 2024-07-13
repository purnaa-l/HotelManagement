<?php
/*
include 'dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM guest_details WHERE gid=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid ID";
}
$conn->close();
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Guest Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lora:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./stylesheet.css">
  <style>
    body {
      font-family: 'Poiret One', cursive;
      background-color: #F0EBE3;
      color: #333;
      margin: 0;
      padding: 20px;
    }

    .container1 {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center; /* Center align content */
    }

    .btn {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 10px;
      cursor: pointer;
      border-radius: 4px;
    }

    .btn:hover {
      background-color: #c82333;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
	
	     .footer {
            background-color: #987070;
            color: #d4af37;
            padding: 0.2rem 0;
            text-align: center;
        }

        .footer a {
            color: #d4af37;
            margin: 0 10px;
        }

        .footer a:hover {
            color: white;
        }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="./Resoruces/LOGO_PDF_jpg.jpg" height="29" alt="AuraSuites"> Aura Suites</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link home-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link user-login-link" href="./UserLogin.php">User Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link admin-login-link" href="./AdminLogin.php">Admin Login</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./rooms.html">Rooms</a></li>
            <li><a class="dropdown-item" href="./amenities.html">Amenities</a></li>
            <li><a class="dropdown-item" href="./testimonials.html">Testimonials</a></li>
          </ul>
        </li>
      </ul>
      <!--<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search for Aura Suites" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

  
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  

<div class="container1">
  <h2>Delete Guest Details</h2>

  <?php
  include 'dbconnect.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM guest_details WHERE gid=$id";

    if ($conn->query($sql) === TRUE) {
      echo "<p>Record deleted successfully</p>";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
  } else {
    echo "Invalid ID";
  }

  $conn->close();
  ?>
  
  <a href="show_entries.php" class="btn">Back to Entries</a>
</div>
  
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
    <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
    <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
    <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  
  

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4 text-center">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-instagram"></a>
      </div>
      <div class="col-md-4"></div>
    </div>
    <p>&copy; 2024 Aura Suites. All rights reserved.</p>
    <p><a href="mailto:auraa.suites@gmail.com">auraa.suites@gmail.com</a></p>
  </div>
</footer>

</body>
</html>
