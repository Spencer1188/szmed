<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>SZ-Medien</title>
	<?php include "main_header.php" ?>
</head>
<body>
	
	<!-- Navbar -->
	<header>  <nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo center"><img src="images/logo/Unbenannt-2.png" alt="logo" class="responsive-img logo-img"></img></a>

				</div>
			  </nav>
	</header>
	<main>
	<!-- Main Bereich - Cards Auflistung -->
	<div class="container">
		<div class="section">
			<div class="row blue-grey lighten-5">
				<div class="col s12 m4 l3 label-icon small-center" style="padding: 20px;">
					<i class="material-icons small icon-ac" onClick="change(1)" id = "1">border_all</i>
					<i class="material-icons small" onClick="change(2)" id = "2">dehaze</i>
					<i class="material-icons small" onClick="change(3)" id = "3">format_list_bulleted</i>
				</div>
				<div class="col s12 m6 l3 right">
					  <form>
						<div class="input-field" id="in-search">
						  <input id="search" class="autocomplete" type="search" required style="padding-left: 30px; width: 85%;">
						  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
						  <i class="material-icons" style="padding-top: 10px;" id="close-search">close</i>
						</div>
					  </form>
				</div>
			</div>
			
			<div class="row display-kach" id="display-kach">
				
			</div>
		</div>
	</div>
	</main>
	
	<?php include "footer.php" ?>

</body>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="js/my.js"></script>
	<script>
		
		$(document).ready(function() { 
			$("#display-kach").load('php/kacheln.php');
		});
		
		
	  $(document).ready(function(){
		$('input.autocomplete').autocomplete({
			source: "php/search.php",
		  data: {
			"Apple": null,
			"Microsoft": null,
			"Google": 'https://placehold.it/250x250'
		  },
		});
	  });
		
	function link(id){
		window.location.href = "info.php?id="+id;
	}
        
	</script>
</html>