<?php
include("connection.php");

if (isset($_GET['id'])) {
    $room_number = $_GET['id'];
    $query = "DELETE FROM room_management WHERE room_number = '$room_number'";
    if (mysqli_query($con, $query)) {
        echo '<script>alert("room record deleted successfully!"); window.location.href = "roommanagement.php";</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No room number provided.";
}

mysqli_close($con);
?>
