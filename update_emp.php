<?php 

include("start_Session.php");
include("sql_connection.php");

if(isset($_POST["update"])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['sgender'];
    $dob = $_POST['dob'];
    $address = $_POST['taddress'];
    $pnum = $_POST['pnum'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $department = $_POST['sDepartment'];
    $position = $_POST['sPosition'];  
    $empID = $_POST['emp_id'];

    $sql_query = "UPDATE employee SET eFirst_name = '$fname', eLast_name = '$lname', eGender = '$gender', eDOB = '$dob', eAddress = '$address', ePhone_number = '$pnum', eEmail = '$email', ePassword = '$password', dID = '$department', rID = '$position',  dDate = now() WHERE eID = '$empID' ";

    $value = mysqli_query($connection, $sql_query);
    
    if($value){
?>
    <script>
        alert("Record Updated");
    </script>
<?php
        header("location: admin_employee.php?page=2");
        }else{
?>
    <script>
        alert("Couldn't Update");
    </script>
<?php
        header("location: admin_employee.php?page=2");
        }
    }
?>