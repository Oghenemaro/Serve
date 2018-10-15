<?php 
include("sql_connection.php");
    if (isset($_POST['login'])) {
        $fullName = $_POST['fullName'];
        $paymentPurpose = $_POST['paymentPurpose'];
        $mdaService = $_POST['mdaService'];
        $amount = $_POST['amount'];
        $pnum = $_POST['pnum'];
        $email = $_POST['email'];
                                                        
        if ( ($fullName || $paymentPurpose || $mdaService || $amount || $pnum || $email) == " " ) {

        }
        $query = "insert into employee (eFirst_name, eLast_name, eGender, eDOB, eAddress, ePhone_number, eEmail, ePassword, dID, rID, dDate, type) values ('$fname','$lname', '$gender', '$dob', '$address', '$pnum', '$email', '$password', '$department', '$position', now(),  '0') ";
        $result = mysqli_query($connection, $query);
        if ($result) {

        }else{
            die();
        }
    }
?>