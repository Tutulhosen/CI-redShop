<style>
    .error{
        color:red;
    }
</style>
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="#">
        <img src="<?php echo base_url(); ?>resources/img/logo1.png" alt="" /> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN REGISTRATION FORM -->
    <form class="register-form" action="<?php echo base_url() ?>forgot_password/reset_passwod_success" method="post" enctype="multipart/form-data">
        <p class="hint"> Enter New Password Below: </p>

        <div class="error" style="color:red; padding: 5px;">
            <?php
//                            echo validation_errors();
            ?>
        </div>
        <div class="error" style="color:green; padding: 5px; font-size: 20px">
            <?php
            if ($this->session->userdata('exception')) {
                echo $this->session->userdata('exception');
                $this->session->unset_userdata('exception');
            }
            ?>
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input type="hidden" class="form-control placeholder-no-fix" name="id" value="<?php echo $user_id ?>" >
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"  required="" pattern=".{6,}"   title="6 characters minimum" value="<?php
            if (!isset($success)) {
                echo set_value('password');
            }
            ?>"/> 
            <span class="help-block first_name error"><?php echo form_error('password'); ?></span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="confirm_password"  required="" pattern=".{6,}"   title="6 characters minimum" value="<?php
            if (!isset($success)) {
                echo set_value('confirm_password');
            }
            ?>"/>  
            <span class="help-block first_name error"><?php echo form_error('confirm_password'); ?></span>
        </div>


        <div class="form-actions">
            <a href="<?php echo base_url(); ?>login"><button type="button" id="register-back-btn" class="btn green btn-outline">Back</button></a>
            <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END REGISTRATION FORM -->
</div>