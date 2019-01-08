
<?php 
session_start();	
$id_val = $_SESSION["last_id"];


  if($_SERVER['REQUEST_METHOD']=='POST'){
  $file = $_FILES['file']['tmp_name'];
  $name = $_FILES['file']['name'];
  $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
 
 
//Überprüfung der Dateiendung
$allowed_extensions = array('mp4', 'OGG', 'AVI');
if(!in_array($extension, $allowed_extensions)) {
 die("Ungültige Dateiendung. Nur mp4, OGG und AVI Dateien sind erlaubt");
}
	  
    move_uploaded_file($_FILES['file']['tmp_name'], '../../images/videos/'.$_FILES['file']['name']);
 }

$filename = $_FILES['file']['name'];

// Link in Datenbank schreiben
include "../../php/dbconfig.php";

$sql = "UPDATE `cameras` SET `videolink`='images/videos/$filename' WHERE id = '$id_val'";

if ($conn->query($sql) === TRUE) {
	echo "Erfolgreich Hochgeladen!";
} else {
    echo "Error updating record: " . $conn->error;
} 

?>