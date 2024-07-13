
<?php
session_start();
	//error_reporting(0);
	include("dbconnect.php");
	require_once("login_check.php");
	//echo "hi=".$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Aura Suites</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lora:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./stylesheet.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .navbar {
    background-color: #987070; /* New background color for the navbar */
}

a:link{
  color: #d4af37;

}

.navbar-brand img {
    height: 90px;
    padding: auto;
}

.navbar-brand {
    font-family: 'Lobster', cursive; /* Fancy font for the brand */
    font-size: 2.5rem;
    color: #d4af37; /* Custom color for the brand */
}

.navbar-nav .nav-link {
    font-family: 'Poiret One', cursive;
    color: #ffdd00; /* Custom color for nav links */
    font-size: 1rem;
    font-style: normal;
} 

.navbar-nav .nav-link:hover {
    color: white; /* Hover color for nav links */
}

.navbar-toggler {
    border-color: #ffdd00; /* Custom color for toggler */
}

.dropdown-menu {
    background-color: #987070; /* Dark background for dropdown */
    font-family: 'Poiret One', cursive;
}

.dropdown-menu .dropdown-item {
    color: #ffdd00; /* Custom color for dropdown items */
}

.dropdown-menu .dropdown-item:hover {
    background-color: #A0522D; /* Hover background for dropdown items */
}

.form-control {
    border-color: #ffdd00; /* Custom border color for search input */
    font-family: 'Lora', serif;
    font-style:normal;
    font-size: 1rem;
}

.btn-outline-success {
    color: #ffdd00;
    border-color: #ffdd00; /* Custom color for search button */
}

.btn-outline-success:hover {
    background-color: #ffdd00;
    border-color: #ffdd00; /* Custom hover color for search button */
    color: #8B4513;
}

.navbar-nav .home-link
.navbar-nav .user-login-link
.navbar-nav .admin-login-link 
 {
  font-family: 'Poiret One', cursive;
    color: #ffdd00; /* Custom color for Home */
}


.navbar-nav .home-link:hover,
.navbar-nav .user-login-link:hover,
.navbar-nav .admin-login-link:hover
.navbar-nav .dropdown-menu-link:hover
.navbar-nav .dropdown-item-link:hover {
    color: #FFFFFF; /* Hover color for all */
}

.one{
    background-color: #987070;
}
body {
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      background-color: #F0EBE3;
      
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.7); /* White overlay with 70% opacity */
      z-index: -1;
    }

    input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-family: 'Times New Roman', Times, serif;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  font-family: 'Poiret One', cursive;
}

button:hover {
  opacity: 0.7;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  font-family: 'Poiret One', cursive;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 70%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.center-align1 {
    text-align: center; /* Center align text within the cell */
    vertical-align: middle; /* Center align vertically within the cell */
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

  
.login-form-container {
  width: 78%; /* Adjust width as needed */
  margin-left: auto;
  margin-right: auto;
  padding: 20px;
  background-color: whitesmoke;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  font-family: 'Poiret One', cursive;
}

.login-form-container .container {
  width: 100%; /* Full width within the form container */
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
   

   
  <div class="col login-form-container">
    <form action="./show_entries.php" method="post"> <!--change once backend incorporated -->
      <div class="imgcontainer">
        <img src="./Resoruces/LOGO_PDF_jpg.jpg" alt="UserLogin" class="avatar">
      </div>

      <div class="container">
<?php
        $sql = "SELECT gid, guest_name, mobile_number, address, room_type, arrival_date, departure_date FROM guest_details where gid='$_GET[id]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
  // echo '<form action="show_entries.php" method="post">';
    echo '<table class="table table-bordered">';
    echo '<thead><tr><th>GID</th><th>Guest Name</th><th>Mobile Number</th><th>Address</th><th>Room Type</th><th>Arrival Date</th><th>Departure Date</th><th>Accept</th></tr></thead>';
    echo '<tbody>';

    while($row = $result->fetch_array()) {
        echo '<tr>';
        echo '<td>' . $row["gid"] . '</td>';
        echo '<td>' . $row["guest_name"] . '</td>';
        echo '<td>' . $row["mobile_number"] . '</td>';
        echo '<td>' . $row["address"] . '</td>';
        echo '<td>' . $row["room_type"] . '</td>';
        echo '<td>' . $row["arrival_date"] . '</td>';
        echo '<td>' . $row["departure_date"] . '</td>';
        echo '<td>';
		
		//passing all the fetched variables to next page to insert into room_status table
		echo '<input type="hidden" name="gid" value="' . $row["gid"] . '">';
		echo '<input type="hidden" name="arrival_date" value="' . $row["arrival_date"] . '">';
		echo '<input type="hidden" name="departure_date" value="' . $row["departure_date"] . '">';
	
	}
		
        echo '<input type="radio" id="yesno" name="accept_reject"  value="Yes"> Yes ';
        echo '<input type="radio" id="yesno" name="accept_reject"  value="No"> No';
		echo '</td>';
		echo '</tr>';
		echo '<td class="center-align1">Room No.:</td>';
		echo '<td class="center-align1"><input type="text" name="room_id"></td>';
		//echo '<td>Room No.:</td>'.'<td><input type="text" name="room_id"</td>';
		//echo "row of gid=".$row["gid"];
		
        
    
   // echo '<td><input type="text" name="test" id="test" > </td>';
    echo '</tbody>';
    echo '</table>';
    echo '<input type="hidden" name="coming_from" value="allot_reject.php">';
	
	
	  
	  
	  

	
		
		
	echo '<button type="submit" name="submit" class="btn btn-primary">Allot/Reject</button>';
	
	
    //echo '</form>';
} else {
    echo "0 results";
}

$conn->close();
?>
      </div>
	  
	  
	  
		
    </form>
	
	<?php
//echo '<td><input type="hidden" name="test" id="test"  > </td>';
?>


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
   <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
   
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
            <p> <a href="mailto:auraa.suites@gmail.com">auraa.suites@gmail.com</a></p>
        </div>
    </footer>

 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="index.js"></script>
 </body>
 
 </html>