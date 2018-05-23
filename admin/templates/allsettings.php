<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/23/2018
 * Time: 11:37 AM
 */

?>
<?php include("../includes/header.php"); ?>
<?php
//    $settingData = AssignSetting($settings);
//        print_r($settings);

?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Store Settings <small></small></h3>
        </div>
    </div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <!--                <h2><i class="fa fa-bars"></i> Setting<small>Float left</small></h2>-->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            <?php
            $currencies = currency_api();


            //echo $conversionResult['result'];
            ?>
        </div>
        <div class="x_content">

            <div class="col-xs-3">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left">
                    <li class="active"><a href="#general" data-toggle="tab">General</a>
                    </li>
<!--                    <li><a href="#water" data-toggle="tab">Water Billing</a>-->
<!--                    </li>-->
                    <!--<li><a href="#messages" data-toggle="tab">Messages</a>
                    </li>
                    <li><a href="#settings" data-toggle="tab">Settings</a>
                    </li>-->
                </ul>
            </div>

            <div class="col-xs-9">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        <h3>General Settings</h3>
                        <form class="form-horizontal form-label-left" action="settings.php" method="post">
                            <!--<div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Role</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">

                                    <select class="form-control" name="admin_user_role">
                                        <option value="Administrator">Administrator</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store Name: <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Store Name"
                                           name="store_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store url: <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="tel" class="form-control" placeholder="Store Url"
                                           name="store_url">
                                    <small>example: http://www.example.com</small>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store Phone: <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="tel" class="form-control" placeholder="Store Phone"
                                           name="store_phone">
                                    <small>+923313644820</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store Email: <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" placeholder="Store Email"
                                           name="store_email">
                                    <small>example@example.com</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store Address: <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Address"
                                           name="store_address">
                                    <small></small>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-success" name="general">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--<div class="tab-pane" id="other">
                        <form class="form-horizontal form-label-left" action="settings.php" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Role</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">

                                    <select class="form-control" name="admin_user_role">
                                        <option value="Administrator">Administrator</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Username <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Username"
                                           name="admin_user_username" required>
                                </div>
                            </div>
                        </form>
                    </div>-->
                    <!--<div class="tab-pane" id="messages">Messages Tab.</div>
                    <div class="tab-pane" id="settings">Settings Tab.</div>-->
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</div>


</div><?php include("../includes/footer.php"); ?>