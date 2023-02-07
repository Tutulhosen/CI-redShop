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
    .mendatory{
        color:red;
    }
</style>


<section class="page page-user">
    <div class="container">
        <div class="row u-flex--content-center">
            <div class="col-lg-5" >
                <div>
                    <div class="contact-form has-shadow u-radius">
                        <div class="form-body">
                            <div class="form-top">                                
                                <h5>Checkout</h5>
                                <?php $this->load->view('error-message-display'); ?>
                            </div>
                            <form action="<?php echo base_url(); ?>checkout/proceed_to_checkout" method="post">
                            <div class="form-group u-m-b-25">
                                <label for="f1">Full Name <span class="mendatory">*</span></label>
                                <input type="text" class="form-control" name="name" id="f1" required="">
                            </div>
                            <div class="form-group u-m-b-25">
                                <label for="f4">Email Address</label>
                                <input type="email" class="form-control" name="email" id="f4">
                            </div>
                            <div class="form-group u-m-b-25">
                                <label for="fM">Mobile <span class="mendatory">*</span></label>
                                <input type="text" class="form-control" name="mobile" id="fM" required="">
                            </div>
                            <div class="form-group u-m-b-25">
                                <label for="fa">Address <span class="mendatory">*</span></label>
                                <input type="text" class="form-control" name="address" id="fa" required="">
                            </div>
                            <div class="form-group u-m-b-25">
                                <label for="fc">City <span class="mendatory">*</span></label>
                                <input type="text" class="form-control" name="city" id="fc">
                            </div>
                            <div class="form-group u-m-b-25">
                                <label for="fcc">Country <span class="mendatory">*</span></label>
                                <input type="text" class="form-control" name="country" id="fcc">
                            </div>

                            
                            <div class="form-submit u-m-t-20">
                                <button type="submit" class="hover-btn">Checkout</button>
                            </div>
                            <div class="form-hint text-center u-m-t-20">
                                <p><a href="<?php echo base_url(); ?>">Continue Shopping</a></p>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($footer)) {
    echo $footer;
}
?>