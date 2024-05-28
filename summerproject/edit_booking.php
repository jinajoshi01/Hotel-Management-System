<?php
include("connection.php");

if (isset($_GET['id'])) {
    $room_number = $_GET['id'];

    $query = "SELECT * FROM guest_registration WHERE room_number = '$room_number'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Booking not found.";
        exit;
    }
} else {
    echo "No room number provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_type = $_POST['id_type'];
    $id_number = $_POST['id_number'];
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $room_type = $_POST['room_type'];
    $room_number = $_POST['room_number'];
    $rate = $_POST['rate'];

    $sql = "UPDATE guest_registration SET id_type='$id_type', id_number='$id_number', name='$name', contact_number='$contact_number', check_in_date='$check_in_date', check_out_date='$check_out_date', room_type='$room_type', room_number='$room_number', rate='$rate' WHERE room_number='$room_number'";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Booking details updated successfully!"); window.location.href = "guestbooking.php";</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Guest Booking</title>
    <link rel="stylesheet" type="text/css" href="edit_booking.css"/>
</head>
<body>
    <h1>Edit Guest Booking</h1>
    <a id="back-button" class="btn btn-primary" href="guestbooking.php">Back</a>
    
    <form action="update_booking.php?id=<?php echo $room_number; ?>" method="POST"autocomplete="off">
        <label>ID Type:</label>
        <select name="id_type"required autocomplete="off">
            <option value="Citizenship" <?php if ($row['id_type'] == 'Citizenship') echo 'selected'; ?>>Citizenship</option>
            <option value="Driving License" <?php if ($row['id_type'] == 'Driving License') echo 'selected'; ?>>Driving License</option>
            <option value="Passport" <?php if ($row['id_type'] == 'Passport') echo 'selected'; ?>>Passport</option>
        </select><br/><br/>

        <label>ID Number:</label>
        <input type="text" name="id_number" value="<?php echo $row['id_number']; ?>"required autocomplete="off"><br/><br/>

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>"required autocomplete="off"><br/><br/>

        <label>Contact Number:</label>
        <input type="text" name="contact_number" value="<?php echo $row['contact_number']; ?>"required autocomplete="off"><br/><br/>

        <label>Check-In Date:</label>
        <input type="date" name="check_in_date" value="<?php echo $row['check_in_date']; ?>"required autocomplete="off"><br/><br/>

        <label>Check-Out Date:</label>
        <input type="date" name="check_out_date" value="<?php echo $row['check_out_date'];?>"required autocomplete="off"><br/><br/>

        <label>Room Type:</label>
        <select name="room_type"required autocomplete="off">
            <option value="Standard room" <?php if ($row['room_type'] == 'Standard room') echo 'selected'; ?>>Standard room</option>
            <option value="Deluxe room" <?php if ($row['room_type'] == 'Deluxe room') echo 'selected'; ?>>Deluxe room</option>
            <option value="Suite room" <?php if ($row['room_type'] == 'Suite room') echo 'selected'; ?>>Suite room</option>
        </select><br/><br/>

        <label>Room Number:</label>
        <input type="text" name="room_number" value="<?php echo $row['room_number']; ?>"><br/><br/>

        <label>Rate:</label>
        <input type="text" name="rate" value="<?php echo $row['rate']; ?>"required autocomplete="off"><br/><br/>

        <input type="hidden" name="original_room_number" value="<?php echo $row['room_number']; ?>">
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
