<!DOCTYPE html>
<?php
// error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "hotel";
$dbname = "hotel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
//<!-- add -->
if(isset($_POST['submitted_for']))
{
//echo "hi...";
//echo "val=".$_POST['submitted_for'];
//echo "val=".$_POST['arrival'];
//echo "val=".$_POST['departure'];
//echo "val=".$_POST['roomType'];

$sql = "SELECT * FROM room_master WHERE room_type='$_POST[roomType]' and current_status='Free'";
$result = $conn->query($sql);
$number_of_records=mysqli_num_rows($result);
//echo "val=".$number_of_records;

/*if($number_of_records>0)
	echo "<h1><font color='GREEN'> Rooms Available.</font></h1>";
else
	echo "Rooms Unavailable for the given dates. Please try some other dates";*/




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
    a:link {
      color: #d4af37;
      background-color: transparent;
    }

    .datepicker-container {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 15px;
    }

    .datepicker {
      width: 180px;
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
	
	.custom-select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    border-color: #ffdd00
    font-size: 2px;
	font-family: 'Roboto', sans-serif
    color: #333;
	}

	.custom-select:focus {
    border-color: #ffdd00;
    box-shadow: 0 0 5px rgba(212, 175, 55, 0.5);
    outline: none;
	}

	.custom-select option {
    font-family: 'Poiret One', cursive;
	background-color: #987070;
	color: #ffdd00;
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
  
  <form method="POST" action="index.php" name="frm" > 
  
  <?php 
  if(isset($number_of_records))
  {
	
  if($number_of_records>0)
    echo "<h5 class='text-center' style='font-family: \"Poiret One\", cursive; color: green;'>Rooms Available for ".$_POST['arrival']." to ".$_POST['departure']." for the Room Type: ".$_POST['roomType']."!!</h5>";
  else
	echo "<h5 class='text-center' style='font-family: \"Poiret One\", cursive; color: red;'>Rooms unavailable for ".$_POST['arrival']." to ".$_POST['departure']." for the Room Type: ".$_POST['roomType']." the given dates!!</h5>";
  }
  ?>
  
  <div class="container text-center">
    <div class="row datepicker-container">
      <div class="col">
        <!-- <label for="arrival">Arrival</label> -->
        <input type="text" name="arrival" id="arrival" class="form-control datepicker" required placeholder="Arrival Date">
      </div>
      <div class="col">
        <!-- <label for="departure">Departure</label> -->
        <input type="text" name="departure" id="departure" class="form-control datepicker" required placeholder="Departure Date">
      </div>
      <!-- <div class="col">
        <label for="roomType">Room Type</label>
        <input type="text" id="roomType" class="form-control" placeholder="Type Room Type">
      </div> -->
      <div class="col">
        <!-- <label for="roomType">Room Type</label> -->
        <!-- <input type="text" id="roomType" class="form-control"> -->
		<!--<select name="roomType" id="roomType" required>
				<option value=""  selected>Select your room type</option>
				<option value="Single Room">Single Room</option>
				<option value="Double Room">Double Room</option>
		</select> -->
		
		<select name="roomType" id="roomType" class="custom-select" required placeholder="Select your room type" >
        <option value="" disabled selected>Select your room type</option>
        <option value="Single">Single Room</option>
        <option value="Double">Double Room</option>
		<option value="Deluxe">Deluxe Room</option>
		</select>

      </div>
      <div class="col">
	  <input type="hidden" name="submitted_for" value="availability">

	 
         
		<!-- <button class="button" onclick="checkAvailability()"  >Check Availability</button> -->
		<input name="Submit" class="button"  type="submit"   value="Check availability">
		</form> 
      </div>
    </div>
    <div id="availability-info" class="mt-3"></div>
  </div>
    </div>
  </div>
  

  <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>

  <div class="carousel-container">
    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="true">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./Resoruces/30ceb059cf604b500a6bf7bb6534eba1b29c4a0c.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./Resoruces/95820363c3ba39142b9d0e59520eae8a36211048.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./Resoruces/82027c645178a0e4ca51ce9361567175d4e604ba.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./Resoruces/LogoOnReception.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./Resoruces/a47ae5791a9b82bce0c415b9359ffd73cd737b95.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./Resoruces/7548a48c9572868d8ccbce14cca8d34f3d5fe2ea.jpg".jpg" class="d-block w-100" alt="...">
        </div>
		<div class="carousel-item">
          <img src="./Resoruces/Reception.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  

  <!-- Footer outside of the container -->
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script>
   $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    autoclose: true,
    todayHighlight: true,
    startDate: '+1d', // Start date (tomorrow)
    endDate: '+31d' // End date (1 week from tomorrow)
});

/*function checkAvailability() {
    const arrival = document.getElementById('arrival').value;
    const departure = document.getElementById('departure').value;
    const selectedRoomType = document.getElementById('roomType').value;

    if (!arrival || !departure || !selectedRoomType) {
        alert('Please fill in all fields.');
        return;
    }

    fetch('/check-availability', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ arrival, departure, roomType: selectedRoomType })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        let availabilityInfo = 'Available dates:<br>';
        data.forEach(item => {
            availabilityInfo += `${item.date}: ${selectedRoomType === 'single_room' ? 'Single Room' : 'Double Room'} available<br>`;
        });
        document.getElementById('availability-info').innerHTML = availabilityInfo;
    })
    .catch(error => console.error('Error:', error));
}*/

	

  </script>
</body>

</html>
