<?php
include("connection.php");

if (isset($_GET['id'])) {
    $room_number = $_GET['id'];

    
    $query = "SELECT * FROM room_management WHERE room_number = '$room_number'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $room_type = $row['room_type'];
        $room_status = $row['room_status'];
        $occupancy = $row['occupancy'];
        $rate = $row['rate'];
    } else {
        echo "Room not found.";
        exit;
    }
} else {
    echo "No room number provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $room_type = $_POST['room_type'];
    $room_status = $_POST['room_status'];
    $occupancy = $_POST['occupancy'];
    $rate = $_POST['rate'];


    $sql = "UPDATE room_management SET room_type='$room_type', room_status='$room_status', occupancy='$occupancy', rate='$rate' WHERE room_number='$room_number'";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Room details updated successfully!"); window.location.href = "roommanagement.php";</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Room Details</title>
    <link rel="stylesheet" type="text/css" href="roommanagement.css"/>
</head>
<body>
    <h1>Edit Room Details</h1>
    <form action="edit_room.php?id=<?php echo $room_number; ?>" method="post">
        <label for="room_number">Room Number:</label><br>
        <input type="number" id="room_number" name="room_number" value="<?php echo $room_number; ?>" readonly required autocomplete="off"><br>
        <label for="room_type">Room Type:</label><br>
        <input type="text" id="room_type" name="room_type" value="<?php echo $room_type; ?>"required autocomplete="off"><br>
        <label for="room_status">Room Status:</label><br>
        <input type="text" id="room_status" name="room_status" value="<?php echo $room_status; ?>"required autocomplete="off"><br>
        <label for="occupancy">Occupancy:</label><br>
        <input type="text" id="occupancy" name="occupancy" value="<?php echo $occupancy; ?>"required autocomplete="off"><br>
        <label for="rate">Rate:</label><br>
        <input type="number" id="rate" name="rate" value="<?php echo $rate; ?>"required autocomplete="off"><br>
        <input type="submit" value="Update">
    </form>
    <a id="back-button" class="btn btn-primary" href="roommanagement.php">Back</a>
</body>
</html>
