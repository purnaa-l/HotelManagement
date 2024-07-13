<?php
session_start();
//echo "val=".$_SESSION['SetAdmin'];
?>


<!DOCTYPE html>
<?php
	
	
	//error_reporting(0);
	include("dbconnect.php");
	
	require_once("login_check.php");
	
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Lobster&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poiret One', cursive;
            background-color: #F0EBE3;
            color: #8B4513;
        }

        .navbar {
            background-color: #987070;
        }
        .navbar-nav {
            font-weight: bold;
        }
        .navbar-brand {
            font-family: 'Lobster', cursive;
            font-size: 2.5rem;
            color: #d4af37;
        }

        .navbar-nav .nav-link {
            color: #ffdd00;
            font-size: 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: white;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            text-align: center;
            padding: 2rem;
            border-radius: 12px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
            transition: transform 0.3s ease; /* Smooth hover effect */
            margin-bottom: 20px; /* Gap between each card box */
        }

        .card-body:hover {
            transform: scale(1.05); /* Enlarge slightly on hover */
        }

        .card-title {
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #704139;
        }

        .card-text {
            font-size: 1rem;
            line-height: 1.5;
            color: #333;
        }

        .btn-custom {
            background-color: #d4af37;
            color: #8B4513;
            border: none;
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-family: 'Poiret One', cursive;
        }

        .btn-custom:hover {
            background-color: #8B4513;
            color: #d4af37;
        }

        .footer {
            background-color: #987070;
            color: #d4af37;
            padding: 1rem 0;
            text-align: center;
            font-size: 1rem;
            font-family: 'Poiret One', cursive;
        }

        .footer a {
            color: #d4af37;
            margin: 0 10px;
        }

        .footer a:hover {
            color: white;
        }

        .dashboard-container {
            margin-top: 2rem;
        }

        /* Global Styles */
        body {
            font-family: 'Poiret One', cursive;
            background-color: #F0EBE3;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background-color: #987070; /* Dark brown */
        }

        .navbar-brand {
            font-size: 2rem;
            color: #d4af37; /* Gold */
        }

        .navbar-nav .nav-link {
            color: #ffdd00; /* Yellow */
            font-size: 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: white;
        }

        /* Features Section */
        .features-section {
            padding: 4rem 0;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            background-color: #D6CDBF;
            align: center;
        }

        .card:hover {
            transform: scale(1.20);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            text-align: center;
            padding: 2rem;
            align: center;
        }

        .card-title {
            font-weight: bolder;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #704139; /* Dark brown */
            font-style: normal;
        }

        .card-text {
            font-size: 1rem;
            color: #555; /* Dark gray */
            font-style: normal;
            font-weight: bold;
        }

        .btn-outline-primary,
        .btn-outline-success,
        .btn-outline-danger {
            border-color: #d4af37; /* Gold */
            color: #d4af37; /* Gold */
            font-style: normal;
        }

        .btn-outline-primary:hover,
        .btn-outline-success:hover,
        .btn-outline-danger:hover {
            background-color: #d4af37; /* Gold */
            color: #333; /* Dark brown */
        }

        /* Footer */
        .footer-section {
            background-color: #987070; /* Dark brown */
            color: #d4af37; /* Gold */
            padding: 3rem 0;
            text-align: center;
        }

        .social-icons {
            margin-bottom: 1rem;
        }

        .social-icons a {
            font-size: 1.5rem;
            margin: 0 10px;
            color: #d4af37; /* Gold */
        }

        .social-icons a:hover {
            color: white;
        }

        .contact-email {
            margin-top: 1rem;
            font-size: 1rem;
            font-weight: bold;
        }

        .contact-email a {
            color: #d4af37; /* Gold */
        }

        .contact-email a:hover {
            color: white;
        }

        /* General Styling */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poiret One', sans-serif;
            font-weight: bold;
            font-style: italic;
        }

        p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .btn {
            font-family: 'Poiret One', sans-serif;
            font-weight: bold;
            font-style: normal;
        }

        /* Additional Adjustments */
        .features-section {
            background-color: #F9F8F6; /* Light gray */
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            background-color: #D6CDBF;
            text-align: center;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-weight: bolder;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #704139; /* Dark brown */
        }

        .card-text {
            font-size: 1rem;
            color: #555; /* Dark gray */
            font-weight: bold;
        }

        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px; /* Space between the cards */
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./Resoruces/LOGO_PDF_jpg.jpg" height="29" alt="AuraSuites"> Aura Suites</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link home-link" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link user-login-link" href="./UserLogin.php">User Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link admin-login-link" href="./AdminLogin.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link admin-login-link" href="./index.php">Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./rooms.html">Rooms</a></li>
                            <li><a class="dropdown-item" href="./amenities.html">Amenities</a></li>
                            <li><a class="dropdown-item" href="./testimonials1.html">Testimonials</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Vertical space -->
    <div class="vertical-space"></div>
    <!-- Vertical space -->
    <div class="vertical-space"></div>

    <!-- Vertical space -->
    <div class="vertical-space"></div>
    <!-- Vertical space -->
    <div class="vertical-space"></div>

    <div class="container dashboard-container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Bookings</h5>
                        <p class="card-text">Confirm or Cancel Room Requests.</p>
                        <a href="./show_entries.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Booking</h5>
                        <p class="card-text">Make a new booking.</p>
                        <a href="./guest_details_form.php" class="btn btn-custom">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>