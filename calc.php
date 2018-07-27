<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 6/10/2018
 * Time: 10:36 AM
 */
include_once 'admin/core/init.php';
$tax = new CustomDutiesTaxes();
$taxes = $tax->getAllCustomDutiesTaxes();
$tax_charge= 0;
isset($_SESSION['req_item_subtotal']) ? $total_product_amount = number_format(array_sum($_SESSION['req_item_subtotal']),2) : "0.00";
isset($_SESSION['req_item_shipping_subtotal']) ? $total_shipping_amount = array_sum($_SESSION['req_item_shipping_subtotal']) : "0.00";

if(isset($_GET['cdt'])){
    foreach($taxes as $t):
        if($t->name == $_GET['cdt']){
            $taxCharge = $t->charges * ($total_product_amount + $total_shipping_amount);
            echo $_GET['name']?>: <strong class="pull-right text-right"><?php echo STORE_DEFAULT_CUR_SYMBOL ?> <?php echo number_format( $taxCharge,2) ?></span></strong>
            <hr>
            <p class="total">Total Bill:
                <strong class="pull-right text-right"><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php

                    if(isset($_SESSION['req_item_subtotal'])):
                        $calculate = (array_sum($_SESSION['req_item_subtotal'])
                            + array_sum($_SESSION['req_item_shipping_subtotal'])
                            + array_sum($_SESSION['standard_charges']))
                            + $taxCharge;

                        $total_bill = $calculate ;
                        echo $total_bill ;
                    else:
                        echo "0.00";
                    endif;
                    ?></strong>
            </p>
            <hr>
            <input type="hidden" name="request_total_amount" value="<?php echo $total_bill?>"/>
            <input type="hidden" name="request_duties_tax" id='cdtcharges' value="<?php echo $taxCharge ;?>" />
            <input type="hidden" name="request_total_qty" value="<?php echo $total_qty?>"/>
            <input type="hidden" name="request_total_product_amount" value="<?php echo $total_product_amount?>"/>
            <input type="hidden" name="request_total_shipping_amount" value="<?php echo $total_shipping_amount?>"/>

        <?php   }else{
            $tax_charge= 0;
        }
    endforeach;
    ?>

    <button type="submit" name="placeorder" class=" text-center btn btn-import-wide btn-lg btn-danger">Place Order</button>
<?php } ?>
