<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */


require_once ('core/init.php');
$user = new User();

if($user->is_loggedin() == 0){
    redirect('login.php');
}else{
    $template = new Templates("templates/dashboard.php");
    $customers = new Customer();
    $brands = new Brands();
    $orders = new Order();
    $request_items = new RequestItems();

    $template->customers = $customers->getAllCustomers();
    $template->orders  = $orders->getAllOrders();
    $template->brands = $brands->getAllBrands();
    $template->request_items = $request_items->getAllRequestItems();
    $template->CustomerCount =  AllCounts('customers');
    $template->OrderCount =  AllCounts('request');
    $template->BrandsCount =  AllCounts('brands');
    $template->OrderTotalAmount =  CalcAmount('request', 'request_total_amount');
    $template->OrderTotalShippingAmount =  CalcAmount('request', 'request_total_shipping_amount');
    $template->OrderTotalProfitAmount =  CalcAmount('request', 'request_total_profit_amount');
    $template->top_brand = $request_items->getBrandsOrderCount();
    $template->latest_order = $orders->getlatestOrders();
    $template->latest_customer = $customers->getlatestCustomers();

    echo $template;



}





