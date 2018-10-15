<?php
	include("sql_connection.php");

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



