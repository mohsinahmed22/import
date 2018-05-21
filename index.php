<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 2:43 PM
 */ ?>

<?php include("includes/header.php"); ?>

<?php
$brands = new Brands();
$all_brands = $brands->getAllBrands();
$shipping = new Shipping();
$all_shipping = $shipping->getAllShipping();

function append_to_session_array($var_name)
{
    if (is_array($_SESSION[$var_name])) {
        if (!isset($_SESSION[$var_name])) {
            $_SESSION[$var_name] = "";
        } else {
            $_SESSION[$var_name][] = $_POST[$var_name];
        }

    } else {
        $_SESSION[$var_name] = array($_POST[$var_name]);
    }
}
if(isset($_GET['success'])){
    $msg = "<div class=\"alert alert-success\">". $_GET['success'] ."</div>";
    echo $msg;
}
if (isset($_POST['submit'])) {
    foreach (array('req_item_id', "brand_id", "shipping_id", 'req_item_url', 'brand_name', 'shipping_entity_name', 'req_item_qty', 'req_item_price', 'req_item_color') as $v) {
        append_to_session_array($v);
    }
    header('Location: index.php');

}
if(isset($_POST['placeorder'])){
    $customer = new Customer();
    $data = array();
    $data['first_name'] = $_POST['first_name'];
    $data['last_name'] = $_POST['last_name'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['mobile'] = $_POST['mobile'];
    $data['address'] = $_POST['address'];
    $data['customer_type'] = 'Guest';
    $data['request_total_amount'] = $_POST['request_total_amount'];
    $data['request_total_qty'] = $_POST['request_total_qty'];
    $data['request_total_product_amount'] = $_POST['request_total_product_amount'];
    $data['request_total_shipping_amount'] = $_POST['request_total_shipping_amount'];

    if($customer->register($data)){
        $request_order = new Order();
        $data['customer_id'] =  $customer->last_customer_insert_id();
        if($request_order->register($data)){
            $data['request_id'] = $request_order->last_request_insert_id();
            $item = array();

            for ($cntr = 0; $cntr < count($_SESSION['brand_id']); $cntr++) {
                $requested_item = new RequestItems();
                $item['customer_id']= $data['customer_id'];
                $item['request_id']= $data['request_id'];
                $item['brand_id']= $_SESSION['brand_id'][$cntr];
                $item['shipping_id']= $_SESSION['shipping_id'][$cntr];
                $item['req_item_url']= $_SESSION['req_item_url'][$cntr];
                $item['req_item_qty']= $_SESSION['req_item_qty'][$cntr];
                $item['req_item_price']= $_SESSION['req_item_price'][$cntr];
                $item['req_item_total']= $_SESSION['sub_total'][$cntr];

                $requested_item->register($item);
//                    session_unset();
//                    header("Location: index.php?success=".urlencode("Successfully Order!"));



            }
            session_unset();
            header("Location: index.php?success=".urlencode("Successfully Order!"));


        }
    }else{
        echo 'Failed';
    }


//    $data[''] = $_POST[''];
//    $data[''] = $_POST[''];
//    $data[''] = $_POST[''];


}
//print_r($_SESSION);
?>
<div class="container">
    <div class="row">
        <h1>Ordering Form</h1>
        <div class="col-sm-8 ordering_list">
            <h2>Ordering Form</h2>
            <form action="index.php" method="post">
                <div class="form-group">

                    <input type="url" name="req_item_url" class="form-control col-md-12" placeholder="Enter Brand Url">
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <select name="brand_id" class="form-control" required>
                            <option value="">Choose Brand</option>
                            <?php foreach ($all_brands as $brand): ?>
                                <option value="<?php echo $brand->id ?>"><?php echo $brand->brandname ?>
                                    <small><i></i></small>
                                </option>
                            <?php endforeach;; ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select name="shipping_id" class="form-control" required>
                            <option value="">Select Air Freight</option>
                            <?php foreach ($all_shipping as $ship): ?>

                                <option
                                    value="<?php echo $ship->shipping_entity_cost ?>"><?php echo $ship->shipping_entity_name ?>
                                    <small><i>(Rs.<?php echo $ship->shipping_entity_cost ?> each)</i></small>
                                </option>

                            <?php endforeach;; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><input type="number" name="req_item_qty" class="form-control col-md-12"
                                                 placeholder="Qty"></div>
                    <div class="col-sm-3"><input type="text" name="req_item_color" class="form-control  col-md-12"
                                                 placeholder="Color"></div>
                    <div class="col-sm-3"><input type="text" name="req_item_size" class="form-control col-sm-12"
                                                 placeholder="Size"></div>
                    <div class="col-sm-4"><input type="text" name="req_item_price" class="form-control col-sm-12"
                                                 placeholder="Price"></div>
                </div>
                <div>
                    <input type="hidden" name="shipping_entity_name" class="form-control col-md-7 col-xs-12"
                           value="<?php $ship->shipping_entity_name ?>">
                    <input type="hidden" name="brandname" class="form-control col-md-7 col-xs-12"
                           value="<?php echo $brand->brandname ?>">
                    <input type="hidden" name="req_item_id" class="form-control col-md-7 col-xs-12" value="0">
                    <button type="submit" name="submit" class="btn btn-success">Add To Cart</button>
                    <button class="btn btn-default submit" type="submit" name="reset">Reset</button>
                </div>

                <div class="clearfix"></div>
            </form>
            <?php if ($_SESSION):?>
            <br/><br>
            <div class="row">
                <div class="col-sm-12">
                    <h2>Product List</h2>
                        <ul class="list-unstyled product cart-list">
                            <?php for ($cntr = 0; $cntr < count($_SESSION['brand_id']); $cntr++) {?>
                            <?php $_SESSION['sub_total'][$cntr] = ($_SESSION['req_item_qty'][$cntr] * $_SESSION['req_item_price'][$cntr]);?>
                                <?php $_SESSION['shipping_total'][$cntr] = $_SESSION['shipping_id'][$cntr] * $_SESSION['req_item_qty'][$cntr] ?>
                            <li class="text-left">
                                <div class='close-box'>
                                    <form method='post'>
                                        <input name='brand_id_remove' type='hidden' value="<?php echo $cntr;  ?>"/>
                                        <button type='submit' name='remove' class='btn-default btn no-border'>
                                            <i class='fa fa-times text-right'></i>
                                        </button>
                                    </form>
                                    </div>
                                    <h4><strong><?php echo $_SESSION['req_item_url'][$cntr] ?></strong></h4>
                                    <p>Qty: <?php  echo $_SESSION['req_item_qty'][$cntr] ?></p>
                                    <p>Price Per Item: Rs.<?php  echo $_SESSION['req_item_price'][$cntr] ?></p>
                                    <p><strong>Total Amount: Rs.<?php  echo $_SESSION['sub_total'][$cntr] ?></strong></p>

                            <?php  ?>
                            </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>

            <?php endif; ?>
        </div>
        <div class="col-sm-4 ">
            <form method="post">
            <section class="info-form">
                <h3>Checkout</h3>

                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control col-md-12" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control col-md-12" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control col-md-12" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control col-md-12" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="text" name="mobile" class="form-control col-md-12" placeholder="Mobile Number">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control col-md-12" placeholder="Phone Number">
                    </div>
                <div class="clearfix"></div>
            </section>
            <br/>
            <div class="cart_detail">
                <section class="login_content">
                    <div>
                        <ul class="list-unstyled cart-list text-left">
                            <li>
                                <h3>Detail</h3>
                                <p>Items in Cart:
                                    <strong class="pull-right text-right"> <?php echo isset($_SESSION['req_item_qty']) ? $total_qty = array_sum($_SESSION['req_item_qty']) . " items" : "0 item"; ?></strong>
                                </p>
                                <p>Total Product Price:
                                    <strong class="pull-right text-right">Rs.<?php echo isset($_SESSION['sub_total']) ? $total_product_amount = array_sum($_SESSION['sub_total']) : "0.00"; ?></strong>
                                </p>
                                <hr>
                                <p><small>+ AirFreight per item:</small>
                                    <strong class="pull-right text-right">Rs.<?php echo isset($_SESSION['shipping_total']) ? $total_shipping_amount = array_sum($_SESSION['shipping_total']) : "0.00"; ?></strong>
                                </p>
                                <p><small>+ Standard Delivery:</small>
<!--                                    <strong class="pull-right text-right"> --><?php //echo isset($_SESSION['req_item_qty']) ? array_sum($_SESSION['req_item_qty']) . " items" : "0 item"; ?><!--</strong>-->
                                </p>

                                <hr>
                                <p class="total">Total Bill:
                                    <strong class="pull-right text-right">Rs. <?php echo isset($_SESSION['sub_total']) ? $total_bill = array_sum($_SESSION['sub_total']) + array_sum($_SESSION['shipping_total']) : "0.00"; ?></strong>
                                </p>
                                <hr>
                                <input type="hidden" name="request_total_product_amount" value="<?php echo $total_product_amount?>"/>
                                <input type="hidden" name="request_total_shipping_amount" value="<?php echo $total_shipping_amount?>"/>
                                <input type="hidden" name="request_total_qty" value="<?php echo $total_qty?>"/>
                                <input type="hidden" name="request_total_amount" value="<?php echo $total_bill?>"/>
                                <button type="submit" name="placeorder" class=" text-center btn btn-import-wide btn-lg btn-danger">Place Order</button>
                            </li>

                        </ul>

                    </div>

                </section>
            </div>
            </form>
        </div> <!-- Side bar end -->
    </div>

    <style>
        .cart-list li, .info-form {
            background: #fff;
            padding: 5%;
            border: 1px solid #ccc;
        }

        .login_wrapper {
            max-width: 100%;
        }

    </style>
</div>
<div class="container">
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="row">
            <div class="separator"></div>

            <div class="clearfix"></div>
            <br/>

            <div class="col-sm-12 text-center">
                <h1>Import Hub.pk!</h1>
                <p>©2018 All Rights Reserved. Import Hub</p>
            </div>
        </div>
    </div>
</div>
</div>
<?php //if (isset($_SESSION['req_item_url'])){
//    echo $_SESSION['req_item_url'] ;
//    echo $_SESSION['req_item_qty'] ;
//    echo $_SESSION['req_item_color'];
//    echo $_SESSION['req_item_price'] ;
//    echo $_SESSION['brand_id'];
//    echo $_SESSION['shipping_id'] ;
//};
if (isset($_POST['reset'])) {
    session_unset();
    header("Location: index.php");
}
if (isset($_POST['remove'])) {
    unset($_SESSION['brand_id'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_color'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_price'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_qty'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_url'][$_POST['brand_id_remove']]);
    unset($_SESSION['sub_total'][$_POST['brand_id_remove']]);
    unset($_SESSION['shipping_total'][$_POST['brand_id_remove']]);
    header("Location: index.php");
}
print_r($_SESSION);
?>

<?php include("includes/footer.php.php"); ?>


?>




