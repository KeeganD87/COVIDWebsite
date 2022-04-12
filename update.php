<?php
include 'connectdb.php';

$sitename = $_POST['whichsite'];
$OHIP = $_POST['OHIPnum'];
$lotNum = $_POST['VaccineLot'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$DoseDateTime = $_POST['DoseDateTime'];



$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'coviddb';


$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);


$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $pass, $options);


$query='SELECT * FROM vaccinelot v WHERE v.LotNumber ="' . $lotNum . '"';

$result=$connection->query($query);

if($result->rowCount() == 0)
{
	
	$sql = "INSERT INTO `vaccinelot`(`ProductionDate`, `ExpiryDate`, `LotNumber`, `NumDoses`, `CompanyName`, `ShippedToSite`) VALUES (null, null, :LotNumber, null, null, :ShippedToSite)";

	
	$statement = $pdo->prepare($sql);


	
	$statement->bindValue(':LotNumber', $lotNum);
	$statement->bindValue(':ShippedToSite', $sitename);


	
	$inserted = $statement->execute();


	
	if($inserted){
		//echo 'Row inserted!<br>';
	}
}




$sql = "INSERT INTO `patient`(`PatientOHIPNum`, `PatientName`, `DateOfBirth`, `VaccinatedAt`, `DoseNum`, `VaccineLotNum`, `VaccinationSiteName`) 
VALUES (:PatientOHIPNum, :PatientName, :DateOfBirth, :VaccinatedAt, 1,:VaccineLotNum, :VaccinationSiteName)";


$statement = $pdo->prepare($sql);



$statement->bindValue(':PatientOHIPNum', $OHIP);
$statement->bindValue(':VaccineLotNum', $lotNum);
$statement->bindValue(':PatientName', $name);
$statement->bindValue(':DateOfBirth', $birthday);
$statement->bindValue(':VaccinatedAt', $DoseDateTime);
$statement->bindValue(':VaccinationSiteName', $sitename);



$inserted = $statement->execute();



if($inserted){
    //echo 'Row inserted!<br>';
}

?>
<h1>Updating your vaccine record...</h1>
<?php	
	$query='SELECT * FROM patient p WHERE p.PatientOHIPNum ="' . $OHIP . '"';
	$result=$connection->query($query);
	
	if($result->rowCount() > 0)
	{
		header("Location: existingPatient.php?OHIPnum=".$OHIP);
	}
	
?>