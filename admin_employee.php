<?php 
include("start_Session.php");
include("sql_connection.php");

$page = $_GET['page'];

?> 
<!DOCTYPE html>
<html>
    <head>
        <?php 
            include("inc/header.php");
        ?>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include("inc/top_bar.php") ?>
    
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start/menu ========== -->
            <?php include("inc/menu.php") ?>        
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        
                        <div class="row contentRow">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <?php 
                                        if ($page == "0") {
                                    ?>
                                    

                        			<h4 class="mb-5">Create Employee</h4>

                                    <div class="">
                                        <form class="form-horizontal" role="form" action="" method="post">
                                       
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">First Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" value="" placeholder="First Name" required="" name="fname">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="example-email">Last Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Gender</label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" required="" name="sgender" style="height: 100%;">
                                                            <option selected="">Select Gender</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-md-1 control-label">Date Of Birth</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="dob">
                                                        <!-- <span class="col-md-2 input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span> -->
                                                    </div><!-- input-group -->
                                                    </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Address</label>
                                                    <div class="col-md-6">
                                                        <textarea class="form-control" rows="5" name="taddress"></textarea>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label" for="example-email">Phone Number</label>
                                                    <div class="col-md-6">
                                                        <input type="number" name="pnum" class="form-control" placeholder="Phone Number" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="example-email">Email</label>
                                                    <div class="col-md-6">
                                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Password</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="Password" class="form-control" placeholder="password" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Department</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="sDepartment" required  id="selectDepartment" style="height: 100%;">
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
                                                    <label class="col-md-2 control-label">Select Position</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="sPosition" id="selectPosition" style="height: 100%;">
                                                      
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <button type="submit" class="btn btn-success waves-effect w-md waves-light m-b-5" name="login" >Save</button>
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
                                    <?php
                                        }
            
                                        
                                        if ($page == "1") {

                                            $querys = "select eID, eFirst_name, eLast_name, eGender, eDOB, eAddress, ePhone_number, eEmail, dDepartment, rDepartment_role, dDate from employee e join department d on e.dID = d.dID join  department_role r on e.rID = r.rID where status = '0'";
                                            $result = mysqli_query($connection, $querys);
                                            
                                            if ($result) {
                                    ?>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Gender</th>
                                                        <th>Date of Birth</th>
                                                        <th>Address</th>
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                        <th>Department</th>
                                                        <th>Position</th>
                                                        <th>DateCreated</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                        while($rows = mysqli_fetch_assoc($result)){
                                                            $num += 1;
                                                            $emp_id = $rows['eID'];

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $num ?></td>
                                                            <td><?php echo $rows["eFirst_name"]; ?></td>
                                                            <td><?php echo $rows["eLast_name"]; ?></td>
                                                            <td><?php echo $rows["eGender"]; ?></td>
                                                            <td><?php echo $rows["eDOB"]; ?></td>
                                                            <td><?php echo $rows["eAddress"]; ?></td>
                                                            <td><?php echo $rows["ePhone_number"]; ?></td>
                                                            <td><?php echo $rows["eEmail"]; ?></td>
                                                            <td><?php echo $rows["dDepartment"]; ?></td>
                                                            <td><?php echo $rows["rDepartment_role"]; ?></td>
                                                            <td><?php echo $rows["dDate"]; ?></td>
                                                            <td><a href="delete_emp.php?id=<?php echo $emp_id ?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="fa fa-remove"></i></a></td>
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                    <?php
                                                
                                            }
                                        }
                                        if ($page == "2"){
                                            
                                    ?>
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-box">
                                            <div class="table-responsive">
                                                <div class="col-md-12 form-group">
                                                <h4 class="mb-5">Edit Employee Details</h4>
                                                    <form class="form-horizontal" role="form" action="" method="POST">
                                                        <div class="col-md-offset-3 col-md-3">
                                                            <select class="form-control" name="selectEmployee" required  id="selectEmp" style="height: 100%;">
                                                                <option selected>Select Employee</option>
                                                                    <?php 
                                                                        $query = "select eID, eFirst_name, eLast_name from employee";
                                                                        $result = mysqli_query($connection, $query);
                                                                        if ($result) {
                                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                                $id = $row['eID'];
                                                                    ?>
                                                                        <option value="<?php echo  $id; ?>"><?php echo $row['eFirst_name']. " " .$row['eLast_name']; ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                    <div class="" id="editForm">
                                        
                                    </div>
                                    <?php
                                        }

                                    ?>
                                </div>
                                
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <?php include("inc/notification.php") ?>        
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


        <?php include("inc/scripts.php") ?>        
        <script>
            // ajax to call function on select
            $(document).ready(function() {
                $("#selectDepartment").change(function (){
                    var id = $(this).val();
                    var dataValue = 'id=' + id;
                    $.ajax({
                        type: "POST",
                        url: "functions.php",
                        data: dataValue,
                        cache: false,
                        success: function(html){
                            $("#selectPosition").html(html);
                        }
                    });
                });
            });
            
            $(document).ready(function() {
                $("#selectEmp").change(function (){
                    var id = $(this).val();
                    var dataValue = 'id=' + id;
                    $.ajax({
                        type: "POST",
                        url: "edit_employee.php",
                        data: dataValue,
                        cache: false,
                        success: function(html){
                            $("#editForm").html(html);
                        }
                    });
                });
            });
        </script>
        

    </body>
</html>