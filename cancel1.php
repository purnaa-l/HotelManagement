<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure you have included Composer's autoloader

error_reporting(0);
include 'dbconnect.php';

// Handle cancellation request
if ($_POST['coming_from'] == 'cancel.php' && $_POST['yesno'] == 'Yes') {
    $sql1 = "SELECT * FROM room_status WHERE gid ='$_POST[gid]'";
    $result1 = $conn->query($sql1);
    $row1 = mysqli_fetch_array($result1);
    $troom_id = $row1["room_id"];

    $tstatus = 'Cancelled';
    $sql = "update room_status set  status_of_request='$tstatus' where gid='$_POST[gid]'  ";
    $result = $conn->query($sql);

    $tstatus1 = 'free';
    $sql = "update room_master set current_status='$tstatus1' where room_id='$troom_id' ";
    $result = $conn->query($sql);
}

// Fetch guest details based on session
if ($_SESSION['SetAdmin'] == 'admin') {
    $sql = "SELECT * FROM guest_details";
} else {
    $sql = "SELECT * FROM guest_details WHERE lid='$_SESSION[lid]'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Aura Suites - Show Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lora:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./stylesheet.css">
    <style>
        body {
            font-family: 'Poiret One', cursive;
            background-color: #F0EBE3;
            color: #987070;
            margin: 0;
        }

        .navbar {
            background-color: #987070;
        }

        .navbar-brand img {
            height: 90px;
            padding: auto;
        }

        .navbar-brand {
            font-family: 'Lobster', cursive;
            font-size: 2.5rem;
            color: #d4af37;
        }

        .navbar-nav .nav-link {
            font-family: 'Poiret One', cursive;
            color: #ffdd00;
            font-size: 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: white;
        }

        .navbar-toggler {
            border-color: #ffdd00;
        }

        .dropdown-menu {
            background-color: #987070;
            font-family: 'Poiret One', cursive;
        }

        .dropdown-menu .dropdown-item {
            color: #ffdd00;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #A0522D;
        }

        .form-control {
            border-color: #ffdd00;
            font-family: 'Lora', serif;
            font-size: 1rem;
        }

        .btn-outline-success {
            color: #ffdd00;
            border-color: #ffdd00;
        }

        .btn-outline-success:hover {
            background-color: #ffdd00;
            border-color: #ffdd00;
            color: #8B4513;
        }

        .form-container {
            background-color: #d6cfc9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            margin: 20px auto;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: black;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: black;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .form-group input[type="date"] {
            padding: 8px;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #7B3F00;
            color: #FAEBD7;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #7B3F00;
        }

        .message {
            width: 80%;
            margin: 20px auto;
            padding: 10px;
            border-radius: 5px;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #FFF;
            font-family: 'Poiret One', cursive;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #DDD;
        }

        th {
            background-color: #987070;
            color: #ffdd00;
            font-family: 'Poiret One', cursive;
            font-size: 1rem;
        }

        td a {
            color: #987070;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
        }
		
	/* Style for the button */
.abc {
    background-color: #dc3545; /* Red background color */
    border-color: #dc3545; /* Red border color */
    color: white; /* White text color */
    padding: 10px 20px; /* Padding for button */
    border-radius: 5px; /* Rounded corners */
    display: inline-block; /* Display as inline-block to adjust padding */
    text-decoration: none; /* Remove underline */
}

/* Style for the link inside the button */
.abc a {
    color: white; /* White text color for the link */
    text-decoration: none; /* Remove underline */
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
          <!--<li class="nav-item">
            <a class="nav-link admin-login-link" href="./AdminLogin.php">Admin Login</a>
          </li>-->
		  <li class="nav-item">
            <a class="nav-link admin-login-link" href="./UserDashboard.php">Dashboard</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link admin-login-link" href="./index.php">Logout</a>
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

    <div class="container">
        <h2 class="mt-4 mb-4">Guest Bookings</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>Guest ID</th>
                    <th scope='col'>Guest Name</th>
                    <th scope='col'>Mobile Number</th>
                    <th scope='col'>Address</th>
                    <th scope='col'>Room Type</th>
                    <th scope='col'>Arrival Date</th>
                    <th scope='col'>Departure Date</th>
                    
                    <th scope='col'>Cancel Booking</th>
                </tr>
            </thead>
            <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["gid"] . "</td>
                    <td>" . $row["guest_name"] . "</td>
                    <td>" . $row["mobile_number"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>" . $row["room_type"] . "</td>
                    <td>" . $row["arrival_date"] . "</td>
                    <td>" . $row["departure_date"] . "</td>
                    
                    <td>
                   <button type='submit' class='abc'><a href='delete.php?id=" . $row["gid"] . "'>Cancel Booking</a></button>

                    </td>
                </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No bookings found.</p>";
        }
        ?>
    </div>
	  
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-izg5AC5ExzF6FqCyIwngiC5G3wKZD/LDdGhef0ZJ7qz9cG7F5y8S/cPaNXy+BmGp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-JGa4pdFTrk67jhX4b4P+L2v1uyS9Ks/l/OJcdVOicNd86KQ9kOW5m16O/OSMZA4R" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
</body>

</html>
