<?php 
	include "../php/dbconfig.php"; 
	$id = $_GET["id"];
	session_start();
	$_SESSION["last_id"] = $id;
	$_SESSION["val"] = 1;
	$sql_bilder = "SELECT distinct * FROM `bilder` WHERE id = $id";
	$result_pic = $conn->query($sql_bilder);
	$result = $link->query("SELECT * FROM cameras where id=$id");
	$cam = $result->fetch_assoc();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
<?php include "admin_header.php" ?>
	<style>
	
		#bararea{
 width:100%;
 height:40px;
 border:2px solid #000;
}
 
#bar{
 width:0%;
 height:36px;
 background-color: grey;
}
 
#status{
 color:#000;
}
		
	</style>
</head>
<body>
	
		<!-- Navbar -->
			  <nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo center"><img src="../images/logo/Unbenannt-2.png" alt="logo" width="30%"></img></a>
					<ul style="margin-left: 20px;">
				  		<li>Admin Page</li>
						<li class="right" style="margin-right: 40px;"><a href="admin.php">Back</a></li>
				  	</ul>
				</div>
			  </nav>
	
	<!-- Headerr -->
<div class="">
	<div class="row">
    <div class="col s12 z-depth-1" style="padding: 0px;">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Allgemeine Einstellungen</a></li>
        <li class="tab col s3"><a href="#test2">Medien</a></li>
      </ul>
    </div>
		
   <div id="test1" class="col s12">
	   
	<h3 class="center"><?php echo $cam["name"]; ?></h3>
	<div class="container" style="margin-top: 50px;">
	  <div class="row">
		  
    		<div class="col s12">
			  <div class="row">
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="inr" type="text" class="validate" value="<?php echo $cam["inr"]; ?>" required>
					  <label for="name">Inventar Nummer</label>
					</div>
				</div>			
				<div class="row">
				  	<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="name" type="text" class="validate" value="<?php echo $cam["name"]; ?>" required>
					  <label for="name">Name</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="marke" type="text" class="validate" value="<?php echo $cam["marke"]; ?>" required>
					  <label for="marke">Marke</label>
					</div>
				</div>
				<div class="row">
				    <div class="input-field col s12">
						<textarea id="beschreibung" class="materialize-textarea" data-length="120" required><?php echo $cam["beschreibung"]; ?></textarea>
						<label for="beschreibung">Beschreibung</label>
				  	</div>
				</div>
			  <div class="row">
					<div class="input-field col s12 m6 l6">
				  	  <input placeholder="" id="typ" type="text" class="validate" value="<?php echo $cam["Kameratyp"]; ?>" required>
					  <label for="typ">Kameratyp</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="afl" type="text" class="validate" value="<?php echo $cam["afl"]; ?>" required>
					  <label for="afl">Auflösung</label>
					</div>
			 </div>
				<div class="row">
				    <div class="input-field col s12 m6 l6">
				  	  <input placeholder="" id="akl" type="text" class="validate" value="<?php echo $cam["akkulaufzeit"]; ?>" required>
					  <label for="akl">Akkulaufzeit</label>
				  	</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="spmed" type="text" class="validate" value="<?php echo "in arb"; ?>" required>
					  <label for="spmed">Speicherkarte</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="vsz" type="text" class="validate" value="<?php echo $cam["Verschlusszeiten"]; ?>" required>
					  <label for="vsz">Verschlusszeit</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="iso" type="text" class="validate" value="<?php echo $cam["iso"]; ?>" required>
					  <label for="iso">ISO</label>
					</div>
				  </div>
				<div class="row">
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="gewicht" type="text" class="validate" value="<?php echo $cam["Gewicht"]; ?>" required>
					  <label for="gewicht">Gewicht</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="dim" type="text" class="validate" value="<?php echo $cam["dim"]; ?>" required>
					  <label for="dim">Dimension</label>
					</div>
				  </div>
				<div>
					<div class="row center">
						<button class="inline-icon btn waves-effect" onClick="save_info(<?php echo $id; ?>)">
							<i class="material-icons inline-icon">check</i>
							Speichern
						</button>
					</div>
				</div>
		 	 </div>
		  </div>		  
      </div>

	</div>
	
	<div id="test2" class="col s12" style="padding-top: 20px"> 
		<div class="container" id="pre-loader">
			
		  </div>
	
	</div>
	</div>
</div>

<div id="modal-pre" class="modal">
    <div class="modal-content">

	<div>
		<div id="bararea">
			<div id="bar"></div>
		</div>

		<div id="percent"></div>
		<div id="status"></div>
	</div>
    </div>
  </div>
	
<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
<script language="javascript" type="text/javascript" src="../js/my.js"></script>
<script src="http://oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
	<script>
		$(document).ready(function(){	 
			$("#pre-loader").load('php/get_pic_ins.php');
    		$('.tabs').tabs();
			$('#modal-pre').modal();
		  });
		
		
		function save_info(id){
			alert("ok");
		 var ivnr = $("#inr").val();
		 var name = $("#name").val();
		 var marke = $("#marke").val();
		 var bes = $("#beschreibung").val();
		 var typ = $("#typ").val();
		 var afl = $("#afl").val();
		 var akl = $("#akl").val();
		 var spmed = $("#spmed").val();
		 var vsz = $("#vsz").val();
		 var iso = $("#iso").val();
		 var gewicht = $("#gewicht").val();
		 var dim = $("#dim").val();
			
		if(ivnr!="" && name!="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/cam_safe.php',
			  data:{
				  id: id,
				  ivnr: ivnr,
				  name: name,
				  marke: marke,
				  bes: bes,
				  typ:typ,
				  afl: afl,
				  akl: akl,
				  spmed: spmed,
				  vsz:vsz,
				  iso:iso,
				  gw:gewicht,
				  dim: dim
			  },
			  success:function(data) {
				  if(data == "ok"){
					   M.toast({html: 'Gespeichert!'})
					  }else{
						  alert(data);
					  }
			  },			
			  error:function() {
				  M.toast({html: 'Cam erstellen fehlgeschlagen!'})
			  }
			  });
		 } else {
		  alert("Please Fill All The Details");
		 } 

		}

</script>
		
	
</body>
</html>