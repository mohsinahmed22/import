<?php include("includes/header.php"); ?>

<?php
$brands = new Brands();
$all_brands = $brands->getAllBrands();
$region = new Region();
$all_regions = $region->getAllRegion();
$shipping = new Shipping();
$all_shipping = $shipping->getAllShipping();


if(isset($_GET['success'])){
    $msg = "<div class=\"alert alert-success\">". $_GET['success'] ."</div>";
    echo $msg;
}

if(isset($_GET['error'])){
    $msg = "<div class=\"alert alert-error\">". $_GET['error'] ."</div>";
    echo $msg;
}

if (isset($_POST['submit'])) {
    // Creating Url
    $req_url = parse_url($_POST['req_item_url']);
    $req_url = $req_url['scheme']."://". $req_url['host']. $req_url['path'];
    // Brand
    $new_brand_cart = new Brands();
    $newbrand = $new_brand_cart->getBrand($_POST['brand_id']);

    // Shipping
    $new_shipping_cart = new Shipping();
    $newshipping = $new_shipping_cart->getShipping($_POST['shipping_id']);

    if($req_url == $newbrand->url){
        // Price Conversion into Rs.
        $_POST['req_item_price'] = $_POST['req_item_price'] * $_POST['currency'];

        // Assigning Values For Shipping
        $_POST['shipping_entity_name'] = $newshipping->shipping_entity_name;
        $_POST['shipping_entity_cost'] = $newshipping->shipping_entity_cost;

        // Assigning Values For brands
        $_POST['brandname'] = $newbrand->brandname;
        $_POST['region_name'] = $newbrand->region_name;
        $_POST['vat_percent'] = $newbrand->vat_charges;
        $_POST['vat_charges'] = (($newbrand->vat_charges * $_POST['req_item_price'])/100)* $_POST['req_item_qty'];

        // Checking Standard Charges Limits
        if($_POST['req_item_qty'] <= $newbrand->pcs_limit){
            $_POST['standard_charges'] = $newbrand->standard_charges * $_POST['req_item_qty'];
            }

        //Calculation
        $_POST['req_item_subtotal'] = ($_POST['req_item_qty'] * $_POST['req_item_price']) + $_POST['vat_charges'];
        $_POST['req_item_shipping_subtotal'] = $_POST['req_item_qty'] * $newshipping->shipping_entity_cost;
            $session_var  = array(
                'shipping_entity_name',
                'shipping_entity_cost',
                'brandname',
                'region_name',
                'standard_charges',
                'vat_percent',
                'vat_charges',
                'req_item_id',
                'req_item_url',
                'req_item_qty',
                'req_item_price',
                'req_item_color',
                'req_item_size',
                'req_item_description',
                'req_item_subtotal',
                'req_item_shipping_subtotal'
                );

        foreach ($session_var as $v) {
            append_to_session_array($v);
        }
        header('Location: index.php');



    }else {
        header("Location: index.php?error=" . urlencode("Invalid Url"));
    }





//    $req_url = parse_url($_POST['req_item_url']);
//    $req_url = $req_url['scheme']."://". $req_url['host']. $req_url['path'];
//    //    print_r($req_url);
//    //    echo $req_url. '<br/>';
//    foreach ($all_brands as $brand){
//    //    echo $brand->url .'<br/>';
//        if($req_url == $brand->url){
//            $match = true;
//        }
//    }
//    if ($match){
//        $_POST['shipping_entity_cost'] =  substr($_POST['shipping_id'], strpos($_POST['shipping_id'], "_") + 1);
//        $_POST['shipping_id'] = array_shift(explode("_", $_POST['shipping_id']));
//        $_POST['brandname'] =  substr($_POST['brand_id'], strpos($_POST['brand_id'], "_") + 1);
//        $_POST['brand_id'] = array_shift(explode("_", $_POST['brand_id']));
//
//        foreach (array('req_item_id', "brand_id", "shipping_id", 'req_item_url', 'brandname', 'shipping_entity_cost', 'req_item_qty', 'req_item_price', 'req_item_color') as $v) {
//            append_to_session_array($v);
//        }
//        header('Location: index.php');
//    }else{
//        header("Location: index.php?error=".urlencode("Invalid Url"));
//    }



}
//print_r($_SESSION);
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
            for ($cntr = 0; $cntr < count($_SESSION['brandname']); $cntr++) {
                $requested_item = new RequestItems();
                $item['customer_id']= $data['customer_id'];
                $item['request_id']= $data['request_id'];
                $item['region_name']= $_SESSION['region_name'][$cntr];
                $item['vat_charges']= $_SESSION['vat_charges'][$cntr];
                $item['standard_charges']= $_SESSION['standard_charges'][$cntr];
                $item['brandname']= $_SESSION['brandname'][$cntr];
                $item['shipping_entity_cost']= $_SESSION['shipping_entity_cost'][$cntr];
                $item['req_item_url']= $_SESSION['req_item_url'][$cntr];
                $item['req_item_color']= $_SESSION['req_item_color'][$cntr];
                $item['req_item_description']= $_SESSION['req_item_description'][$cntr];
                $item['req_item_size']= $_SESSION['req_item_size'][$cntr];
                $item['req_item_qty']= $_SESSION['req_item_qty'][$cntr];
                $item['req_item_price']= $_SESSION['req_item_price'][$cntr];
                $item['req_item_total']= $_SESSION['req_item_subtotal'][$cntr];

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
//    $data[    ''] = $_POST[''];
//    $data[''] = $_POST[''];
//    $data[''] = $_POST[''];
}
//print_r($all_regions);
  //$by_regions = $brands->displayBrandbyregions($all_regions);
//print_r($by_regions);

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 ordering_list">
            <ul class="list-unstyled list-inline">
                <?php foreach ($all_brands as $b):?>
                <li class="text-center"> <a href="<?php echo $b->url ?>" target="_blank"><img width="100" height="100" src="admin/images/brandlogo/<?php echo $b->img ?>" /><br/><?php echo $b->brandname ?> (<?php echo $b->region_name ?>)</a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
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
                                <option value="<?php echo $brand->id ?><?php //echo $brand->brandname ?>"><?php echo $brand->brandname ?>
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
                                    value="<?php echo $ship->id ?><?php//echo $ship->shipping_entity_cost ?>"><?php echo $ship->shipping_entity_name ?>
                                    <small><i>(Rs.<?php echo $ship->shipping_entity_cost ?> each)</i></small>
                                </option>

                            <?php endforeach;; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><input type="number" name="req_item_qty" class="form-control col-md-12"
                                                 placeholder="Qty"></div>
                    <div class="col-sm-2"><input type="text" name="req_item_color" class="form-control  col-md-12"
                                                 placeholder="Color"></div>
                    <div class="col-sm-2"><input type="text" name="req_item_size" class="form-control col-sm-12"
                                                 placeholder="Size"></div>
                    <div class="col-sm-6 price-curr"><input type="text" name="req_item_price" class="form-control col-sm-8"
                                                 placeholder="Price">
                                                <select class="form-control col-sm-4" name="currency">
                                                    <option value="115.06">USD ($)</option>
                                                    <option value="89.16">CAD ($)</option>
                                                    <option value="153.84">GBP (£)</option>
                                                    <option value="134.75">EUR (€)</option>

                                                </select>
                                                <small><?php echo STORE_CONVERT_CUR?></small></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="req_item_description" placeholder="Description (Optional)"></textarea>
                    </div>
                </div>
                <hr>
                <div>
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
                            <?php for ($cntr = 0; $cntr < count($_SESSION['brandname']); $cntr++) {?>
                            <li class="text-left">
                                <div class='close-box'>
                                    <form method='post'>
                                        <input name='brand_id_remove' type='hidden' value="<?php echo $cntr;  ?>"/>
                                        <button type='submit' name='remove' class='btn-default btn no-border'>
                                            <i class='fa fa-times text-right'></i>
                                        </button>
                                    </form>
                                    </div>
                                    <h5><?php echo $_SESSION['brandname'][$cntr]?></h5>
                                    <h4><strong><?php echo $_SESSION['req_item_url'][$cntr] ?></strong></h4>
                                    <p>Qty: <?php  echo $_SESSION['req_item_qty'][$cntr] ?>, Color: <?php  echo $_SESSION['req_item_color'][$cntr] ?>, Size: <?php echo $_SESSION['req_item_size'][$cntr]?></p>
                                    <p>VAT <small>(<?php echo $_SESSION['vat_percent'][$cntr] ?>%)</small>: <?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php  echo number_format($_SESSION['vat_charges'][$cntr],2) ?></p>
                                    <p><strong>Total Amount: <?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php  echo number_format($_SESSION['req_item_subtotal'][$cntr],2) ?></strong></p>


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
                                    <strong class="pull-right text-right"><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo isset($_SESSION['req_item_subtotal']) ? $total_product_amount = array_sum($_SESSION['req_item_subtotal']) : "0.00"; ?></strong>
                                </p>
                                <hr>
                                <p><small><strong>+ AirFreight Total per item:</strong></small>
                                    <strong class="pull-right text-right"><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo isset($_SESSION['req_item_shipping_subtotal']) ? $total_shipping_amount = array_sum($_SESSION['req_item_shipping_subtotal']) : "0.00"; ?></strong>
                                </p>
                                <p><small><strong>+ Standard Delivery:</strong></small>
                                    <ul class="list-unstyled sd-charges">
                                    <?php  if(isset($_SESSION['standard_charges'])){
                                            for ($sd = 0; $sd < count($_SESSION['standard_charges']); $sd++){
                                                if($_SESSION['standard_charges'][$sd] !== null){ ?>
                                                <li><?php echo $_SESSION['brandname'][$sd] ?><span class="pull-right"><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo number_format($_SESSION['standard_charges'][$sd],2) ?></span></li>

                                    <?php }
                                                }
                                    }
                                    ?>
                                </ul>
                                </p>

                                <hr>
                                <p class="total">Total Bill:
                                    <strong class="pull-right text-right"><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo isset($_SESSION['req_item_subtotal']) ? $total_bill = array_sum($_SESSION['req_item_subtotal']) + array_sum($_SESSION['req_item_shipping_subtotal']) + array_sum($_SESSION['standard_charges']) : "0.00"; ?></strong>
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
    unset($_SESSION['brandname'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_color'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_price'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_qty'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_url'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_subtotal'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_shipping_subtotal'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_description'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_id'][$_POST['brand_id_remove']]);
    unset($_SESSION['vat_charges'][$_POST['brand_id_remove']]);
    unset($_SESSION['standard_charges'][$_POST['brand_id_remove']]);
    unset($_SESSION['region_name'][$_POST['brand_id_remove']]);
    unset($_SESSION['shipping_entity_cost'][$_POST['brand_id_remove']]);
    unset($_SESSION['shipping_entity_name'][$_POST['brand_id_remove']]);
    header("Location: index.php");
    exit();
}
?>

<?php include("includes/footer.php"); ?>


?>




