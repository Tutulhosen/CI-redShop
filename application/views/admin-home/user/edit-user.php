
<style>
    .mendatory{
        color:red;
    }
    .error{
        color:red;
    }
</style>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit User</h1>
                        <?php $this->load->view('error-message-display'); ?>
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
                                        <form method="post" action="<?php echo base_url() ?>admin/user/update_user" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="form-group"><label class="col-sm-2 control-label">First Name <span class="mendatory">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="id" class="form-control" required="" value="<?php echo $users->id; ?>">
                                                    <input type="text" name="first_name" class="form-control" required="" value="<?php echo $users->first_name; ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('first_name'); ?></span>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Last Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="last_name" class="form-control"  value="<?php echo $users->last_name; ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('last_name'); ?></span>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Email <span class="mendatory">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="email" class="form-control"  required="" value="<?php echo $users->email; ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('email'); ?></span>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-2 control-label">Mobile <span class="mendatory">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="mobile" class="form-control"  required="" value="<?php echo $users->mobile; ?>">
                                                    <span class="help-block first_name error"><?php echo form_error('mobile'); ?></span>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>                 
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Profile Photo</label>

                                                <div class="col-sm-8"><input type="file" name="profile_image" />
                                                </div>
                                                <div class="col-sm-8"><?php if ($users->profile_image != '') { ?>
                                                        <img style="margin-top:10px;" src="<?php echo base_url(); ?>resources/profile-images/<?php echo $users->profile_image; ?>" height="100" width="100">
                                                    <?php } ?>
                                                </div>
                                            </div>         




                                            <div class="hr-line-dashed"></div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">User Type <span class="mendatory">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="user_group" required="">   
                                                        <?php if ($users->user_group == 2) { ?>
                                                            <option value="2">Admin</option>
                                                            <option value="3">Customer Representative</option>
                                                        <?php } ?>
                                                        <?php if ($users->user_group == 3) { ?>
                                                            <option value="3">Customer Representative</option>
                                                            <option value="2">Admin</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>   



                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <button class="btn btn-primary" type="submit">Update</button>
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
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->