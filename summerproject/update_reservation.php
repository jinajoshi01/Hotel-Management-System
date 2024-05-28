<?php
include("connection.php");

if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];

    $query = "SELECT * FROM reservations WHERE id = '$reservation_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Reservation not found.";
        exit;
    }
} else {
    echo "No reservation ID provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id=$POST['reservation_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $room_type = $_POST['room_type'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];

    $sql = "UPDATE reservations SET reservation_id='$reservation_id', name='$name', email='$email', phone_number='$phone_number', room_type='$room_type', check_in_date='$check_in_date', check_out_date='$check_out_date' WHERE id='$reservation_id'";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Reservation details updated successfully!"); window.location.href = "reservationmanagement.php";</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservation</title>
    <link rel="stylesheet" type="text/css" href="edit_reservation.css"/>
</head>
<body>
    <h1>Edit Reservation</h1>
    <a id="back-button" class="btn btn-primary" href="reservationmanagement.php">Back</a>
    
    <form action="update_reservation.php?id=<?php echo $reservation_id; ?>" method="POST" autocomplete="off">
    <label>Reservation_id:</label>
        <input type="text" name="reservation_id" value="<?php echo $row['reservation_id']; ?>" required autocomplete="off"><br/><br/>
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required autocomplete="off"><br/><br/>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required autocomplete="off"><br/><br/>

        <label>Phone Number:</label>
        <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>" required autocomplete="off"><br/><br/>

        <label>Room Type:</label>
        <select name="room_type" required autocomplete="off">
            <option value="Standard room" <?php if ($row['room_type'] == 'Standard room') echo 'selected'; ?>>Standard room</option>
            <option value="Deluxe room" <?php if ($row['room_type'] == 'Deluxe room') echo 'selected'; ?>>Deluxe room</option>
            <option value="Suite room" <?php if ($row['room_type'] == 'Suite room') echo 'selected'; ?>>Suite room</option>
        </select><br/><br/>

        <label>Check-In Date:</label>
        <input type="date" name="check_in_date" value="<?php echo $row['check_in_date']; ?>" required autocomplete="off"><br/><br/>

        <label>Check-Out Date:</label>
        <input type="date" name="check_out_date" value="<?php echo $row['check_out_date']; ?>" required autocomplete="off"><br/><br/>

        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
