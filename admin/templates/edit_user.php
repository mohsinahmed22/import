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
                    <h2>Edit User (<?php echo $u->first_name ." " . $u->last_name;?>)</h2>
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
                    <form id="brand" data-parsley-validate class="form-horizontal form-label-left" method="post">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="radio" class="flat" name="is_active" value="1"  <?php echo ($u->is_active == 1)? "checked=''" : ""; ?> /> Active &nbsp; &nbsp;
                                 <input type="radio" class="flat" name="is_active" value="0"  <?php echo ($u->is_active == 0)? "checked=''" : ""; ?>/> Disable
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Role <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  name="role" class="form-control" required>
                                    <option value="administrator" <?php echo ($u->role == 1)? "selected=''" : ""; ?>>Administrator</option>
                                    <option value="staff" <?php echo ($u->role == 1)? "selected=''" : ""; ?>>Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $u->username ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="password" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $u->password ?>">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="first_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $u->first_name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="last_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $u->last_name ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $u->email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="phone" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $u->phone ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea  name="address" required="required" class="form-control col-md-7 col-xs-12"><?php echo $u->address ?></textarea>
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $u->id ?>">
                                <button type="submit" name="edit_user" class="btn btn-success">Save User</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<? include("../includes/footer.php");?>