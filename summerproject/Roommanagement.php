<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ID'];
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $room_status = $_POST['room_status'];
    $occupancy = $_POST['occupancy'];
    $rate=$_POST['rate'];

    if (!empty($room_number) && !empty($room_type) && !empty($room_status) && !empty($occupancy) && !empty($rate)) {
        $sql = "INSERT INTO room_management (room_number, room_type, room_status, occupancy, rate) VALUES ('$room_number', '$room_type','$room_status', '$occupancy',$rate)";
        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room Management</title>
	
<link rel="stylesheet" type="text/css" href="roommanagement.css"/>
</head>
<body>
<h1> ADD NEW ROOMS</h1>
<form action="insert_room.php" method="post">
    <input type="hidden" name="ID" value="<?php echo $id; ?>">
    <label for="room_number">Room Number:</label><br>
    <input type="number" id="room_number" name="room_number"required autocomplete="off"><br>
    <label for="room_type">Room Type:</label><br>
    <select name="room_type"required autocomplete="off">
					<option value="Standard room">Standard room</option>
					<option value="Deluxe room">Deluxe room</option>
					<option value="Suite room">Suite room</option>
				</select>
    <label for="room_status">Room Status:</label><br>
    <select name="room_status"required autocomplete="off">
    
        <option value="Vacant">Vacant</option>
        <option value="Occupied">Occupied</option>
    </select>

    <label for="occupancy">Occupancy:</label><br>
    <input type="number" id="occupancy" name="occupancy"required autocomplete="off"><br>
    <label for="rate">Rate:</label><br>
    <input type="number" id="rate" name="rate"required autocomplete="off"><br>
    <input type="submit" value="Submit">
    </form>
	<a id="back-button" class="btn btn-primary" href="adashboard.html">Back</a>
    <h2>Room List</h2>
   
    
</body>
</html>

<?php
$query = "SELECT * FROM room_management";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>room_number</th><th>room_type</th><th>room_status</th><th>occupancy</th><th>rate</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['room_number'] . "</td>";
            echo "<td>" . $row['room_type'] . "</td>";
            echo "<td>" . $row['room_status'] . "</td>";
            echo "<td>" . $row['occupancy'] . "</td>";
            echo "<td>" . $row['rate'] . "</td>";
			echo "<td><a href='edit_room.php?id=" . $row['room_number'] . "'>Edit</a> | <a href='delete_room.php?id=" . $row['room_number'] . "'>Delete</a></td>";
			echo "</tr>";
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

