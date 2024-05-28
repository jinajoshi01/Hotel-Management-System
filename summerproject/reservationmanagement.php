<?php
include("connection.php");

$query = "SELECT * FROM reservations";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Reservation ID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Room Type</th><th>Check-In Date</th><th>Check-Out Date</th><th>Actions</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['reservation_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['room_type'] . "</td>";
            echo "<td>" . $row['check_in_date'] . "</td>";
            echo "<td>" . $row['check_out_date'] . "</td>";
            echo "<td><a href='edit_reservation.php?id=" . $row['reservation_id'] . "'>Edit</a> | <a href='delete_reservation.php?id=" . $row['reservation_id'] . "'>Delete</a></td>";
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

<!DOCTYPE html>
<html>
<head>
    <title>Reservation Management</title>
    <link rel="stylesheet" type="text/css" href="reservationshow.css"/>
</head>
<body>
<a id="back-button" class="btn btn-primary" href="adashboard.html">Back</a>
</body>
</html>
