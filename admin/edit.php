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

    $users= new User();
    $template->u = $users->getUser($_GET['users']);

}elseif(isset($_GET['shipping'])){

    $template = new Templates("templates/edit_shipping.php");
    $template->title = "Edit Shipping";

    $shipping = new Shipping();
    $template->shipping =  $shipping->getShipping($_GET['shipping']);

}elseif(isset($_GET['cdt'])){

    $template = new Templates("templates/edit_customdutiestaxes.php");
    $template->title = "Edit Custom Duties & Taxes";

    $cdt = new CustomDutiesTaxes();
    $template->cdt =  $cdt->getCustomDutiesTaxes($_GET['cdt']);

}elseif(isset($_GET['region'])){

    $template = new Templates("templates/edit_region.php");
    $template->title = "Edit Region";

    $region = new Region();
    $template->region = $region->getRegion($_GET['region']);

}

if (isset($_POST['edit_brand'])){
    $edit_brand = new Brands();
    $data = array();

    $data['id'] = $_POST['id'];
    $data['brandname'] = $_POST['brandname'];
    $data['url'] = $_POST['brandurl'];
    $data['standard_charges'] = $_POST['standard_charges'];
    $data['pcs_limit'] = $_POST['pcs_limit'];
    $data['vat_charges'] = $_POST['vat_charges'];
    $data['region_name'] = $_POST['region_name'];


    //Upload Logo Image
//    if($edit_brand->uploadlogo()){
//        $data['img'] = $_FILES["brandlogo"]["name"];
//    }

    if($edit_brand->update($data)){
        header('Location: brands.php?msg='.urlencode('Brand Successfully Updated'));
        exit();
    }

}

if (isset($_POST['edit_shipping'])){
    $shipping = new Shipping();
    $data = array();

    $data['id'] = $_POST['id'];
    $data['shipping_entity_name'] = $_POST['shipping_entity_name'];
    $data['shipping_entity_cost'] = $_POST['shipping_entity_cost'];

    if($shipping->update($data)){
        header('Location: shipping.php?msg='.urlencode('Shipping Successfully Updated'));
        exit();
    }
}
if (isset($_POST['edit_customdutiestaxes'])){
    $cdt = new CustomDutiesTaxes();
    $data = array();

    $data['id'] = $_POST['id'];
    $data['name'] = $_POST['name'];
    $data['charges'] = $_POST['charges'];

    if($cdt->update($data)){
        header('Location: customdutiestaxes.php?msg='.urlencode('Custom Duties & Taxes Successfully Updated'));
        exit();
    }
}


if (isset($_POST['edit_region'])){

    $region = new Region();
    $data = array();

    $data['id'] = $_POST['id'];
    $data['region_name'] = $_POST['region_name'];
    $data['region_code'] = $_POST['region_code'];
    $data['region_cur'] = $_POST['region_cur'];
    $data['region_cur_symbol'] = $_POST['region_cur_symbol'];

    if($region->update($data)){
        header('Location: region.php?msg='.urlencode('Region Successfully Updated'));
        exit();
    }
}

if(isset($_POST['edit_user'])){
    $new_user = new User();
    $data = array();

    $data['id'] = $_POST['id'];
    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    $data['first_name'] = $_POST['first_name'];
    $data['last_name'] = $_POST['last_name'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['role'] = $_POST['role'];
    $data['address'] = $_POST['address'];
    $data['is_active'] = $_POST['is_active'];

    if($new_user->update($data)){
        header('Location: users.php?msg='.urlencode('User Successfully Updated'));
        exit();
    }
}


echo $template;
