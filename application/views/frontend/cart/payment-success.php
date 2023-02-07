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


<style>
    .error p{
        color:red;
    }
</style>



<div class="checkout-step checkout-step-a">
    <div class="container">
        <div class="row10 u-flex">
            <div class="step-left" style="min-height: 300px">

                <div class="form-group text-center">
                    <?php
                    if ($this->session->userdata('exception')) {
                        ?>
                        <p class="error-message" style="color:red; font-weight:bold"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
                            <?php
                            echo $this->session->userdata('exception');
                            $this->session->unset_userdata('exception');
                            ?>
                        </p>
                    <?php } ?>
                    <?php if ($this->session->userdata('success')) { ?>
                        <p class="success-message" style="color:green; font-weight:bold"><i class="fa fa-check-circle" aria-hidden="true"></i>
                            <?php
                            echo $this->session->userdata('success');
                            $this->session->unset_userdata('success');
                            ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="form-group text-center">
                    <h5 style="margin-top:50px">আপনার অর্ডারটি গ্রহণ করা হয়েছে. আমাদের কাস্টমার কেয়ার প্রতিনিধি আপনাকে কল করে অর্ডার কনফার্ম করবেন । ধন্যবাদ । </h5>
                    <h5 style="margin-top:10px">Your order has been received. </h5>
                    <h5 style="margin-top:10px; margin-bottom:10px">Your order ID: <b><?php echo $invoice_number; ?></b></h5>
                    <a href="<?php echo base_url(); ?>" class="btn btn-success">Continue Shopping</a>
                </div>



            </div>

        </div>
    </div>

    <?php
    if (isset($footer)) {
        echo $footer;
    }
    ?>