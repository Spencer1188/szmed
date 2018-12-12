<?php
	session_start();	
$id_val = $_SESSION["last_id"];


if (isset($_FILES['datei']))
{
    move_uploaded_file($_FILES['datei']['tmp_name'], '../../images/videos/'.$_FILES['datei']['name']);
}

$filename = $_FILES['datei']['name'];

// Link in Datenbank schreiben

include "../../php/dbconfig.php";

$sql = "UPDATE `cameras` SET `videolink`='images/videos/$filename' WHERE id = '$id_val'";

if ($conn->query($sql) === TRUE) {
	echo "Erfolgreich Hochgeladen!";
} else {
    echo "Error updating record: " . $conn->error;
}



?>