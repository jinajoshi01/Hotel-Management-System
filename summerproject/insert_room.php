<!DOCTYPE html>
<html>
<head>
    <title>Insert room</title>
</head>
<body>
    <?php
   
    include("connection.php");

    
    $room_number = mysqli_real_escape_string($con, $_POST['room_number']);
    $room_type = mysqli_real_escape_string($con, $_POST['room_type']);
    $room_status = mysqli_real_escape_string($con, $_POST['room_status']);
    $occupancy = mysqli_real_escape_string($con, $_POST['occupancy']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);
    


    $sql = "INSERT INTO room_management (room_number, room_type, room_status, occupancy,rate)
            VALUES
            ('$room_number', '$room_type', '$room_status', '$occupancy',$rate)";

   
    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Room inserted successfully!"); window.location.href = "roommanagement.php";</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }

   
    mysqli_close($con);
    ?>

    
</body>
</html>