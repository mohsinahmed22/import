<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */


require_once ('core/init.php');
$template = new Templates("templates/allusers.php");
$user = new User();

$template->users = $user->getAllUsers();

if(isset($_GET['msg'])){
    $template->msg = '<div class="col-sm-12 alert alert-success">'. $_GET['msg'].'</div>';
}else{
    $template->msg= "";
}
if(isset($_GET['delete'])){
    $u = new User();
    if($u->deleteUser($_GET['delete'])){
        header('Location: brands.php?msg='.urlencode('User Successfully Deleted'));
        exit();
    }
}


echo $template;
