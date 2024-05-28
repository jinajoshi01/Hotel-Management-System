<?php
include("connection.php");

$id = $_GET['id'];

$sql = "DELETE FROM complaints WHERE ID = $id";

if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully.";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>