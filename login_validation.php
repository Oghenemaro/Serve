
<?php 
session_start();

	include 'sql_connection.php';


	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$flag = 0;

		
		$query = "select eID, eLast_name, eFirst_name, eEmail, ePassword, type from employee where eEmail = '$username' and ePassword = '$password'";
		$result = mysqli_query($connection, $query);
		if($result){
			$values = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $values["eID"];
			$_SESSION['username'] = $values["eEmail"];
			$_SESSION['usertype'] = $values["type"];
			$_SESSION['lastname'] = $values["eLast_name"];
			$_SESSION['firstname'] = $values["eFirst_name"];
			if($username == $values["eEmail"] && $password == $values["ePassword"] && "0" == $values["type"]){

				header("Location: emp_salary.php");
			}else if ($username == $values["eEmail"] && $password == $values["ePassword"] && "1" == $values["type"]) {
				header("Location: report_view.php");
			}else{

				header("Location: login.php?flag=1");
				}
			}
		}
?>