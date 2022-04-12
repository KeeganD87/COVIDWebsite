<?php
	include 'connectdb.php';

	$OHIPnum = $_POST["PatientOHIPNum"];


	$query='SELECT * FROM patient p WHERE p.PatientOHIPNum ="' . $OHIPnum . '"';


	$result=$connection->query($query);
	

	if($result->rowCount() > 0)
	{
		header("Location: existingPatient.php?OHIPnum=".$OHIPnum);
	}
	else
	{
		header("Location: addPatient.php?OHIPnum=".$OHIPnum);
	}
	echo "</ol>";
?>