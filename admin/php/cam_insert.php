<?php
	include_once "../../php/dbconfig.php";


	$ivnr = $_POST["ivnr"];
	$name = $_POST["name"];
	$marke = $_POST["marke"];
	$typ = $_POST["typ"];
	$afl = $_POST["afl"];
	$akl = $_POST["akl"];
	$spmed = $_POST["spmed"];
	$vsz = $_POST["vsz"];
	$iso = $_POST["iso"];
	$gw = $_POST["gw"];
	$dim = $_POST["dim"];

	$ins = "INSERT INTO `cameras`(`inr`, `name`, `marke`, `akkulaufzeit`, `Kameratyp`,`speicherkarte`, `afl`, `Verschlusszeiten`, `iso`, `Gewicht`, `dim`) VALUES ('$ivnr','$name','$marke','$akl','$typ','$spmed','$afl','$vsz','$iso','$gw','$dim')";

if ($link->query($ins) === TRUE) {
    echo "ok";
} else {
     echo "Error: " . $ins . "<br>" . $conn->error;
}

session_start();
$_SESSION["last_id"] =  $link->insert_id;

	
?>