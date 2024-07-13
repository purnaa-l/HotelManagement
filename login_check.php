<?php
	//session_start();	//First line in every page
	//echo "S=".$_SESSION['SetAdmin'];
	if(!isset($_SESSION['SetAdmin']))
		header("location:index.php");
	
?>
