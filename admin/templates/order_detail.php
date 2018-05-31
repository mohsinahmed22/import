<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 5/19/2018
 * Time: 3:16 PM
 */?>
<?php include("../includes/header.php"); ?>
    <div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Order Detail <small>Importhub.pk</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <section class="content invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12 invoice-header">
                                <h1>
                                    <i class="fa fa-globe"></i> Invoice.
                                    <small class="pull-right">Date: <?php echo $order_detail->request_date; ?></small>
                                </h1>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Import Hub.</strong>
                                    <br>Address
                                    <br>Karachi, Pakistan.
                                    <br>Phone: 92 000 000 0000
                                    <br>Email: info@importhub.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong><?php echo $customer_detail->first_name . " " . $customer_detail->last_name ?></strong>
                                    <br><?php echo $customer_detail->address ?>
                                    <br>Phone: <?php echo $customer_detail->phone ?>
                                    <br>Mobile:<?php echo $customer_detail->mobile ?>
                                    <br>Email: <?php echo $customer_detail->email ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <br>
                                <br>
                                <b>Order Status:</b> <?php echo $order_detail->request_status ?><br/>
                                <b>Order ID:</b> #00<?php echo $order_detail->id ?><br/>
                                <b>Customer Type:</b> <?php echo $customer_detail->customer_type ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">Brand (Region)</th>
                                        <th style="width: 25%">Url</th>
                                        <th style="width: 25%">Order Details</th>
                                        <th>Qty</th>
                                        <th>VAT</th>
                                        <th>Price</th>
                                        <th>Standard Charges</th>
                                        <th>Shipping /Per Item</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   <?php foreach ($requested_items as $item):?>
                                    <tr>
                                        <td><?php echo $item->brandname; ?> (<?php echo $item->region_name; ?>)</td>
                                        <td><?php  echo $item->req_item_url ?></td>
                                        <td><strong>Color:</strong> <?php echo $item->req_item_color;?><br>
                                            <strong>Size:</strong>  <?php echo $item->req_item_size; ?><br>
                                            <strong>Description:</strong>  <?php echo $item->req_item_description;?></td>
                                        <td><?php  echo $item->req_item_qty ?></td>
                                        <td><?php  echo $item->vat_charges ?></td>
                                        <td><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php  echo $item->req_item_price ?></td>
                                        <td><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo $item->standard_charges ?></td>
                                        <td><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo $item->shipping_entity_cost ?></td>
                                        <td><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php  echo $item->req_item_total ?></td>
                                    </tr>
                                   <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-xs-6">
                                <p class="lead">Payment Methods:</p>
                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">

                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo $order_detail->request_total_product_amount ;?></td>
                                        </tr>
<!--                                        <tr>-->
<!--                                            <th>Tax (9.3%)</th>-->
<!--                                            <td>--><?php //echo STORE_DEFAULT_CUR_SYMBOL ?><!----><?php //?><!--</td>-->
<!--                                        </tr>-->
                                        <tr>
                                            <th>Shipping:</th>
                                            <td><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo $order_detail->request_total_shipping_amount ;?></td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo $order_detail->request_total_amount ;?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>

<? include("../includes/footer.php"); ?>