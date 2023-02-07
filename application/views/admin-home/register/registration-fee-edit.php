
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Important Dates</h1>
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
                            <form role="form" action="<?php echo base_url(); ?>admin/register/register_fees_update" method="post"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Local students</label>
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $result->id; ?>" placeholder="" required="" >
                                    <input type="text" class="form-control" name="local_students" value="<?php echo $result->local_students; ?>"  required="">
                                </div>   
                                                                
                                <div class="form-group">
                                    <label>Local Participants	</label>
                                    <input type="text" class="form-control date_of_birth" name="local_participants" value="<?php echo $result->local_participants; ?>" required="" >
                                </div>   
                                <div class="form-group">
                                    <label>Foreign students	</label>
                                    <input type="text" class="form-control date_of_birth" name="foreign_students" value="<?php echo $result->foreign_students; ?>" required="" >
                                </div>   
                                <div class="form-group">
                                    <label>Foreign participants</label>
                                    <input type="text" class="form-control date_of_birth" name="foreign_participants" value="<?php echo $result->foreign_participants; ?>" required="" >
                                </div>   
                                <div class="form-group">
                                    <label>Site visit local participants</label>
                                    <input type="text" class="form-control date_of_birth" name="site_visit_local_participants" value="<?php echo $result->site_visit_local_participants; ?>">
                                </div>   
                                <div class="form-group">
                                    <label>Site visit foreign participants</label>
                                    <input type="text" class="form-control date_of_birth" name="site_visit_foreign_participants" value="<?php echo $result->site_visit_foreign_participants; ?>"  >
                                </div>   

                                                                
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="reset" class="btn btn-default">Reset</button>
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