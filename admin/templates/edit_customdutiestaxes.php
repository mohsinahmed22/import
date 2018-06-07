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
                    <h2>Edit Custom Duties & Charges (<?php echo $cdt->name ;?>)</h2>
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
                    <form id="shipping" data-parsley-validate class="form-horizontal form-label-left" method="post">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Local Shipping Name <span class="required">*</span>
                            </label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" required="required" class="form-control" value="<?php echo $cdt->name ;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Local Shipping Cost Charges<span class="required">*</span>
                            </label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="charges" required="required" class="form-control" value="<?php echo $cdt->charges ;?>"  aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">%</span>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <p class="help-block">Standard charges applied on each item</p>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $cdt->id ?>">
                                <button type="submit" name="edit_customdutiestaxes" class="btn btn-success">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<? include("../includes/footer.php");?>