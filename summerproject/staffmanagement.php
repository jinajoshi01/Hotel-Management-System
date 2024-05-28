<!DOCTYPE html>
<html>
<head>
<title>staff management</title>
<link rel="stylesheet" type="text/css" href="staffmanagement.css"/>
		<link rel="stylesheet" type="text/css" href="css/all.min.css"/>
</head>
<body>
    <h1>ADD NEW STAFFS</h1>
<link rel="stylesheet" type="text/css" href="staffmanagement.css"/>
<form action="insert_staff.php" method="post">
    <label for="emp_id">Employee ID:</label><br>
    <input type="number" id="emp_id" name="emp_id"required autocomplete="off"><br>
    <label for="emp_name">Employee Name:</label><br>
    <input type="text" id="emp_name" name="emp_name"required autocomplete="off"><br>
    <label for="staff_type">Staff Type:</label><br>
    <input type="text" id="staff_type" name="staff_type"required autocomplete="off"><br>
    <label for="shift_timing">Shift Timing:</label><br>
    <input type="text" id="shift_timing" name="shift_timing"required autocomplete="off"><br>
    <label for="joining_date">Joining Date:</label><br>
    <input type="date" id="joining_date" name="joining_date"required autocomplete="off"><br>
    <label for="salary">Salary:</label><br>
    <input type="number" id="salary" name="salary"required autocomplete="off"><br>
    <input type="submit" value="Submit">
    
</form>
<a id="back-button" class="btn btn-primary" href="adashboard.html">Back</a>
</body>
</html>

<?php
  
include("connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id=$_POST['ID'];
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $staff_type = $_POST['staff_type'];
    $shift_timing = $_POST['shift_timing'];
    $joining_date = $_POST['joining_date'];
    $salary = $_POST['salary'];


    if (!empty($emp_id) && !empty($emp_name) && !empty($staff_type) && !empty($shift_timing) && !empty($joining_date) && !empty($salary)) {
    
        $sql = "INSERT INTO staff_management (emp_id, emp_name, staff_type, shift_timing, joining_date, salary)
        VALUES
            ('$emp_id', '$emp_name', '$staff_type', '$shift_timing', '$joining_date', '$salary')";

        
        if (mysqli_query($con, $sql)) {
            
            echo "New record created successfully";
        } else {
            
            echo "Error: " . mysqli_error($con);
        }
    } else {
        
        echo "Please fill out all required fields.";
    }
} 


mysqli_close($con);
?>

<?php

include("connection.php");


$query = "SELECT * FROM staff_management";
$result = mysqli_query($con, $query);


if ($result) {
    
    if (mysqli_num_rows($result) > 0) {
        
        echo "<table>";
        echo "<tr><th>ID</th><th>emp_id</th>
        <th>emp_name</th>
        <th>staff_type</th>
        <th>shift_timing</th>
        <th>joining_date</th>
        <th>salary</th>
        </tr>";

        
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['emp_id'] . "</td>";
            echo "<td>" . $row['emp_name'] . "</td>";
            echo "<td>" . $row['staff_type'] . "</td>";
            echo "<td>" . $row['shift_timing'] . "</td>";
            echo "<td>" . $row['joining_date'] . "</td>";
            echo "<td>" . $row['salary'] . "</td>";
            echo "<td><a href='edit_staff.php?id=" . $row['emp_id'] . "'>Edit</a> | <a href='delete_staff.php?id=" . $row['emp_id'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        
        echo "</table>";
    } else {
        
        echo "No data found.";
    }

    
    mysqli_free_result($result);
} else {
    
    echo "Error: " . mysqli_error($con);
}


mysqli_close($con);
?>




