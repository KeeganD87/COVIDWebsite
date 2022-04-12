<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Covid Database Patient List</title>
		<meta charset="UTF-8">

		<link rel="stylesheet" href="style.css">
<style>
	li {
	font-family: Arial, sans-serif;
	font-size: 26px;
	color: #f2f2f2;
	margin: 5px;
}
h2 {
	font-size: 30px;
	font-family: "Arial Black";
	color: #f2f2f2;
}
</style>
</head>
<body>


<div class="topnav">
		<a class="active" href="covid.php">Home</a>
		<a href="vaccine.html">Record a Vaccination</a>
		<a href="about.php">About</a>
</div>

<div class="content">
<img src="vaccine4.jpg" alt="covid vaccine doses" class="center" height="400" width="1500">
<h2>Which patient's vaccination status would you like to see?</h2>

<?php
	include 'connectdb.php';
	$result = $connection->query("SELECT * FROM patient p JOIN vaccinelot v ON v.LotNumber = p.VaccineLotNum");
	echo "<ul>";
	while ($row = $result->fetch()) {
		echo "<li>";
		$name = $row["PatientName"];
		$OHIPnum = $row["PatientOHIPNum"];
		echo '<a href="existingPatient.php?OHIPnum='. $OHIPnum .'"> ' . $name . ''.'</a>'.'</li>';
	}
	echo "</ul>";
?>

</div>

</body>
</html>
