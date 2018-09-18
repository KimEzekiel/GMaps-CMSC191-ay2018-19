<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "googlemaps";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
$sql = "SELECT * FROM markers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $emparray[] = json_encode($row);
    }
    echo json_encode($emparray);
} else {
    echo "0 results";
}
$conn->close();

?>
