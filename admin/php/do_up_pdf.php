<?php
	session_start();	
$id_val = $_SESSION["last_id"];
$upload_folder = '../../datenblatt/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
 
 
//Überprüfung der Dateiendung
$allowed_extensions = array('pdf', 'docx', 'txt', 'ppt');
if(!in_array($extension, $allowed_extensions)) {
 die("Ungültige Dateiendung. Nur pdf und docx-Dateien sind erlaubt");
}
 
//Überprüfung der Dateigröße
$max_size = 4000*1024; //500 KB
if($_FILES['file']['size'] > $max_size) {
 die("Bitte keine Dateien größer 10MB hochladen");
}
 
//Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;
 
//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
 $id = 1;
 do {
 $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
 $id++;
 } while(file_exists($new_path));
}
 
//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['file']['tmp_name'], $new_path);


// Link in Datenbank schreiben

include "../../php/dbconfig.php";

$sql = "INSERT INTO `datenblatt`(`id`, `filename`, `pdf_link`) VALUES ('$id_val','$filename','datenblatt/$filename')";

if ($conn->query($sql) === TRUE) {
	echo "Erfolgreich Hochgeladen!";
} else {
    echo "Error updating record: " . $conn->error;
}



?>