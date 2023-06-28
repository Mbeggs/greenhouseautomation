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
$userPassword = $_POST['pwd'];
$userIsValid = 0;
//lets ask database if these details are valid
$sql = "SELECT id, email, userPassword, deviceId FROM user_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

  while ($row = $result->fetch_assoc()) {
    if ($row['email'] == $userEmail && $row['userPassword'] == $userPassword) {
      //echo "id: " . $row["id"]. " - Email: " . $row["email"]. " " . $row["userPassword"]. "<br>";
      $deviceSerial = $row['deviceId'];
      $userIsValid = 1;
      // echo "$deviceSerial";
      //now lets open data in the respective ID
      //echo "below is database data <br>";
      $sql = "SELECT id, temperature, humidity, ph,time_stamp FROM $deviceSerial";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        $c = 0;
        // $dataPoints = array(array());
        while ($row = $result->fetch_assoc()) {
          $tempdata[$c] = array("y" => $row["temperature"], "label" => $row["time_stamp"]);
          $c++;
          //echo "id: ".$row["id"]."  Temp:" . $row["temperature"]." Humidity: " . $row["humidity"]. " pH: " . $row["ph"]." Time:".$row["time_stamp"]."<br>";
        }
      }
    } else {
      $userIsValid = 0;
      echo "error";
    }

  }
}

if ($userIsValid == 1) {
  echo "login success";
} else {
  echo "wrong username and password";
}

$conn->close();
?>

<!DOCTYPE HTML>
<html>

<head>
  <script>
    window.onload = function () {

      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "Temperature Data Log"
        },
        axisY: {
          title: "Temp in degrees"
        },
        data: [{
          type: "line",
          dataPoints: <?php echo json_encode($tempdata, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
    }
  </script>


  <!-- nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn -->

  <div class="text-center p-t-40">
    <a class="txt1" href="humidity.php">
      Humidity Graph
    </a>
  </div>
  <div class="text-center p-t-40">
    <a class="txt1" href="index.html">
      logout
    </a>
  </div>
  <!-- nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn -->
</head>

<body>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>