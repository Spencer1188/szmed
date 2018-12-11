<?php

	include "../../php/dbconfig.php";

	$username = $_POST["username"];
	$pw = $_POST["pw"];

	function encrypt_password($password) {
        $password_hash = hash('sha256', $password);
		return $password_hash;
		}
	
		$password_hash = encrypt_password($pw);


		$regusr = mysqli_query($link,"SELECT * FROM `user` WHERE name = '$username'");
		$dbusr = mysqli_fetch_array($regusr);

	

		if($dbusr["pw"] == $password_hash){
			
			session_start();
			$_SESSION['vali'] = 1;
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $dbusr["id"];
			$_SESSION['gruppe'] = $dbusr["gruppe"];
			
			echo "ok";
					
	}
	else{ 
		
		session_start();
		$_SESSION['vali'] = 0;
		echo "error";
	}

?>