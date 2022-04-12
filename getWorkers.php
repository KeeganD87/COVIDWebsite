<?php
	$result = $connection->query("select * from healthcareworker");
	echo "<ol>";
	while ($row = $result->fetch()) {
		echo "<li>";
		echo $row["WorkerName"]." - ".$row["WorkerID"]."</li>";
	}
	echo "</ol>";
?>