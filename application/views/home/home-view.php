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
<div class="main__slider">
    <div class="container">
        <div class="JS__main__slider">
            <?php
            if (!empty($slider)) {
                foreach ($slider as $sRow) {
                    ?>
            <div class="slider__item"
                style="background-image: url(<?php echo base_url(); ?>resources/home-slider/<?php echo $sRow->slider_name; ?>)">
                <!--                <div class="btn__slider">
                                            Set Delivery Address
                                        </div>-->
            </div>
            <?php }
} ?>

        </div>
        <div class="main__slider__bottom">
            <div class="slider__nav">
            </div>
        </div>
    </div>
</div>
<main class="main u-m-t-20">
    <div class="container">
        <div class="row10 u-flex">
            <?php
            if (isset($left_category)) {
                echo $left_category;
            }
            ?>
            <div class="col-content">

            <div class="section section--home">
                        <div class="sec-head u-flex u-flex--content-between u-flex--item-center">
                            <h4>Best Selling Products</h4>
                            <a class="Btn" href="<?php echo base_url(); ?>products/bestSelling">More <i
                                class="ti-angle-right"></i></a>
                        </div>
                        <div class="products u-flex u-flex--wrap">
                        <?php
                                foreach ($best_selling_products as $prod) {
                                    $prodImg = $this->db->select('*')->where('product_id', $prod['id'])->get('product_img')->row();
                                    ?>
                        <div class="product">
                            <a class="has-shadow" href="<?php echo base_url(); ?>products/details/<?php echo $prod['slug']; ?>">
                                <figure>
                                    <img class="lazyload"
                                        data-src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImg->img_name; ?>"
                                        alt="">
                                </figure>
                                <div class="content">
                                    <div class="price">
                                        <div class="top u-flex u-flex--content-center u-flex--item-center">
                                            <?php if ($prod['discount'] != '') { ?>
                                            <div class="old"><?php echo $prod['currency'] . '' . $prod['price'] . ' '; ?></div>
                                            <?php } ?> &nbsp;
                                            <div class="new">
                                                <?php if ($prod['discount'] == '') { ?>
                                                <?php echo $prod['currency'] . '' . $prod['price'] . ' '; ?>
                                                <?php } else { ?>
                                                <?php echo $prod['currency'] . '' . $prod['discount'] . ' '; ?>
                                                <?php } ?>
                                            </div>
                                            <?php if ($prod['availability_status'] == 'stock_out') { ?>
                                            <div class="btn-set" style="margin-left:5px">
                                                <button class="btn btn-danger"> Stock Out</button>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <h5><?php echo $prod['name']; ?></h5>
                                </div>
                            </a>
                        </div><!-- product -->
                        <?php } ?>
                        </div>
            </div>
             






                <?php
                foreach ($result as $data) {
                    if (!empty($data)) {
                        $catInfo = $this->db->select('*')->where('id', $data[0]->category_id)->where('status', 1)->get('category')->row();
                        ?>
                <div class="section section--home">
                    <div class="sec-head u-flex u-flex--content-between u-flex--item-center">
                        <h4><?php echo $catInfo->name; ?></h4>
                        <a class="Btn" href="<?php echo base_url(); ?>products/categorywise/<?php echo $data[0]->category_id; ?>">More <i
                                class="ti-angle-right"></i></a>
                    </div>
                    <div class="products u-flex u-flex--wrap">
                        <?php
                                foreach ($data as $prod) {
                                    $prodImg = $this->db->select('*')->where('product_id', $prod->id)->get('product_img')->row();
                                    ?>
                        <div class="product">
                            <a class="has-shadow" href="<?php echo base_url(); ?>products/details/<?php echo $prod->slug; ?>">
                                <figure>
                                    <img class="lazyload"
                                        data-src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImg->img_name; ?>"
                                        alt="">
                                </figure>
                                <div class="content">
                                    <div class="price">
                                        <div class="top u-flex u-flex--content-center u-flex--item-center">
                                            <?php if ($prod->discount != '') { ?>
                                            <div class="old"><?php echo $prod->currency . '' . $prod->price . ' '; ?></div>
                                            <?php } ?> &nbsp;
                                            <div class="new">
                                                <?php if ($prod->discount == '') { ?>
                                                <?php echo $prod->currency . '' . $prod->price . ' '; ?>
                                                <?php } else { ?>
                                                <?php echo $prod->currency . '' . $prod->discount . ' '; ?>
                                                <?php } ?>
                                            </div>
                                            <?php if ($prod->availability_status == 'stock_out') { ?>
                                            <div class="btn-set" style="margin-left:5px">
                                                <button class="btn btn-danger"> Stock Out</button>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <h5><?php echo $prod->name; ?></h5>
                                </div>
                            </a>
                        </div><!-- product -->
                        <?php } ?>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
