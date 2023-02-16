<?php
if (isset($header)) {

    echo $header;
}
?>

<?php
if (isset($menu)) {

    echo $menu;
}
?>

<style>
    .error p {
        color: red;
    }
</style>
<style>
    .error p {
        color: red;
    }

    .mendatory {
        color: red;
    }
</style>

<?php
if (isset($address->delivery_charge)) {
    $delivery_charge = $address->delivery_charge;
} else {
    $delivery_charge = 0;
}
?>

<div class="checkout-step checkout-step-a" style="margin-top:20px">
    <div class="container">
        <div class="row10 u-flex">
            <div class="step-left">
                <div class="step-box <?php
                                        if ($this->session->userdata('user_id')) {
                                            echo "complete";
                                        }
                                        ?> has-shadow active">
                    <div class="title u-flex u-flex--item-center">
                        <p>
                            <b>যেভাবে আপনি পন্য কিনবেনঃ</b><br>
                            ১। আপনি যদি আমাদের নতুন অতিথি হয়ে থাকেন তাহলে যেকোন পণ্য কিনতে এখনই Sing up (সাইন-আপ/রেজিস্ট্রেশন করুন)। আপনার নাম্বারটি সঠিক কিনা যাচাই কারার জন্য একটি কোড যাবে, সেটি দিন। <br>
                        </p>
                    </div>
                    <div class="title u-flex u-flex--item-center" style="display:none">
                        <p>
                            <b>Offer</b><br>
                            Bkash Payment করলে ১০% থেকে ৩০% পর্যন্ত ছাড়। পেমেন্ট নাম্বার- <b>01872737759</b>. <br>
                            Nagad payment করলে ১০% থেকে ৪০% পর্যন্ত ছাড়। <br>
                            Rocket Payment- করলে ৫% থেকে ১৫% পর্যন্ত ছাড়। পেমেন্ট নাম্বার- <b>01872737757</b>. <br>
                        </p>
                    </div>
                    <div class="title u-flex u-flex--item-center">
                        <div class="ctrl-coll">+</div>
                        <span>1</span>
                        <h6>Customer Details</h6>
                    </div>
                    <div class="step-body">
                        <div class="fb-verify u-flex">
                            <?php if ($this->session->userdata('user_id')) { ?>

                                <p>Name: <?php echo $this->session->userdata('first_name'); ?> </p>
                                &nbsp; &nbsp; &nbsp; <p>Mobile: <?php echo $this->session->userdata('mobile'); ?> </p>
                            <?php } else { ?>
                                <div class="fb-content">
                                    <div class="login__fb">
                                        <a id="openFb" href="#">Sign in or sign up with phone number</a>
                                    </div>
                                    <form id="login__phone" class="login__phone d_none">
                                        <div class="login__box">
                                            <label for="PhoneNumber">Mobile Number</label>
                                            <input id="PhoneNumber" type="text" name="mobile" placeholder="Ex:01xxxxxxxxx" required="required" minlength="11" maxlength="14">

                                        </div>
                                        <div class="nameInputBox"></div>
                                        <div class="ajax_loader"></div>
                                        <button class="btn-number">
                                            Sign In / Sign Up
                                        </button>
                                        <!--<a href="#">Sign in or sign up with Facebook</a>-->
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>


                <div class="step-box <?php
                                        if ($this->session->userdata('invoice_number')) {
                                            echo "complete";
                                        }
                                        ?> has-shadow u-m-t-15 u-m-b-15 active">

                    <div class="title u-flex u-flex--item-center">
                        <div class="ctrl-coll">+</div>

                        <span>2</span>

                        <h6>Delivery Details</h6>

                    </div>

                    <?php if ($this->session->userdata('user_id')) { ?>

                        <div class="step-body">

                            <div class="delivery-det">

                                <form action="<?php echo base_url(); ?>checkout/delivery_address" method="post">

                                    <div class="form-group u-m-b-25">

                                        <label for="f1">Full Name <span class="mendatory">*</span></label>

                                        <input type="text" class="form-control" name="name" value="<?php echo $result->first_name; ?>" id="f1" required="">

                                        <input type="hidden" class="form-control" name="id" value="<?php echo $result->id; ?>">

                                        <input type="hidden" class="form-control" name="invoice_number" value="<?php
                                                                                                                if (isset($address->invoice_number)) {
                                                                                                                    echo $address->invoice_number;
                                                                                                                };
                                                                                                                ?>">

                                    </div>

                                    <div class="form-group u-m-b-25">

                                        <label for="mob">Mobile <span class="mendatory">*</span></label>

                                        <input type="text" class="form-control" name="mobile" value="<?php
                                                                                                        if (isset($address->mobile)) {
                                                                                                            echo $address->mobile;
                                                                                                        } else {
                                                                                                            echo $result->mobile;
                                                                                                        }
                                                                                                        ?>" id="mob" required="">

                                    </div>
                                    <div class="form-group u-m-b-25">
                                        <label for="email">Email <span>(Optional)</span></label>
                                        <input type="email" class="form-control" name="email" value="<?php
                                                                                                        if (isset($address->email)) {
                                                                                                            echo $address->email;
                                                                                                        } else {
                                                                                                            echo $result->email;
                                                                                                        }
                                                                                                        ?>" id="email">

                                    </div>

                                    <div class="form-group u-m-b-25">
                                        <label for="comment">Address <span class="mendatory">*</span></label>
                                        <textarea class="form-control" rows="3" name="address" id="comment" required=""> <?php
                                                                                                                            if (isset($address->address)) {
                                                                                                                                echo $address->address;
                                                                                                                            }
                                                                                                                            ?></textarea>

                                    </div>

                                    <div class="form-group u-m-b-25">

                                        <label for="cit">City <span class="mendatory">*</span></label>

                                        <input type="text" class="form-control" name="city" value="<?php
                                                                                                    if (isset($address->city)) {
                                                                                                        echo $address->city;
                                                                                                    }
                                                                                                    ?>" id="cit" required="">

                                    </div>

                                    <div class="form-group u-m-b-25">

                                        <label for="dis">District <span class="mendatory">*</span></label>

                                        <input type="text" class="form-control" name="district" value="<?php
                                                                                                        if (isset($address->district)) {
                                                                                                            echo $address->district;
                                                                                                        }
                                                                                                        ?>" id="dis" required="">

                                    </div>

                                    <div class="form-group u-m-b-25">

                                        <label for="t12">Delivery Charge <span class="mendatory"></span></label>

                                        <div class="radio">

                                            <label><input type="radio" name="delivery_charge" value="50" <?php
                                                                                                            if (isset($address->delivery_charge) && $address->delivery_charge == '50') {
                                                                                                                echo "checked";
                                                                                                            } else {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?>> Inside Dhaka: ৳50</label>

                                        </div>

                                        <div class="radio">

                                            <label><input type="radio" name="delivery_charge" value="100" <?php
                                                                                                            if (isset($address->delivery_charge) && $address->delivery_charge == '100') {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?>> Outside Dhaka: ৳100</label>

                                        </div>
                                    </div>
                                    <div class="form-submit u-m-t-20 text-center">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="step-box <?php
                                        if (isset($address->delivery_charge)) {
                                            echo "complete";
                                        }
                                        ?> has-shadow active">
                    <div class="title u-flex u-flex--item-center">
                        <div class="ctrl-coll">-</div>
                        <span>3</span>
                        <h6>Payment</h6>
                    </div>
                    <?php if (isset($address->delivery_charge)) { ?>
                        <div class="step-body" <?php if (isset($address->delivery_charge)) { ?> style="display: block;" <?php } ?>>
                            <div class="delivery-det">
                                <form action="<?php echo base_url(); ?>checkout/proceed_to_checkout" method="post">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="" checked=""> Cash on delivery</label>

                                        <input type="hidden" class="form-control" name="id" value="<?php
                                                                                                    if (isset($address->id)) {
                                                                                                        echo $address->id;
                                                                                                    };
                                                                                                    ?>">
                                        <input type="hidden" class="form-control" name="sms_otp" value="<?php
                                                                                                        if (isset($address->sms_otp)) {
                                                                                                            echo $address->sms_otp;
                                                                                                        };
                                                                                                        ?>">
                                        <input type="hidden" class="form-control" name="mobile" value="<?php
                                                                                                        if (isset($address->mobile)) {
                                                                                                            echo $address->mobile;
                                                                                                        };
                                                                                                        ?>">

                                        <input type="hidden" class="form-control" name="invoice_number" value="<?php
                                                                                                                if (isset($address->invoice_number)) {
                                                                                                                    echo $address->invoice_number;
                                                                                                                };
                                                                                                                ?>">

                                        <input type="hidden" class="form-control" name="delivery_charge" value="<?php
                                                                                                                if (isset($address->delivery_charge)) {
                                                                                                                    echo $address->delivery_charge;
                                                                                                                };
                                                                                                                ?>">
                                        <div class="checkbox">
                                            <p>( ক্রয় আদেশ নিশ্চিত করার জন্য আপনার মোবাইল নাম্বারে একটি ওয়ান টাইম পাসওয়ার্ড (ওটিপি) পাঠানো হবে )</p>
                                        </div>
                                    </div>
                                    <div class="form-submit u-m-t-20 text-center">
                                        <button type="submit" class="btn btn-success">Checkout</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
            <div class="step-right">
                <div class="inner has-shadow">
                    <div class="checkout-cart">
                        <div class="head">
                            <h6>Shopping Cart</h6>
                        </div>
                        <div class="items-cart">

                            <?php $i = 1; ?>

                            <?php
                            if (!empty($this->cart->contents())) {
                                foreach ($this->cart->contents() as $items) {
                                    $prodImg = $this->db->select('*')->where('product_id', $items['id'])->get('product_img')->row();
                                    //        echo "<pre>";
                                    //        print_r($prodImg);
                                    //        die();

                            ?>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            /* attach a submit handler to the form */
                                            $("#item_del_<?php echo $items['rowid']; ?>").click(function(event) {
                                                /* stop form from submitting normally */
                                                var rowid = '<?php echo $items['rowid']; ?>';
                                                var values = 'rowid=' + rowid;
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>cart/delect_cart_item/<?php echo $items['rowid']; ?>",
                                                    type: "GET",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function() {},
                                                    success: function(data) {
                                                        $("#item_div_<?php echo $items['rowid']; ?>").hide();
                                                        $("#cartDiv").load(location.href + " #cartDiv");
                                                        $("#cartTotal").load(location.href + " #cartTotal");
                                                        $("#grandTotal").load(location.href + " #grandTotal");
                                                        //                                                                    $("#grandTotal").html(<?php // echo $this->cart->total() + $delivery_charge; 
                                                                                                                                                    ?>);
                                                        $(".cart-count").html(data);
                                                    },
                                                    error: function() {
                                                        alert('there is error while submit');
                                                    }

                                                });

                                            });
                                            $("#itemQty_<?php echo $items['rowid']; ?>").click(function(event) {
                                                /* stop form from submitting normally */
                                                alert("Oh! Something went to wrong.");
                                            });

                                        });
                                    </script>

                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            /* attach a submit handler to the form */
                                            $(".ti_plus_<?php echo $items['rowid'] ?>").click(function(event) {
                                                var rowid = $("#rowid_<?php echo $items['rowid'] ?>").val();
                                                var itemQty = $("#itemQty_<?php echo $items['rowid']; ?>").val();
                                                var values = 'itemQty=' + itemQty;

                                                $.ajax({
                                                    url: "<?php echo base_url() ?>cart/cart_item_plus/<?php echo $items['rowid']; ?>",
                                                    type: "GET",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function() {},
                                                    success: function(data) {
                                                        var itemTotalQty = Number(itemQty) + 1;
                                                        var itemPrice = <?php echo $items['price']; ?>;
                                                        $(".item__price_<?php echo $items['rowid']; ?>").html(itemTotalQty + "x <span>৳ <?php echo $items['price']; ?></span>");
                                                        $(".price_quantity_<?php echo $items['rowid']; ?>").html("৳ " + (itemPrice * itemTotalQty));
                                                        $("#cartTotal").load(location.href + " #cartTotal");
                                                        $("#grandTotal").load(location.href + " #grandTotal");
                                                        $("#itemQty_<?php echo $items['rowid']; ?>").val(itemTotalQty);
                                                    },
                                                    error: function() {
                                                        alert('there is error while submit');
                                                    }

                                                });
                                            });

                                        });
                                    </script>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            /* attach a submit handler to the form */
                                            $(".ti_minus_<?php echo $items['rowid'] ?>").click(function(event) {
                                                var rowid = $("#rowid_<?php echo $items['rowid'] ?>").val();
                                                var itemQty = $("#itemQty_<?php echo $items['rowid']; ?>").val();
                                                var values = 'itemQty=' + itemQty;

                                                $.ajax({
                                                    url: "<?php echo base_url() ?>cart/cart_item_minus/<?php echo $items['rowid']; ?>",
                                                    type: "GET",
                                                    data: values,
                                                    cache: false,
                                                    beforeSend: function() {},
                                                    success: function(data) {
                                                        var itemTotalQty = Number(itemQty) - 1;
                                                        if (itemTotalQty < 2) {
                                                            $(".tiMinus_<?php echo $items['rowid']; ?>").hide();
                                                        }
                                                        var itemPrice = <?php echo $items['price']; ?>;
                                                        $(".item__price_<?php echo $items['rowid']; ?>").html(itemTotalQty + "x <span>৳ <?php echo $items['price']; ?></span>");
                                                        $(".price_quantity_<?php echo $items['rowid']; ?>").html("৳ " + (itemPrice * itemTotalQty));
                                                        $("#cartTotal").load(location.href + " #cartTotal");
                                                        $("#grandTotal").load(location.href + " #grandTotal");
                                                    },
                                                    error: function() {
                                                        alert('there is error while submit');
                                                    }

                                                });
                                            });

                                        });
                                    </script>
                                    <div class="item" id="item_div_<?php echo $items['rowid']; ?>">
                                        <div class="top u-flex">

                                            <div class="item-close" id="item_del_<?php echo $items['rowid']; ?>"><i class="ti-close"></i></div>

                                            <figure>
                                                <?php if (isset($prodImg->img_name)) { ?>
                                                    <img class="lazyload" data-src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImg->img_name; ?>" alt="">
                                                <?php } ?>
                                            </figure>

                                            <h5><a href="#"><?php echo $items['name']; ?></a></h5>

                                        </div>

                                        <div class="price-calc u-flex u-flex--item-center u-flex--content-between">

                                            <div class="fs item__price item__price_<?php echo $items['rowid']; ?>">
                                                <?php echo $items['qty']; ?> x <span>৳ <?php echo $items['price']; ?></span>
                                            </div>

                                            <div class="btn-set">
                                                <div class="btn-set">
                                                    <?php // if($items['qty'] > 1){ 
                                                    ?>
                                                    <?php // } 
                                                    ?>
                                                    <button class="tiMinus_<?php echo $items['rowid']; ?>"><i class="ti-minus ti_minus_<?php echo $items['rowid'] ?>"></i></button>
                                                    <input disabled="disabled" id='itemQty_<?php echo $items['rowid']; ?>' class="item__count" value="<?php echo $items['qty']; ?>">
                                                    <input type="hidden" id='rowid_<?php echo $items['rowid'] ?>' value='<?php echo $items['rowid'] ?>'>
                                                    <button><i class="ti-plus ti_plus_<?php echo $items['rowid'] ?>"></i></button>
                                                </div>
                                            </div>

                                            <div class="fs all-price price_quantity price_quantity_<?php echo $items['rowid']; ?>">
                                                ৳ <?php echo $items['qty'] * $items['price']; ?>
                                            </div>
                                        </div>
                                    </div> <!-- item -->
                            <?php
                                }
                            }
                            ?>
                        </div>



                        <div class="cart-footer">
                            <div class="total-count u-flex u-flex--content-between u-flex--item-center">
                                <div>Subtotal</div>
                                <div id="cartTotal">৳ <?php echo $this->cart->total(); ?></div>
                            </div>

                            <div class="total-count u-flex u-flex--content-between u-flex--item-center">

                                <div>Delivery Charge</div>
                                <div id="deliveryCharge"> ৳ <?php
                                                            if (isset($address->delivery_charge)) {
                                                                echo $address->delivery_charge;
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?>
                                </div>
                            </div>
                            <div class="total-count u-flex u-flex--content-between u-flex--item-center">
                                <div>Grand Total</div>

                                <div id="grandTotal"> ৳ <?php
                                                        echo $this->cart->total() + $delivery_charge;
                                                        ?>
                                </div>
                            </div>
                            <div class="act">
                                <!--<p>Coupon can be applied during checkout.</p>-->
                                <div class="order-end u-flex u-flex--item-center u-flex--content-between">
                                    <!--<a class="text" href="#">Apply Coupon</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
if (isset($footer)) {

    echo $footer;
}
?>