<?php 
include("start_Session.php");
include("sql_connection.php");
// include("loan_not.php");

$query = "select * from allowances where eID = '$userid' ";
$querys = "select * from salary where eID = '$userid' ";
$result = mysqli_query($connection, $query);
$results = mysqli_query($connection, $querys);


if ($row = mysqli_fetch_assoc($result)) {
    $transport = $row['Transport'];
    $housing = $row['Housing'];
    $clothing = $row['Clothing'];
    $feeding = $row['Feeding'];
    $special = $row['special'];
}

if ($rows = mysqli_fetch_assoc($results)) {
    $salary = $rows['monthly_salary'];
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
<!--                     <div class="row">
                        <div class="col-lg-4">
                            <div class="card-box">
                                <form action="#">
                                    <div class="table-responsive">
                                     <h4 class="m-t-0 header-title"><b>Notification</b></h4>

                                    <p></p>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div> -->
					<div class="row">
						<div class="col-lg-4">
							<div class="card-box">
								<form action="#">
									<div class="table-responsive">
                                     <h4 class="m-t-0 header-title"><b>Income</b></h4>

                                    <table class="tablesaw table m-b-0" >
                                        <thead>
                                        <tr>
                                            <th scope="col">Monthly Salary</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Monthly Salary</td>
                                            <td><?php echo $salary; ?></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    </div>
								</form>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="card-box">
							   <div class="table-responsive">
                                     <h4 class="m-t-0 header-title"><b>Income</b></h4>

                                    <table class="tablesaw table m-b-0" >
                                        <thead>
                                        <tr>
                                            <th scope="col">Allowance</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Transport</td>
                                            <td><?php echo $transport; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Housing</td>
                                            <td><?php echo $housing; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Clothing</td>
                                            <td><?php echo $clothing; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Feeding</td>
                                            <td><?php echo $feeding; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Special</td>
                                            <td><?php echo $special; ?></td>
                                        </tr>

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
