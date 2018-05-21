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
                        <h2>Order List
                            <small>Users</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer ID</th>
                                <th>Order Date</th>
                                <th>Qty Total</th>
                                <th>Shipping Total</th>
                                <th>Product Total</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $req): ?>
                                <tr>
                                    <td>#00<?php echo $req->id ?></td>
                                    <td><?php echo $req->customer_id ?></td>
                                    <td><?php echo $req->request_date ?></td>
                                    <td><?php echo $req->request_total_qty ?></td>
                                    <td><?php echo $req->request_total_shipping_amount ?></td>
                                    <td><?php echo $req->request_total_product_amount ?></td>
                                    <td><?php echo $req->request_total_amount ?></td>
                                    <td><?php echo $req->request_status ?></td>
                                    <td><a href="view.php?order=<?php echo $req->id ?>&customer=<?php echo $req->customer_id; ?>">View</a> | <a
                                            href="delete.php?order=<?php echo $req  ->id ?>">Delete</a></td>
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