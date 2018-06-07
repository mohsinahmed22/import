<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */
require_once ('core/init.php');

//Initializing All Brands
$Allcdt = new CustomDutiesTaxes();

$template = new Templates("templates/allcustomdutiestaxes.php");
$template->cdt = $Allcdt->getAllCustomDutiesTaxes();

if(isset($_GET['msg'])){
    $template->msg = '<div class="col-sm-12 alert alert-success">'. $_GET['msg']. '</div>"';
}else{
    $template->msg= "";
}
if(isset($_GET['delete'])){
    $cdt = new CustomDutiesTaxes();
    if($cdt->deleteCustomDutiesTaxes($_GET['delete'])){
        header('Location: customdutiestaxes.php?msg='.urlencode('Custom Duties & Taxes Successfully Deleted'));
        exit();

    }

}


echo $template;
