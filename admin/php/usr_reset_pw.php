<?php
	$newpw1 = $_POST["newpw1"];
	$newpw2 = $_POST["newpw2"];
	$id = $_POST["id"];
	
	include "../../php/dbconfig.php";
	
	
	if($newpw1 == $newpw2){
		$pw_hash = hash('sha256', $newpw1);
		$sql = "UPDATE user SET pw='$pw_hash' WHERE id=$id";
		if ($conn->query($sql) === TRUE) {
			echo "ok";
		} else {
			echo "Error updating record: " . $conn->error;
		}	
	}else{
		echo "ng";
	}
?>