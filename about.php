<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>About</title>
    <link rel="stylesheet" href="style.css">
	<style>
h3 {
	font-size: 30px;
	font-family: Arial, sans-serif;
	color: #f2f2f2;
	padding: 10px 15px;
}
h2 {
	font-size: 36px;
	font-family: Arial, sans-serif;
	color: #f2f2f2;
	padding: 10px 15px;
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

<div class="topnav">
    <a href="covid.php">Home</a>
    <a href="vaccine.html">Record a Vaccination</a>
    <a class="active" href="about.php">About</a>
</div>

<div class="content">
<?php
	include 'connectdb.php';
?>
<img src="vaccine5.png" alt="covid vaccine doses" class="center" height="500" width="1500">
<h1 style="text-align:center;">About Us</h1>
<h3 style="text-align:center;">This is a multi-functional website which allows you to see a list of patients and view their corresponding vaccination status. <br>
You are also able to record a vaccination of your own and will be included within the database with the other patients.
<br>If you would like, you are able to check the different types of vaccines, and it will tell you where those types are available<br>
to be administered. You may also see a list of healthcare workers that work at each vaccination site.</h3>

<h2 style="text-align: center;">Below is a list of vaccine types that exist. Select one to see its availability.</h2>
<div class="tab">
	<button class="tablinks" onclick="openBrand(event, 'Astrazeneca')">Astrazeneca</button><br>
	<button class="tablinks" onclick="openBrand(event, 'Johnson')">Johnson & Johnson</button><br>
	<button class="tablinks" onclick="openBrand(event, 'Moderna')">Moderna</button><br>
	<button class="tablinks" onclick="openBrand(event, 'Pfizer')">Pfizer</button><br>
</div>
	
	<div id="Astrazeneca" class="tabcontent">
		<p> The sites where Astrazeneca is available are shown below. </p>
		<?php
			$result = $connection->query("select * from vaccinelot v WHERE v.CompanyName = 'Astrazeneca'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["ShippedToSite"]." - ".$row["NumDoses"]." doses are available at this site"."</li>";
			}
			echo "</ul>";
		?>
	</div>
	
	<div id="Johnson" class="tabcontent">
		<p> The sites where Johnson & Johnson is available are shown below. </p>
		<?php
			$result = $connection->query("select * from vaccinelot v WHERE v.CompanyName = 'Johnson&Johnson'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["ShippedToSite"]." - ".$row["NumDoses"]." doses are available at this site"."</li>";
			}
			echo "</ul>";
		?>
	</div>
	
	<div id="Moderna" class="tabcontent">
		<p> The sites where Moderna is available are shown below. </p>
		<?php
			$result = $connection->query("select * from vaccinelot v WHERE v.CompanyName = 'Moderna'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["ShippedToSite"]." - ".$row["NumDoses"]." doses are available at this site"."</li>";
			}
			echo "</ul>";
		?>
	</div>
	
	<div id="Pfizer" class="tabcontent">
		<p> The sites where Pfizer is available are shown below. </p>
		<?php
			$result = $connection->query("select * from vaccinelot v WHERE v.CompanyName = 'Pfizer'");
			echo "<ul>";
			while ($row = $result->fetch()) {
				echo "<li>";
				echo $row["ShippedToSite"]." - ".$row["NumDoses"]." doses are available at this site"."</li>";
			}
			echo "</ul>";
		?>
	</div>
	
	<script>
	function openBrand(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";		
	}
	</script>	
</div>

</body>
</html>