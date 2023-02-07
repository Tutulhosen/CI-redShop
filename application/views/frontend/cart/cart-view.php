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


<main class="main cart-page page-wrap u-p-t-20 u-p-b-50">
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                <div class="cart-sidebar">
                    <div class="summary has-shadow">
                        <div class="title">
                            <h5>Order Summary</h5>
                        </div>
                        <div class="wrap">
                            <ul class="sm-list">
                                <li class="u-flex u-flex--content-between">
                                    <div class="left">Subtotal (<?php echo count($this->cart->contents()); ?> items)</div>
                                    <div class="right">৳ <?php echo $this->cart->total(); ?></div>
                                </li>
                                <li class="u-flex u-flex--content-between">
                                    <div class="left">Shipping Fee</div>
                                    <div class="right">৳ 45</div>
                                </li>
                                <!--                                <li class="u-flex u-flex--content-between">
                                                                    <div class="left">Tax</div>
                                                                    <div class="right">৳ 0</div>
                                                                </li>-->
                            </ul>
                            <!--                            <form action="#" class="apply-cupon u-flex">
                                                            <input type="text" placeholder="Enter coupon Code">
                                                            <button>Apply</button>
                                                        </form>-->
                            <div class="total-count u-flex u-flex--content-between">
                                <div class="left">Total</div>
                                <div class="right">৳ <?php echo $this->cart->total(); ?></div>
                            </div>
                            <a class="btn-ptc" href="<?php echo base_url(); ?>checkout">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
            </div>  <!-- col 4 end  -->



            <div class="col-lg-8">
                <div class="cart-list has-shadow">
                    <div class="title">
                        <h5>Total <?php echo count($this->cart->contents()); ?> Items Added</h5>
                    </div>
                    <ul>
<?php $i = 1; ?>

                        <?php
                        if (!empty($this->cart->contents())) {
                            foreach ($this->cart->contents() as $items) {
                                $prodImg = $this->db->select('*')->where('product_id', $items['id'])->get('product_img')->row();
                                ?>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        /* attach a submit handler to the form */
                                        $("#item_del_<?php echo $items['rowid']; ?>").click(function (event) {
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

                                                                },
                                                                error: function () {
                                                                    alert('there is error while submit');
                                                                }
                                                            });
                                                        });
                                                    });
                                </script>	
                                <li class="u-flex u-flex--item-center" id="item_div_<?php echo $items['rowid']; ?>">
                                    
                                    <figure>
                                        <a href="#"><img src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImg->img_name; ?>" alt=""></a>
                                    </figure>
                                    <div class="content">
                                        <h6><a href="#"><?php echo $items['name']; ?></a></h6>
                                        <!--<p>Size: XL, Color: Red</p>-->
                                    </div>
                                    <div class="price">
                                        ৳ <?php echo $items['price']; ?>
                                    </div>
                                    <div class="qt-act">
                                        <div class="counter">
                                            <span class="btn-c"><i class="ti-minus"></i></span>
                                            <input type="text" value="1">
                                            <span class="btn-c"><i class="ti-plus"></i></span>
                                        </div>
                                    </div>
                                    <div class="cart-act">
                                        <a id="item_del_<?php echo $items['rowid']; ?>" class="btn-remove" href="#"><i class="ti-trash"></i></a>
                                    </div>
                                </li> <!-- item -->

    <?php
    }
}
?>
                    </ul>
                    <div class="cart-bt-act u-flex u-flex--content-center">
                        <a href="<?php echo base_url(); ?>">Continue Shopping</a>
                        <a href="<?php echo base_url(); ?>checkout">Proceed To Checkout</a>
                    </div>
                </div>
            </div> <!-- col 8 end -->
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
            <img src="<?php echo base_url(); ?>resources/main/img/product__fig.png" alt="">
        </div>
    </div>
</div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>