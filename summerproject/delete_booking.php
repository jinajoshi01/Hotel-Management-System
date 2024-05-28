<?php
include("connection.php");

if (isset($_GET['id'])) {
    $room_number = $_GET['id'];
    $query = "DELETE FROM guest_registration WHERE room_number = '$room_number'";
    if (mysqli_query($con, $query)) {
        echo '<script>alert("record deleted successfully!"); window.location.href = "guestbooking.php";</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "Not provided";
}

mysqli_close($con);
?>

