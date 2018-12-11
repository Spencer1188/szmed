<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
	<?php include "admin_header.php" ?>
</head>
<body>
	
	<!--- Header -->
<header>
	<div class="container centered" style="margin-top: 20px;">
		<div class="row" style="width: 30%" >
			<img src="../images/logo/htl.png" class="responsive-img col l6">
			<img src="../images/logo/Unbenannt-2.png" class="responsive-img col l6 abs-top">
		</div>
	</div>
</header>
<main>
	<div class="row">
		<div class="col s2"></div>
		<h4 class="col s9 left-align" style="border-bottom: #212121  solid 1px;">Anmelden</h4>
		<div class="col s1"></div>
	</div>
	<!--- Login -->
	<div class="container">
		<div class="row row-small">
			<div class="input-field col s12">
			  <i class="material-icons prefix">account_circle</i>
			  <input id="usrname" type="text" name="username" step="1">
			  <label for="usrname">Login Name</label>
			</div>
		</div>
		<div class="row row-small">
			<div class="input-field col s12">
			  <i class="material-icons prefix">dialpad</i>
			  <input id="password" type="password" name="pw" step="2">
			  <label for="password">Password</label>
			</div>
		</div>
			<div class="row center" id="pre-loader">

			</div>
	</div>
</main>
</body>	
	<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="../js/my.js"></script>
	<script>
		$(document).ready(function(){
			$("#pre-loader").load('php/login_button.php');
		  });
			
		function pre() {
			$("#pre-loader").load('php/preloader.php');
			window.setTimeout(do_login, 200);
		}
		
	function do_login(){
		
		 var usr=$("#usrname").val();
		 var pass=$("#password").val();
		
		 if(usr!="" && pass!="" )
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/userlogin.php',
			  data:{
			   username:usr,
			   pw:pass
			  },
			  success:function(data) {
				  if(data == "error"){
					M.toast({html: 'Fehler beim Login!'})
					$("#pre-loader").load('php/login_button.php');
				  }else{
					 window.location.href = "admin.php";
				  }
			  },			
			  error:function() {
				  M.toast({html: 'Fehler beim Login'})
				  $("#pre-loader").load('php/login_button.php');
			  }
			  });
		 }else {
		  alert("Please Fill All The Details");
		 } 

		}
	 
			


	</script>
</html>