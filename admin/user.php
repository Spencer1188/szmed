<?php 
	session_start();
	if($_SESSION['vali'] == 1){
		include "../php/dbconfig.php"; 
		!mysqli_set_charset($link, "utf8");
		$select_usr = "SELECT * FROM user";
		$result_usr = $conn->query($select_usr);
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
	<?php include "admin_header.php" ?>
</head>
<body>
	<header>
		<ul id="dropdown1" class="dropdown-content">
		  <li><a href="user.php">Benutzer</a></li>
		  <li><a href="admin.php">Kameras</a></li>
		</ul>
	  <nav>
		<div class="nav-wrapper blue lighten-2">
		  <a href="#" class="brand-logo center hide-on-small-and-down"><img src="../images/logo/Unbenannt-2.png" alt="logo" class="responsive-img logo-img"></img></a>
		  <ul id="nav-mobile" class="left">
			<li style="margin-left: 20px; margin-right: 10px;"><b>Admin Page</b></li>
			<li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Verwaltung<i class="material-icons right">arrow_drop_down</i></a></li>
		  </ul>
		  <ul class="right">
		 	 <li class="right"><a href="php/logout.php"><i class="material-icons right">exit_to_app</i>Logout</a></li>
		  </ul>
		</div>
	  </nav>
	</header>
	<main id="user_show">
		
	</main>
	<?php include "modal.php" ?>
	<?php include "modal_reset_pw.php" ?>
	<?php include "../footer.php" ?>
	
	<?php }else{ echo "Youre not logged in.";} ?>
</body>
	<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="../js/my.js"></script>
<script>

 		$(document).ready(function() { 
			$("#user_show").load('php/get_user.php');
		});
		
		function edit(id){
			$("#"+id).load('php/get_user_edit.php?id=' + id);
			$("#icon"+id).text("done");
			$('select').formSelect();
		}
		function set_modal_id(id){
			$(".prrs").attr("id",id);
		}


</script>
</html>