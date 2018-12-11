<?php
	$id = $_POST["id"];

	include "../../php/dbconfig.php";
	$sql = "DELETE FROM cameras WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
		echo "ok";
	} else {
		echo "Error deleting record: " . $conn->error;
	}


?>