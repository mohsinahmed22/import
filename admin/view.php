<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */


require_once ('core/init.php');
$template = new Templates("templates/allrequests.php");

if(isset($_GET['order'])){
    $template = new Templates("templates/order_detail.php");
    $template->title = "Order Details";
    $order_detail = new Order();
    $requested_items = new RequestItems();
    $customer_detail = new Customer();

    $template->order_detail = $order_detail->getOrderDetail($_GET['order']);
    $template->requested_items = $requested_items->getOrderItems($_GET['order']);
    $template->customer_detail = $customer_detail->getCustomer($_GET['customer']);


}elseif(isset($_GET['users'])){
    $template = new Templates("templates/add_user.php");
    $template->title = "Add New Users";
}elseif(isset($_GET['shipping'])){
    $template = new Templates("templates/add_shipping.php");
    $template->title = "Add New Shipping";
}





echo $template;
