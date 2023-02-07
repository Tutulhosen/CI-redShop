
<header class="header">
    <div class="container u-flex u-flex--item-center u-flex--content-between">
        <div class="header__logo">
            <div class="menu-bar">
                <i class="ti-menu"></i>
            </div>
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>resources/main/img/logo.png" alt=""></a>
        </div>
        <div class="header__search">
            <form action="<?php echo base_url(); ?>products/search" method="post">
                <span class="ico-left"><i class="ti-location-pin"></i></span>
                <input placeholder="Search For Products" name="search_text" type="text">
                <button class="ico-right"><i class="ti-search"></i></button>
            </form>
        </div>
        <div class="header__act u-flex u-flex--item-center">
            <?php if ($this->session->userdata('user_id')) { ?>
                <div class="user_btn">
                    <!--<a href="<?php echo base_url(); ?>logout/">Logout</a>-->
                    <?php echo $this->session->userdata('first_name'); ?> &nbsp; &nbsp;
                </div>
            <div class="user_logout">
                    <a href="<?php echo base_url(); ?>logout/user_logout">Logout</a>&nbsp;
                </div>
            <?php } else { ?>
                <div class="user_btn">
                    <a href="#">Signin or Signup</a>
                </div>
            <?php } ?>

            <div class="header__cart">
                <a href="<?php echo base_url(); ?>products/cart_details"><span class="cart-count"><?php echo count($this->cart->contents()); ?></span>                
                <i class="ti-shopping-cart"></i></a>
            </div>
        </div>


    </div>
</header>