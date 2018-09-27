
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
								<h4 class="m-b-30 m-t-0 header-title"><b>Available Loans</b></h4>
								<form action="#">
									<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Loan Type</th>
                                                <th>Minimum Value</th>
                                                <th>Maximum Value</th>
                                                <th>Interest Rate</th>
                                                <th>Pay Back Option</th>
                                                <th>Deduction Rate</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $querys = "select * from loan_type ";
                                                $results = mysqli_query($connection, $querys);
                                                    while($rows = mysqli_fetch_assoc($results)){
                                                        $num += 1;

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $num ?></td>
                                                            <td><?php echo $rows["loan_type"]; ?></td>
                                                            <td><?php echo $rows["Amount_range_min"]; ?></td>
                                                            <td><?php echo $rows["Amount_range_max"]; ?></td>
                                                            <td><?php echo $rows["Interest_rate"]; ?></td>
                                                            <td><?php echo $rows["Pay_Back_Options"]; ?></td>
                                                            <td><?php echo $rows["deduction_rate"]; ?></td>
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card-box">
								<h4 class="m-b-30 m-t-0 header-title"><b>Loan Application</b></h4>
									<form action="" method="POST" class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-2 control-label">Loan</label>
											<div class="col-sm-6">
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
										<div class="form-group">
											<label class="col-sm-2 control-label">Amount</label>
											<div class="col-sm-6">
												<input type="number" name="loanAmount" class="form-control" placeholder="Enter Amount within range" required>
											</div>
										</div>
										<div class="form-group ">
											<div class=" col-md-offset-11 col-md-1">
                                                <button type="submit" name="requestLoan" class="btn btn-icon waves-effect waves-light btn-success m-b-5"> <i class="fa fa-thumbs-o-up"></i> </button>
                                            </div>
										</div>
								</form>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<?php 
            if (isset($_POST['requestLoan'])) {
                $selectLoan = $_POST['sLoan'];
                $loanAmount = $_POST['loanAmount'];
                $sql = "select * from loan_type where tID = '$selectLoan'";
                $check = mysqli_query($connection, $sql);
                $val = mysqli_fetch_assoc($check);
                if ($loanAmount < $val['Amount_range_min'] || $loanAmount > $val['Amount_range_max']) {
        ?>
                <script>
                    alert("Amount Must Be Within Range");
                </script>
        <?php
                }elseif ($loanAmount > $val['Amount_range_min'] || $loanAmount < $val['Amount_range_max']){
                $querys = "insert into loan (eid, tid, Amount, date_times, decided) values ('$userid','$selectLoan', '$loanAmount', now(), '0') ";
                $results = mysqli_query($connection, $querys);
                    if ($results) {
        ?>
                <script>
                    alert("Applied Successfully");
                </script>
        <?php
                        }
                    }else{die("Unable to Apply at the moment ". mysqli_error());}
                }
        ?>

		<!-- scripts -->
		<?php include("inc/scripts.php"); ?>     
		<!-- script end    -->
	</div>
</body>
</html>
