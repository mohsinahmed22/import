<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:28 PM
 */


require_once ('core/init.php');
$template = new Templates("templates/allrequests.php");

$requests =  new Request();

$template->requests = $requests->getAllRequest();

echo $template;
