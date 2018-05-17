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


echo $template;
