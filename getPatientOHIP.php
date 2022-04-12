<?php
   $result = $connection->query("SELECT * FROM patient p JOIN vaccinelot v ON v.LotNumber = p.VaccineLotNum");
   echo "<ul>";
   while($row = $result->fetch()) {
	   echo "<li>";
	   $name = $row["PatientName"];
	   $ohip = $row["PatientOHIPNum"];
	   echo "<a href='existingPatient.php?OHIPnum=<?php echo $ohip->PatientOHIPNum; ?>'><?php echo $name?></a>"."</li>";
   }
  echo "</ul>"
?>