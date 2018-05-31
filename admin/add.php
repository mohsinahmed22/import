<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */


require_once ('core/init.php');

if(isset($_GET['brands'])){

    $template = new Templates("templates/add_brand.php");
    $template->title = "Add New Brand";
    $region = new Region();
    $template->region = $region->getAllRegion();

}elseif(isset($_GET['users'])){

    $template = new Templates("templates/add_user.php");
    $template->title = "Add New Users";

}elseif(isset($_GET['shipping'])){

    $template = new Templates("templates/add_shipping.php");
    $template->title = "Add New Shipping";

}elseif(isset($_GET['region'])){

    $template = new Templates("templates/add_region.php");
    $template->title = "Add New Region";

}

if (isset($_POST['add_region'])){

    $new_region = new Region();
    $data = array();

    $data['region_name'] = $_POST['region_name'];
    $data['region_code'] = $_POST['region_code'];
    $data['region_cur'] = $_POST['region_cur'];
    $data['region_cur_symbol'] = $_POST['region_cur_symbol'];

    if($new_region->register($data)){
        header('Location: region.php?msg='.urlencode('Region Successfully Added'));
        exit();
    }

}

if (isset($_POST['add_brand'])){
    $new_brand = new Brands();

    $data = array();
    $data['brandname'] = $_POST['brandname'];
//    $data['img'] = $_POST['brandlogo'];
    $data['url'] = $_POST['brandurl'];
    $data['standard_charges'] = $_POST['standard_charges'];
    $data['pcs_limit'] = $_POST['pcs_limit'];
    $data['vat_charges'] = $_POST['vat_charges'];
    $data['region_name'] = $_POST['region_name'];
    //Upload Logo Image
    if($new_brand->uploadlogo()){
        $data['img'] = $_FILES["brandlogo"]["name"];
    }else{
        $data['img'] = 'noimage.png';
    }

    if($new_brand->register($data)){
        header('Location: brands.php?msg='.urlencode('Brands Successfully Added'));
        exit();
    }

}

if(isset($_POST['add_shipping'])){
    $new_shipping = new Shipping();
    $data = array();

    $data['shipping_entity_name'] = $_POST['shipping_entity_name'];
    $data['shipping_entity_cost'] = $_POST['shipping_entity_cost'];

    if($new_shipping->register($data)){
        header('Location: shipping.php?msg='.urlencode('Shipping Successfully Added'));
        exit();
    }
}

if(isset($_POST['add_user'])){
    $new_user = new User();
    $data = array();

    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    $data['first_name'] = $_POST['first_name'];
    $data['last_name'] = $_POST['last_name'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['role'] = $_POST['role'];
    $data['address'] = $_POST['address'];
    $data['is_active'] = $_POST['is_active'];

    if($new_user->register($data)){
        header('Location: users.php?msg='.urlencode('User Successfully Added'));
        exit();
    }
}


echo $template;
