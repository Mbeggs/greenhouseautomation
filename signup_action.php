<?php
$servername = "localhost";
$username = "greenhouseData";
$password = "Mbeggs9497";
$dbname = "clientData";
$email_already_used = false;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//lets get new user data
$email = $_POST['email'];
$pass = $_POST['pwd'];
$deviceId = $_POST['deviceId'];
//lets check if there is no email and device id already registerd. 
//checking email
$sql = "SELECT id, email, userPassword, deviceId FROM user_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

  while ($row = $result->fetch_assoc()) {
    if ($row['email'] == $email) {
      $email_already_used = true;
    }
  }
}
if (!$email_already_used) {
  $sql = "CREATE TABLE $deviceId (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    temperature VARCHAR(30) NOT NULL,
    humidity VARCHAR(30) NOT NULL,
    ph VARCHAR(50),
    time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";



  if ($conn->query($sql) === TRUE) {
    echo "Congradulations, you have registered ";
  } else {
    echo '<br>Invalid Device ID: <br>' . $conn->error;

  }
  $sql = "INSERT INTO user_details (email, userPassword, deviceId)
VALUES ('$email', '$pass', '$deviceId')";

  if ($conn->query($sql) === TRUE) {
    echo "  Your records are safe";
    // lets redirect our user to login page, or lets login for the user. 
  } else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error . "<br>";
    echo "System error, if you continue have this problem contact technical team on technical@greenhouseautomation.co.zw";
    // lets
  }
} else {
  echo "Email $email is already taken";
}



$conn->close();
?>