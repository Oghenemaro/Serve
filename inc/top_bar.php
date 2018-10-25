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
        <div class="container" style="padding: 0px; width: 100%;" >
            <!-- Page title -->
            <div class="row" style="border: 1px solid white; width: inherit; margin: 0px;">
                <div class="col-sm-6" style="margin: 0px;">
                    <ul class="nav navbar-nav navbar-left" >
                    <li>
                        <button class="button-menu-mobile open-left">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                    </li>
                    <li>
                        <h4 class="page-title">Welcome! <?php echo $lastname; ?></h4>
                    </li>
                    </ul>
                </div>
                <div class="col-sm-6" style="border: 1px solid red;  margin: 0px;">
                    <!-- Right(Notification and Searchbox -->
                    <ul class="nav navbar-nav navbar-right" style="border: 1px solid green;">
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