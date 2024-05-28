<?php
include("connection.php");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

if(isset($_POST['submit'])){
  $complaints = $_POST['complaints'];

 
  $stmt = $con->prepare("INSERT INTO complaints (complaints) VALUES (?)");
  $stmt->bind_param("s", $complaints);

  if ($stmt->execute()) {
            
    echo '<script>alert("complaint register successful!"); window.location.href = "complaints.html";</script>';
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
$con->close();
?>




