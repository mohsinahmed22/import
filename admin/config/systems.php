<?php


$settings = new Setting();
$Allsettings = $settings->AssignSetting($settings->getAllSettings());



// Store Information
define ('STORE_NAME', $Allsettings['store_name']);
define ('STORE_PHONE', $Allsettings['store_phone']);
define ('STORE_URL', $Allsettings['store_url']);
define ('STORE_EMAIL', $Allsettings['store_email']);


// Default Currency
//define ('STORE_DEFAULT_CONVERSION_CUR', $Allsettings['store_default_conversion_cur']);
//define ('STORE_DEFAULT_FRONT_CUR', $Allsettings['store_default_front_cur']);

