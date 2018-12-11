<?php
		include "dbconfig.php"; 	
	if(isset($_GET["sea"])){
		$search = $_GET["sea"];
		$select_cam = "SELECT * FROM `cameras` WHERE name like '%$search%'";
		$result_cam = $conn->query($select_cam);
	}else{
		$select_cam = "SELECT * FROM cameras order by marke";
		$result_cam = $conn->query($select_cam);
	}
?>

<table class="striped highlight col s12">
        <thead>
          <tr>
              <th>Name</th>
              <th>Marke</th>
			  <th>Beschreibung</th>
			  <th>Kameratyp</th>
          </tr>
        </thead>
        <tbody>
			<?php 
				if ($result_cam->num_rows > 0) {
				// output data of each row
				while($row = $result_cam->fetch_assoc()) {
			?>
			<tr onClick="link(<?php echo $row["id"] ?>)">
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["marke"]; ?></td>
				<td><?php echo $row["beschreibung"]; ?></td>
				<td><?php echo $row["Kameratyp"]; ?></td>
			</tr>
			<?php } } ?>
        </tbody>
      </table>