<!DOCTYPE html>
<html>
<head>
    <title>Insert Staff</title>
</head>
<body>
    <?php
    // Include database connection file
    include("connection.php");

    // Get form data
    $emp_id = mysqli_real_escape_string($con, $_POST['emp_id']);
    $emp_name = mysqli_real_escape_string($con, $_POST['emp_name']);
    $staff_type = mysqli_real_escape_string($con, $_POST['staff_type']);
    $shift_timing = mysqli_real_escape_string($con, $_POST['shift_timing']);
    $joining_date = mysqli_real_escape_string($con, $_POST['joining_date']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);

    // SQL query to add data to the staff_management table
    $sql = "INSERT INTO staff_management (emp_id, emp_name, staff_type, shift_timing, joining_date, salary)
            VALUES
            ('$emp_id', '$emp_name', '$staff_type', '$shift_timing', '$joining_date', '$salary')";

    // Check if the query was successful
    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Staff record successfully!"); window.location.href = "staffmanagement.php";</script>';
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close database connection
    mysqli_close($con);
    ?>

    <br><br>
    <a href="staffmanagement.php">Back to Staff Management</a>
</body>
</html>