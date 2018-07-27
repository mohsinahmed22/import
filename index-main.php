<?php include("admin/core/init.php");
$template = new Templates('templates/frontpage.php');

$brands = new Brands();
$template->all_brands = $brands->getAllBrands();
$region = new Region();
$template->all_regions = $region->getAllRegion();
$shipping = new Shipping();
$template->all_shipping = $shipping->getAllShipping();
$cdt = new CustomDutiesTaxes();
$template->all_cdt = $cdt->getAllCustomDutiesTaxes();

$template->region_brands = $brands->SelectBrandsRegion();

if(isset($_GET['success'])){
    $msg = "<div class=\"alert alert-success\">". $_GET['success'] ."</div>";
    echo $msg;
}

if(isset($_GET['error'])){
    $msg = "<div class=\"alert alert-error\">". $_GET['error'] ."</div>";
    echo $msg;
}


if (isset($_POST['reset'])) {
    session_unset();
    header("Location: index-main.php");
    exit();
}
if (isset($_POST['remove'])) {
    cart_session_remove();
}
if (isset($_POST['submit'])) {
// Creating Url
    $req_url = parse_url($_POST['req_item_url']);
    $req_url = $req_url['scheme'] . "://" . $req_url['host']. $req_url['path'];
    echo $req_url;

// Brand
    $new_brand_cart = new Brands();
    $newbrand = $new_brand_cart->getBrand($_POST['brand_id']);

// Shipping
    $new_shipping_cart = new Shipping();
    $newshipping = $new_shipping_cart->getShipping($_POST['shipping_id']);

    if ($req_url == $newbrand->url) {
        // Price Conversion into Rs.

        $_POST['req_item_price'] = $_POST['req_item_price'] * $_POST['currency'];
        $_POST['req_item_price_org'] = $_POST['req_item_price'];
        // Assigning Values For Shipping
        $_POST['shipping_entity_name'] = $newshipping->shipping_entity_name;
        $_POST['shipping_entity_cost'] = $newshipping->shipping_entity_cost;

        // Assigning Values For brands
        $_POST['brandname'] = $newbrand->brandname;
        $_POST['region_name'] = $newbrand->region_name;
        $_POST['vat_percent'] = $newbrand->vat_charges;
        $_POST['vat_charges'] = (($newbrand->vat_charges * $_POST['req_item_price']) / 100) * $_POST['req_item_qty'];

        // Checking Standard Charges Limits
        if ($_POST['req_item_qty'] <= $newbrand->pcs_limit) {
            $_POST['standard_charges'] = $newbrand->standard_charges * $_POST['req_item_qty'];
        }

        //Calculation
        $_POST['req_item_subtotal'] = ($_POST['req_item_qty'] * $_POST['req_item_price']) + $_POST['vat_charges'];
        $_POST['req_item_shipping_subtotal'] = $_POST['req_item_qty'] * $newshipping->shipping_entity_cost;
        $session_var = array(
            'currency',
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
            'req_item_price_org',
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
        header('Location: index-main.php');
        exit();


    } else {
//        header("Location: index-main.php?error=" . urlencode("Invalid Url"));
//        exit();
    }
}
if(isset($_POST['placeorder'])) {
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
    $data['request_duties_tax'] = $_POST['request_duties_tax'];

    if ($customer->register($data)) {
        $request_order = new Order();
        $data['customer_id'] = $customer->last_customer_insert_id();
        if ($request_order->register($data)) {
            $data['request_id'] = $request_order->last_request_insert_id();
            $item = array();
            for ($cntr = 0; $cntr < count($_SESSION['brandname']); $cntr++) {
                $requested_item = new RequestItems();
                $item['customer_id'] = $data['customer_id'];
                $item['request_id'] = $data['request_id'];
                $item['region_name'] = $_SESSION['region_name'][$cntr];
                $item['vat_charges'] = $_SESSION['vat_charges'][$cntr];
                $item['standard_charges'] = $_SESSION['standard_charges'][$cntr];
                $item['brandname'] = $_SESSION['brandname'][$cntr];
                $item['shipping_entity_cost'] = $_SESSION['shipping_entity_cost'][$cntr];
                $item['req_item_url'] = $_SESSION['req_item_url'][$cntr];
                $item['req_item_color'] = $_SESSION['req_item_color'][$cntr];
                $item['req_item_description'] = $_SESSION['req_item_description'][$cntr];
                $item['req_item_size'] = $_SESSION['req_item_size'][$cntr];
                $item['req_item_qty'] = $_SESSION['req_item_qty'][$cntr];
                $item['req_item_price'] = $_SESSION['req_item_price'][$cntr];
                $item['req_item_total'] = $_SESSION['req_item_subtotal'][$cntr];

                $requested_item->register($item);
            }
            session_unset();
            header("Location: index-main.php?success=" . urlencode("Successfully Order!"));
            exit();
        }
    } else {
        echo 'Failed';
    }
}


echo $template;