<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 300,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ],
        content_css: [
//    'http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '<?php echo base_url() ?>css/lato_font.css',
            'https://www.tinymce.com/css/codepen.min.css'
        ]
    });

</script> 
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Details</h1>
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
                        <div class="col-lg-8">
                            <form role="form" action="<?php echo base_url(); ?>admin/category/category_update" method="post"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name</label>                                    
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $result->id; ?>"  required="">
                                    <input type="text" class="form-control" name="name" value="<?php echo $result->name; ?>"  required="">
                                </div>    
                                   
                                <br>
                                <div class="form-group">
                                    <label>Display Order</label>                                    
                                    <input type="text" class="form-control" name="display_order" value="<?php echo $result->display_order; ?>"  required="">
                                </div>    
                                   
                                <br>
                                <br>
                                <br>
                                
                                <div class="form-group">
                                    <div class="col-sm-12 text-center" style="margin-top:20px">
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
<!-- /.row -->
</div>
<!-- /#page-wrapper -->