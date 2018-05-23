<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/23/2018
 * Time: 11:28 AM
 */

include "core/init.php";

$template = new Templates('templates/allsettings.php');

$setting = new Setting();

$template->settings =  $setting->getAllSettings();


echo $template;
