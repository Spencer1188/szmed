<!doctype html>
<?php
	$id = $_GET["id"];
	
	include "php/dbconfig.php";
	$sql_dt = "SELECT * FROM `datenblatt` WHERE id=$id";
	$sql_bilder = "SELECT distinct * FROM `bilder` WHERE id = $id";
	$result_cam = $link->query("SELECT * FROM cameras where id=$id");

	$result_pic = $conn->query($sql_bilder);
	$result_dt = $conn->query($sql_dt);
	$cam = $result_cam->fetch_assoc();

?>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
	<?php include "main_header.php" ?>
</head>
<body>
		<!-- Navbar -->
	<header>
<nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo center hide-on-small-and-down"><img src="images/logo/Unbenannt-2.png" alt="logo" class="responsive-img logo-img"></img></a>
				  <ul id="nav-mobile" class="right">
					<li><a href="index.php" class="abst20">Back</a></li>
				  </ul>
				</div>
			  </nav>
	</header>
	<main>
<div class="container">
		<div class="row">
			<!--- Header Information -->
			<div class="col s12 center">
				<h2><?php echo $cam["name"] ?></h2>
			</div>
		</div>
		<div class="row fix-height-100">
					<!-- Carousel -->
		<div class="row col s12 l6">
		   
			<div class="center col s12 img-block">
			
				<img src="<?php echo $cam["bildlink"]; ?>" id="img" alt="Bild" width="40%">
			
			</div>	
			<div class="col center-align s12 center" style="text-align: center;">
				<center><ul style="height: 100px;">
				<?php 
					if ($result_pic->num_rows > 0 && $cam["bildlink"] != "") { ?>
				<li class="card-bar" onClick="change_image(20000)">
					<img src="<?php echo $cam["bildlink"] ?>" class="z-depth-1 hoverable" id="20000" width="50px" height="50px">
			    </li>	
				<?php	// output data of each row
					while($row = $result_pic->fetch_assoc()) {
				  ?>
				<li class="card-bar" onClick="change_image(<?php echo $row["num"] ?>)">
					<img src="<?php echo $row["link"] ?>" class="z-depth-1 hoverable" id="<?php echo $row["num"] ?>" width="50px" height="50px">
			    </li>	
				<?php    
				}

			} else if($cam["bildlink"] != "") { ?>
				<li class="fix-height-100 fix-width-100"  href="#">
					<img src="<?php echo $cam["bildlink"] ?>" class="z-depth-1 hoverable" id="" width="50px" height="50px">
			    </li>		
				   </ul></center>
				<?php }else{
						echo "<p style='padding-top:100px;padding-left:200px'>Keine Bilder<p>"; 
					}
				?>
				   </ul>
			</div>	
			</div>
			<div class=" col s12 l6">
				 <ul class="collection with-header" style="margin-top: -20px">
				  <li class="collection-header"><h4>Informationen</h4></li>
				  <li class="collection-item">Inventar ID: <?php echo $cam["inr"] ?></li>
				  <li class="collection-item">Marke: <?php echo $cam["marke"] ?></li>
				  <li class="collection-item">Kameratyp: <?php echo $cam["Kameratyp"] ?></li>
				  <li class="collection-item">Dimensionen: <?php echo $cam["dim"] ?></li>
				  <li class="collection-item">Gewicht: <?php echo $cam["Gewicht"] ?></li>
				  <li class="collection-item">Auflösung: <?php echo $cam["afl"] ?></li>
				  <li class="collection-item">ISO: <?php echo $cam["iso"] ?></li>
				  <li class="collection-item">Datenblatt/Anleitung:
			<?php 
					if ($result_dt->num_rows > 0) { 
						while($row = $result_dt->fetch_assoc()) {
			?>
				<a href="<?php echo $row["pdf_link"]; ?>"><div class="" style="width: 300px"> 
					<i class="material-icons inline-icon">picture_as_pdf</i>
					<?php echo $row["filename"]; ?>
				</div></a>
			
			<?php } }else{ echo "<br><b>Keine Datenblätter vorhanden!</b>"; }?>
				</ul>
		</div>
	</div>
</div>
	
<div class="container" style="margin-top: 190px;">
		<div class="row" style="width: 70%;">
			<?php if($cam["videolink"] != ""){?>
			<video class="col s12 z-depth-1" controls style="padding: 0px;"d>
				<source src="<?php echo $cam["videolink"]; ?>" type="video/mp4">
			</video>
			<?php } ?>
		</div>
	</div>
</div>
	
	</main>
	<?php include "footer.php"; ?>
		
</body>
	<script language="javascript" type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="js/my.js"></script>
	<script>
	
		function change_image(id){
			src = $("#"+id).attr('src');
			$("#img").attr("src", src);
		}
	

	</script>
</html>