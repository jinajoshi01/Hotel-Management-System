<!DOCTYPE html>
<html>
<head>
    <title>guest registration</title>
	
<link rel="stylesheet" type="text/css" href="rguestregistrationshow.css"/>
</head>
<body>
<a id="back-button" class="btn btn-primary" href="rdashboard.html">Back</a>
<?php
include("connection.php");
$query = "SELECT * FROM guest_registration";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>ID Type</th><th>ID Number</th><th>Name</th><th>Contact Number</th><th>CheckIn Date</th><th>CheckOut Date</th><th>Room Type</th><th>Room Number</th><th>Rate</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['id_type'] . "</td>";
            echo "<td>" . $row['id_number'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['contact_number'] . "</td>";
            echo "<td>" . $row['check_in_date'] . "</td>";
            echo "<td>" . $row['check_out_date'] . "</td>";
            echo "<td>" . $row['room_type'] . "</td>";
            echo "<td>" . $row['room_number'] . "</td>";
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
