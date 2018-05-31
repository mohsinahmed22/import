<?php


$settings = new Setting();
$Allsettings = $settings->AssignSetting($settings->getAllSettings());



// Store Information
define ('STORE_NAME', $Allsettings['store_name']);
define ('STORE_PHONE', $Allsettings['store_phone']);
define ('STORE_URL', $Allsettings['store_url']);
define ('STORE_EMAIL', $Allsettings['store_email']);


// Default Currency
define ('STORE_DEFAULT_CUR', 'PKR');
define ('STORE_DEFAULT_CUR_SYMBOL', 'Rs.');
define ('STORE_CONVERT_CUR', 'USD');
define ('STORE_CONVERT_CUR_SYMBOL', '$');

