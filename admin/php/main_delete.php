<?php 
	include "../../php/dbconfig.php";

	$id = $_POST["id"];

	$sql = "UPDATE `cameras` SET `bildlink`=0 WHERE id = '$id'";

	if ($conn->query($sql) === TRUE) {
		echo "ok";
	} else {
		echo "Error updating record: " . $conn->error;
	}
?>