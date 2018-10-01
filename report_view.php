<?php 
include("start_Session.php");
include("sql_connection.php");
$query = "select *, e.eFirst_name, e.eLast_name from salary_report s join employee e on s.eid = e.eid";
$result = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($result)){
    $nums += 1;
    $totalSalary += $row['monthly_salary'];
    $totalAllowance += $row['allowance'];
}
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
						<div class="col-lg-4">
							<div class="card-box">
								<form action="#">
									<div class="table-responsive">
                                     <h4 class="m-t-0 header-title"><b>Statistics</b></h4>

                                    <table class="tablesaw table m-b-0" >
                                        <thead>
                                        <tr>
                                            <th scope="col" >Information</th>
                                            <th scope="col">Stats</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Total Employee</td>
                                            <td><?php echo $nums; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Salary Paid Out</td>
                                            <td><?php echo $totalSalary; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Allowance Paid</td>
                                            <td><?php echo $totalAllowance; ?></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    </div>
								</form>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="card-box">
							        <div class="table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Payment Stats</b></h4>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee</th>
                                                <th>Salary</th>
                                                <th>Total Allowance</th>
                                                <th>Gross Income</th>
                                                <th>Tax Paid</th>
                                                <th>Net Salary</th>
                                                <th>Date Paid</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $query = "select *, e.eFirst_name, e.eLast_name from salary_report s join employee e on s.eid = e.eid";
                                                    $result = mysqli_query($connection, $query);
                                                        while($rows = mysqli_fetch_assoc($result)){
                                                            $num += 1;
                                                            $emp_id = $rows['eID'];

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $num ; ?></td>
                                                            <td><?php echo $rows["eFirst_name"]. " ". $rows["eLast_name"]; ?></td>
                                                            <td><?php echo $rows["monthly_salary"]; ?></td>
                                                            <td><?php echo $rows["allowance"]; ?></td>
                                                            <td><?php echo $rows["Gross_income"]; ?></td>
                                                            <td><?php echo $rows["tax_paid"]; ?></td>
                                                            <td><?php echo $rows["net_salary"]; ?></td>
                                                            <td><?php echo $rows["date_times"]; ?></td>
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
		<!-- scripts -->
		<?php include("inc/scripts.php"); ?>     
		<!-- script end    -->
	</div>
</body>
</html>
