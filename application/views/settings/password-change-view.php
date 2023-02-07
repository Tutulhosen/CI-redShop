    <style>
    .error{
        color:red;
    }
    .error p{
        color:red;
    }
    .input-border{
        border: 2px solid #ddd !important;
    }



</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Password change</h1>
            <br>
            <?php $this->load->view('admin-home/message/message-display-view'); ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?php echo base_url(); ?>admin/change_password/reset_passwod_success" method="post">

                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                                        <input type="hidden" class="form-control placeholder-no-fix" name="id" value="<?php echo $this->session->userdata('user_id'); ?>" >
                                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password min 6 character" name="password"  required="" pattern=".{6,}"   title="6 characters minimum" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('password');
                                        }
                                        ?>"/> 
                                        <span class="help-block first_name error"><?php echo form_error('password'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label visible-ie8 visible-ie9">Re-type Password</label>
                                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password. Min 6 character" name="confirm_password"  required="" pattern=".{6,}"   title="6 characters minimum" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('confirm_password');
                                        }
                                        ?>"/>  
                                        <span class="help-block first_name error"><?php echo form_error('confirm_password'); ?></span>
                                    </div>


                                    <div class="form-group text-center">                                            
                                        <button type="submit" class="btn btn-info btn-lg">Update password</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->