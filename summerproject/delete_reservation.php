<?php
include("connection.php");

if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];
    $query = "DELETE FROM reservations WHERE reservation_id = '$reservation_id'";
    if (mysqli_query($con, $query)) {
        echo '<script>alert("record deleted successfully!"); window.location.href = "reservationmanagement.php";</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "Not provided";
}

mysqli_close($con);
?>

