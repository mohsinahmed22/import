<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */
require_once ('core/init.php');

//Initializing All Brands
$AllShipping = new Shipping();

$template = new Templates("templates/allshipping.php");
$template->shippings = $AllShipping->getAllShipping();

if(isset($_GET['msg'])){
    $template->msg = '<div class="col-sm-12 alert alert-success">'. $_GET['msg']. '</div>"';
}else{
    $template->msg= "";
}
if(isset($_GET['delete'])){
    $shipping = new Shipping();
    if($shipping->deleteShipping($_GET['delete'])){
        header('Location: shipping.php?msg='.urlencode('Shipping Successfully Deleted'));
        exit();

    }

}


echo $template;
