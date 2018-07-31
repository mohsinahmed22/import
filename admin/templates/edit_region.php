<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */
include("../includes/header.php");?>



<div class="right_col" role="main">
<h1><?php echo $title;?></h1>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Region (<?php echo $region->region_name ?>) </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="region" data-parsley-validate class="form-horizontal form-label-left" method="post">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country / Region <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="region_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $region->region_name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country Code <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="region_code" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $region->region_code ?>">
                                <small>Country Code like UK, US, PK, etc. (use Capital letters) (max 2 -3 words)</small>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Currency <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="region_cur" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $region->region_cur ?>">
                                <small>Currency Short Form like PKR , USD , GBP etc.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Currency Symbol <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="region_cur_symbol" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $region->region_cur_symbol ?>">
                                <small>Currency Symbol like Rs., $ etc.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Currency Exchange Rates <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="currency_exchange_rate" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $region->currency_exchange_rate ?>">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $region->id ?>">
                                <button type="submit" name="edit_region" class="btn btn-success">Save Region</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<? include("../includes/footer.php");?>