
<?php 
include("sql_connection.php");
include("start_Session");


$ids = $_POST['id'];
$querys = "select monthly_salary from salary where eID = '$ids' ";
$results = mysqli_query($connection, $querys);
if (!$results) {
    die("Couldn't Load". mysqli_error());
}else {
    $row = mysqli_fetch_assoc($results);
    $preSalary = $row['monthly_salary'];

	echo "<input type='text' class='form-control' value=" .$preSalary;  "name='preSalary' id='preSalarys' Readonly required>";

	}
?>