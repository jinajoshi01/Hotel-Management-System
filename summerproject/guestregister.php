<?php
session_start();
include("connection.php");


$errors = array();
$vacant_rooms = [];

//vacant rooms fetch gareko
$query = "SELECT room_number, room_type, rate FROM room_management WHERE room_status = 'vacant'";
$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $vacant_rooms[] = $row;
    }
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($con);
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_type = $_POST['id_type'];
    $id_number = $_POST['id_number'];
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $room_type = $_POST['room_type'];
    $room_number = $_POST['room_number'];
    $rate = $_POST['rate'];

    if (empty($errors)) {
        $stmt = $con->prepare("INSERT INTO guest_registration (id_type, id_number, name, contact_number, check_in_date, check_out_date, room_type, room_number, rate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $id_type, $id_number, $name, $contact_number, $check_in_date, $check_out_date, $room_type, $room_number, $rate);
        if ($stmt->execute()) {
            $update_stmt = $con->prepare("UPDATE room_management SET room_status = 'occupied' WHERE room_number = ?");
            $update_stmt->bind_param("s", $room_number);
            $update_stmt->execute();
            $update_stmt->close();

            echo '<script>alert("Guest registration successful!"); window.location.href = "guestregister.php";</script>';
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guest Registration Form</title>
    <link rel="stylesheet" type="text/css" href="guestregister.css"/>
    <link rel="stylesheet" type="text/css" href="css/all.min.css"/>
    <script>
        function updateRoomDetails() {
            var roomSelect = document.getElementById('room_number');
            var roomTypeInput = document.getElementById('room_type');
            var rateInput = document.getElementById('rate');
            var selectedRoom = roomSelect.options[roomSelect.selectedIndex].value;

            <?php 
                $room_data = [];
                foreach ($vacant_rooms as $room) {
                    $room_data[$room['room_number']] = ['room_type' => $room['room_type'], 'rate' => $room['rate']];
                }
            ?>
            var roomData = <?php echo json_encode($room_data); ?>;

            var selectedRoomData = roomData[selectedRoom] || {room_type: '', rate: ''};

            roomTypeInput.value = selectedRoomData.room_type;
            rateInput.value = selectedRoomData.rate;
        }
    </script>
</head>
<body>
<div class="container">
    <img src="..\summerproject\beige-color-hotel-lobby-with-less-light.jpg" alt="photo4" class="background-img5"/>
</div>
<div id="rf">
    <form action="guestregister.php" method="POST">
        <p><b>NEW GUEST REGISTRATION</b></p><br/>

        <label>ID Type</label>
        <select name="id_type"required>
            <option value="Choose ID Type">Choose ID Type</option>
            <option value="Citizenship">Citizenship</option>
            <option value="Driving License">Driving License</option>
            <option value="Passport">Passport</option>
        </select><br/><br/>

        <label>ID Number</label>
        <input type="number" name="id_number"required/><br/><br/>
        <label>Name</label>
        <input type="text" name="name"autocomplete="off"required/><br/><br/>
        <label>Contact Number</label>
        <input type="number" name="contact_number"autocomplete="new-contact"required/><br/><br/>
        <label>Check-In-Date</label>
        <input type="date" name="check_in_date"required/><br/><br/>
        <label>Check-Out-Date</label>
        <input type="date" name="check_out_date"required/><br/><br/>
        <label>Room Number</label>
        <select name="room_number" id="room_number" onchange="updateRoomDetails()">
            <option value="">Choose Room Number</option>
            <?php foreach ($vacant_rooms as $room): ?>
                <option value="<?php echo $room['room_number']; ?>"><?php echo $room['room_number']; ?></option>
            <?php endforeach; ?>
        </select><br/><br/>
        <label>Room Type</label>
        <input type="text" name="room_type" id="room_type"required readonly/><br/><br/>
        <label>Rate</label>
        <input type="text" name="rate" id="rate" required readonly/><label>(per day basis)</label><br/><br/>
        <input type="submit" name="submit"/><br/><br/>
    </form>
</div>
<div id="button7">
    <a href="rdashboard.html" class="btn7">Back</a>
</div>
</body>
</html>
