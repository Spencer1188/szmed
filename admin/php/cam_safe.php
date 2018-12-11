<?php
	include_once "../../php/dbconfig.php";

	$id = $_POST["id"];
	$ivnr = $_POST["ivnr"];
	$name = $_POST["name"];
	$marke = $_POST["marke"];
	$bes = $_POST["bes"];
	$typ = $_POST["typ"];
	$afl = $_POST["afl"];
	$akl = $_POST["akl"];
	$spmed = $_POST["spmed"];
	$vsz = $_POST["vsz"];
	$iso = $_POST["iso"];
	$gw = $_POST["gw"];
	$dim = $_POST["dim"];

	$ins = "UPDATE `cameras` SET `inr`='$ivnr',`name`='$name',`beschreibung`='$bes',`marke`='$marke',`akkulaufzeit`='$akl',`Kameratyp`='$typ',`afl`='$afl',`Verschlusszeiten`='$vsz',`iso`='$iso',`Gewicht`='$gw'
	,`dim`='$dim' WHERE id = '$id'";

if ($conn->query($ins) === TRUE) {
    echo "ok";
} else {
     echo "Error: " . $ins . "<br>" . $conn->error;
}

	
?>