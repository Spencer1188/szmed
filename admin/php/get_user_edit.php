	<?php
		include "../../php/dbconfig.php"; 
		!mysqli_set_charset($link, "utf8");
		session_start();
		$gp = $_SESSION["gruppe"];
		$id = $_GET["id"];
		$select_usr = "SELECT * FROM user where id='$id'";
		$select_op = "SELECT * FROM `group` WHERE 1";
		$result_usr = $conn->query($select_usr);
		$result_op = $conn->query($select_op);	
		$row = $result_usr->fetch_assoc()
?>

					<td><input type="text" value="<?php echo $row["name"]; ?>" id="usredit"></td>
					<td> 
					<?php if($gp == "Lehrer"){ ?>
							<select style="display: block" id="grpedit">
						<?php 
							if ($result_op->num_rows > 0) {
							// output data of each row
							while($row1 = $result_op->fetch_assoc()) { ?>	
								<?php if($row1["name"] == $gp){ ?>
								 <option value="<?php echo $row1["name"]; ?>" selected><?php echo $row1["name"]; ?></option>	
								<?php }else{ ?>
								<option value="<?php echo $row1["name"]; ?>" selected><?php echo $row1["name"]; ?></option>	
								<?php }?>
							<?php } ?>
						</select>
				<?php 	} 
					}else{?>
						<input id="grpedit" value="<?php echo $row["gruppe"]; ?>" disabled> </input>
					<?php }?>
							
					</td>
					<td class="center">
						<i class="material-icons " id="icon<?php echo $row["id"]; ?>" onClick="do_edit(<?php echo $row["id"]; ?>)">done</i>
					</td>

