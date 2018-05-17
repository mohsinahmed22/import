<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */
require_once ('core/init.php');

//Initializing All Brands
$Allbrands = new Brands();

$template = new Templates("templates/allbrands.php");


$template->brands = $Allbrands->getAllBrands();


echo $template;
