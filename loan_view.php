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
                                        <form class="form-horizontal" role="form" action=" " method="POST">
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" value="" placeholder="New Loan" required name="newLoan">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" value="" placeholder="Minimum Value" required name="amountRangeMin">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" value="" placeholder="Maximum Value" required name="amountRangeMax">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" value="" placeholder="interest Rate" required name="interestRate">
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="payBack" required>
                                                    <option selected>Select Option</option>
                                                    <option>Monthly Deduction</option>
                                                    <option>Yearly Deduction</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" value="" placeholder="Deduction Rate" required name="deductionRate">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <div class=" col-md-offset-11 col-md-1">
                                                    <button type="submit" name="addLoan" class="btn btn-icon waves-effect waves-light btn-success m-b-5"> <i class="fa fa-thumbs-o-up"></i> </button>
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
                                    <div class="col-md-12 form-group">
                                        <form class="form-horizontal" role="form" action="" method="POST">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Loan</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="sLoan" required  id="selectLoan">
                                                    <option selected>Select Loan</option>
                                                        <?php 
                                                            $query = "select tID, loan_type from loan_type";
                                                            $result = mysqli_query($connection, $query);
                                                            if ($result) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $id = $row['tID'];
                                                        ?>
                                                            <option value=<?php echo  $id; ?>><?php echo $row['loan_type']; ?></option>
                                                        <?php
                                                                }
                                                            }
                                                        ?>
                                                </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                            <label class="col-md-2 control-label">Loan Name</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="" placeholder="Change Loan Name"  name="newLoan">
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                            <label class="col-md-2 control-label">Amount Range</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="" placeholder="Enter Minimum Value" required name="amountRangeMins">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" value="" placeholder="Enter Maximum Value" required name="amountRangeMaxs">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-2 control-label">Interest Rate</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" value="" placeholder="Enter Interest Rate" required name="interestRates">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-2 control-label">Pay Back Options</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="payBacks" required>
                                                        <option selected>Select Option</option>
                                                        <option>Monthly Deduction</option>
                                                        <option>Yearly Deduction</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-2 control-label">Deduction Rate</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" value="" placeholder="Enter Deduction Rate" required name="deductionRates">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-10 col-md-1">
                                                    <button type="submit" class="btn btn-success waves-effect w-xs waves-light m-b-1" name="updateLoan" >Update</button>
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
                                                <th>Loan Type</th>
                                                <th>Amount Range</th>
                                                <th>Interest Rate</th>
                                                <th>Pay Back Options</th>
                                                <th>Deduction Rate</th>
                                                <th>Last Updated</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $querys = "select * from loan_type";
                                                $results = mysqli_query($connection, $querys);
                                                    while($rows = mysqli_fetch_assoc($results)){
                                                        $num += 1;

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $num ?></td>
                                                            <td><?php echo $rows["loan_type"]; ?></td>
                                                            <td><?php echo $rows["Amount_range_min"]. "-" .$rows["Amount_range_max"]; ?></td>
                                                            <td><?php echo $rows["Interest_rate"]; ?></td>
                                                            <td><?php echo $rows["Pay_Back_Options"]; ?></td>
                                                            <td><?php echo $rows["deduction_rate"]; ?></td>
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
            if (isset($_POST['addLoan'])) {
                $newLoan = $_POST['newLoan'];
                $amountMin = $_POST['amountRangeMin'];
                $amountMax = $_POST['amountRangeMax'];
                $interest = $_POST['interestRate'];
                $payBack = $_POST['payBack'];
                $deduction = $_POST['deductionRate'];

                $query = "insert into loan_type (loan_type, Amount_range_min, Amount_range_max, Interest_rate, Pay_Back_Options, deduction_rate, date_time, status) values ('$newLoan','$amountMin', '$amountMax', '$interest', '$payBack', '$deduction', now(), '0') ";
                $result = mysqli_query($connection, $query);
                    if ($result) {
        ?>
                <script>
                    alert("Loan Created");
                    window.location.href = 'loan_view.php';
                </script>
        <?php
                    }else{die();}
                }
        ?>

        <?php 
            if (isset($_POST['updateLoan'])) {
                $id = $_POST['sLoan'];
                // $newLoan = $_POST['newLoan'];
                $amountMin = $_POST['amountRangeMins'];
                $amountMax = $_POST['amountRangeMaxs'];
                $interest = $_POST['interestRates'];
                $payBack = $_POST['payBacks'];
                $deduction = $_POST['deductionRates'];

                $querys = "UPDATE loan_type SET Amount_range_min = '$amountMin', Amount_range_max = '$amountMax', Interest_rate = '$interest', Pay_Back_Options = '$payBack', deduction_rate = '$deduction', date_time = now() WHERE tid = '$id'";
                $results = mysqli_query($connection, $querys);
                    if ($results) {
        ?>
                <script>
                    alert("Loan Updated");
                    window.location.href = 'loan_view.php';
                </script>
        <?php
                    }else{die("Can't update loan at the moment");}
                }
        ?>
		<!-- scripts -->
		<?php include("inc/scripts.php"); ?>     
		<!-- script end    -->
	</div>
</body>
</html>
