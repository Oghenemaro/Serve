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
								<h4 class="m-b-30 m-t-0 header-title"><b>Monthly Slip</b></h4>
								<form action="#">
									<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Salary</th>
                                                <th>Transport Allowance</th>
                                                <th>Housing Allowance</th>
                                                <th>Clothing Allowance</th>
                                                <th>Feeding Allowance</th>
                                                <th>Special Allowance</th>
                                                <th>Gross Income</th>
                                                <th>Tax Paid</th>
                                                <th>Net Salary</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "select * from salary_report where eID = '$userid'";
                                                $querys = "select * from allowances where eID = '$userid'";
                                                    $result = mysqli_query($connection, $query);
                                                    $results = mysqli_query($connection, $querys);
                                                        while($rows = mysqli_fetch_assoc($result)){
                                                            $row = mysqli_fetch_assoc($results);
                                                            $num += 1;

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $num; ?></td>
                                                            <td><?php echo $rows["monthly_salary"]; ?></td>
                                                            <td><?php echo $row["Transport"]; ?></td>
                                                            <td><?php echo $row["Housing"]; ?></td>
                                                            <td><?php echo $row["Clothing"]; ?></td>
                                                            <td><?php echo $row["Feeding"]; ?></td>
                                                            <td><?php echo $row["special"]; ?></td>
                                                            <td><?php echo $rows["tax_paid"]; ?></td>
                                                            <td><?php echo $rows["Gross_income"]; ?></td>
                                                            <td><?php echo $rows["net_salary"]; ?></td>
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
