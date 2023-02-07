
<div class="form-group text-center">
    <!--<label class="col-sm-2 control-label"></label>-->

    <div class="col-sm-12" style="font-size: 16px">
        <div style="color:red">

            <?php
            if (isset($error)) {
                print_r($error);
            }
            ?>
        </div>
        <div style="color:red;">
            <?php
            if ($this->session->userdata('exception')) {
                echo $this->session->userdata('exception');
                $this->session->unset_userdata('exception');
            }
            ?>
        </div>
        <div style="color:green;">
            <?php
            if ($this->session->userdata('success')) {
                echo $this->session->userdata('success');
                $this->session->unset_userdata('success');
            }
            ?>
        </div>

    </div>
</div>
