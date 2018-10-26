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
					<div class="row contentRow">
						<div class="col-lg-12">
							<div class="card-box">
								<form action="#">
									<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee</th>
                                                <th>Loan Type</th>
                                                <th>Amount</th>
                                                <th>Interest Rate</th>
                                                <th>Pay Back Option</th>
                                                <th>Status</th>
                                                <th>Date Applied</th>
                                                <th>Decide</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                	$query = "select l.eID, e.eFirst_name, e.eLast_name, l.Amount, t.loan_type, t.Interest_rate, t.Pay_Back_Options, t.deduction_rate, l.date_times from loan l join employee e on l.eID = e.eID join loan_type t on l.tid = t.tid where l.decided = '0' ";
                                                	$result = mysqli_query($connection, $query);
                                                        while($rows = mysqli_fetch_assoc($result)){
                                                            $num += 1;
                                                            $emp_id = $rows['eID'];

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $num; ?></td>
                                                            <td><?php echo $rows["eFirst_name"]. " ". $rows["eLast_name"]; ?></td>
                                                            <td><?php echo $rows["Amount"]; ?></td>
                                                            <td><?php echo $rows["loan_type"]; ?></td>
                                                            <td><?php echo $rows["Interest_rate"]; ?></td>
                                                            <td><?php echo $rows["Pay_Back_Options"]; ?></td>
                                                            <td><?php echo $rows["deduction_rate"]; ?></td>
                                                            <td><?php echo $rows["date_times"]; ?></td>
                                                            <td>
                                                            <a href="decide_loan.php?check=0&id=<?php echo $emp_id; ?>" class="btn btn-icon waves-effect waves-light btn-success m-b-5"> <i class="fa fa-thumbs-o-up"></i> </a>
                                                            <a href="decide_loan.php?check=1&id=<?php echo $emp_id; ?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="fa fa-remove"></i></a>
                                                            </td>
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
				</div>
			</div>
		</div>
		<!-- scripts -->
		<?php include("inc/scripts.php"); ?>     
		<!-- script end    -->
	</div>
</body>
</html>
