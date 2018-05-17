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
}elseif(isset($_GET['users'])){
    $template = new Templates("templates/add_user.php");
    $template->title = "Add New Users";
}elseif(isset($_GET['shipping'])){
$template = new Templates("templates/add_shipping.php");
$template->title = "Add New Shipping";
}

if (isset($_POST['add_brand'])){
    $new_brand = new Brands();

    $data = array();
    $data['brandname'] = $_POST['brandname'];
//    $data['img'] = $_POST['brandlogo'];
    $data['url'] = $_POST['brandurl'];

    //Upload Logo Image
    if($new_brand->uploadlogo()){
        $data['img'] = $_FILES["brandlogo"]["name"];
    }else{
        $data['img'] = 'noimage.png';
    }

    if($new_brand->register($data)){
        echo "Registered";
    }else{
        echo "Failed";
    }

}

if(isset($_POST['add_shipping'])){
    $new_shipping = new Shipping();
    $data = array();

    $data['shipping_entity_name'] = $_POST['shipping_entity_name'];
    $data['shipping_entity_cost'] = $_POST['shipping_entity_cost'];

    if($new_shipping->register($data)){
        echo "Registered";
    }else{
        echo "Failed";
    }
}

if(isset($_POST['add_user'])){
    $new_user = new User();
    $data = array();

    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['first_name'] = $_POST['first_name'];
    $data['last_name'] = $_POST['last_name'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['role'] = $_POST['role'];
    $data['address'] = $_POST['address'];
    $data['is_active'] = $_POST['is_active'];

    if($new_user->register($data)){
        echo "Registered";
    }else{
        echo "Failed";
    }
}

echo $template;
