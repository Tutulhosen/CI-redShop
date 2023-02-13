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
    .best_cnt{
        height: 25px;
        width: 70px;
        color: white;
        background-color: red;
        text-align: center;
        font-size: 10px;
        border-radius: 40%;
        padding-top: 5px;
    }
    .offer{
        height: 45px;
        width: 45px;
        color: white;
        background-color: #1c361f;
        font-weight: bold;
        text-align: center;
        font-size: 14px;
        border-radius: 50%;
        padding-top: 5px;
        position: absolute;
        right: 7px;
        bottom: 86px;
    }
    .product{
        position: relative;
    }
    .new_cnt{
        height: 25px;
        width: 70px;
        color: white;
        background-color: blue;
        text-align: center;
        font-size: 10px;
        border-radius: 40%;
        padding-top: 5px;
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
                    <h3 style="color:red">Best Selling Products</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="active">Category</li>
                        </ol>
                    </nav>
                </div>

                <div class="section section--category">
                    <div class="cat-banner">
                        <figure>
                            <?php if (!empty($catBanner)) { ?>
                                <img src="<?php echo base_url(); ?>resources/category-banner/<?php echo $catBanner->banner_name; ?>" alt="">
                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>resources/main/img/M3 Smart watch & PUBG GAME PAD-2.jpg" alt="">
                            <?php } ?>
                        </figure>
                    </div>


                    <div class="sec-head u-flex u-flex--content-between u-flex--item-center">
                    <h4 style="color:red">Best Selling Products</h4>
                        <!--<a class="Btn" href="#">More <i class="ti-angle-right"></i></a>-->
                    </div>

                    <div class="products u-flex u-flex--wrap">
                        <?php
                        foreach ($result as $prod) {
                            $prodImg = $this->db->select('*')->where('product_id', $prod['id'])->get('product_img')->row();
                            ?>
                            <div class="product">
                                <a class="has-shadow" href="<?php echo base_url(); ?>products/details/<?php echo $prod['slug']; ?>">
                                    <figure>
                                        <img class="lazyload" data-src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImg->img_name; ?>" alt="">
                                    </figure>
                                    <div class="best_cnt">
                                       Best Selling
                                    </div>
                                    <?php
                                
                                if(!empty($prod['discount']) && is_numeric((int)$prod['price'] ) && is_numeric((int)$prod['discount']))
                                {
                                    ?>
                                        <div class="offer">
                                            <?php
                                                
                                                if(!empty($prod['discount']) && is_numeric((int)$prod['price'] ) && is_numeric((int)$prod['discount']))
                                                {
                                                    
                                                    $percentage=(((int)$prod['price']  - (int)$prod['discount'])/(int)$prod['price'] )*100;
                                                    if(is_numeric($percentage)){
                                                        echo (int)$percentage. '%' . '<br>' . 'off';
                                                    }
                                                }
                                                
                                            ?>
                                        </div>
                                        
                                   <?php
                                }
                                
                                ?>

                                    <div class="content">
                                        <h5><?php echo $prod['name']; ?></h5>
                                        <div class="price">
                                            <div class="top">

                                                <?php if ($prod['discount'] != '') { ?>
                                                    <div class="old"><?php echo $prod['currency'] . '' . $prod['price']; ?></div>
                                                <?php } ?> &nbsp;
                                                <div class="new">
                                                    <?php if ($prod['discount'] == '') { ?>
                                                        <?php echo $prod['currency'] . '' . $prod['price']; ?>
                                                    <?php } else { ?>
                                                        <?php echo $prod['currency'] . '' . $prod['discount']; ?>
                                                    <?php } ?>
                                                </div>
    <!--                                                <div class="old"><?php // echo $prod->currency . '' . $prod->price;  ?></div>
                                        <div class="save">
                                            Save <?php // echo $prod->currency . '' . $prod->price;  ?>
                                        </div>-->
                                            </div>
                                            <!--                                            <div class="bottom">
                                            <?php echo $prod['currency'] . '' . $prod['price']; ?>
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