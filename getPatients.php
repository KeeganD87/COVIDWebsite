<?php
$result = $connection->query("select * from patient");
echo "<ol>";
while ($row = $result->fetch()) {
	echo "<li>";
	echo $row["PatientOHIPNum"]."</li>";
}
echo "</ol>";
?>