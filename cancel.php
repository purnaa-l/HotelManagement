<!DOCTYPE html>
<?php
	require_once('dbconnect.php');
	
	
	//echo "gid=".$_GET['id'];

	if (isset($_POST['submit'])) 
	{
		/*echo "Hi";
		echo "val=".$_POST['email'];
		echo "val=".$_POST['uname'];
		echo "val=".$_POST['psw'];*/
		
		
	}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Aura Suites New Sign Up Page</title>
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
.container {
    width: 80%;
    margin: auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
}

table {
    width: 100%;
    margin: 20px 0;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

td {
    background-color: #fff;
    color: #555;
}

input[type="text"], select {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="radio"] {
    margin-right: 10px;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-danger:hover {
    background-color: #c82333;
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
  
.login-form-container {
  width: 50%; /* Adjust width as needed */
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


   
      <!-- Vertical space -->
      <div class="vertical-space"></div>
         <!-- Vertical space -->
   <div class="vertical-space"></div>
   
 <?php
  if (isset($_POST['submit'])) 
  {
  
  }
		
		?>
 
  
  <div class="col login-form-container">
    <form action="show_entries.php" method="post"> <!--change once backend incorporated -->
	
      <div class="imgcontainer">
        <img src="./Resoruces/usericon.jpg" alt="UserLogin" class="avatar">
      </div>

      <div class="container">

        <!-- fetch details from guest_details table to display -->
		<?php
		
		$q = "select * from guest_details WHERE gid=$_GET[id] ";
           

		$resultq = $conn->query($q) or die ("Could not execute SQL1 query");

		
		$num = mysqli_num_rows($resultq);
	  
		if ($num == 0)
		   {
	       
		   echo "<Body text=\"RED\" <p> <h1> SORRY! COULD NOT RETRIEVE RECORDS</h1>";
    	   } 
		else 
		   {
     	 			while ($row = mysqli_fetch_array($resultq))
       				{
	   				  	$tgid=$row ["gid"];
		   				$tguest_name=$row ["guest_name"];
						$tarrivaldate=date('d-m-Y',strtotime($row["arrival_date"]));
						$tarrivaldate1=$row["arrival_date"];
						$tdeparturedate=date('d-m-Y',strtotime($row["departure_date"]));
						$tdeparturedate1=$row["departure_date"];
						//$treasonforcancelallot=$row["REASON_FOR_CANCEL_ALLOT"];
						//$treason=$row["REASON"];

						
						
						//$accepted=$row ["accepted"];
						//$reason=$row["reason"];
		   				
					}
			}
			?>
		
		
		
		



        <table width="357" height="118" border="1" align="center" cellspacing="0" cellpadding="0">
		<tr height="30">
		<td> Guest_ID </td> <td> : </td><td><?php echo $_GET['id'] ?></td>
		</tr>
		 
		<tr height="30">
		<td>NAME</td> <td> : </td><td><?php echo $tguest_name ?></td>
		</tr>
		
		<tr height="30">
		<td> ARRIVAL</td> <td> : </td><td><?php echo $tarrivaldate ?></td>
		</tr>
		 
		<tr height="30">
		<td> DEPARTURE </td> <td> : </td><td><?php echo $tdeparturedate?></td>
		</tr>
	<tr>
        <tr height="30"><th width="108">Cancel?</div></th>
		<td> : </td>
     <td>
	 <input type="radio" name="yesno"  value="Yes" id="accept_yes" >Yes<br>
	 <input type="radio" name="yesno"  value="No" id="accept_yes" >No<br>
	 <?php
	/*
	if ($accepted == "NO")
	{
		echo "<input type=\"radio\" name=\"yesno\" value=\"NO\" id=\"accept_no\" checked=\"true\">NO<br>";   
	}
	else
	{
	echo "<input type=\"radio\" name=\"yesno\" value=\"NO\" id=\"accept_no\" >NO<br>"; 
	}
*/

?>

	</td>
	</tr>
	<!--
	<tr height="30">
	 <td> Reason for Cancelling Allotment</td>
     <td> : </td>
     <td> <input name="reason1"  id="reason1" size="40" maxlength="40" value="<?php echo $treason1 ?>">
     </td>
	</tr>
	-->
    
  <tr>
  <td> Reason Category</td> 
  <td> : </td> 
	<td>
	<select name="reasoncategory" style="COLOR:#030; BACKGROUND-COLOR:#CCC;">
				 <option value="">SELECT REASON CATEGORY</option>
                 <option value="OWN REQUEST">OWN REQUEST</option>
                 <option value="ADMINISTRATIVE REASON">ADMINISTRATIVE REASON</option>
 				<option value="ABSENT/DID NOT OCCUPY">ABSENT/DID NOT OCCUPY</option>
							
				</select>
                </td> 
  </tr>
        
        
      

<?php
echo"<input type=\"hidden\" name=\"gid\" value=\"$_GET[id]\"" ; 
 echo '<input type="hidden" name="coming_from" value="cancel.php">';
 ?>



<table align="center" font color="red" border="0">
<tr height="30"><td> 
<input type="hidden" name="coming_from" value="cancel.php">
<!--<input name="Submit" type="submit"  value="Update">-->
<button type="submit" name="submit" class="btn btn-primary">Update</button>

</td></tr>

                

</table>  </table>
<?php




?>




      </div>
</form> 
    
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
        <div>
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