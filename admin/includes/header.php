<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:19 PM
 */
ob_start();
$user = new User();
//if(!$user->is_logged_in()){
//    header("Location: login.php");
//    exit();
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin <?php echo STORE_NAME; ?></title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/green.css" rel="stylesheet">
    <link href="assets/css/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php" class="site_title"><span><?php echo STORE_NAME; ?></span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="assets/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>Admin</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="order.php"><i class="fa fa-home"></i> Order <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="customers.php"><i class="fa fa-home"></i> Customers <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="brands.php"><i class="fa fa-users"></i> Brands <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="users.php"><i class="fa fa-home"></i> Users <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="shipping.php"><i class="fa fa-home"></i> Shipping <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="customdutiestaxes.php"><i class="fa fa-home"></i> Custom Duties & Taxes <span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="region.php"><i class="fa fa-home"></i>  Region / Currency<span class="fa fa-chevron-right"></span></a></li>
                            <li><a href="setting.php"><i class="fa fa-home"></i> Settings <span class="fa fa-chevron-right"></span></a></li>

                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li  class="user-profile dropdown-toggle" ><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->