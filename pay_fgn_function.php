<?php
	include("sql_connection.php");
	include("start_Session");

	$mdaID = $_POST['mdaID'];
		$mdaQuery =  "select * from mda_services where mID = '$mdaID'  ";
		$executeQuery = mysqli_query($connection, $mdaQuery);
		if (!$executeQuery) {
			die("Can't load, server error");
		}else{
			echo "<option selected>Select Payment Purpose</option>";
			while($row = mysqli_fetch_assoc($executeQuery)){
				echo "<option value=".  $row['ID'] .">" . $row['services']."</option>";
			}
		}
?>

<?php 
	// $serviceID = $_POST['id'];
	// if ($serviceID) {
	// 	echo "<label class="col-md-3 control-label" for="payment-purpose">Purpose For Payment</label>
	// 				<div class="col-md-6">
	// 					<select id="mdaServiceField" class="form-control" name="payment-purpose" style="height: 100%;" required>
	// 						<option>  </option>;
	// 					</select>
	// 				</div> "
	// }
?>