
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create</h1>
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
                            <form role="form" action="<?php echo base_url(); ?>admin/slider/slider_save" method="post"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Slider Image </label>  
                                    <p>(Image Size: Width:1200px, height:628px)</p>
                                </div>                                                  
                                <div class="form-group">                                   
                                    <input type="file" class="form-control" name="slider_name" required="">
                                </div>                                                  
                                               
<!--                                <div class="form-group">                                   
                                    <label>Slider Button Name</label>  
                                    <input type="text" class="form-control" name="button_name" required="">
                                </div>                                                  -->
                               
                                
                                <br>
                                <br>
                                
                                <div class="form-group">
                                    <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save</button>
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