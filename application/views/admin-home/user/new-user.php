
<style>
    .mendatory{
        color:red;
    }
    .error{
        color:red;
        font-size: 16px;
        width: 35.5rem;
    }
</style>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="page-header">Create User</h1>
                        <?php $this->load->view('error-message-display'); ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form method="post" action="<?php echo base_url() ?>admin/user/user_registration" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="form-group"><label class="col-sm-3 control-label">First Name <span class="mendatory">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="first_name" class="form-control" required="" value="<?php
                                                    if (!isset($success)) {
                                                        echo set_value('first_name');
                                                    }
                                                    ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('first_name'); ?></span>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Last Name <span class="mendatory">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="last_name" class="form-control" required=""  value="<?php
                                                    if (!isset($success)) {
                                                        echo set_value('last_name');
                                                    }
                                                    ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('last_name'); ?></span>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Email <span class="mendatory">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="email" class="form-control"  required="" value="<?php
                                                    if (!isset($success)) {
                                                        echo set_value('email');
                                                    }
                                                    ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('email'); ?></span>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Mobile <span class="mendatory">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="mobile" class="form-control"  required="" value="<?php
                                                    if (!isset($success)) {
                                                        echo set_value('mobile');
                                                    }
                                                    ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('mobile'); ?></span>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Password <span class="mendatory">*</span></label>

                                                <div class="col-sm-12"><input type="password" name="password" class="form-control" required="" value="<?php
                                                    if (!isset($success)) {
                                                        echo set_value('password');
                                                    }
                                                    ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('password'); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Confirm Password <span class="mendatory">*</span></label>

                                                <div class="col-sm-12"><input type="password" name="confirm_password" class="form-control" required="" value="<?php
                                                    if (!isset($success)) {
                                                        echo set_value('confirm_password');
                                                    }
                                                    ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('confirm_password'); ?></span>
                                                </div>
                                            </div>                   
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Profile Photo</label>

                                                <div class="col-sm-12"><input type="file" name="profile_image" />
                                                </div>
                                            </div>

                                            <div class="hr-line-dashed"></div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">User Type <span class="mendatory">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="user_group" required="">   
                                                        <option value="">==Select==</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Manager</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-12 text-center">
                                                    <br>
                                                    <button type="submit" class="btn btn-success btn-icon-split">
                                                        
                                                        <span class="text">Submit</span>
                                                    </button>
                                                </div>
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
                    <div class="col-lg-1"></div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->