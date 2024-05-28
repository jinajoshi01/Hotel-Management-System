<?php
include("connection.php");

$id = $_POST['ID'];
$emp_id = $_POST['emp_id'];
$emp_name = $_POST['emp_name'];
$staff_type = $_POST['staff_type'];
$shift_timing = $_POST['shift_timing'];
$joining_date = $_POST['joining_date'];
$salary = $_POST['salary'];

if (!empty($emp_id) && !empty($emp_name) && !empty($staff_type) && !empty($shift_timing) && !empty($joining_date) && !empty($salary)) {
    $sql = "UPDATE staff_management SET emp_id = '$emp_id', emp_name = '$emp_name', staff_type = '$staff_type', shift_timing = '$shift_timing', joining_date = '$joining_date', salary = '$salary' WHERE ID = $id";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("staff updated successfully!"); window.location.href ="edit_staff.php?id=' . $row['ID'] . '";</script>';
    } 
    else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Please fill out all required fields.";
}
mysqli_close($con);
?>