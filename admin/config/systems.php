<?php


$settings = new Setting();
$Allsettings = $settings->AssignSetting($settings->getAllSettings());



// Store Information
define ('STORE_NAME', $Allsettings['store_name']);
define ('STORE_PHONE', $Allsettings['store_phone']);
define ('STORE_URL', $Allsettings['store_url']);
define ('STORE_EMAIL', $Allsettings['store_email']);
define ('STORE_address', $Allsettings['store_address']);


// Default Currency
define ('STORE_DEFAULT_CUR', $Allsettings['default_currency']);
define ('STORE_DEFAULT_CUR_SYMBOL', $Allsettings['default_currency']);
define ('STORE_CONVERT_CUR', $Allsettings['default_conversion_currency']);
define ('STORE_CONVERT_CUR_SYMBOL', $Allsettings['default_conversion_currency']);


//

