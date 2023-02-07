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


<main class="main u-p-t-20">
    <div class="container">
        <div class="row10 u-flex">
            <?php
            if (isset($left_category)) {
                echo $left_category;
            }
            ?>
            <div class="col-content">
                <div class="category-intro">
                    <nav>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="active">Search</li>
                        </ol>
                    </nav>
                </div>
                <div class="section section--category">
                    <div class="sec-head u-flex u-flex--content-between u-flex--item-center">
                        <h4>Search Result</h4>
                        <!--<a class="Btn" href="#">More <i class="ti-angle-right"></i></a>-->
                    </div>
                    <div class="products u-flex u-flex--wrap">
                        <?php
                        foreach ($result as $prod) {
                            $prodImg = $this->db->select('*')->where('product_id', $prod->id)->get('product_img')->row();
                            ?>
                            <div class="product">
                                <a class="has-shadow" href="<?php echo base_url(); ?>products/details/<?php echo $prod->slug; ?>">
                                    <figure>
                                        <?php if (!empty($prodImg)) { ?>
                                            <img class="lazyload" data-src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImg->img_name; ?>" alt="">
                                        <?php } ?>
                                    </figure>
                                    <div class="content">
                                        <h5><?php echo $prod->name; ?></h5>
                                        <div class="price">
                                            <div class="top">
                                                <?php if ($prod->discount != '') { ?>
                                                    <div class="old"><?php echo $prod->currency . '' . $prod->price; ?></div>
                                                    <?php } ?>&nbsp;
                                                <div class="new">
                                                    <?php if ($prod->discount == '') { ?>
                                                        <?php echo $prod->currency . '' . $prod->price; ?>
                                                    <?php } else { ?>
                                                        <?php echo $prod->currency . '' . $prod->discount; ?>
                                                <?php } ?>
                                                </div>
                                                    <?php if ($prod->availability_status == 'stock_out') { ?>
                                                    <div class="btn-set" style="margin-left:5px">
                                                        <button class="btn btn-danger"> Stock Out</button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <!--                                                <div class="bottom">
                                            <?php // echo $prod->currency . '' . $prod->price;  ?>
                                                                                            </div>-->
                                        </div>
                                    </div>
                                </a>
                            </div><!-- product -->

                        <?php } ?>
                    </div>       
                </div>

            </div>
        </div>
    </div>
</main>

<?php
if (isset($footer)) {
    echo $footer;
}
?>