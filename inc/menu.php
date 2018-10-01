<?php 
include("start_Session.php");
?> 
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="assets/images/users/logo.png" alt="user-img" class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="#"><?php echo $lastname;?></a> </h5>
            <ul class="list-inline">

                            <li>
                                <a href="login.php" class="text-custom">
                                    <i class="zmdi zmdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            <?php
                                if ($usertype == "0"){
                            ?> 
                        	<li class="text-muted menu-title">My Menu </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i> <span> Income </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="emp_salary.php">Income</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-item"></i><span> Loan </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="emp_loan.php">Apply for loan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="payslip.php" class="waves-effect"><i class="zmdi zmdi-email"></i><span> Payslip </span></a>
                            </li>
                            <li>
                                <a href="complaint.php" class="waves-effect"><i class="zmdi zmdi-email"></i><span> Make Complaint </span></a>
                            </li>
                            <?php
                                }else if($usertype == "1"){

                            ?> 
                            <li class="text-muted menu-title">My Menu </li>
                            <li>
                                <!-- <script type="text/javascript">
                                    function confirmUser(){
                                        confirm("Are You Sure You Want To Pay Out");
                                    }
                                </script> -->
                                <a href="payroll_payment.php" class="waves-effect" ><i class="zmdi zmdi-email"></i><span> Run Payroll </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i> <span> Staff Info</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="admin_employee.php?page=0 ">Add Staff</a></li>
                                    <li><a href="admin_employee.php?page=2">Edit Staff</a></li>
                                    <li><a href="admin_employee.php?page=1">Disable Staff</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i> <span>Staff Income </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="salary.php">Edit Salary</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-item"></i><span> Loans </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="loan_view.php">Create Loan </a></li>
                                    <li><a href="loan_apply.php">Grant Loan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="report_view.php" class="waves-effect"><i class="zmdi zmdi-email"></i><span> Report </span></a>
                            </li>
                            <li>
                                <a href="complaint.php" class="waves-effect"><i class="zmdi zmdi-email"></i><span> Complaints </span></a>
                            </li>
                            <?php
                                }
                            ?> 
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                   
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>