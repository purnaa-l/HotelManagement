<!DOCTYPE html>
<?php
	session_start();
	//error_reporting(0);
	include("dbconnect.php");
	require_once("login_check.php");
	require_once('dbconnect.php');
	if (isset($_POST['submit'])) 
	{
		/*echo "Hi";
		echo "val=".$_POST['guest_name'];
		echo "val=".$_POST['mobile_number'];
		echo "val=".$_POST['address'];
		echo "val=".$_POST['room_type'];
		echo "val=".$_POST['arrival_date'];
		echo "val=".$_POST['departure_date'];*/
		$sql="SELECT * FROM guest_details WHERE arrival_date='$_POST[arrival_date]' AND departure_date='$_POST[departure_date]' AND guest_name='$_POST[guest_name]'";
		$result = $conn->query($sql);
		$number_of_records=mysqli_num_rows($result);
		
	}
?>
<html lang="en">
<head>
      <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Aura Suites</title>
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

        @media screen and (max-width: 300px) {
            .form-container {
                width: 90%;
            }
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
	<?php
  /*if (isset($_POST['submit'])) 
  {
  if ($number_of_records>0)
		{
			echo "Already Booked for the given dates!";
		}
		else
		{
		$sql = "INSERT INTO guest_details (guest_name, mobile_number, address, room_type, arrival_date, departure_date, lid) VALUES ('$_POST[guest_name]', '$_POST[mobile_number]', '$_POST[address]', '$_POST[room_type]', '$_POST[arrival_date]', '$_POST[departure_date]', '$_SESSION[lid]' )";
		$result = $conn->query($sql);
		echo "Thank you for Room Request! We will get back to you shortly. ";
				}
  }*/
  if (isset($_POST['submit'])) {
    if ($number_of_records > 0) {
        echo "<div class='message error-message'>You have already submitted a request for the given dates!</div>";
    } else {
        $sql = "INSERT INTO guest_details (guest_name, mobile_number, address, room_type, arrival_date, departure_date, lid) VALUES ('$_POST[guest_name]', '$_POST[mobile_number]', '$_POST[address]', '$_POST[room_type]', '$_POST[arrival_date]', '$_POST[departure_date]', '$_SESSION[lid]')";
        $result = $conn->query($sql);
        echo "<div class='message success-message'>Thank you for Room Request! We will get back to you shortly.</div>";
    }
}

		
		?>
		

    <div class="form-container">
        <h2>Guest Information</h2>
        <form action="./guest_details_form.php" method="POST">
            <div class="form-group">
                <label for="guest_name">Guest Name</label>
                <input type="text" id="guest_name" name="guest_name" required>
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input type="text" id="mobile_number" name="mobile_number" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="room_type">Room Type</label>
                <select id="room_type" name="room_type" required>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="suite">Suite</option>
					<option value="deluxe">Deluxe</option>
                </select>
            </div>
            <div class="form-group">
                <label for="arrival_date">Arrival Date</label>
                <input type="date" id="arrival_date" name="arrival_date" required>
            </div>
            <div class="form-group">
                <label for="departure_date">Departure Date</label>
                <input type="date" id="departure_date" name="departure_date" required>
            </div>
            <button type="submit" class="submit-button" name="submit" >Submit</button>
        </form>
    </div>
	
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
