<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 2:43 PM
 */?>

<?php include("includes/header.php");?>

<?php
$brands = new Brands();
$all_brands = $brands->getAllBrands();
$shipping = new Shipping();
$all_shipping = $shipping->getAllShipping();

function append_to_session_array($var_name)
{
    if (is_array($_SESSION[$var_name])){
        $_SESSION[$var_name][] = $_POST[$var_name];
    }
    else{
        $_SESSION[$var_name] = array($_POST[$var_name]);
    }
}

foreach (array('req_item_id',"brand_id","shipping_id", 'req_item_url','req_item_qty', 'req_item_price', 'req_item_color') as $v)
{
    append_to_session_array($v);
}
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <form id="brand" data-parsley-validate class="form-horizontal form-label-left" method="post" action="index.php">
                    <input type="hidden" name="req_item_id" class="form-control col-md-7 col-xs-12" value="0">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Brand <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select  name="brand_id" class="form-control" required>
                                <option value="">Choose..</option>
                                <?php foreach ($all_brands as $brand): ?>

                                    <option value="<?php echo $brand->id ?>"><?php echo $brand->brandname ?> <small><i></i></small></option>

                                <?php endforeach;; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Shipping <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select  name="shipping_id" class="form-control" required>
                                <option value="">Choose..</option>
                                <?php foreach ($all_shipping as $ship): ?>

                                <option value="<?php echo $ship->id ?>"><?php echo $ship->shipping_entity_name ?> <small><i>(<?php echo $ship->shipping_entity_cost ?>)</i></small></option>

                                <?php endforeach;; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Brand Url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="url" name="req_item_url"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="control-label" for="first-name">Qty <span class="required">*</span></label>
                            <input type="number" name="req_item_qty"  class="form-control col-md-7 col-xs-12" placeholder="Enter Qty">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="control-label" for="first-name">Color</label>
                            <input type="text" name="req_item_color"  class="form-control col-md-7 col-xs-12" placeholder="Enter Color (optional)">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label class="control-label">Price <span class="required">*</span></label>
                            <input type="text" name="req_item_price"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-success">Add To Cart</button>
                            <button type="submit" name="reset" >Reset</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php //if (isset($_SESSION['req_item_url'])){
//    echo $_SESSION['req_item_url'] ;
//    echo $_SESSION['req_item_qty'] ;
//    echo $_SESSION['req_item_color'];
//    echo $_SESSION['req_item_price'] ;
//    echo $_SESSION['brand_id'];
//    echo $_SESSION['shipping_id'] ;
//};
if(isset($_POST['reset'])){
    session_unset();
}
?>


    <ul>
        <?php
        if ($_SESSION):
        for($cntr = 0; $cntr < count($_SESSION['brand_id']); $cntr++)
        {
            echo '<li>';
            echo $_SESSION['req_item_url'][$cntr] . "\n";
            echo "Qty: ". $_SESSION['req_item_qty'][$cntr] . "\n";
            echo "Price: ". $_SESSION['req_item_price'][$cntr] . "\n";
            echo "Color: ". $_SESSION['req_item_color'][$cntr] . "\n";
            echo "<strong>Total: " . $_SESSION['req_item_qty'][$cntr] * $_SESSION['req_item_price'][$cntr] ."</strong>";
            echo '</li>';
        }
        endif;
        ?>
    </ul>


<?php include("includes/footer.php");?>