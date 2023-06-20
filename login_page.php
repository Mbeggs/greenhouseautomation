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
$userEmail = $_POST['email']; 
$userPassword =$_POST['pwd'];

//lets ask database if these details are valid
$sql = "SELECT id, email, userPassword, deviceId FROM user_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
    if($row['email'] ==$userEmail && $row['userPassword']==$userPassword)
    {
      echo "id: " . $row["id"]. " - Email: " . $row["email"]. " " . $row["userPassword"]. "<br>";
      $deviceSerial = $row['deviceId'];
      $userIsValid = 1;
      // echo "$deviceSerial";
      //now lets open data in the respective ID
      echo "below is database data <br>";
      $sql = "SELECT id, temperature, humidity, ph,time_stamp FROM $deviceSerial";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        
        while($row = $result->fetch_assoc()) {
          echo "id: ".$row["id"]."  Temp:" . $row["temperature"]." Humidity: " . $row["humidity"]. " pH: " . $row["ph"]." Time:".$row["time_stamp"]."<br>";
        }
      }
    }
    else{
    $userIsValid =0;
    }
    
  }
}
 else {
  echo "0 results";
}
if($userIsValid == 1)
{
  echo "login success";
}
else{
  echo "wrong username and password";
}
// $sql = "INSERT INTO users (user_name, user_pass)
// VALUES ('$name', '$pass')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

 
$conn->close();
?>
