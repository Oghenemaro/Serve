<?php 
    include("start_Session.php");
?>

<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="login.php" class="logo"><span>SERVE</span><i class="zmdi zmdi-layers"></i></a>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container" style=" height: 80px; padding-top: 10px;  width: 100%;" >
            <!-- Page title -->
            <div class="row" style="width: inherit; margin: 0px;">
                <div class="col-sm-6" style="margin: 0px;">
                    <ul class="nav navbar-nav navbar-left" style="display: inline;" >
                    <li>
                        <button class="button-menu-mobile open-left">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                    </li>
                    <li>
                        <h2 class="page-title">Welcome! <?php echo $lastname; ?></h2>
                    </li>
                    </ul>
                </div>
                <div class="col-sm-6" style="margin: 0px;" >
                    <!-- Right(Notification and Searchbox -->
                    <ul class="nav navbar-nav navbar-right searchUL" style="display: inline;">
                        <li>
                        <!-- Notification -->
                            <div class="notification-box">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <a href="javascript:void(0);" class="right-bar-toggle">
                                            <i class="zmdi zmdi-notifications-none"></i>
                                        </a>
                                        <div class="noti-dot">
                                            <span class="dot"></span>
                                            <span class="pulse"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Notification bar -->
                        </li>
                        <li class="hidden-xs">
                            <form role="search" class="app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            
            
       </div><!-- end container -->
    </div><!-- end navbar -->
</div>

<?php include("notification.php") ?>