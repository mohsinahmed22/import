<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 6/4/2018
 * Time: 12:15 PM
 */
ob_start();
require_once ('core/init.php');
$user = new User();
if($user->logout()){redirect('login.php');};


