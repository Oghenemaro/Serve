<?php 
include("start_Session.php");
include("sql_connection.php");

?> 
<!DOCTYPE html>
<html>
<head>
	<?php include("inc/header.php"); ?>        
</head>
<body class="fixed-left">
	<div id="wrapper">
		<!-- top bar start -->
		<?php include("inc/top_bar.php"); ?>        
		<!-- top bar end -->
		<!-- menu start -->
		<?php include("inc/menu.php"); ?>        
		<!-- menu end -->

		<div class="content-page">
			<div class="content">
				<div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <div class="table-responsive">
                                    <div class="col-md-12 form-group">
                                        <form class="form-horizontal" role="form" action="" method="POST">
                                            <div class="form-group">
                                                <div class="col-md-offset-1 col-md-3">
                                                    <select class="form-control" name="sEmployee" required  id="selectEmployee">
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
                                                <div class="col-md-3">
                                                    <select class="form-control" name="sSalaryType" required  id="selectEmployee">
                                                        <option selected>Select Salary Type</option>
                                                        <?php 
                                                                $query = "select ssid, Payment_type, taxable from salary_structure";
                                                                $result = mysqli_query($connection, $query);
                                                                if ($result) {
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        $id = $row['ssid'];
                                                            ?>
                                                                <option value="<?php echo  $id; ?>"><?php echo $row['eFirst_name']. " " .$row['eLast_name']; ?></option>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>

                                                    </select>
                                                </div>
                                                <div class="col-md-1 radio radio-success">
                                                    <input type="radio" name="radio" id="radio4" value="">
                                                    <label for="radio4">
                                                        Taxable
                                                    </label>
                                                </div>
                                                <div class="col-md-1 radio radio-success">
                                                    <input type="radio" name="radio" id="radio5" value="">
                                                    <label for="radio5">
                                                        Non Taxable
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                               
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-1 col-md-3">
                                                    <input type="text" class="form-control" value="" placeholder="Enter New Salary Type" required name="sNewSalary">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="" placeholder="Enter Amount" required name="sAmount">
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="submit" name="send" class="btn btn-icon waves-effect waves-light btn-success m-b-5"> <i class="fa fa-thumbs-o-up"></i> </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card-box">
							        <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Name</th>
                                                <th>Payment</th>
                                                <th>Amount </th>
                                                <th>Taxable </th>
                                                <th>Last Updated </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $querys = "select e.eFirst_name, e.eLast_name, s.salary_type, s.amount, s.taxable, s.date_time from salary s join employee e on s.eid = e.eid where status = '0'";
                                                $result = mysqli_query($connection, $querys);
                                                    while($rows = mysqli_fetch_assoc($result)){
                                                        $num += 1;
                                                        $val = "";
                                                        if($rows["taxable"] == 1){
                                                            $val = "Yes";
                                                        }else if($rows["taxable"] == 0){
                                                            $val = "No";
                                                        }

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $num; ?></td>
                                                            <td><?php echo $rows["eFirst_name"]." ".$rows["eLast_name"]; ?></td>
                                                            <td><?php echo $rows["salary_type"]; ?></td>
                                                            <td><?php echo $rows["amount"]; ?></td>
                                                            <td><?php echo $val; ?></td>
                                                            <td><?php echo $rows["date_time"]; ?></td>
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <?php 
            if (isset($_POST['send'])) {
                
                $id = $_POST['sEmployee'];
                $sSalaryType = $_POST['sSalaryType'];
                $newSalary = $_POST['sNewSalary'];
                $sAmount = $_POST['sAmount'];
                
                $query = "select eID from salary where eID = '$id' ";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                
                $emp_id  = $row['eID'];
                if ($emp_id == $id) {
                    $sql_query = "UPDATE salary SET monthly_salary = '$newSalary', date_time = now() WHERE eid = '$id'";
                    $sql_result = mysqli_query($connection, $sql_query);
                    if ($sql_result) {
        ?>
                        <script>
                            alert("Record Updated");
                            window.location.href = 'salary.php';
                        </script>
        <?php
                    }
                }elseif ($emp_id !== $id) {
                    $sql_querys = "insert into salary (eID, salary_type, amount, taxable, date_time) values ('', '', '', '', now()) ";
                    $sql_results = mysqli_query($connection, $sql_querys);
                    if ($sql_results) {

        ?>
                <script>
                    alert("Record Inserted");
                    window.location.href = 'salary.php';
                </script>
        <?php
                        
                    }
                }
            }
        ?>

		<!-- scripts -->
		<?php include("inc/scripts.php"); ?>     
		<!-- script end    -->
	</div>
</body>
</html>
