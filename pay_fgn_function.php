<?php
	$mdaID = $_POST['mdaID'];
	if (!$mdaID) {
		echo "<option> No mda services available for this mda </option>";
	}
	$mdaQuery = "select * from mda_services where mID = '$mdaID'  ";
	$executeQuery = mysqli_query($connection, $mdaQuery);
	if (!$executeQuery) {
		die("Can't load, server error");
	}else{
		while($row = mysqli_fetch_assoc($executeQuery)){
			echo "<option value=".  $row['ID'] .">" .$row['services'] ."</option>";
		}
	} 
?>