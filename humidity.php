





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
<!-- nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn -->
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>