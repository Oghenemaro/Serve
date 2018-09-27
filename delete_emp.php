<?php 
include("sql_connection.php");
include("start_Session");


$emp_id = $_GET['id'];
if ($emp_id !== null) {
	$sql_query = "UPDATE employee SET status = '1', dDate = now() WHERE eid = '$emp_id' ";
	$results = mysqli_query($connection, $sql_query);
	if ($results) {
		header("location: admin_employee.php?page=1");
	}else{
		die("Can't delete at the moment". mysqli_error());
	}
}

?>