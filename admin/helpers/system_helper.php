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


function cart_session_remove(){
    unset($_SESSION['brandname'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_color'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_price'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_qty'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_url'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_subtotal'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_shipping_subtotal'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_description'][$_POST['brand_id_remove']]);
    unset($_SESSION['req_item_id'][$_POST['brand_id_remove']]);
    unset($_SESSION['vat_charges'][$_POST['brand_id_remove']]);
    unset($_SESSION['standard_charges'][$_POST['brand_id_remove']]);
    unset($_SESSION['region_name'][$_POST['brand_id_remove']]);
    unset($_SESSION['shipping_entity_cost'][$_POST['brand_id_remove']]);
    unset($_SESSION['shipping_entity_name'][$_POST['brand_id_remove']]);
    redirect('index.php');
}


function redirect($location){
    header("Location: ". $location);
    exit();
}

/**
 * Order Email to Customer and Admin
 * @param $data
 * @param $item
 */
function OrderEmail($data, $item){

$to = $data['email'];
$subject = "Thank You For Ordering #00{$data['request_id']} at ImportHub.pk";

$message = "<!doctype html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>Thank You For Ordering </title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body style='background: #eee; padding:30px 0 ;'>
    <div class=\"invoice-box\" style='background: #fff; border:1px solid #ccc'>
        <table cellpadding=\"5\" cellspacing=\"0\" >
            <tr class=\"top\">
                <td colspan=\"7\">
                    <table width='100%'>
                        <tr>
                            <td class=\"title\" colspan='3'>
                                <img src=\"http://importhub.pk/wp-content/uploads/2018/04/Final-logo-import-hub.png\" style=\"width:100%; max-width:200px;\">
                            </td>
                            
                            <td style='text-align: right' colspan='4'>
                                <strong style='font-size:18px;'>Order Number #: 00{$data['request_id']}</strong><br>
                                <br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class=\"information\">
                <td colspan=\"7\">
                    <table width='100%'>
                        <tr>
                            <td colspan='3'>
                                <strong>Importhub.pk</strong>
                                Import Hub Address<br>
                                Street Address<br>
                                Karachi, Pakistan.
                            </td>
                            
                            <td style='text-align: right' colspan='4'>
                                 <strong>{$data['first_name']} {$data['last_name']}</strong> <br/>
                                 {$data['email']} <br/>
                                  Mobile: {$data['mobile']}<br/>
                                  Address: {$data['address']}  
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class=\"heading\">
                <td>
                    Order Item Details
                </td>
                <td>
                    Qty
                </td>
                <td>
                    VAT
                </td>
                <td>
                    Price
                </td>
                <td>
                    Standard Charges
                </td>
                <td>
                    Shipping
                </td>
                
                <td style='text-align: right'>
                    Sub Total 
                </td>
            </tr>";
    for ($cntr = 0; $cntr < count($item['brandname']); $cntr++) {
            $message .= "<tr class=\"item\">
                <td>
                   <p style='margin: 0'>Brand: {$item['brandname']}   {count($item)}</p>
                   <p style='margin: 0'>Url: <strong>{$item['req_item_url']}</strong></p>
                   <p style='margin: 0'>Color: {$item['req_item_color']}</p>
                   <p style='margin: 0'>Size: {$item['req_item_size']}</p>
                   <p style='margin: 0'>Description: {$item['req_item_description']}</p>
                   
                </td>
                 <td>
                    {$item['req_item_qty']}
                </td>
                <td>
                    {$item['req_item_price']}
                </td>
                <td>
                    {$item['vat_charges']}
                </td>
                <td>
                    {$item['standard_charges']}
                </td>
                <td>
                    {$item['shipping_entity_cost']}
                </td>
                
                <td style='text-align: right'>
                   <p><strong>{$item['req_item_total']}</strong></p>
                </td>
            </tr>";
            };
            $message .= "<tr class=\"total\">
                <td colspan='3'></td>
                
                <td style='text-align: right' colspan='4'>
                   <strong>SubTotal: {$data['request_total_product_amount']}</strong>  
                </td>
            </tr>
            <tr class=\"total\">
                <td colspan='3'></td>
                
                <td style='text-align: right' colspan='4'>
                  <strong>Tax : {$data['request_duties_tax']}</strong>  
                </td>
            </tr>
            <tr class=\"total\">
                <td colspan='3'></td>
                
                <td style='text-align: right' colspan='4'>
                   <strong>Shipping: {$data['request_total_shipping_amount']}</strong>  
                </td>
            </tr>
            <tr class=\"total\">
                <td colspan='3'></td>
                
                <td style='text-align: right' colspan='4'>
                   <strong>Grand Total: {$data['request_total_amount']}</strong>  
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <ahmed.mohsin98@gmail.com>' . "\r\n";
$headers .= 'Cc: contact@mohsin-ahmed.com' . "\r\n";

mail($to,$subject,$message,$headers);
}


