<!DOCTYPE html>
<head>
	<title>Covid Database Homepage</title>
	<link rel="stylesheet" href="style.css">
		<style>
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
.patients {
	font-size: 30px;
	font-family: "Arial Black";
	color: #3764b8;
	padding: 20px 10px;
	display: flex;
	justify-content: center;
}
.tablinks {
	font-size: 24px;
	font-family: Arial, sans-serif;
	background-color: #3764b8;
	color: #f2f2f2;
	border-color: red;
	padding: 10px;
	margin: 5px;
}
p {
	font-family: Arial, sans-serif;
	font-size: 26px;
	color: #f2f2f2;
}
li {
	font-family: Arial, sans-serif;
	font-size: 26px;
	color: #f2f2f2;
}

.tab button:hover {
  background-color: white;
  color: black;
}

.tab button.active {
  background-color: red;
}

.tabcontent {
  display: none;
  padding: 10px 15px;
  border: 3px solid #3764b8;
  width: 15%;
  margin: auto;
  background-color: red;
  text-align: center;
  
}

.link {
	font-size: 24px;
	font-family: "Arial Black";
	color: #3764b8;
	display: flex;
	justify-content: center;
}
.tab {
	display: flex;
	justify-content: center;
}
</style>
</head>

<body>
<?php
	include 'connectdb.php';
?>
	<div class="topnav">
		<a class="active" href="covid.php">Home</a>
		<a href="vaccine.html">Record a Vaccination</a>
		<a href="about.php">About</a>
	</div>
<div class="content">
	<img src="vaccine-pic.jpg" alt="covid vaccine doses" class="center">
	<h1 style="text-align: center;">Welcome to the COVID-19 Vaccine Database!</h1>
	<h2 class="welcome" style="text-align: center;">Click on a vaccination site to see a list of their lovely healthcare workers!</h2>
	
	<div class="tab">
		<button class="tablinks" onclick="openSite(event, 'precinct')">99th Precinct</button><br>
		<button class="tablinks" onclick="openSite(event, 'acc')">Ajax Community Centre</button><br>
		<button class="tablinks" onclick="openSite(event, 'greendale')">Greendale Community College</button><br>
		<button class="tablinks" onclick="openSite(event, 'jesse')">Jesse's House</button><br>
		<button class="tablinks" onclick="openSite(event, 'stirling')">Stirling Hall</button><br>
		<button class="tablinks" onclick="openSite(event, 'wonka')">Willy Wonka's Factory</button><br>
	</div>
	
	<div id="precinct" class="tabcontent">
		<p> Below are the workers who work at the 99th Precinct.</p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.VaccinationSiteName = '99th Precinct'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["WorkerName"]." - ".$row["Profession"]."</li>";
			}
			echo "</ul>";
		?>
		
		
	</div>
	
	<div id="acc" class="tabcontent">
		<p> Below are the workers who work at Ajax Community Centre.</p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.VaccinationSiteName = 'Ajax Community Centre'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["WorkerName"]." - ".$row["Profession"]."</li>";
			}
			echo "</ul>";
		?>
		
		
	</div>
	
	<div id="greendale" class="tabcontent">
		<p> Below are the workers who work at Greendale Community College.</p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.VaccinationSiteName = 'Greendale Community College'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["WorkerName"]." - ".$row["Profession"]."</li>";
			}
			echo "</ul>";
		?>
		
		
	</div>
	
	<div id="jesse" class="tabcontent">
		<p> Below are the workers who work at Jesse's House.</p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.VaccinationSiteName = 'Jesse\'s House'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["WorkerName"]." - ".$row["Profession"]."</li>";
			}
			echo "</ul>";
		?>
		
		
	</div>
	
	<div id="stirling" class="tabcontent">
		<p> Below are the workers who work at Stirling Hall.</p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.VaccinationSiteName = 'Stirling Hall'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["WorkerName"]." - ".$row["Profession"]."</li>";
			}
			echo "</ul>";
		?>
		
		
	</div>
	
	<div id="wonka" class="tabcontent">
		<p> Below are the workers who work at Willy Wonka's Factory.</p>
		<?php
			$result = $connection->query("select * from healthcareworker h WHERE h.VaccinationSiteName = 'Willy Wonka\'s Factory'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["WorkerName"]." - ".$row["Profession"]."</li>";
			}
			echo "</ul>";
		?>
		
		
	</div>
	

	<br><br><br><a class="patients" href="PatientDB.php">Click here to see a list of our existing patients</a>
	
	<br><br><br><br><br><br>
	<h3 style="text-align: center;">If you would like to learn more about COVID-19 and the COVID-19 vaccine, click on the link below.</h2>
	<a class="link" href="https://www.canada.ca/en/public-health/services/diseases/coronavirus-disease-covid-19.html" target="_blank">Learn More</a><br><br><br>

<script>
	function openSite(evt, siteName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(siteName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
	</script>
</div>
</body>
</html>