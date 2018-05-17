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
                        <h2>Brands List
                            <small>Users</small>
                        </h2>
                        <p><a href="add.php?brands=add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Brand</a>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Brand ID</th>
                                <th>Image</th>
                                <th>Brand Name</th>
                                <th>Brand Url</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php foreach ($brands as $brand): ?>
                                <tr>
                                    <td><?php echo $brand->id ?></td>
                                    <td class="text-center"><img src="images/brandlogo/<?php echo $brand->img ?>" width="50" height="50" /></td>
                                    <td><?php echo $brand->brandname ?></td>
                                    <td><?php echo $brand->url ?></td>
                                    <td><a href="edit.php?brand=<?php echo $brand->id ?>">Edit</a> | <a
                                            href="delete.php?brand=<?php echo $brand->id ?>">Delete</a></td>
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