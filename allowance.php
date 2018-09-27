<?php 
include("start_Session.php");
include("sql_connection.php");

?> 
<!DOCTYPE html>
<html>
<head>
	<?php include("inc/header.php"); ?>        
	<title></title>
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
                                            <label class="col-md-2 control-label">Employee</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="aEmployee" required  id="allowanceEmployee">
                                                        <option selected>Select Employee</option>
                                                        <?php 
                                                            $query = "select eID, eFirst_name, eLast_name from employee";
                                                            $result = mysqli_query($connection, $query);
                                                            if ($result) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $id = $row['eID'];
                                                        ?>
                                                            <option value=<?php echo  $id; ?>><?php echo $row['eFirst_name']. " " .$row['eLast_name']; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-offset-5 col-md-1">
                                                    <button type="submit" name="send" class="btn btn-icon waves-effect waves-light btn-success m-b-5"> <i class="fa fa-thumbs-o-up"></i> </button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Transport</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="" placeholder="Enter Transport Allowance" required name="transportAllowance">
                                                    </div>
                                                <label class="col-md-1 control-label">Housing</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="" placeholder="Enter Housing Allowance" required name="housingAllowance">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Clothing</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="" placeholder="Enter Clothing Allowance" required name="clothingAllowance">
                                                    </div>
                                                <label class="col-md-1 control-label">Feeding</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" value="" placeholder="Enter Feeding Allowance" required name="feedingAllowance">
                                                    </div>
                                            </div>
                                            <div class="form-group">
          
                                            <label class="col-md-2 control-label">Special</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" value="" placeholder="Enter Special Allowance" required name="specialAllowance">
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
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee</th>
                                                <th>Transport</th>
                                                <th>Housing</th>
                                                <th>Clothing</th>
                                                <th>Feeding</th>
                                                <th>Special</th>
                                                <th>Last Updated</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $querys = "select e.eFirst_name, e.eLast_name, a.Housing, a.Transport, a.Clothing, a.Feeding, a.special, a.date_time from allowances a join employee e on a.eid = e.eid where status = '0'";
                                                $result = mysqli_query($connection, $querys);
                                                    while($rows = mysqli_fetch_assoc($result)){
                                                        $num += 1;

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $num ?></td>
                                                            <td><?php echo $rows["eFirst_name"]." ".$rows["eLast_name"]; ?></td>
                                                            <td><?php echo $rows["Transport"]; ?></td>
                                                            <td><?php echo $rows["Housing"]; ?></td>
                                                            <td><?php echo $rows["Clothing"]; ?></td>
                                                            <td><?php echo $rows["Feeding"]; ?></td>
                                                            <td><?php echo $rows["special"]; ?></td>
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
                $id = $_POST['aEmployee'];
                // $id = 1;
                $transport = $_POST['transportAllowance'];
                $housing = $_POST['housingAllowance'];
                $clothing = $_POST['clothingAllowance'];
                $feeding = $_POST['feedingAllowance'];
                $special = $_POST['specialAllowance'];

                $query = "select eID from allowances where eID = '$id' ";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                $emp_id  = $row['eID'];
                if ($emp_id == $id) {
                    $sql_query = "UPDATE allowances SET Transport = '$transport', Housing = '$housing', Clothing = '$clothing', Feeding = '$feeding', special = '$special', date_time = now() WHERE eid = '$id'";
                    $sql_result = mysqli_query($connection, $sql_query);
                    if ($sql_result) {
        ?>
                        <script>
                            alert("Record Updated");
                            window.location.href = 'allowance.php';
                        </script>
        <?php
                    }
                }elseif ($emp_id !== $id) {
                    $sql_querys = "insert into allowances (eID, Transport, Housing, Clothing, Feeding, special, date_time) values ('$id','$transport', '$housing', '$clothing', '$feeding', '$special', now()) ";
                    $sql_results = mysqli_query($connection, $sql_querys);
                    if ($sql_results) {

        ?>
                <script>
                    alert("Record Inserted");
                    window.location.href = 'allowance.php';
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
