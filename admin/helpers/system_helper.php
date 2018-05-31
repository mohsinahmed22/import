<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 11:44 AM
 */

function currency_api(){

    // set API Endpoint and access key (and any options of your choice)
    $endpoint = 'live';
    $access_key = 'a3d80c268f758bf05160bb14d8fab754';

    // Initialize CURL:
    $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $exchangeRates = json_decode($json, true);

//              print_r($exchangeRates);
    // Access the exchange rate values, e.g. GBP:
    return $exchangeRates;
}


function append_to_session_array($var_name)
{
    if (is_array($_SESSION[$var_name])) {
        if (!isset($_SESSION[$var_name])) {
            $_SESSION[$var_name] = "";
        } else {
            $_SESSION[$var_name][] = $_POST[$var_name];
        }

    } else {
        $_SESSION[$var_name] = array($_POST[$var_name]);
    }
}
