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
    <?php
    if ($this->session->userdata('notification_message')) {
        ?>
        <p class="error-message"  style="color:red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
            <?php
            echo $this->session->userdata('notification_message');
            $this->session->unset_userdata('notification_message');
            ?>
        </p>
    <?php } ?>
    <?php if ($this->session->userdata('success')) { ?>
        <p class="success-message"  style="color:green"><i class="fa fa-check-circle" aria-hidden="true"></i>
            <?php
            echo $this->session->userdata('success');
            $this->session->unset_userdata('success');
            ?>
        </p>
    <?php } ?>
    <?php if ($this->session->userdata('successful')) { ?>
        <p class="success-message"  style="color:green"><i class="fa fa-check-circle" aria-hidden="true"></i>
            <?php
            echo $this->session->userdata('successful');
            $this->session->unset_userdata('successful');
            ?>
        </p>
    <?php } ?>
</div>