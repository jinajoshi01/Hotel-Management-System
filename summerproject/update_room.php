<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $original_room_number = $_POST['original_room_number']; // Original room number
    $room_number = $_POST['room_number']; // Current (possibly updated) room number
    $room_type = $_POST['room_type'];
    $room_status = $_POST['room_status'];
    $occupancy = $_POST['occupancy'];
    $rate = $_POST['rate'];

    if (!empty($original_room_number) && !empty($room_number) && !empty($room_type) && !empty($room_status) && !empty($occupancy) && !empty($rate)) {
        $sql = "UPDATE room_management 
                SET room_number='$room_number', room_type='$room_type', room_status='$room_status', occupancy='$occupancy', rate='$rate' 
                WHERE room_number='$original_room_number'";
        
        if (mysqli_query($con, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        echo "Please fill out all required fields.";
    }
}

mysqli_close($con);
?>
