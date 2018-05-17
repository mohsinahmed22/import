<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 2:43 PM
 */
?>
<?php include("../includes/header.php");?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form id="brand" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Role <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select  name="role" class="form-control" required>
                                <option value="">Choose..</option>
                                <option value="administrator">Administrator</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Brand Url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="req_url" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>



                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" nam="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php include("../includes/footer.php");?>