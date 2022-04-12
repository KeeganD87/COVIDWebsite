<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Add New Patient Info</title>
    <link rel="stylesheet" href="style.css">
	<style>
label {
	font-size: 24px;
	font-family: Arial, sans-serif;
	color: #f2f2f2;
}
input {
	margin: 10px;
}
.enter {
	padding: 7px 15px;
	font-family: Arial, sans-serif;
	background-color: #3764b8;
	color: #f2f2f2;
	font-size: 20px;
}
h3 {
	font-size: 24px;
	font-family: Arial, sans-serif;
	color: #f2f2f2;
}
input {
	font-size: 20px;
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
    <a href="covid.php">Home</a>
    <a class="active" href="vaccine.html">Record a Vaccination</a>
    <a href="about.php">About</a>
</div>
<div class="content">
	<img src="vaccine2.jpg" alt="covid vaccine doses" class="center" height="270" width="1200">
	<h2>Hello new user! Please enter your information below.</h2>
	<?php $OHIPnum = $_GET['OHIPnum']; ?>
	
	<form method="POST" action="update.php">
	<label for="OHIPnum">OHIP Number:</label><br>
	<input type="text" id="OHIPnum" name="OHIPnum" value=<?php echo $OHIPnum?>><br>
	
	<h3>Where did you receive your most recent vaccine?</h3>
	
	<input type="radio" id="precinct" name="whichsite" value="99th Precinct">
	<label for="precinct">99th Precinct</label><br>
	<input type="radio" id="acc" name="whichsite" value="Ajax Community Centre">
	<label for="acc">Ajax Community Centre</label><br>
	<input type="radio" id="greendale" name="whichsite" value="Greendale Community College">
	<label for="greendale">Greendale Community College</label><br>
	<input type="radio" id="jesse" name="whichsite" value="Jesse's House">
	<label for="jesse">Jesse's House</label><br>
	<input type="radio" id="stirling" name="whichsite" value="Stirling Hall">
	<label for="stirling">Stirling Hall</label><br>
	<input type="radio" id="wonka" name="whichsite" value="Willy Wonka's Factory">
	<label for="wonka">Willy Wonka's Factory</label><br><br>
	
	<label for="VaccineLot">Please enter the lot number of the vaccine you received.</label><br>
	<input type="text" id="VaccineLot" name="VaccineLot"><br><br>
	
	<label for="name">Please enter your First and Last name.</label><br>
	<input type="text" id="name" name="name"><br><br>
	
	<label for="birthday">Please enter your Date of Birth</label><br>
	<input type="date" id="birthday" name="birthday"><br><br>
	
	<label for="DoseDateTime">Please enter the date and time that you received your most recent dose.</label><br>
	<input type="datetime-local" id="DoseDateTime" name="DoseDateTime"><br><br>
	
	<input class="enter" type="submit" value="Enter" size="1">
</form>
</div>
</body>
</html>