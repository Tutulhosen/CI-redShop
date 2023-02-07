
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
                            <form role="form" action="<?php echo base_url(); ?>admin/category/banner_save" method="post"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Category Name</label>                                    
                                    <select class="form-control" id="category_id" name="category_id" required="">   
                                        <option value="">==Select==</option>
                                        <?php foreach ($category as $row) { ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>   
                                
                                <div class="form-group">
                                    <label>Banner Image </label>  
                                    <p>(Image Size: Width:712px, height:312px)</p>
                                </div>                                                  
                                <div class="form-group">                                   
                                    <input type="file" class="form-control" name="banner_name" required="">
                                </div>
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