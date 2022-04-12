<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Covid Database Add New Patient</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<style>
.tg  {
	border-collapse: collapse;
	border-spacing: 0;
	margin-left: auto;
	margin-right: auto;
}
.tg td {
	border-color: black;
	border-style: solid;
	border-width: 1px;font-family:"Arial Black";
	font-size: 20px;
	overflow: hidden;
	padding: 20px 20px;
	word-break: normal;
	background-color: #f2f2f2;
}
.tg th {
	border-color: black;
	border-style: solid;
	border-width: 1px;
	font-family: "Arial Black";
	font-size: 24px;
	font-weight: normal;
	overflow: hidden;padding:20px 20px;
	word-break: normal;
	color: white;
	background-color: #3764b8;
}
.tg .tg-0lax {
	text-align: center;
	vertical-align: top
}
h3 {
	font-size: 30px;
	font-family: "Arial Black";
	color: #f2f2f2;
}
h2 {
	font-size: 36px;
	font-family: "Arial Black";
	color: #f2f2f2;
}
.goback {
	font-size: 30px;
	font-family: "Arial Black";
	color: #3764b8;
	padding: 20px 10px;
	display: flex;
	justify-content: center;
}
</style>
	</head>
	<body>
	<div class="topnav">
		<a href="covid.php">Home</a>
		<a class="active" href="vaccine.html">Record a Vaccination</a>
		<a href="about.php">About</a>
	</div>
	
	<div class="content">
		<?php	
	include "connectdb.php";
	
	$OHIPnum = $_GET["OHIPnum"];
	
	$query='SELECT * FROM patient p WHERE p.PatientOHIPNum ="' . $OHIPnum . '"';
	$result=$connection->query($query);
	
	if($result->rowCount() > 0)
	{
		$query2 = 'SELECT * FROM patient p JOIN vaccinelot v ON p.VaccineLotNum = v.LotNumber WHERE p.PatientOHIPNum = "' . $OHIPnum . '"';
		$result = $connection->query($query2);
		while ($row = $result->fetch()) {
			$doses=$row["DoseNum"];
			$lotnum = $row["VaccineLotNum"];
			$site = $row["ShippedToSite"];
			$name = $row["PatientName"];
		}
	}
	
?>
	<img src="welcome.jpg" alt="covid vaccine doses" class="center" width="1500" height="360">
	<h2 style="text-align: center;">Hello <?php echo $name?>!</h2>
	<h3 style="text-align: center;">Your information is shown below.</h3>
	<table class="tg">
	<thead>
		<tr>
			<th class="tg-01ax">OHIP Number</th>
			<th class="tg-01ax">Vaccine Lot Number</th>
			<th class="tg-01ax">Site Received at</th>
			<th class="tg-01ax">Dose Number</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="tg-0lax"><?php echo $OHIPnum?></td>
			<td class="tg-0lax"><?php echo $lotnum?></td>
			<td class="tg-0lax"><?php echo $site?></td>
			<td class="tg-0lax"><?php echo $doses?></td>
		</tr>
	</tbody>
	</table>
	
	<br><br><br><br>
	<a class="goback" href="PatientDB.php">Click here to go back to the patient list</a>
	</div>
	</body>
</html>