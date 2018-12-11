<?php
	
	include "../../php/dbconfig.php";
	$id = $_POST["id"];
	$name = $_POST["usr"];
	$gruppe = $_POST["group"];


	
	$sql = "UPDATE user SET name='$name',Gruppe='$gruppe' WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

?>