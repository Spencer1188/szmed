<?php 
session_start();
$_SESSION["val"] = 0; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
<?php include "admin_header.php" ?>
</head>
<body>
	
		<!-- Navbar -->
			  <nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo center"><img src="../images/logo/Unbenannt-2.png" alt="logo" width="30%"></img></a>
					<ul style="margin-left: 20px;">
				  		<li>Admin Page</li>
						<li class="right" style="margin-right: 40px;"><a href="admin.php">Abbrechen</a></li>
				  	</ul>
				</div>
			  </nav>
	
	<!-- Headerr -->
	<div class="container" style="margin-top: 40px">
		
	<div class="row">
		<div class="col s4">
			<h6>Allgemeine Information</h6>
		</div>
		<div class="col s4">
			<h6>Media</h6>
		</div>
		<div class="col s4">
			<h6>Fertigstellen</h6>
		</div>
	</div>
	<div class="row">
	  <div class="progress s12 col center">
		  <div class="determinate" style="width: 25%" id="fort"></div>
	  </div>
	</div>
	</div>
	<div class="container center" style="margin-top: 50px;" id="pre-loader">

	
	</div>
	
	
	<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="../js/my.js"></script>
	<script language="javascript" type="text/javascript" src="js/upload.js"></script>

	<script>
		
		$(document).ready(function(){	 
			$("#upload_one").addClass("hidden");
			$("#pre-loader").load('php/get_cam_ins.php');
		  });
		
		$( "#path" ).change(function() {
  			$("#upload_one").removeClass("hidden");
		});

		
		function insert(){
			do_insert_cam();
			
			$('#fort').css({'width': '70%'});
			
		}

</script>
</body>
</html>