<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */


require_once ('core/init.php');
if(isset($_GET['brand'])){

    $template = new Templates("templates/edit_brand.php");


    // Edit Brand
    $brand = new Brands();

    $template->brand = $brand->getBrand($_GET['brand']);
    $template->title = "Edit Brand - {$template->brand->brandname}";
    $region = new Region();
    $template->region = $region->getAllRegion();

}elseif(isset($_GET['users'])){

    $template = new Templates("templates/edit_user.php");
    $template->title = "Edit Users";

}elseif(isset($_GET['shipping'])){

    $template = new Templates("templates/edit_shipping.php");
    $template->title = "Edit Shipping";

}elseif(isset($_GET['region'])){

    $template = new Templates("templates/edit_region.php");
    $template->title = "Edit Region";

}





if (isset($_POST['edit_brand'])){
    $wpdb = new wpdb();
    $edit_brand = new Brands();
    $data = array();
    $data['brandname'] = $_POST['brandname'];
//    $data['img'] = $_POST['brandlogo'];
    $data['url'] = $_POST['brandurl'];
    $data['standard_charges'] = $_POST['standard_charges'];
    $data['pcs_limit'] = $_POST['pcs_limit'];
    $data['vat_charges'] = $_POST['vat_charges'];
    $data['region_name'] = $_POST['region_name'];
    //Upload Logo Image
    if($edit_brand->uploadlogo()){
        $data['img'] = $_FILES["brandlogo"]["name"];
    }else{
        $data['img'] = 'noimage.png';
    }

    if($edit_brand->update($data, $id)){
        header('Location: brands.php?msg='.urlencode('Brand Successfully Updated'));
        exit();
    }

}


echo $template;
