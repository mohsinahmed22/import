<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */


require_once ('core/init.php');

$template = new Templates("templates/login.php");
$template->title = "Login";
$template->msg = "";

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    echo $password;
    $user = new User();

    if($user->login($username, $password)){
        header("Location: index.php");
        exit();
    }else{
        $template->msg = "<div class='col-sm-12 alert alert-danger'>Invalid Login</div>";
    }

}

echo $template;
