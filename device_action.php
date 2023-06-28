<?php
$servername = "localhost";
$username = "greenhouseData";
$password = "Mbeggs9497";
$dbname = "clientData";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//lets get device data
$temperature = $_GET['temperature'];
$humidity = $_GET['humidity'];
$deviceId = $_GET['deviceId'];
$pH = $_GET['pH'];


// if ($conn->query($sql) === TRUE) {
//   echo "Congradulations, you have registered ";
// } else {
//   echo '<br>Invalid Device ID: <br>'.$conn->error;

// }
$sql_insert = "INSERT INTO $deviceId (temperature,humidity,ph) VALUES ('$temperature','$humidity','$pH')";
//$sql = "INSERT INTO user_details (email, userPassword, deviceId) VALUES ('$email', '$pass', '$deviceId')";
// echo "$deviceId";
// mysqli_query ($sql_insert); 
if ($conn->query($sql_insert) === TRUE) {
  echo "  Your records are safe";
} else {
  echo "<br>Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>