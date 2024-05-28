<style>
table {
    position: relative;
    top:48px;
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: green;
  color:white;
}

tr:hover {background-color: #f5f5f5;}
#back-button {
  position: fixed;
  bottom: 693px;
  left: 1328px;
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}
</style>
<a id="back-button" class="btn btn-primary" href="adashboard.html">Back</a>
<?php
include("connection.php");

$sql = "SELECT id, complaints FROM complaints";
$result = $con->query($sql);


if ($result->num_rows > 0) {
    
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Complaints</th>
            </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["complaints"]. "</td></tr>";
        echo "<td><a href='delete_complaints.php?id=" . $row['id'] . "'>Delete</a></td>";
    }
    echo "</table>";
} else {
 
    echo "<p>0 results</p>";
}
$con->close();
?>
