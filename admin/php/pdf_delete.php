<?php 
	include "../../php/dbconfig.php";

	$id = $_POST["id"];

	$sql = "DELETE FROM `datenblatt` WHERE num = '$id'";

	if ($conn->query($sql) === TRUE) {
		echo "ok";
	} else {
		echo "Error updating record: " . $conn->error;
	}
?>