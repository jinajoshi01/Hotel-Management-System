<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $original_room_number = $_POST['original_room_number']; // Original room number
    $id_type = $_POST['id_type'];
    $id_number = $_POST['id_number'];
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $room_type = $_POST['room_type'];
    $room_number = $_POST['room_number'];
    $rate = $_POST['rate'];

    if (!empty($id_type) && !empty($id_number) && !empty($name) && !empty($contact_number) && !empty($check_in_date) && !empty($check_out_date) && !empty($room_type) && !empty($room_number) && !empty($rate)) {
        $sql = "UPDATE guest_registration SET id_type = '$id_type', id_number = '$id_number', name = '$name', contact_number = '$contact_number', check_in_date = '$check_in_date', check_out_date = '$check_out_date', room_type = '$room_type', room_number = '$room_number', rate = '$rate' WHERE room_number = '$original_room_number'";

        if (mysqli_query($con, $sql)) {
            echo '<script>alert("Booking details updated successfully!"); window.location.href = "guestbooking.php";</script>';
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        echo "Please fill out all required fields.";
    }
}

mysqli_close($con);
?>
