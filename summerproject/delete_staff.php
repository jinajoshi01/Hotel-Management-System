<?php
include("connection.php");

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

   
    $query = "DELETE FROM staff_management WHERE emp_id = '$emp_id'";
    if (mysqli_query($con, $query)) {
        echo '<script>alert("Staff record deleted successfully!"); window.location.href = "staffmanagement.php";</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No employee ID provided.";
}

mysqli_close($con);
?>
