<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reset Password</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data";
$userIsValid = false;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$userEmail = $_POST['email']; 

//lets ask database if these details are valid
$sql = "SELECT id, email, userPassword, deviceId FROM user_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
    if($row['email'] ==$userEmail)
    {
      $userIsValid = true;
    }
    else{
       
    }
    
  }
}
 else {
  echo "0 results";
}
if($userIsValid == 1)
{
    echo "<script>alert('jjj');</script>";
    
    header("Location: index.html");
    exit();
}
else{
    echo " email not registered with us";
}

$conn->close();
?>

</body>
</html>
