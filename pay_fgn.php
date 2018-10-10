<?php 
include("start_Session.php");
include("sql_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Serve</title>
    <?php 
            include("inc/header.php");
        ?>
    <link rel="stylesheet" href="./style/payFgn.css" >
</head>
<body>
    <div id="container">
        <div class="content">
                    <div class="container">
                        <div class="row mt-3"  style="height: 100%; ">
                            <div class="col-lg-12">
                                <div class="fgnForm card-box mt-5" >
                        			<h2 class="text-center">Federal High Court Of Nigeria</h2>

                                    <div class="formDiv text-center mt-5">
                                        <form class="form-horizontal text-center" role="form" action="" method="post">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Name Of MDA</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" value="" placeholder="First Name" required="" name="fname">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="example-email">Purpose For Payment</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Amount</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" required="" name="sgender">
                                                            <option selected="">Select Gender</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                    </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Address</label>
                                                    <div class="col-md-6">
                                                        <textarea class="form-control" rows="5" name="taddress"></textarea>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label" for="example-email">Phone Number</label>
                                                    <div class="col-md-6">
                                                        <input type="number" name="pnum" class="form-control" placeholder="Phone Number" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="example-email">Email</label>
                                                    <div class="col-md-6">
                                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Password</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="Password" class="form-control" placeholder="password" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Department</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="sDepartment" required  id="selectDepartment">
                                                            <option selected>Select Deparment</option>
                                                        <?php 
                                                            $query = "select * from department";
                                                            $result = mysqli_query($connection, $query);
                                                            if ($result) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $id = $row['dID'];
                                                        ?>
                                                            <option value="<?php echo  $row['dID']; ?>"> <?php echo $row['dDepartment']; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Select Position</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="sPosition" id="selectPosition">
                                                      
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <button type="submit" class="btn btn-success waves-effect w-md waves-light m-b-5" name="login" >Save</button>
                                                    <button type="reset" class="btn btn-danger waves-effect w-md waves-light m-b-5" name="reset" >Cancel</button>
                                                 </div>
                                            </form>
                                    </div>
                                    <?php 
                                  
                                    if (isset($_POST['login'])) {
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

                                        $query = "insert into employee (eFirst_name, eLast_name, eGender, eDOB, eAddress, ePhone_number, eEmail, ePassword, dID, rID, dDate, type) values ('$fname','$lname', '$gender', '$dob', '$address', '$pnum', '$email', '$password', '$department', '$position', now(),  '0') ";
                                        $result = mysqli_query($connection, $query);
                                        if ($result) {
                                        ?>
                                            <script>
                                            alert("Employee Created");
                                            </script>
                                        <?php
                                        }else{die();}
                                    }
                                    ?>
                                            
                                </div>
                                    
                                    
                                </div>
                                
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
    </div>

    <?php include("inc/scripts.php") ?>    
</body>
</html>