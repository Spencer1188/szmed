	<?php 
		include "../../php/dbconfig.php"; 
		$select_cam = "SELECT * FROM cameras";
		$result_cam = $conn->query($select_cam);
?>	
	<div class="row col s12 center">
			<h4>Alle Kameras</h4>
		</div>
		<div class="row center">
		<table class="striped highlight col s12">
        <thead>
          <tr>
              <th>Name</th>
              <th>Marke</th>
		      <th class="center"><i class="material-icons">build</i></th>
          </tr>
        </thead>
        <tbody>
			<?php 
				if ($result_cam->num_rows > 0) {
				// output data of each row
				while($row = $result_cam->fetch_assoc()) {
			?>
			<tr>
				<td onClick="link_tools(<?php echo $row["id"] ?>)">
					<?php echo $row["name"]; ?>
				</td>
				<td onClick="link_tools(<?php echo $row["id"] ?>)">
					<?php echo $row["marke"]; ?>
				</td>
				<td class="center"><i class="material-icons" onClick="do_delete_cam(<?php echo $row["id"] ?>)">delete</i></td>
			</tr>
			<?php } } ?>
				<tr onClick="add_cam()">
					<td colspan="3" class="" style="cursor: default">
						<div class="center">
						 <div style="width: 100%;"> <i class="small material-icons inline-icon">add_box</i>Neue Kamera</div>
						</div>
					</td>
				</tr>
        </tbody>
      </table>
	</div>