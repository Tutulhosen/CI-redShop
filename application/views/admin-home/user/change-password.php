
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Change Password</h1>
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
                <form method="post" action="<?php echo base_url() ?>admin/admin_home/password_update" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group"><label class="col-sm-2 control-label">Old Password</label>

                        <div class="col-sm-10"><input type="password" name="old_password" class="form-control" required=""></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">New Password</label>

                        <div class="col-sm-10"><input type="password" name="password" class="form-control" required=""></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Confirm Password</label>

                        <div class="col-sm-10"><input type="password" name="confirm_password" class="form-control" required=""></div>
                    </div>                   
                                                 

                    <div class="hr-line-dashed"></div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Update Password</button>
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
<!-- /#page-wrapper -->