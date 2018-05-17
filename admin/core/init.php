<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 11:43 AM
 */

session_start();

//Paths
require_once (dirname(__DIR__).'/config/config.php');


// Helper Classes
require_once (dirname(__DIR__).'/helpers/db_helper.php');
require_once (dirname(__DIR__).'/helpers/format_helper.php');
require_once (dirname(__DIR__).'/helpers/system_helper.php');


// AutoLoader Class
spl_autoload_register(function ($class_name) {
    require_once(dirname(__DIR__).'/lib/' . $class_name . ".php");
});

