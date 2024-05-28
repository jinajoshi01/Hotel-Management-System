<?php
include("connection.php");

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    // Fetch staff details based on emp_id
    $query = "SELECT * FROM staff_management WHERE emp_id = '$emp_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $emp_name = $row['emp_name'];
        $staff_type = $row['staff_type'];
        $shift_timing = $row['shift_timing'];
        $joining_date = $row['joining_date'];
        $salary = $row['salary'];
    } else {
        echo "Staff not found.";
        exit;
    }
} else {
    echo "No employee ID provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $staff_type = $_POST['staff_type'];
    $shift_timing = $_POST['shift_timing'];
    $joining_date = $_POST['joining_date'];
    $salary = $_POST['salary'];

    if (!empty($emp_id) && !empty($emp_name) && !empty($staff_type) && !empty($shift_timing) && !empty($joining_date) && !empty($salary)) {
        // Update the staff details in the database
        $sql = "UPDATE staff_management SET emp_name='$emp_name', staff_type='$staff_type', shift_timing='$shift_timing', joining_date='$joining_date', salary='$salary' WHERE emp_id='$emp_id'";

        if (mysqli_query($con, $sql)) {
            echo '<script>alert("Staff details updated successfully!"); window.location.href = "staffmanagement.php";</script>';
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Please fill out all required fields.";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Staff Details</title>
    <link rel="stylesheet" type="text/css" href="staffmanagement.css"/>
</head>
<body>
    <h1>Edit Staff Details</h1>
    <form action="edit_staff.php?id=<?php echo $emp_id; ?>" method="post">
        <label for="emp_id">Employee ID:</label><br>
        <input type="text" id="emp_id" name="emp_id" value="<?php echo $emp_id; ?>" readonly><br>
        <label for="emp_name">Employee Name:</label><br>
        <input type="text" id="emp_name" name="emp_name" value="<?php echo $emp_name; ?>"><br>
        <label for="staff_type">Staff Type:</label><br>
        <input type="text" id="staff_type" name="staff_type" value="<?php echo $staff_type; ?>"><br>
        <label for="shift_timing">Shift Timing:</label><br>
        <input type="text" id="shift_timing" name="shift_timing" value="<?php echo $shift_timing; ?>"><br>
        <label for="joining_date">Joining Date:</label><br>
        <input type="date" id="joining_date" name="joining_date" value="<?php echo $joining_date; ?>"><br>
        <label for="salary">Salary:</label><br>
        <input type="number" id="salary" name="salary" value="<?php echo $salary; ?>"><br>
        <input type="submit" value="Update">
    </form>
    <a id="back-button" class="btn btn-primary" href="staffmanagement.php">Back</a>
</body>
</html>
