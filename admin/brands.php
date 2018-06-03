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
if(isset($_GET['msg'])){
    $template->msg = '<div class="col-sm-12 alert alert-success">'. $_GET['msg'].'</div>';
}else{
    $template->msg= "";
}
if(isset($_GET['delete'])){
    $brand = new Brands();
    if($brand->deleteBrand($_GET['delete'])){
        header('Location: brands.php?msg='.urlencode('Brand Successfully Deleted'));
        exit();

    }

}


echo $template;
