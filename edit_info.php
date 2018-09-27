<?php
	include("start_Session.php");
	// $username = $_SESSION['username'];
	include 'sql_connection.php';

	$query = "select * from employee where eEmail = '$username' ";
	$result = mysqli_query($connection, $query);
	if ($result) {
		$values = mysqli_fetch_assoc($result);
		$fname = $values['eFirst_name'];
		$lname = $values['eLast_name'];
		$gender = $values['eGender'];
		$dob = $values['eDOB'];
		$address = $values['eAddress'];
		$pnumber = $values['ePhone_number'];
		$email = $values['eEmail'];
		$pword = $values['ePassword'];
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
						<div class="col-lg-12">
								<h4 class="m-b-30 m-t-0 header-title"><b>Personal Information</b></h4>
									<form action=" " method="POST" class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-2 control-label">Firstname</label>
											<div class="col-sm-7">
												<input type="text" name="efname" class="form-control" value="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Lastname</label>
											<div class="col-sm-7">
												<input type="text" name="elname" class="form-control" value="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Gender</label>
											<div class="col-sm-7">
												<select class="form-control" name="egender" >
                                                    <option selected></option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Date of Birth</label>
											<div class="col-sm-7">
												<input type="Date" class="form-control" name="edob" value="" placeholder="yyyy-mm-dd">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Address</label>
											<div class="col-sm-7">
												<textarea class="form-control" rows="5" name="eaddress"> </textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Phone Number</label>
											<div class="col-sm-7">
												<input type="number" name="epnum" class="form-control" placeholder="Phone Number" value="" >
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Email</label>
											<div class="col-sm-7">
												<input type="email" name="eemail" class="form-control" placeholder="Email" value="" >
											</div>
										</div>
										<div class="form-group ">
											<div class="col-md-offset-8 col-md-5">
												<button type="submit" name="updateEmp" class="btn btn-success waves-effect w-md waves-light m-b-5">Update</button>
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
		if (isset($_POST['updateEmp'])) {
                $fnames = $_POST['efname'];
                $lnames = $_POST['elname'];
                $genders = $_POST['egender'];
                $dobs = $_POST['edob'];
                $eaddress = $_POST['eaddress'];
                $pnums = $_POST['epnum'];
                $emails = $_POST['eemail'];

                $fnames == "" ? $fnames = $fname : $fnames;
                $lnames == "" ? $lnames = $lname : $lnames;
                $genders == "" ? $genders = $gender : $genders;
                $dobs == "" ? $dobs = $dob : $dobs;
                $eaddress == "" ? $eaddress = $address : $eaddress;
                $pnums == "" ? $pnums = $pnumber : $pnums;
                $emails == "" ? $emails = $email : $emails;



                $querys = "UPDATE employee SET eFirst_name = '$fnames', eLast_name = '$lnames', eGender = '$genders', eAddress = '$eaddress', eDOB = '$dobs', ePhone_number = '$pnums', eEmail = '$emails', date_time = now() WHERE eid = '$userid'";
                $results = mysqli_query($connection, $querys);
                    if ($results) {
        ?>
                <script>
                    alert("Loan Updated");
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
