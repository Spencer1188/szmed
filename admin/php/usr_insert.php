<?php 

	include "../../php/dbconfig.php";

	$name = $_POST["usr"];
	$gruppe = $_POST["group"];
	$pw = $_POST["password"];

	$pw_hash = hash('sha256', $pw);

$sql = "INSERT INTO user (name, gruppe, pw)
VALUES ('$name', '$gruppe', '$pw_hash')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>