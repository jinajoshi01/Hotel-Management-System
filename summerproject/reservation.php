<!DOCTYPE html>
<html>
<head>
  <title>Reservation Form</title>
  <link rel="stylesheet" type="text/css" href="staffmanagement.css">
</head>
<body>

<h1>Reservation Form</h1>

<form action="submit_reservation.php" method="post" autocomplete="off">
  <label>Reservation ID:</label>
  <input type="number" name="reservation_id" required autocomplete="off"><br/><br/>
  
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required autocomplete="off"><br>
  
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  
  <label for="phone">Phone:</label><br>
  <input type="number" id="phone_number" name="phone_number" required autocomplete="off"><br>
  
  <label>Room Type:</label>
  <select name="room_type" required autocomplete="off">
    <option value="Standard room">Standard room</option>
    <option value="Deluxe room">Deluxe room</option>
    <option value="Suite room">Suite room</option>
  </select><br/><br/>
  
  <label for="checkin">Check-in Date:</label><br>
  <input type="date" id="check_in_date" name="check_in_date" required autocomplete="off"><br>
  
  <label for="checkout">Check-out Date:</label><br>
  <input type="date" id="check_out_date" name="check_out_date" required autocomplete="off"><br><br>
  
  <input type="submit" value="Submit">
</form>

<a id="back-button" class="btn btn-primary" href="rdashboard.html">Back</a>

<h1>Existing Reservations</h1>

<?php
include("connection.php");

$query = "SELECT * FROM reservations";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Reservation ID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Room Type</th><th>Check-In Date</th><th>Check-Out Date</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['reservation_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['room_type'] . "</td>";
            echo "<td>" . $row['check_in_date'] . "</td>";
            echo "<td>" . $row['check_out_date'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No data found.";
    }

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
</body>
</html>
