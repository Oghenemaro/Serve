<?php 
include("start_Session.php");
include("sql_connection.php");


$empID = $_POST['id'];


$querys = "select eID, eFirst_name, eLast_name, eGender, eDOB, eAddress, ePhone_number, eEmail, dDepartment, rDepartment_role, dDate from employee e join department d on e.dID = d.dID join  department_role r on e.rID = r.rID where eID = '$empID' ";

$result = mysqli_query($connection, $querys);


if(!$result){
    die("Can't load employee record");
}else{
        $row = mysqli_fetch_assoc($result);
        $fname = $row['eFirst_name'];
        $lname = $row['eLast_name'];
        $gender = $row['eGender'];
        $dob = $row['eDOB'];
        $address = $row['eAddress'];
        $pnum = $row['ePhone_number'];
        $email = $row['eEmail'];
        $password = $row['ePassword'];
        $department = $row['dDepartment'];
        $position = $row['rDepartment_role'];
    }
?>



<form class="form-horizontal" role="form" action="update_emp.php" method="post">
    <div class="form-group">
        <label class="col-md-2 control-label">First Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="<?php echo $fname; ?>" placeholder="First Name" name="fname" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="example-email">Last Name</label>
        <div class="col-md-6">
            <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $lname;  ?>" required>
        </div>
    </div>
    <div class="form-group">
    <label class="col-md-2 control-label">Gender</label>
        <div class="col-md-3">
            <select class="form-control" required name="sgender" style="height: 100%;">
        <option selected="" ><?php echo $gender; ?></option>
            <option>Male</option>
            <option>Female</option>
            </select>
        </div>
        <label class="col-md-1 control-label">Date Of Birth</label>
        <div class="col-md-2">
            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="dob" value="<?php echo $dob; ?>">
            <!-- <span class="col-md-2 input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span> -->
        </div><!-- input-group -->
    </div>
<!--
    <div class="form-group">    
    </div>
-->
    <div class="form-group">
        <label class="col-md-2 control-label">Address</label>
        <div class="col-md-6">
            <textarea class="form-control" rows="5" name="taddress"><?php echo $address; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="example-email">Phone Number</label>
        <div class="col-md-6">
            <input type="number" name="pnum" class="form-control" placeholder="Phone Number" value="<?php echo $pnum; ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="example-email">Email</label>
        <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Password</label>
        <div class="col-md-6">
            <input type="text" name="Password" class="form-control" placeholder="password" value="<?php echo $password; ?>" disabled required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Department</label>
        <div class="col-md-6">
            <select class="form-control" name="sDepartment" required  id="selectDepartment" style="height: 100%;">
                <option selected><?php echo $department; ?></option>
                <?php 
                    $query = "select * from department";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['dID'];
                ?>
                            <option value="<?php echo  $row['dID']; ?>"><?php echo $row['dDepartment']; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-2 control-label">Position</label>
        <div class="col-md-6">
            <select class="form-control" name="sPosition" id="selectPosition" style="height: 100%;">
                <option selected><?php echo $position; ?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <input type="hidden" name="emp_id" value="<?php echo $empID; ?>" >
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success waves-effect w-md waves-light m-b-5" name="update" >Update</button>
    </div>
</form> 



<script>
    
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
</script>