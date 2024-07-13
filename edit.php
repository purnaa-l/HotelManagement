<?php
/*
include 'dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $guest_name = $_POST['guest_name'];
        $mobile_number = $_POST['mobile_number'];
        $address = $_POST['address'];
        $room_type = $_POST['room_type'];
        $arrival_date = $_POST['arrival_date'];
        $departure_date = $_POST['departure_date'];

        $sql = "UPDATE guest_details SET guest_name='$guest_name', mobile_number='$mobile_number', address='$address', room_type='$room_type', arrival_date='$arrival_date', departure_date='$departure_date' WHERE gid=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
			header("location:show_entries.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM guest_details WHERE gid=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        */
		?>

        <!--<form method="post" action="">
            Guest Name: <input type="text" name="guest_name" value="<?php //echo $row['guest_name']; ?>"><br>
            Mobile Number: <input type="text" name="mobile_number" value="<?php// echo $row['mobile_number']; ?>"><br>
            Address: <input type="text" name="address" value="<?php //echo $row['address']; ?>"><br>
            Room Type: <input type="text" name="room_type" value="<?php //echo $row['room_type']; ?>"><br>
            Arrival Date: <input type="date" name="arrival_date" value="<?php //echo $row['arrival_date']; ?>"><br>
            Departure Date: <input type="date" name="departure_date" value="<?php //echo $row['departure_date']; ?>"><br>
            <input type="submit" value="Update">
        </form>-->

        <?php/*
    } else {
        echo "No record found";
    }
} else {
    echo "Invalid ID";
}*/?>
<!--$conn->close();-->

<!DOCTYPE html>
<?php
include 'dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $guest_name = $_POST['guest_name'];
        $mobile_number = $_POST['mobile_number'];
        $address = $_POST['address'];
        $room_type = $_POST['room_type'];
        $arrival_date = $_POST['arrival_date'];
        $departure_date = $_POST['departure_date'];

        $sql = "UPDATE guest_details SET guest_name='$guest_name', mobile_number='$mobile_number', address='$address', room_type='$room_type', arrival_date='$arrival_date', departure_date='$departure_date' WHERE gid=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("location:show_entries.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM guest_details WHERE gid=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
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
    <title>Update Guest Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F0EBE3;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
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
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>-->
      </div>
    </div>
  </nav>
    <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->

<div class="container">
    <h2>Update Guest Details</h2>

    <form method="post" action="">
        Guest Name: <input type="text" name="guest_name" value="<?php echo $row['guest_name']; ?>"><br>
        Mobile Number: <input type="text" name="mobile_number" value="<?php echo $row['mobile_number']; ?>"><br>
        Address: <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
        Room Type: <input type="text" name="room_type" value="<?php echo $row['room_type']; ?>"><br>
        Arrival Date: <input type="date" name="arrival_date" value="<?php echo $row['arrival_date']; ?>"><br>
        Departure Date: <input type="date" name="departure_date" value="<?php echo $row['departure_date']; ?>"><br>
        <input type="submit" value="Update">
    </form>

    <?php
    } else {
        echo "No record found";
    }
} else {
    echo "Invalid ID";
}
//$conn->close();
?>
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

