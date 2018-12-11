<?php 
	include "../../php/dbconfig.php"; 
	session_start();
	$id = $_SESSION["infid"];

	$sql_bilder = "SELECT distinct * FROM `bilder` WHERE id = $id";
	$result_pic = $conn->query($sql_bilder);
	$result = $link->query("SELECT * FROM cameras where id=$id");
	$cam = $result->fetch_assoc();
?>
			  <div class="row col s12 l6">
					  <h5 class="center">Main-Bild</h5>
				  <div class="col s12 center">
			<div class="row" style="height: 212px;">
				<?php 
					if ($cam["bildlink"] != "0") {
				  ?>
						<div class="col s6">
						 <div class="card">
								<div class="card-image">
								  <img src="../<?php echo $cam["bildlink"] ?>" class="responsive-img" width="20%">
								  <a class="btn-floating halfway-fab waves-effect waves-light" onClick="delete_main(<?php echo $id; ?>)"><i class="material-icons">delete</i></a>
								</div>
						 </div>
						</div>
				<?php    
					}else{
						echo "<p style='padding-top:100px;padding-left:200px'>Keine Bilder<p>"; 
					}
				?>
					  </div>
				  </div>
					  <!-- upload Main-Bil -->
					  	  <div class="col s12 center">
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								  <input type="file" name="datei" id="in_main" style="width: 30%"></input>
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path_main"></input>
							  </div>
								
							  <div class="col s2" style="margin-top: 10px;" id="upload_one" onClick="do_up_main()">
								<i class="material-icons">file_upload</i>
							  </div>
							</div>
						</div>
					  	  </div>
				  
				  
				  <div class="col s12 m6 l6">
					  <h5 class="center">Weitere-Bilder</h5>
					  <div class="row" style="height: 212px;">
				<?php 
					if ($result_pic->num_rows > 0) {
					// output data of each row
					while($row = $result_pic->fetch_assoc()) {
				  ?>
						<div class="col s6 m4 l3">
						 <div class="card">
								<div class="card-image">
								  <img src="../<?php echo $row["link"] ?>" class="responsive-img">
								  <a class="btn-floating halfway-fab waves-effect waves-light" onClick="delete_more(<?php echo $row["num"]; ?>)"><i class="material-icons">delete</i></a>
								</div>
						 </div>
						</div>
				<?php    
					}

				} else {

					echo "<p style='padding-top:100px;padding-left:200px'>Keine Bilder<p>"; 
					}
				?>
					  </div>
					  <div class="row">
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								  <input type="file" name="datei" id="in_more" style="width: 30%"></input>
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path_more"></input>
							  </div>
								
							  <div class="col s2" style="margin-top: 10px;" id="upload_one" onClick="do_up_more()">
								<i class="material-icons">file_upload</i>
							  </div>
							</div>
					  </div>
				  </div>
			  </div>