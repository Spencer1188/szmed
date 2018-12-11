	<?php
		include "../../php/dbconfig.php"; 
		session_start();
		$id = $_SESSION["id"];
		$gp = $_SESSION["gruppe"];
		$select_usr = "SELECT * FROM user";
		$result_usr = $conn->query($select_usr);	

?>

<div class="container">
			<div class="row col s12 center">
				<h4>Alle benutzer</h4>
			</div>
			<div class="row center">
			<table class="striped highlight col s12">
			<thead>
			  <tr>
				  <th>Name</th>
				  <th>Gruppe</th>
				  <th class="center"><i class="material-icons">build</i></th>
			  </tr>
			</thead>
			<tbody>
				<?php 
					if ($result_usr->num_rows > 0) {
					// output data of each row
					while($row = $result_usr->fetch_assoc()) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
					<td><?php echo $row["name"]; ?></td>
					<td><?php echo $row["gruppe"]; ?></td>
					
						
					<td class="center">
						<?php if($gp == "Lehrer"){ ?>
						<i class="material-icons" onClick="do_delete(<?php echo $row["id"]; ?>)">delete</i><?php } ?>
						
						<?php if($row["id"] == $id || $gp== "Lehrer"){ ?>
						<i class="material-icons" id="icon<?php echo $row["id"]; ?>" onClick="edit(<?php echo $row["id"]; ?>)">create</i>
						<span data-target="modal2" class="modal-trigger tooltipped" style="width: 10%;" data-position="right" data-tooltip="Reset Password" onClick="set_modal_id(<?php echo $row["id"]; ?>)"><i class="material-icons">lock</i></span>
						<?php } ?>
				</tr>
				<?php } } ?>
				<?php if($row["id"] == $id || $gp == "Lehrer"){ ?>
				<tr >
					<td colspan="3" class="" style="cursor: default">
						<div class="center">
						 <div data-target="modal1" class="modal-trigger" style="width: 100%;"> <i class="small material-icons inline-icon">add_box</i>Neuer Benutzer</div>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		  </table>
		</div>
		</div>
<script>
	  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
	
</script>