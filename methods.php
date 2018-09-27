<?php 
include("sql_connection.php");
function deactivateEmployee(){
	$query = "UPDATE employee SET status = '1' WHERE eID = 1;"
	$executes = mysqli_query($connection, $query);
	if ($executes) {
		header("location: admin_employee.php");
	}
}

?>