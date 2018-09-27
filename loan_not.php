
<?php 
	// include("start_Session.php");
	// include("sql_connection.php");
	
$query "select decided, status, Amount from loan where eid = '$userid' ";
$result = mysqli_query($connection, $query);
$msg = "";
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $decided = $row['decided'];
    $status = $row['status'];
    $amount = $row['Amount'];
    if ($decided == 1 && $status == 0) {
    	$msg = "Your Loan Has Been Granted";
    }elseif ($decided == 1 && $status == 1) {
    	$msg = "Your Loan Has Been Denied";
    }else{
    	$msg = "";
    }
}


?> 
     