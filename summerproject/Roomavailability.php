<!DOCTYPE html>
<html>
<head>
    <title>Roomavailabilty</title>
	
<link rel="stylesheet" type="text/css" href="Roomavailability.css"/>
</head>
<body>
<a id="back-button" class="btn btn-primary" href="rdashboard.html">Back</a>
<?php
include("connection.php");
$query = "SELECT * FROM room_management";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Room Number</th><th>Room Type</th><th>Room Status</th><th>Occupancy</th><th>Rate</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['room_number'] . "</td>";
            echo "<td>" . $row['room_type'] . "</td>";
            echo "<td>" . $row['room_status'] . "</td>";
            echo "<td>" . $row['occupancy'] . "</td>";
            echo "<td>" . $row['rate'] . "</td>";
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
