<?php 

	include "../../php/dbconfig.php"; 	
	session_start();
	if(isset($_GET["val"])){
		$new = false;
	}else{
		$new = true;
	}
	$id = $_SESSION["last_id"];
	
	$sql_bilder = "SELECT distinct * FROM `bilder` WHERE id = $id";
	$result_pic = $conn->query($sql_bilder);

	$result = $link->query("SELECT * FROM cameras where id=$id");
	$cam = $result->fetch_assoc();

	$sql_pdf = "SELECT * FROM `datenblatt` WHERE id = $id";
	$result_pdf = $conn->query($sql_pdf);
?>		
			<div class="row">
				
			  <div class="row col s12 l6">
					  <h5 class="center">Main-Bild</h5>
				  <div class="col s12 center">
					  <div class="row center" style="height: 212px;" id="pre-main">
					  <?php if($cam["bildlink"] != "" && $cam["bildlink"] != "0"){ ?>
						<div class="col s6 m4 l3" id="pre-main">
						 <div class="card">
								<div class="card-image">
								  <img src="../<?php echo $cam["bildlink"] ?>" class="responsive-img">
								  <a class="btn-floating halfway-fab waves-effect waves-light" onClick="delete_main(<?php echo $id; ?>)"><i class="material-icons">delete</i></a>
								</div>
						 </div>
						</div>
					  <?php }else{ ?>
						<div class="col s6 m4 l3 center" id="pre-main">
							
						</div>
					  <?php } ?>
						
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
							  <button class="btn col s2" onClick="do_up_main()"><i class="material-icons">file_upload</i></button>
							</div>
						</div>
					  	  </div>
				  
				  
				 <div class="col s12 m12 l6">
					  <h5 class="center">Weitere-Bilder</h5>
					  <div class="row" style="height: 212px;" id="pre-more">
				<?php 
					if ($result_pic->num_rows > 0) {
					// output data of each row
					while($row = $result_pic->fetch_assoc()) {
				  ?>
						<div class="col s6 m4 l3">
						 <div class="card">
								<div class="card-image">
								  <img src="../<?php echo $row["link"] ?>" class="responsive-img">
									<a class="btn-floating halfway-fab waves-effect waves-light" onClick="delete_more(<?php echo $row["num"]; ?>);"><i class="material-icons">delete</i></a>
								</div>
						 </div>
						</div>
				<?php    
					}

				} else {?>

						<div class="col s6 m4 l3">
						 <div class="center">
						 </div>
						</div>
				<?php } ?>
					  </div>
					  	  <div class="col s12 center">
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								  <input type="file" name="datei" id="in_more" style="width: 30%"></input>
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path_more" multiple="multiple"></input>
							  </div>
								
							  
							  <button class="btn col s2" onClick="do_up_more()"><i class="material-icons">file_upload</i></button>
							</div>
						</div>
				  </div>
			  </div>
<br><br><hr><br><br>
			<div class="row">
				
					   <div class="col s12 m12 l6">
						   <div>
							   <h5>PDF</h5>
						   </div>
						  	<div class="row" style="height: 212px;" id="pre-pdf">
							
				<?php 
					if ($result_pdf->num_rows > 0) { ?>
								<div class="col s12">
						 		<table>
				<?php	// output data of each row
					while($row = $result_pdf->fetch_assoc()) {
				  ?>
							 <tr>
								<td><i class="material-icons">picture_as_pdf</i><?php echo $row["filename"]; ?></td>
								 <td onClick="delete_pdf(<?php echo $row["num"] ?>)"><i class="material-icons">delete</i></td>
							</tr>
							

				<?php    
					} ?>
							</table>
						</div>
<?php
				} else {?>

						<div class="col" style="height: 200px;">
						 <div class="center">
						 </div>
						</div>
				<?php } ?>
					  </div>
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								  <input type="file" name="datei" id="in_pdf" style="width: 30%"></input>
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path_pdf" multiple="multiple"></input>
							  </div>
							  <button class="btn col s2" onClick="do_up_pdf()"><i class="material-icons">file_upload</i></button>
							</div>
					  </div>


						<div class="col m12 l6">
							<div>
								<h5>Video</h5>
							</div>
						<div class="row" style="height: 212px;">
				<?php if ($cam["videolink"] != "") { ?>
							 
							<video width="50%" controls>
								 <source src="../<?php echo $cam["videolink"] ?>" type="video/mp4">
							</video>
							 <i class="material-icons" onClick="delete_vid(<?php echo $cam["id"] ?>)">delete</i>
				<?php } else { ?>
						  
						<div class="col s12 l6" style="height: 200px;">
						</div>
				<?php } ?>
						</div>
							<form method="post" action="php/vid_up.php" enctype="multipart/form-data">
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								  <input type="file" name="file" style="width: 30%"/>
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path_vid">
							  </div>
							  <button class="btn col s2"><i class="material-icons">file_upload</i></button>
							</div>
							</form>
					  </div>
				</div>
		</div>
<?php if($_SESSION["val"] != 1){ ?>
<div class="row">
	<div class="col s12">
		<div class="center">
			<button class="btn wave"><a href="admin.php?">Fertigstellen</a></button>
		</div>
	</div>
</div>


<?php } ?>

<script>

	$(function() {
	$(document).ready(function(){
		var bar = $('#bar')
		var percent = $('#percent');
		var status = $('#status');

	$('form').ajaxForm({
		beforeSend: function() {
		$('#modal-pre').modal('open');
		status.empty();
		var percentVal = '0%';
		bar.width(percentVal);
		percent.html(percentVal);
		},
	uploadProgress: function(event, position, total, percentComplete) {
		var percentVal = percentComplete + '%';
		percent.html(percentVal);
		bar.width(percentVal);
		},
	complete: function(xhr) {
		status.html(xhr.responseText);
		$("#pre-loader").load('php/get_pic_ins.php');
		}
		});
	});
});

</script>
