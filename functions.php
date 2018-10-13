<?php 
include("sql_connection.php");
include("start_Session");

$roleID = $_POST['id'];
if (!$roleID) {
	echo "<option> No deparment roles available for this position </option>";
}
	$query = "select * from department_role where dID= '$roleID' ";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Can't load at the moment");
	}else{
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<option value=".  $row['rID'] .">" .$row['rDepartment_role'] ."</option>";
		}
	}
?>


<?php 
	if (isset($_POST['send'])) {
		$newSalary = $_POST['newSalary'];
		$empID = $_POST['empID'];
		$querys = "UPDATE salary SET monthly_salary = '$newSalary' WHERE sid = '$empID' ";
		$check = mysqli_query($connection, $querys);
		if (!$check) {
			die("Couldn't Update".mysqli_error());
		}else{
			header("location: salary.php");
		}
	}
?>