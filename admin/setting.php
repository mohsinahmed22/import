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
$region = new Region();

$allSettings=  $setting->getAllSettings();
$template->settings = $allSettings;
$template->assginSetting = (object)$setting->AssignSetting($allSettings);
$template->region = $region->getAllRegion();
$template->allSlides = $setting->getAllSildes();


if(isset($_GET['delete'])){
    $brand = new Setting();
    if($brand->deleteSlide($_GET['delete'])){
        redirect('setting.php?msg='.urlencode('Slide Successfully Deleted'));
            }

}

if(isset($_POST['general']) || isset($_POST['currency']) ||  isset($_POST['store_content']) ){
    $set = new Setting();
    $setting_update = $set->convert_detail_array($_POST);

    foreach ($setting_update as $s){
        $set->update($s);
    }
    redirect('setting.php?msg='. urldecode('Settings has been upgraded'));





}




echo $template;
