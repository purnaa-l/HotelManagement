<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure you have included Composer's autoloader

error_reporting(0);
include 'dbconnect.php';
//echo "coming_from=".$_POST['coming_from'];
//echo "yes/no=".$_POST['yesno'];
//echo "accept-reject=".$_POST['accept_reject'];
//echo "gid=".$_POST['gid'];

//echo "<br>test=".$_POST['test'];

//echo "value of test=".$_POST['test'];
//echo "yes-no-data=".$_POST['accept_reject'];
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
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #987070;
    color: #d4af37;
    height: 2px; /* Adjust height as desired */
    text-align: center;
    z-index: 999; /* Ensure it stays above other content */
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

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #DDD;
        }

        th {
            background-color: #987070;
            color: #ffdd00;
            font-family: 'Poiret One', cursive;
            font-size: 1 rem;
        }

        td a {
            color: #987070;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
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

<?php

if (isset($_POST['submit'])) 
{
if ($_POST['coming_from']=='allot_reject.php' )
{
	if ($_POST['accept_reject']=='Yes')
	{
		$tstatus='allotted';
		//to avoid repeated insert for same guest id in room master,
		$sql = "SELECT * FROM room_status WHERE gid='$_POST[gid]'";
		$result = $conn->query($sql);
		$number_of_records=mysqli_num_rows($result);
		if ($number_of_records==0)
		{
		
		$sql = "INSERT INTO room_status ( gid, from_date , to_date, room_id, status_of_request)  VALUES ('$_POST[gid]', '$_POST[arrival_date]', '$_POST[departure_date]','$_POST[room_id]','$tstatus'    )";
		$result = $conn->query($sql);
		}
		else
		{
		$sql = "update room_status set  from_date='$_POST[arrival_date]',
										to_date='$_POST[departure_date]',
										room_id='$_POST[room_id]',
										status_of_request='$tstatus'

																			where gid='$_POST[gid]'  ";
		$result = $conn->query($sql);
			
		}
		
		$sql="update room_master set current_status='$tstatus' where room_id='$_POST[room_id]' ";
		$result = $conn->query($sql);
		
		//sending confirmation email
		
		//$userEmail = $_POST['email']; // Get the user's email from the form submission
		$userEmail = 'mynameispurnaa@gmail.com'; // Get the user's email from the form submission

		$mail = new PHPMailer(true);

		try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                           // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';      // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                  // Enable SMTP authentication
        $mail->Username   = 'auraa.suites@gmail.com';// SMTP username
        $mail->Password   = 'vhac uwne iaha qleh';   // SMTP password
        $mail->SMTPSecure = 'tls';                 // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                   // TCP port to connect to

        //Recipients
        $mail->setFrom('auraa.suites@gmail.com', 'Aura Suites');
        $mail->addAddress($userEmail);             // Add a recipient

        // Content
        $mail->isHTML(true);                       // Set email format to HTML
        $mail->Subject = 'Confirmation Mail - Room Allotment';
       /* $mail->Body    = 'Dear Purnaa, The room you requested for the date ....... to ....... room type single has been allotted by admin/n';
        $mail->AltBody = 'Thank you for your submission! We have received your request.';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }*/
		  $mail->Body    = '
    <html> 
    <body>
        
        <div class="message-content">
            <p>Hello Purnaa!</p>
            <p>We are delighted to inform you that your accommodation request has been confirmed.</p>
            <p>We cannot wait to welcome you to our suites. We will send you the payment details shortly!</p>
            <p>Best Regards,<br>Aura Suites</p>
        </div>
    </body>
    </html>';

    $mail->AltBody = 'Hello Purnaa! We are delighted to inform you that your accommodation request has been confirmed. We cannot wait to welcome you to our suites. We will send you the payment details shortly! Best Regards, Aura Suites';

    $mail->send();
    echo '<div style="text-align:center;color:green;">Message sent to the recipient</div>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
	//email sending -end	
	 //if
	else
	{
		//echo "inside else part";
		$tstatus='rejected';
		//to avoid repeated insert for same guest id in room master,
		$sql = "SELECT * FROM room_status WHERE gid='$_POST[gid]'";
		$result = $conn->query($sql);
		$number_of_records=mysqli_num_rows($result);
		if ($number_of_records==0)
		{
		$sql = "INSERT INTO room_status ( gid, from_date , to_date, room_id, status_of_request)  VALUES ('$_POST[gid]', '$_POST[arrival_date]', '$_POST[departure_date]','$_POST[room_id]','$tstatus'    )";
		$result = $conn->query($sql);
		}
		else
		{
		$sql = "update room_status set  from_date='$_POST[arrival_date]',
										to_date='$_POST[departure_date]',
										room_id='$_POST[room_id]',
										status_of_request='$tstatus'

																			where gid='$_POST[gid]'  ";
		$result = $conn->query($sql);
			
		}
		
		$userEmail = 'mynameispurnaa@gmail.com'; // Get the user's email from the form submission

		$mail = new PHPMailer(true);

		try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                           // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';      // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                  // Enable SMTP authentication
        $mail->Username   = 'auraa.suites@gmail.com';// SMTP username
        $mail->Password   = 'vhac uwne iaha qleh';   // SMTP password
        $mail->SMTPSecure = 'tls';                 // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                   // TCP port to connect to

        //Recipients
        $mail->setFrom('auraa.suites@gmail.com', 'Aura Suites');
        $mail->addAddress($userEmail);             // Add a recipient

        // Content
        $mail->isHTML(true);                       // Set email format to HTML
        $mail->Subject = 'Rejection Mail - Room Allotment';
       /* $mail->Body    = 'Dear Keerthana, The room you requested for the date ....... to ....... room type single has been allotted by admin/n';
        $mail->AltBody = 'Thank you for your submission! We have received your request.';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }*/
		  $mail->Body    = '
    <html> 
    <body>
        
        <div class="message-content">
            <p>Hello Keerthana!</p>
            <p>We are extremely sorry to inform you that your accommodation request has been cancelled.</p>
            <p>We are entirely booked. Please try again next time!</p>
            <p>Best Regards,<br>Aura Suites</p>
        </div>
    </body>
    </html>';

    $mail->AltBody = 'Hello Purnaa! We are delighted to inform you that your accommodation request has been confirmed. We cannot wait to welcome you to our suites. We will send you the payment details shortly! Best Regards, Aura Suites';

    $mail->send();
    echo '<div style="text-align:center;color:green;">Message sent to the recipient</div>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
		
	}
}
}



//if coming from cancel.php
if ($_POST['coming_from']=='cancel.php' and $_POST['yesno']=='Yes' )
{


$sql1="SELECT * FROM room_status WHERE gid ='$_POST[gid]'";
$result1 = $conn->query($sql1);	//to run SQL

$number_of_records_1=mysqli_num_rows($result1);
//echo "val=".$number_of_records_1;
$row1 = mysqli_fetch_array($result1);
$troom_id=$row1["room_id"];


$tstatus='Cancelled';
$sql = "update room_status set  status_of_request='$tstatus' where gid='$_POST[gid]'  ";
$result = $conn->query($sql);




$tstatus1='free';
$sql="update room_master set current_status='$tstatus1' where room_id='$troom_id' ";
$result = $conn->query($sql);
				
		
	
}


if($_SESSION['SetAdmin']=='admin')
{
	$sql = "SELECT * FROM guest_details";
}
else{
	$sql = "SELECT * FROM guest_details WHERE lid='$_SESSION[lid]'";
}
 
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    echo "<table border='1'>
    <tr>
    <th>Guest ID</th>
    <th>Guest Name</th>
    <th>Mobile Number</th>
    <th>Address</th>
    <th>Room Type</th>
    <th>Arrival Date</th>
    <th>Departure Date</th>
    <th>Actions</th>
	<th>Allot/Reject</th>
	<th>Cancel<br>Allotment</th>
    </tr>";
    while($row = $result->fetch_assoc()) 
	{
		if($_SESSION['SetAdmin']=='admin')   //admin dashboard
		{
        echo "<tr>
        <td>" . $row["gid"] . "</td>
        <td>" . $row["guest_name"] . "</td>
        <td>" . $row["mobile_number"] . "</td>
        <td>" . $row["address"] . "</td>
        <td>" . $row["room_type"] . "</td>
        <td>" . $row["arrival_date"] . "</td>
        <td>" . $row["departure_date"] . "</td>
        <td>
            <a href='edit.php?id=" . $row["gid"] . "'>Edit</a>
            <a href='delete.php?id=" . $row["gid"] . "'>Delete</a>
        </td>";
		
		//first check wtr any record there in room_status, if yes, print that status, else print Allot/Reject
		$tgid=$row["gid"];
		$sql1="SELECT * FROM room_status WHERE gid ='$tgid'";
		$result1 = $conn->query($sql1);	//to run SQL
		$number_of_records_1=mysqli_num_rows($result1);
		//echo "val=".$number_of_records_1;
		if ($number_of_records_1 > 0)
		{
			while ($row1 = mysqli_fetch_array($result1))
				{
			// Assign values to 
			$temp_status=$row1["status_of_request"];
			//echo "temp_status=".$temp_status;
			echo "
			<td>
            <a href='allot_reject.php?id=" . $row["gid"] . "'>$temp_status</a>
			</td>
			<td>";
			
			if ($tstatus == "Cancelled")
			{
            echo "<a href='cancel.php?id=" . $row["gid"] . "'>-NA-</a>";
			}
			else
			{
			echo "<a href='cancel.php?id=" . $row["gid"] . "'>Yes_No</a>	
				</td>";
			}

			
		}
		}
		else
		{
			echo "
		<td>
            <a href='allot_reject.php?id=" . $row["gid"] . "'>Allot/Reject</a>
        </td>";
		
		if ($tstatus == "Cancelled")
			{
            echo "<td><a href='cancel.php?id=" . $row["gid"] . "'>-NA-</a></td>";
			}
			else
			{
			echo "<td><a href='cancel.php?id=" . $row["gid"] . "'>Yes OR No</a>	
				</td>";
			}
		
		
		
        echo "</tr>";
		}
		
		
		}
		else   // user dashboard
		{
			echo "<tr>
        <td>" . $row["gid"] . "</td>
        <td>" . $row["guest_name"] . "</td>
        <td>" . $row["mobile_number"] . "</td>
        <td>" . $row["address"] . "</td>
        <td>" . $row["room_type"] . "</td>
        <td>" . $row["arrival_date"] . "</td>
        <td>" . $row["departure_date"] . "</td>
        <td>
            <a href='edit.php?id=" . $row["gid"] . "'>Edit</a>
            <a href='delete.php?id=" . $row["gid"] . "'>Delete</a>
        </td>
        </tr>";
		}
		
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
    <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
  <div class="vertical-space"></div>
  <!-- Vertical space -->
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
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="index.js"></script>
 </body>
 
 </html>