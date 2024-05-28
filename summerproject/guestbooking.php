<?php
session_start();
include("connection.php");

$result = mysqli_query($con, "SELECT * FROM guest_registration ORDER BY room_number ASC");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Guest List</title>
	<link rel="stylesheet" type="text/css" href="guestlist.css"/>
</head>
<body>
<a id="back-button" class="btn btn-primary" href="adashboard.html">Back</a>
	<table>
		<thead>
			<tr>
            <th>ID </th>
				<th>ID Type</th>
				<th>ID Number</th>
				<th>Name</th>
				<th>Contact Number</th>
				<th>Check-In-Date</th>
				<th>Check-Out-Date</th>
				<th>Room Type</th>
				<th>Room Number</th>
				<th>Rate</th>
			</tr>
		</thead>
		<tbody>
			<?php
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
                echo "<td><a href='edit_booking.php?id=" . $row['room_number'] . "'>Edit</a> | <a href='delete_booking.php?id=" . $row['room_number'] . "'>Delete</a></td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>