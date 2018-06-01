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
                    <h2><img src="<?php echo BASE_ADMIN_IMAGE_URI . "/brandlogo/" . $brand->img ?>" width="30" height="30"/> <?php echo $brand->brandname ?> -<a href='<?php echo $brand->url?>' target='_blank'><small style='font-size:12px;'><?php echo $brand->url?></small></a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <form id="brand" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Region/Country <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="region_name" class="form-control col-md-7 col-xs-12">
<!--                                    <option value="--><?php //echo $reg->region_code ?><!--" --><?php //if($region_names ==  $reg->region_code){ echo " selected"; }?><!-->--><?php //echo $reg->region_name ?><!--</option>-->
                                    <?php foreach($region as $reg):?>
                                        <option value="<?php echo $reg->region_code ?>" <?php echo ($reg->region_code == $brand->region_name)? 'Selected': ""?>><?php echo $reg->region_name ?></option>
                                    <?php endforeach; ?>
                                </select>
<!--                                <input type="text" name="brandname" required="required" class="form-control col-md-7 col-xs-12">-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Brand Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="brandname" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $brand->brandname ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Brand Url<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="brandurl" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $brand->url ?>">
                                <p class="help-block">Example: http:\\www.exmaple.com</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Brand Logo<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="<?php echo BASE_ADMIN_IMAGE_URI . "/brandlogo/" . $brand->img ?>" width="80" height="80" style="margin:10px;"/>
                                <input type="file" name="brandlogo">
                            <p class="help-block">Please use images in square form</p>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Standard Charges<span class="required">*</span>
                            </label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <input type="number" class="form-control" name="standard_charges" placeholder="Please Enter Standard Charges" aria-describedby="basic-addon2" value="<?php echo $brand->standard_charges ?>">
                                <span class="input-group-addon" id="basic-addon2"><?php
//                                    if(isset($_POST['region_name'])){
//                                        $region_names = $_POST['region_name'];
//                                    }
//                                    foreach($region as $reg):
//                                        if ($region_names == $reg->region_code){
//                                            echo  $reg->region_cur_symbol;
//                                        }else{
//                                            echo STORE_DEFAULT_CUR_SYMBOL;
//                                        }
//                                    endforeach;

//                                    switch($region_names){
//                                        case 'US': echo "USD"; break;
//                                        case 'CA': echo "CAD"; break;
//                                        case 'UK': echo "GBP"; break;
//                                        default: echo STORE_DEFAULT_CUR_SYMBOL; break;
//                                    }
                                    echo STORE_DEFAULT_CUR_SYMBOL; ?>
</span>

                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <p class="help-block">Standard charges applied on each item</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Items Limits for Standard Charges<span class="required">*</span>
                            </label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <input type="number" class="form-control" name="pcs_limit" placeholder="Please Enter Items Limits" aria-describedby="basic-addon2" value="2" value="<?php echo $brand->pcs_limit ?>">
                                <span class="input-group-addon" id="basic-addon2">Items</span>

                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <p class="help-block">This will ignore standard charges after given number</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">VAT Charges<span class="required">*</span>
                            </label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="vat_charges" placeholder="Please Enter VAT Charges " aria-describedby="basic-addon2" value="<?php echo $brand->vat_charges ?>">
                                <span class="input-group-addon" id="basic-addon2">%</span>

                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <p class="help-block">VAT charges according to brand in Percentage (%)</p>
                                </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $brand->id ?>">
                                <button type="submit" name="edit_brand" class="btn btn-success">Save Brand</button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<? include("../includes/footer.php");?>