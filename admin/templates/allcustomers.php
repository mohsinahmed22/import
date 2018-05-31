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
                        <h2>Customers List
                            <small></small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Mobile</th>
                                <th>Address</th>
<!--                                <th>Actions</th>-->
                            </tr>
                            </thead>


                            <tbody>
                            <?php foreach ($customers as $customer): ?>
                                <tr>
                                    <td><?php echo $customer->customer_id ?></td>
                                    <td><?php echo $customer->first_name . $customer->last_name ?> </td>
                                    <td><?php echo $customer->email ?></td>
                                    <td><?php echo $customer->phone ?></td>
                                    <td><?php echo $customer->mobile ?></td>
                                    <td><a href="view.php?customer=<?php echo $customer->customer_id ?>">View</a></td>
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