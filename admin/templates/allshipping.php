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
                        <p><a href="add.php?shipping=addnew" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Shipping</a>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Shipping ID</th>
                                <th>Shipping</th>
                                <th>Cost</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php foreach ($shippings as $ship): ?>
                                <tr>
                                    <td><?php echo $ship->id ?></td>
                                    <td><?php echo $ship->shipping_entity_name ?></td>
                                    <td><?php echo $ship->shipping_entity_cost ?></td>
                                    <td><a href="edit.php?shipping=<?php echo $ship->id ?>">Edit</a> | <a
                                            href="delete.php?shipping=<?php echo $ship->id ?>">Delete</a></td>
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