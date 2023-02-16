<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Options</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php $this->load->view('admin-home/message/message-display-view'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="<?php echo base_url(); ?>admin/options/store" method="post" enctype="multipart/form-data">

                            
                                <div class="form-group">
                                    <label>The Minimum amount For charge free Delevary</label>
                                    <input type="hidden" value="minimum_amt_free_delevary" name="option_name">
                                    <input type="text" class="form-control" name="option_value" value="<?=$result[0]->option_value?>" required>
                                </div>
                                

                                <div class="form-group">
                                    <div class="col-sm-12 text-center">
                                        <br>
                                        <button type="submit" class="btn btn-success">Update</button>
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