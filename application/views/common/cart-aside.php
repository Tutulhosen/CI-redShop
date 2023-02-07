
<div class="cart-aside">
    <div id="overlay"></div>
    <div class="inner">
        <div class="head u-flex u-flex--content-between u-flex--item-center">
            <h5>Shopping Cart</h5>
            <span class="list-close"><i class="ti-arrow-right"></i></span>
        </div>
        <div class="items-cart cartDiv" id="cartDiv" >
            <?php $i = 1; ?>
            <?php
            if (!empty($this->cart->contents())) {
                foreach ($this->cart->contents() as $items) {
                    $prodImg = $this->db->select('*')->where('product_id', $items['id'])->get('product_img')->row();
                    ?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            /* attach a submit handler to the form */
                            $("#item_delete_<?php echo $items['rowid']; ?>").click(function (event) {
                                /* stop form from submitting normally */
                                var rowid = '<?php echo $items['rowid']; ?>';
                                var values = 'rowid=' + rowid;
                                $.ajax({
                                    url: "<?php echo base_url() ?>cart/delect_cart_item/<?php echo $items['rowid']; ?>",
                                                    type: "GET",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function () {
                                                    },

                                                    success: function (data) {
                                                        $("#item_div_<?php echo $items['rowid']; ?>").hide();
                                                        $("#cartDiv").load(location.href + " #cartDiv");
                                                        $("#cartTotal").load(location.href + " #cartTotal");
                                                        $(".cart-count").html(data);
                                                    },

                                                    error: function () {
                                                        alert('there is error while submit');

                                                    }
                                                });
                                            });
                                        });
                    </script>
                    
                    <script type="text/javascript">
                                        jQuery(document).ready(function () {
                                                 /* attach a submit handler to the form */
                                                $(".ti_plus_<?php echo $items['rowid']?>").click(function (event) {                                                
                                                    var rowid = '<?php echo $items['rowid']; ?>';
//                                                    alert(rowid);
                                                    var itemQty = $("#itemQty_<?php echo $items['rowid']; ?>").val();
                                                    var values = 'itemQty=' + itemQty;
                                                    
                                                    $.ajax({
                                                                url: "<?php echo base_url() ?>cart/cart_item_plus/<?php echo $items['rowid']; ?>",
                                                                type: "GET",
                                                                data: values,
                                                                cache: false,
                                                                beforeSend: function () {
                                                                },
                                                                success: function (data) {
                                                                    
                                                                    var itemTotalQty = Number(itemQty) + 1;
                                                                    var itemPrice = <?php echo $items['price']; ?>;
                                                                    $(".item__price_<?php echo $items['rowid']; ?>").html(itemTotalQty + "x <span>৳ <?php echo $items['price']; ?></span>");
                                                                    $(".price_quantity_<?php echo $items['rowid']; ?>").html("৳ " + (itemPrice * itemTotalQty));
                                                                    $("#cartTotal").load(location.href + " #cartTotal");
                                                                    $(".cartSubTotal").html(data);
                                                                },
                                                                error: function () {
                                                                    alert('there is error while submit');
                                                                }

                                                            });
                                                });

                                            });

                                            </script>
                                            <script type="text/javascript">
                                        jQuery(document).ready(function () {
                                                 /* attach a submit handler to the form */
                                                $(".ti_minus_<?php echo $items['rowid']?>").click(function (event) {
                                                    var rowid = '<?php echo $items['rowid']; ?>';
                                                    var itemQty = $("#itemQty_<?php echo $items['rowid']; ?>").val();
                                                    var values = 'itemQty=' + itemQty;                                                    
                                                    $.ajax({
                                                    url: "<?php echo base_url() ?>cart/cart_item_minus/<?php echo $items['rowid']; ?>",
                                                                type: "GET",
                                                                data: values,
                                                                cache: false,
                                                                beforeSend: function () {
                                                                },
                                                                success: function (data) {
                                                                    var itemTotalQty = Number(itemQty) - 1;
                                                                    if(itemTotalQty <2){
                                                                        $(".tiMinus").hide();
                                                                    }                                                                    
                                                                    var itemPrice = <?php echo $items['price']; ?>;
                                                                    $(".item__price_<?php echo $items['rowid']; ?>").html(itemTotalQty + "x <span>৳ <?php echo $items['price']; ?></span>");
                                                                    $(".price_quantity_<?php echo $items['rowid']; ?>").html("৳ " + (itemPrice * itemTotalQty));
                                                                    $("#cartTotal").load(location.href + " #cartTotal");
                                                                    $(".cartSubTotal").html(data);
                                                                },
                                                                error: function () {
                                                                    alert('there is error while submit');
                                                                }

                                                            });
                                                });

                                            });

                                            </script>


                        <div class="item">
                            <div class="top u-flex">
                                <div class="item-close"><i class="ti-close"></i></div>
                                <figure>
                                    <img src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImg->img_name; ?>" alt="">
                                </figure>
                                <h5><a href="<?php echo base_url(); ?>products/details/<?php echo $items['id']; ?>"><?php echo $items['name']; ?></a></h5>
                            </div>
                            <div class="price-calc u-flex u-flex--item-center u-flex--content-between">
                                <div class="fs item__price item__price_<?php echo $items['rowid']; ?>">
                                    <?php echo $items['qty']; ?> x <span>৳ <?php echo $items['price']; ?></span>
                                </div>
                                <div class="btn-set">
                                            <button class="tiMinus"><i class="ti-minus ti_minus_<?php echo $items['rowid'] ?>"></i></button>
                                            <input disabled="disabled" id='itemQty_<?php echo $items['rowid']; ?>' class="item__count" value="<?php echo $items['qty']; ?>">
                                            <input type="hidden" id='rowid_<?php echo $items['rowid'] ?>' value='<?php echo $items['rowid'] ?>'>
                                            <button><i class="ti-plus ti_plus_<?php echo $items['rowid'] ?>"></i></button>
                                        </div>
                                <div class="fs all-price price_quantity price_quantity_<?php echo $items['rowid']; ?>" id="">
                                    ৳ <?php echo $items['qty']*$items['price']; ?>
                                </div>
                            </div>
                            <div class="item-meta">
                                <!--You save ৳350 on this item-->
                            </div>
                        </div> <!-- item -->
                <?php
                }
            }else{
                echo '<h5 class="text-center">Cart is empty!</h5>';
            }
            ?>
        </div> <!-- items -->

        <div class="cart-footer">
            <div class="total-count u-flex u-flex--content-between u-flex--item-center">
                <div>Subtotal</div>
                <div id="cartSubTotal" class="cartSubTotal">৳ <?php echo $this->cart->total(); ?></div>

            </div>

            <div class="act">

                <!--<p>Coupon can be applied during checkout.</p>-->

                <div class="order-end u-flex u-flex--item-center u-flex--content-between">

                    <!--<a class="text" href="#">Apply Coupon</a>-->

                    <?php // if (!empty($this->cart->contents())) { ?>

                    <a class="btn-order" href="<?php echo base_url(); ?>products/cart_details">Place Order</a>

                    <?php // } ?>

                </div>

            </div>

        </div>



    </div>

</div>