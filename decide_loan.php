<?php 
include("sql_connection.php");
include("start_Session");


$check = $_GET['check'];
$emp_id = $_GET['id'];
if ($check == 0 && $emp_id !== null) {
	$sql_query = "UPDATE loan SET status = '0', decided = '1', date_times = now() WHERE eid = '$emp_id' ";
	$results = mysqli_query($connection, $sql_query);
	if ($results) {
		header("location: loan_apply.php");
	}else{
		die("Can't confirm at the moment". mysqli_error());
	}
}elseif ($check == 1 && $emp_id !== null) {
	$sql_query = "UPDATE loan SET status = '1', decided = '2', date_times = now() WHERE eid = '$emp_id' ";
	$results = mysqli_query($connection, $sql_query);
	if ($results) {
		header("location: loan_apply.php");
	}else{
		die("Can't Confirm at the moment". mysqli_error());
	}
}else{

}

?>