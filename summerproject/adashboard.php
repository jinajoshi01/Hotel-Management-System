<?php
session_start();
if(!isset($_SESSION["key"])){
	header("location:alogin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>admin dashboard</title>
<link rel="stylesheet" type="text/css" href="adashboard.css"/>
		<link rel="stylesheet" type="text/css" href="css/all.min.css"/>
</head>
<body>

<div class="container">
<img src="C:\xampp\htdocs\beige-color-hotel-lobby-with-less-light.jpg" alt="photo4" class="background-img8"/>
</div>
<div class="nav">
<nav class="main-nav">
	
			<a href="Roommanagement.php">Room Management</a>
			<a href="staffmanagement.php">Staff Management</a>
			<a href="guestbooking.php">Registrations</a>
			<a href="reservationmanagement.php">Reservations</a>
	</nav>
</div>

		<div id="button8">
			<a href="login1.html" class="btn8">Log Out</a>
		</div>
		<div id="button9">
			<a href="view_complaints.php" class="btn9">View complaints</a>
		</div>
<div id="cpt">
				&#169 All Rights Reserved.&#174
			</div>
			

</body>
</html>