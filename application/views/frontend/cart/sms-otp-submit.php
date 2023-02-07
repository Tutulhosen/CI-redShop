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
    .otp_div{
        min-height:400px;
        margin-top:20px;
    }
</style>




<div class="row"  style="margin-top:30px">
    <div class="col-md-3"></div>
    <div class="col-md-6 otp_div">
        <?php
        if ($this->session->userdata('exception')) {
            ?>
            <p class="error-message text-center" style="color:red; font-weight:bold"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
                <?php
                echo $this->session->userdata('exception');
                $this->session->unset_userdata('exception');
                ?>
            </p>
        <?php } ?>
        <p><b>আপনার মোবাইল নাম্বারে একটি ওয়ান টাইম পাসওয়ার্ড  (ওটিপি) পাঠানো হয়েছে ।  ক্রয় আদেশ নিশ্চিত করার জন্য নিছে ওয়ান টাইম পাসওয়ার্ড  (ওটিপি)  টি  দিন । </b></p>
        <form class="" action="<?php echo base_url(); ?>checkout/success" method="POST">
            <div class="form-group">
                <!--<label for="email2" class="mb-2 mr-sm-2"></label>-->
                <input type="hidden" class="form-control mb-2 mr-sm-2" id="email2" value="<?php
                if (isset($id)) {
                    echo $id;
                };
                ?>" name="id">
                <label for="pwd2" class="mb-2 mr-sm-2">ওয়ান টাইম পাসওয়ার্ড  (ওটিপি):</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="pwd2" placeholder="Type OTP" name="sms_otp" required="">

            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success mb-2">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>


<?php
if (isset($footer)) {
    echo $footer;
}
?>