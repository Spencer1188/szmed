<?php
	$id = $_POST["val"];

	include "../../php/dbconfig.php";
	$sql = "DELETE FROM user WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

	header("Location: ../user.php");

?>