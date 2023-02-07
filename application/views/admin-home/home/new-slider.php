
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create New</h1>
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
                            <?php $this->load->view('admin-home/message/message-display-view'); ?>
                            <form role="form" action="<?php echo base_url(); ?>admin/home/slider_save" method="post"  enctype="multipart/form-data">      
                                
                                 <div class="form-group" >
                                    <label>Select Slider Image</label>                                        
                                    <input type="file" name="image_name" required="" >                                                                
                                </div>
                                                              
                                                               
                                
                                <br>
                                <br>
                                
                                <div class="form-group">
                                    <div class="col-sm-6 text-center">
                                    <button type="submit" class="btn btn-success">Upload</button>
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