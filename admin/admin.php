<?php 
	session_start();
	if($_SESSION['vali'] == 1){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
	<?php include "admin_header.php" ?>
</head>
<body>
	
	<!-- Navbar -->
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
<main>
	<div class="container" id="show_admin">

	</div>
	</main>
	<?php include "../footer.php" ?>
	<?php }else{ echo "Youre not logged in.";} ?>
	
</body>
	<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="../js/my.js"></script>
		<script>
	
		function link_tools(id){
			window.location = "admin-info.php?id=" + id;
		}
		
		$(document).ready(function() { 
			$(".dropdown-trigger").dropdown();
			 $("#show_admin").load('php/get_admin_page.php');
		});
			
		function add_cam(){
			window.location.href = "add_cam.php";
		}
			
		function do_delete_cam(id){
		
		 $.ajax
			  ({
			  type:'post',
			  url:'php/cam_delete.php',
			  data:{
				  id: id
			  },
			  success:function(data) {
				  if(data == "ok"){
					  $("#show_admin").load('php/get_admin_page.php');
					 M.toast({html: 'Camera gelöscht!'})
					 }else{
						 alert(data);
					 }
			  },			
			  error:function() {
				  M.toast({html: 'Camera löschen fehlgeschlagen!'})
			  }
			  });
	}
	
	</script>
</html>