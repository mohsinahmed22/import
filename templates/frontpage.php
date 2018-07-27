<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 2:43 PM
 */
?>
<?php include("../includes/header.php");?>

    <br />
    <br />
    <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="assets/images/1-1.png" alt="ImportHub.pk">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="assets/images/2-1.png" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            ...
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br/>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Please Read Before Asking Question</h2>
                <ul>
                    <li>Taking orders for END OF JULY delivery batch</li>
                    <li>You browse brand’s UK website. We purchase in UK, import it in Pakistan & deliver it to you</li>
                    <li>Checkout reviews by existing customers  www.facebook.com/importhub/reviews</li>
                    <li>For questions, ONLY email us at hello@importhub.pk & someone from CS will reply within 24hrs</li>
                    <li>To order other brands from UK (other than brands shown below). Select ‘ANY OTHER BRAND‘ in order form dropdown menu and fill details. We don’t import electronics & perfumes</li>
                    <li>To calculate bill: Watch video & fill ‘Order Form’ below</li>
                </ul>
                <hr />
                <h2>3-Steps Import Booking Process to Calculate Bill</h2>
                <ol>
                    <li>Click any brand logo below to visit Brand’s website. Select UK Region (if asked)</li>
                    <li>COPY website link of any product from brand’s website</li>
                    <li>Come back here at our Order Form below, PASTE website link with details to calculate bill & place booking!</li>
                </ol>
                <strong>Tip: For most brands, when you add multiple products from one brand then Brand Delivery Fee is waved off!</strong>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <div class="row">
            <div class="col-sm-12 ordering_list">
                <?php foreach ($region_brands as $key => $brands):?>
                    <h2><?php echo $key ?></h2>
                    <ul class="list-unstyled list-inline">
                        <?php  foreach($brands as $b):?>
                            <li class="text-center"> <a href="<?php echo $b->url ?>" target="_blank"><img width="100" height="100" src="admin/images/brandlogo/<?php echo $b->img ?>" /><br/><?php echo $b->brandname ?> (<?php echo $b->region_name ?>)</a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-8 ordering_list">
                <h2>Ordering Form (ImportHub.pk)</h2>
                <form action="index-main.php" method="post">
                    <div class="form-group">
                        <input type="url" name="req_item_url" class="form-control col-md-12" placeholder="Enter Brand Url">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <select name="brand_id" class="form-control" required>
                                <option value="">Choose Brand</option>
                                <?php foreach ($all_brands as $brand): ?>
                                    <option value="<?php echo $brand->id ?><?php //echo $brand->brandname ?>"><?php echo $brand->brandname ?>
                                        <small><i></i></small>
                                    </option>
                                <?php endforeach;; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="shipping_id" class="form-control" required>
                                <option value="">Select Air Freight</option>
                                <?php foreach ($all_shipping as $ship): ?>

                                    <option
                                            value="<?php echo $ship->id ?><?php//echo $ship->shipping_entity_cost ?>"><?php echo $ship->shipping_entity_name ?>
                                        <small><i>(Rs.<?php echo $ship->shipping_entity_cost ?> each)</i></small>
                                    </option>

                                <?php endforeach;; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><input type="number" name="req_item_qty" class="form-control col-md-12"
                                                     placeholder="Qty"></div>
                        <div class="col-sm-2"><input type="text" name="req_item_color" class="form-control  col-md-12"
                                                     placeholder="Color"></div>
                        <div class="col-sm-2"><input type="text" name="req_item_size" class="form-control col-sm-12"
                                                     placeholder="Size"></div>
                        <div class="col-sm-6 price-curr"><input type="text" name="req_item_price" class="form-control col-sm-8"
                                                                placeholder="Price">
                            <select class="form-control col-sm-4" name="currency">
                                <?php  foreach($all_regions as $reg):?>
                                    <option value="<?php echo $reg->currency_exchange_rate ?>"><?php  echo $reg->region_cur?> (<?php echo $reg->region_cur_symbol ?>)</option>
                                <?php  endforeach; ?>

                            </select>
<!--                            <small>--><?php //echo STORE_CONVERT_CUR?><!--</small></div>-->
                    </div>
                    <div class="col-sm-12">
                            <textarea rows="10" class="form-control" name="req_item_description" placeholder="Description (Optional)"></textarea>
                        </div>
                    <hr>
                    <div class="col-sm-12">
                        <input type="hidden" name="req_item_id" class="form-control col-md-7 col-xs-12" value="0">
                        <button type="submit" name="submit" class="btn btn-success">Add To Cart</button>
                        <button class="btn btn-default submit" type="submit" name="reset">Reset</button>
                    </div>

                    <div class="clearfix"></div>
                    </div>
                </form>
                <?php if ($_SESSION):?>
                    <br/><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Product List</h2>
                            <ul class="list-unstyled product cart-list">
                                <?php for ($cntr = 0; $cntr < count($_SESSION['brandname']); $cntr++) {?>
                                    <li class="text-left">
                                        <div class='close-box'>
                                            <form method='post'>
                                                <input name='brand_id_remove' type='hidden' value="<?php echo $cntr;  ?>"/>
                                                <button type='submit' name='remove' class='btn-default btn no-border'>
                                                    <i class='fa fa-times text-right'></i>
                                                </button>
                                            </form>
                                        </div>
                                        <h5><?php echo $_SESSION['brandname'][$cntr]?></h5>
                                        <h4><strong><?php echo $_SESSION['req_item_url'][$cntr] ?></strong></h4>
                                        <p><?php echo (!empty($_SESSION['req_item_color'][$cntr]))? "Color:". $_SESSION['req_item_color'][$cntr] . ", ": " " ?> <?php echo (!empty($_SESSION['req_item_size'][$cntr]))? "Size:". $_SESSION['req_item_size'][$cntr] . "": "" ?></p>
                                        <p>Product Price: <?php echo STORE_CONVERT_CUR_SYMBOL ?><?php  echo $_SESSION['req_item_price_org'][$cntr]/ $_SESSION['currency'][$cntr] ?> x <?php  echo $_SESSION['req_item_qty'][$cntr] ?>  items = <?php echo STORE_CONVERT_CUR_SYMBOL ?><?php  echo (number_format(($_SESSION['req_item_subtotal'][$cntr]- $_SESSION['vat_charges'][$cntr])/$_SESSION['currency'][$cntr],2)) ?></p>
                                        <p>Exchange Rate: <?php echo STORE_CONVERT_CUR_SYMBOL ?><?php  echo ($_SESSION['req_item_price'][$cntr] * $_SESSION['req_item_qty'][$cntr])/$_SESSION['currency'][$cntr]   ?> x <?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php  echo  $_SESSION['currency'][$cntr] ?> =  <?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php  echo (($_SESSION['req_item_price'][$cntr]/$_SESSION['currency'][$cntr]) * $_SESSION['req_item_qty'][$cntr]) * $_SESSION['currency'][$cntr]   ?></p>
                                        <p>Standard Charges: <?php echo STORE_CONVERT_CUR_SYMBOL ?><?php echo number_format($_SESSION['standard_charges'][$cntr] /  $_SESSION['currency'][$cntr],2)?> x <?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo $_SESSION['currency'][$cntr] ?> = <?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo ($_SESSION['standard_charges'][$cntr]/$_SESSION['currency'][$cntr]) * $_SESSION['currency'][$cntr]?></p>
                                        <p>VAT <small>(<?php echo $_SESSION['vat_percent'][$cntr] ?>%)</small>: <?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php  echo number_format($_SESSION['vat_charges'][$cntr],2) ?></p>
                                        <p><strong>Gross Total: <?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php  echo number_format($_SESSION['req_item_subtotal'][$cntr],2) ?></strong></p>


                                        <?php  ?>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
            <div class="col-sm-4">
                <form method="post">
                    <section class="info-form">
                        <h3>Checkout</h3>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" name="first_name" class="form-control col-md-6" placeholder="First Name">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" name="last_name" class="form-control col-md-12" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="email" name="email" class="form-control col-md-12" placeholder="Email">
                            </div>
                            <div class="form-group hide">
                                <input type="text" name="phone" class="form-control col-md-12" placeholder="Phone Number">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" name="mobile" class="form-control col-md-12" placeholder="Mobile Number">
                            </div>

                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control col-md-12" placeholder="Address">
                        </div>

                        <div class="clearfix"></div>
                    </section>
                    <br/>
                    <div class="cart_detail">
                        <section class="login_content">
                            <div>
                                <ul class="list-unstyled cart-list text-left">
                                    <li>
                                        <h3>Detail</h3>
                                        <p>Items in Cart:
                                            <strong class="pull-right text-right"> <?php echo isset($_SESSION['req_item_qty']) ? $total_qty = array_sum($_SESSION['req_item_qty']) . " items" : "0 item"; ?></strong>
                                        </p>
                                        <p>Total Product Price:
                                            <strong class="pull-right text-right"><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo isset($_SESSION['req_item_subtotal']) ? $total_product_amount = number_format(array_sum($_SESSION['req_item_subtotal']),2) : "0.00"; ?></strong>
                                        </p>
                                        <hr>
                                        <p><small><strong>+ Standard Delivery by Brands(if any):</strong></small>
                                        <ul class="list-unstyled sd-charges">
                                            <?php  if(isset($_SESSION['standard_charges'])){
                                                for ($sd = 0; $sd < count($_SESSION['standard_charges']); $sd++){
                                                    if($_SESSION['standard_charges'][$sd] !== null){ ?>
                                                        <li><?php echo $_SESSION['brandname'][$sd] ?><span class="pull-right"><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo number_format($_SESSION['standard_charges'][$sd],2) ?></span></li>

                                                    <?php }
                                                }
                                            }
                                            ?>
                                        </ul>
                                        </p>
                                        <p><small><strong>+ AirFreight:</strong></small>
                                            <strong class="pull-right text-right"><?php echo STORE_DEFAULT_CUR_SYMBOL ?><?php echo isset($_SESSION['req_item_shipping_subtotal']) ? $total_shipping_amount = array_sum($_SESSION['req_item_shipping_subtotal']) : "0.00"; ?></strong>
                                        </p>

                                        <small><strong>+ Custom Duties & Taxes:</strong></small>
                                        <select class='form-control' name="cdt" id="cdt-charges" onchange="update_value(this.value, this.options[selectBox.selectedIndex].title)">
                                            <?php foreach ($all_cdt as $cdt_item):?>
                                                <option title="<?php echo $cdt_item->name?>" value="<?php echo $cdt_item->name?>" ><?php echo $cdt_item->name ?>(<?php echo $cdt_item->charges ?>%)</option>
                                            <?php endforeach;?>
                                        </select>
                                        </p>
                                        <p id="cdt-display">  </p>

                                        <script  type="text/javascript">
                                            var selectBox = document.getElementById("cdt-charges");
                                            var selectedValue =  selectBox.options[selectBox.selectedIndex].value;
                                            var selectedName = selectBox.options[selectBox.selectedIndex].title;
                                            function displayPrice() {
                                                var selectBox = document.getElementById("cdt-charges");
                                                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                                                var selectedName = selectBox.options[selectBox.selectedIndex].title;
                                                // alert(selectedValue);
                                                document.getElementById('cdt-text').innerText = selectedValue;
                                                document.getElementById('cdt-name').innerText = selectedName;
                                            }


                                            update_value(selectedValue, selectedName);
                                            function update_value(val, name) {
                                                var xhttp;
                                                xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function () {
                                                    if (xhttp.readyState == 4 || xhttp.status == 200){
                                                        document.getElementById('cdt-display').innerHTML =xhttp.responseText ;
                                                    }
                                                }

                                                xhttp.open('GET', encodeURI('calc.php?cdt='+val+"&name="+name), true)
                                                xhttp.send();
                                            }
                                        </script>
                                    </li>

                                </ul>

                            </div>

                        </section>

                </form>

            </div>
        </div>
    </div>

<?php include("../includes/footer.php");?>

