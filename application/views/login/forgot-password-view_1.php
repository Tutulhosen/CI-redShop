 <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="#">
                <img src="<?php echo base_url(); ?>resources/img/logo1.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="<?php echo base_url() ?>forgot_password/passwordRecoveryEmail" method="post">
                <h3 class="font-green">Forget Password ?</h3>
                <div class="form-group text-center">
            <?php
            if ($this->session->userdata('exception')) {
                ?>
                <p class="error-message" style="color:red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
                    <?php
                    echo $this->session->userdata('exception');
                    $this->session->unset_userdata('exception');
                    ?>
                </p>
            <?php } ?>
            <?php if ($this->session->userdata('success')) { ?>
                <p class="success-message" style="color:green"><i class="fa fa-check-circle" aria-hidden="true"></i>
                    <?php
                    echo $this->session->userdata('success');
                    $this->session->unset_userdata('success');
                    ?>
                </p>
            <?php } ?>
        </div>
                
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <a href="<?php echo base_url(); ?>login"><button type="button" id="register-back-btn" class="btn green btn-outline">Back</button></a>
                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->

        </div>