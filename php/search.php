<?php

	include "dbconfig.php";
	
	$sql = "select name from cameras";
	$result = $conn->query($sql);
	$array = array();
	$i = 0;

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$array[$i]["id"] = $row["name"];
			$i++;
		}
		
	}

	echo json_encode($array);
				
	

	

?>