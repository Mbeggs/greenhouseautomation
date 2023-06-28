<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head> 
<body>

<div class="container">
  <h2>Greenhouse data update</h2>
  <form action="device_action.php" method = "GET">
    <div class="form-group">
      <label for="temperature">Temp:</label>
      <input type="text" class="form-control" id="temperature" name = "temperature">
    </div>
    <div class="form-group">
      <label for="humidity">Hum:</label>
      <input type="text" class="form-control" id="humidity" name ="humidity">
    </div>
    <div class="form-group">
      <label for="pH">pH:</label>
      <input type="text" class="form-control" id="pH" name = "pH">
    </div>
    <div class="form-group">
      <label for="deviceId">ID:</label>
      <input type="text" class="form-control" id="deviceId" name = "deviceId">
    </div>
    
   
    <button type="submit" class="btn btn-default">submit</button>
  </form>


 
</div>

</body>
</html>
