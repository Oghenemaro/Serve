<?php 
include ("start_Session.php");
$msg = "";
$flag = 0;
$flag = $_GET['flag'];
?>
<!DOCTYPE html>
<html>
    <head>
    <?php include("inc/header.php"); ?>
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.html" class="logo"><span>SERVE</span></a>
                <!-- <h5 class="text-muted m-t-0 font-600">Responsive Admin Dashboard</h5> -->
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
                </div>
                <div class="text-center">
                    
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" action="login_validation.php" method="post">

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" name="username" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" name="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                    <h5 style="color: red"><?php if ($flag == 1) {$msg = "incorrect username and password"; echo $msg;}else{$msg = "";} ?></h5>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                            <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit" name="login">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end card-box-->
        </div>
        <!-- end wrapper page -->
        <?php include("inc/scripts.php"); ?>
       
	
	</body>
</html>