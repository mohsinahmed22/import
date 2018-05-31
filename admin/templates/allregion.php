<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */
include("../includes/header.php"); ?>

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Country/ Region List
                            <small>Users</small>
                        </h2>
                        <p><a href="add.php?region=add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Region</a>
                        </p>
                        <?php echo $msg;?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Country Name</th>
                                <th>Code</th>
                                <th>Currency</th>
                                <th>Currency Symbol</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php foreach ($region as $reg): ?>
                                <tr>
                                    <td><?php echo $reg->id ?></td>
                                    <td class="text-center"><?php echo $reg->region_name ?></td>
                                    <td><?php echo $reg->region_code ?></td>
                                    <td><?php echo $reg->region_cur ?></td>
                                    <td><?php echo $reg->region_cur_symbol ?></td>
                                    <td><a href="edit.php?brand=<?php echo $reg->id ?>">Edit</a> | <a
                                            href="region.php?delete=<?php echo $reg->id ?>">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? include("../includes/footer.php"); ?>