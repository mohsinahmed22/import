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
                    <li><a href="#currency" data-toggle="tab">Region / Currency</a>
                    </li>
                    <li><a href="#store_content" data-toggle="tab">Store Content</a></li>
                    <li><a href="#sliders" data-toggle="tab">Sliders</a></li>
                    <!--<li><a href="#messages" data-toggle="tab">Messages</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a>
                    </li>-->
                </ul>
            </div>

            <div class="col-xs-9">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        <h3>General Settings</h3>
                        <form class="form-horizontal form-label-left" action="setting.php" method="post">
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
                                           name="store_name" value="<?php echo $assginSetting->store_name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store url: <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="tel" class="form-control" placeholder="Store Url"
                                           name="store_url"  value="<?php echo $assginSetting->store_url; ?>">
                                    <small>example: http://www.example.com</small>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store Phone: <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="tel" class="form-control" placeholder="Store Phone"  value="<?php echo $assginSetting->store_phone; ?>"
                                           name="store_phone">
                                    <small>+923313644820</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store Email: <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" placeholder="Store Email"  value="<?php echo $assginSetting->store_email; ?>"
                                           name="store_email">
                                    <small>example@example.com</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store Address: <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Address"  value="<?php echo $assginSetting->store_address; ?>"
                                           name="store_address">
                                    <small></small>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-success" name="general">Save Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="currency">
                        <form class="form-horizontal form-label-left" action="setting.php" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select  class="form-control" name="default_region">
                                       <?php foreach ($region as $r): ?>
                                        <option value="<?php echo $r->region_name ?>" <?php echo ($assginSetting->default_region == $r->region_name)? 'selected':""; ?>
                                        ><?php echo  $r->region_name ?></option>
                                       <?php endforeach;?>
                                    </select>
                                    <small>Default Country "Pakistan"</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Currency <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select  class="form-control"  name="default_currency">
                                        <?php foreach ($region as $r): ?>
                                            <option value="<?php echo $r->region_cur ?>" <?php echo ($assginSetting->default_currency == $r->region_cur)? 'selected':""; ?>
                                            ><?php echo  $r->region_cur  ?> (<?php echo  $r->region_cur_symbol  ?>)</option>
                                        <?php endforeach;?>
                                    </select>
                                        <small>ex: Default Currency is "PKR"</small>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Conversion Currency <span
                                        class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select  class="form-control"  name="default_conversion_currency">
                                        <?php foreach ($region as $r): ?>
                                            <option value="<?php echo $r->region_cur ?>" <?php echo ($assginSetting->default_conversion_currency == $r->region_cur)? 'selected':""; ?>
                                            ><?php echo  $r->region_cur ?> (<?php echo  $r->region_cur_symbol  ?>)</option>
                                        <?php endforeach;?>
                                    </select>
                                    <small>ex: Default Conversion Currency is "USD"</small>
                                </div>

                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-success" name="currency">Save Currency Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="store_content">
                        <h3>General Settings</h3>
                        <form class="form-horizontal form-label-left" action="setting.php" method="post">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Order Page Content: <span
                                            class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="store_instruction" class="form-control" cols="30" rows="10">
                                        <?php echo $assginSetting->store_instruction ?>
                                    </textarea>
                                    <h3>Preview</h3>
                                    <?php echo $assginSetting->store_instruction ?>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-success" name="store_content">Save Currency Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="sliders">
                        <h3>Silders</h3>
                        <div class="row">
                            <form action="add.php?slide=add" method="post">
                            <div class="col-sm-12"><button type="submit" class="btn btn-success pull-right" name="store_content">Add Slides</button></div>
                            </form>
                            <hr>


                            <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">

                                    <?php
                                     $count = 0;
                                    foreach ($allSlides as $slide): ?>
                                        <div class="item <?php echo ($count == 0) ? 'active ': ''; $count++ ?>">
                                            <img src="../assets/images/sliders/<?php echo $slide->img_path ?>" alt="<?php echo $slide->img_title?>">
                                            <div class="carousel-caption"></div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <hr/>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Slider Image</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                    <tbody>
                                <?php foreach ($allSlides as $slide): ?>
                                    <tr>
                                        <td><img src="../assets/images/sliders/<?php echo $slide->img_path ?>" width="150"/></td>
                                        <td><?php echo  $slide->img_title ?></td>
                                        <td><a href="setting.php?delete=<?php echo $slide->id ?>">Delete</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>


                    <!--<div class="tab-pane" id="messages">Messages Tab.</div>
                    <div class="tab-pane" id="settings">Settings Tab.</div>-->
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</div>


</div><?php include("../includes/footer.php"); ?>