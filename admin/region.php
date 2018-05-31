<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 5/25/2018
 * Time: 10:04 PM
 */

include_once ("core/init.php");

$template = new Templates('templates/allregion.php');
$region = new Region();
$template->region = $region->getAllRegion();


if(isset($_GET['msg'])){
    $template->msg = '<div class="col-sm-12 alert alert-success">'. $_GET['msg']. '</div>"';
}else{
    $template->msg= "";
}

if(isset($_GET['delete'])){
    $reg = new Region();
    if($reg->deleteRegion($_GET['delete'])){
        header('Location: region.php?msg='.urlencode('Region Successfully Deleted'));
        exit();

    }


}


echo $template;



