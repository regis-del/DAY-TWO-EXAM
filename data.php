<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "security_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $distance = $_POST['distance'];
    $status     = $_POST['status'];
    $image     = $_POST['image'];

    $sql = "INSERT INTO intrusion_events(image_path, distance, event_status) VALUES('$image', '$distance', '$status')";
    $result = $conn -> query($sql);
    if ($result === TRUE) {
        echo "data inserted successfully!";
  } 
else {
    echo "No data received.";
}
}
else{
    echo "Invalid HTTP method";
}
?>