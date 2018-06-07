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
                        <h2>Custom Duties & Charges List
                            <small></small>
                        </h2>
                        <p><a href="add.php?cdt=addnew" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Custom Duties & Taxes</a>
                        </p>
                        <?php echo $msg; ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Custom Duties & Taxes</th>
                                <th>Charges (%)</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php foreach ($cdt as $item): ?>
                                <tr>
                                    <td><?php echo $item->id ?></td>
                                    <td><?php echo $item->name ?></td>
                                    <td><?php echo $item->charges ?>%</td>
                                    <td><a href="edit.php?cdt=<?php echo $item->id ?>">Edit</a> | <a
                                            href="customdutiestaxes.php?delete=<?php echo $item->id ?>">Delete</a></td>
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