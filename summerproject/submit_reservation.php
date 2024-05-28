<?php
include("connection.php");
$reservation_id=$_POST['reservation_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$room_type = $_POST['room_type'];
$check_in_date = $_POST['check_in_date'];
$check_out_date = $_POST['check_out_date'];

$stmt = $con->prepare("INSERT INTO reservations (reservation_id,name, email, phone_number, room_type, check_in_date, check_out_date) VALUES (?,?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssiss",$reservation_id, $name, $email, $phone, $room_type, $check_in_date, $check_out_date);
if ($stmt->execute()) {
            
    echo '<script>alert("Reservation successful!"); window.location.href = "Reservation.php";</script>';
    exit(); 
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();

mysqli_close($con);
?>