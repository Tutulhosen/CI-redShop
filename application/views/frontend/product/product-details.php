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
    .error p{
        color:red;
    }
</style>

<?php
if (isset($left_mob_category)) {
    echo $left_mob_category;
}
?>
<?php
if (isset($menu)) {
    echo $menu;
}
?>
<?php
if (isset($cart_aside)) {
    echo $cart_aside;
}
?>



<main class="main u-p-t-20 page-wrap">
    <div class="container">
        <div class="row10 u-flex">
            <?php
            if (isset($left_category)) {
                echo $left_category;
            }
            $prodImg = $this->db->select('*')->where('product_id', $result->id)->get('product_img')->result();
            ?>

            <div class="col-content">
                <form id="add-to-cart">
                    <div class="content-det has-shadow u-flex">
                        <div class="product-preview">
                            <div class="product__fig" id="product__fig">
                                <img src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImg[0]->img_name; ?>" alt="">
                            </div>
                            <div class="product__thum">
                                <ul class="u-flex u-flex--wrap">
                                    <?php
                                    $i = 1;
                                    if (!empty($prodImg)) {
                                        foreach ($prodImg as $rowImg) {
                                            ?>
                                            <li <?php if ($i == 1) { ?>class="active" data-img="1" <?php } ?>>
                                                <div class="wrap"><img src="<?php echo base_url(); ?>resources/product-image/<?php echo $rowImg->img_name; ?>" alt=""></div>
                                            </li>
                                            <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>


                        <div class="det-content">
                            <div class="id">
                                <div class="inner">
                                    <span>ID#</span>
                                    <span><?php echo '10' . $result->id; ?></span>
                                </div>
                            </div>

                            <div class="product-inf">
                                <h4><?php echo $result->name; ?></h4>
                                <div class="price">
                                    <div class="top u-flex u-flex--item-center">
                                        <?php if ($result->discount != '') { ?>
                                            <div class="old"><?php echo $result->currency . '' . $result->price; ?></div>
                                        <?php } ?> &nbsp;

                                        <?php if ($result->discount != '' || $result->discount != null) { ?>
                                            <div class="save">
                                                Save <?php
                                            $discount = $result->discount;
                                            if ($discount == '' || $discount == null) {
                                                $discount = 0;
                                            }

                                            $save = $result->price - $discount;
                                            echo $result->currency . '' . $save;
                                            ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="bottom">
                                        <?php if ($result->discount == '') { ?>
                                            <?php echo $result->currency . '' . $result->price; ?>
                                        <?php } else { ?>
                                            <?php echo $result->currency . '' . $result->discount; ?>
                                        <?php } ?>
                                    </div>
                                </div>

                                <?php if ($result->size != "") { ?>
                                    <div class="color-meta">
                                        <h6>Size</h6>
                                        <div class="btn-set">
                                            <!--<button class="active">Dark Gray</button>-->
                                            <button><?php echo $result->size; ?></button>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($result->color != "") { ?>
                                    <div class="color-meta">
                                        <h6>Color</h6>
                                        <div class="btn-set">
                                            <!--<button class="active">Dark Gray</button>-->
                                            <button><?php echo $result->color; ?></button>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php
                                if ($result->discount == '' || $result->discount == null) {
                                    $finalPrice = $result->price;
                                } else {
                                    $finalPrice = $result->discount;
                                }
                                ?>

                                <div class="product-act">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                                    <input type="hidden" name="name" value="<?php echo $result->name; ?>">
                                    <input type="hidden" name="price" value="<?php echo $finalPrice; ?>">

                                    <?php if ($result->availability_status == 'stock_out') { ?>
                                        <a style="margin-left:-2px" href="#" class="act-det buy">STOCK OUT</a>
                                    <?php } else { ?>
                                        <input type="submit" class="act-det cart clickButton" name="addtocart" value="Add to cart">
                                        <input type="submit" style="margin-left:-2px" class="act-det buy clickButton" name="buyNow" value="Buy now">
                                    <?php } ?>
<!--                                    <a style="margin-left:-2px" href="<?php // echo base_url();  ?>products/cart_details" class="act-det buy">Buy now</a>
                                <a style="margin-left:-2px" href="<?php // echo base_url();  ?>products/cart_details" class="act-det buy">Buy now</a>-->
                                </div>
                                <!--                                <div class="product-meta">
                                                                    <ul>
                                                                        <li>
                                                                            <svg class="Svg__icon" viewBox="0 0 20 20">
                                                                            <path d="M10,0A10,10,0,1,0,20,10,9.971,9.971,0,0,0,10,0Zm5.773,6.864h0L8.5,14.409a.413.413,0,0,1-.318.136.354.354,0,0,1-.318-.136L4.318,10.591,4.227,10.5a.439.439,0,0,1,0-.636l.636-.636a.439.439,0,0,1,.636,0l.045.045,2.5,2.682a.22.22,0,0,0,.318,0l6.091-6.318H14.5a.439.439,0,0,1,.636,0l.636.636A.388.388,0,0,1,15.773,6.864Z"></path>
                                                                            </svg>
                                                                            Deliverable to <a href="#">Agent Stores</a></li>
                                                                        <li>
                                                                            <svg class="Svg__icon" viewBox="0 0 20 20">
                                                                            <path d="M10,0A10,10,0,1,0,20,10,9.971,9.971,0,0,0,10,0Zm5.773,6.864h0L8.5,14.409a.413.413,0,0,1-.318.136.354.354,0,0,1-.318-.136L4.318,10.591,4.227,10.5a.439.439,0,0,1,0-.636l.636-.636a.439.439,0,0,1,.636,0l.045.045,2.5,2.682a.22.22,0,0,0,.318,0l6.091-6.318H14.5a.439.439,0,0,1,.636,0l.636.636A.388.388,0,0,1,15.773,6.864Z"></path>
                                                                            </svg>
                                                                            Deliverable to <a href="#">Your Home</a></li>
                                                                        <li>
                                                                            <svg class="Svg__icon" viewBox="0 0 20 20">
                                                                            <path d="M10,0A10,10,0,1,0,20,10,9.971,9.971,0,0,0,10,0Zm5.773,6.864h0L8.5,14.409a.413.413,0,0,1-.318.136.354.354,0,0,1-.318-.136L4.318,10.591,4.227,10.5a.439.439,0,0,1,0-.636l.636-.636a.439.439,0,0,1,.636,0l.045.045,2.5,2.682a.22.22,0,0,0,.318,0l6.091-6.318H14.5a.439.439,0,0,1,.636,0l.636.636A.388.388,0,0,1,15.773,6.864Z"></path>
                                                                            </svg>
                                                                            Deliverable to <a href="#">Your Friend</a></li>
                                                                    </ul>
                                                                </div>-->
                            </div>
                        </div> <!-- det-content -->
                    </div> <!-- content det -->

                    <div class="offers-det has-shadow det-box u-m-t-20">
                        <div class="title">
                            Product Description
                        </div>

                        <div class="box-body">
                            <?php echo htmlspecialchars_decode($result->description, ENT_QUOTES); ?>
                        </div>
                    </div> <!-- offers-det -->
                </form>

                <div class="offers-det has-shadow det-box u-m-t-20">
                    <div class="title">
                        Offers
                    </div>
                    <div class="box-body">
                        <!--<h6>bKash Cashback Offer Conditions:</h6>-->
                        <ul>
                            <li>Bkash Payment করলে ১০%  থেকে ৩০% পর্যন্ত ছাড়।  পেমেন্ট নাম্বার- <b>01872737759</b>.</li>
                            <li>Nagad payment করলে ১০%  থেকে ৪০% পর্যন্ত ছাড়। </li>
                            <li>Rocket Payment- করলে ৫%  থেকে ১৫% পর্যন্ত ছাড়।  পেমেন্ট নাম্বার- <b>01872737757</b>.</li>                            
                        </ul>

                    </div>
                </div> <!-- offers-det -->
            </div>
        </div>
    </div>
</main>


<!-- gellary popup -->
<div class="popup">
    <span class="popup__close">&times;</span>
    <div class="popup__btnset">
        <button class="prev"><i class="ti-angle-left"></i></button>
        <button class="next"><i class="ti-angle-right"></i></button>
    </div>
    <div class="inner">
        <div class="figure" id="popup__fig">
            <?php
            $j = 1;
            if (!empty($prodImg)) {
                foreach ($prodImg as $rowImg) {
                    ?>
                    <img src="<?php echo base_url(); ?>resources/product-image/<?php echo $rowImg->img_name; ?>" alt="">
                    <?php
                    $j++;
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>