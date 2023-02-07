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
                        <div class="col-lg-12">
                            <form role="form" action="<?php echo base_url(); ?>admin/news/news_update" method="post"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name</label>                                    
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $result->id; ?>"  required="">
                                    <input type="text" class="form-control" name="title" value="<?php echo $result->title; ?>"  required="">
                                </div>    
                               
                               
                                
                                <div class="form-group" style="margin-top:5px">
                                    <label>Description</label>                                    
                                    <textarea class="form-control ckeditor" cols="10" rows="5" name="description" ><?php echo htmlspecialchars_decode($result->description, ENT_QUOTES); ?></textarea>
                                </div>                                                      

                                <br>
                                 <div class="form-group col-sm-12">
                                     <div class="col-md-3" style="margin-top:25px">
                                    <label>Photo 1</label>                                        
                                    <input type="file" name="photo1">
                                     </div>
                                     <div class="col-md-4">
                                     <?php if($result->photo1 !=''){ ?>
                                        <img style="margin-top:50px" src="<?php echo base_url(); ?>resources/news/<?php echo $result->photo1; ?>" width="200"  />
                                        <?php }else{ ?>
                                        <div style="height: 150px">
                                        </div>
                                        <?php } ?>
                                     </div>
                                     <div class="col-md-5" style="clear:both"></div>
                                     <br>
                                         
                                                                
                                </div>
                                <br>
                                 <div class="form-group col-sm-12">
                                     <div class="col-md-3" style="margin-top:25px">
                                    <label>Photo 2</label>                                        
                                    <input type="file" name="photo2">
                                     </div>
                                     <div class="col-md-4">
                                     <?php if($result->photo2 !=''){ ?>
                                        <img style="margin-top:50px" src="<?php echo base_url(); ?>resources/news/<?php echo $result->photo2; ?>" width="200"  />
                                        <?php }else{ ?>
                                        <div style="height: 150px">
                                        </div>
                                        <?php } ?>
                                     </div>
                                     <div class="col-md-5" style="clear:both"></div>
                                     <br>
                                                                
                                </div>
                                <br>
                                 <div class="form-group col-sm-12">
                                     <div class="col-md-3" style="margin-top:25px">
                                    <label>Photo 3</label>                                        
                                    <input type="file" name="photo3">
                                     </div>
                                     <div class="col-md-4">
                                     <?php if($result->photo3 !=''){ ?>
                                        <img style="margin-top:50px" src="<?php echo base_url(); ?>resources/news/<?php echo $result->photo3; ?>" width="200"  />
                                        <?php }else{ ?>
                                        <div style="height: 150px">
                                        </div>
                                        <?php } ?>
                                     </div>
                                     <div class="col-md-5" style="clear:both"></div>
                                     <br>
                                                                
                                </div>
                                <br>
                                 <div class="form-group col-sm-12">
                                     <div class="col-md-3" style="margin-top:25px">
                                    <label>Photo 4</label>                                        
                                    <input type="file" name="photo4">
                                     </div>
                                     <div class="col-md-4">
                                     <?php if($result->photo4 !=''){ ?>
                                        <img style="margin-top:50px" src="<?php echo base_url(); ?>resources/news/<?php echo $result->photo4; ?>" width="200"  />
                                        <?php }else{ ?>
                                        <div style="height: 150px">
                                        </div>
                                        <?php } ?>
                                     </div>
                                     <div class="col-md-5" style="clear:both"></div>
                                     <br>
                                                                
                                </div>
                                <br>
                                 <div class="form-group col-sm-12">
                                     <div class="col-md-3" style="margin-top:25px">
                                    <label>Photo 5</label>                                        
                                    <input type="file" name="photo5">
                                     </div>
                                     <div class="col-md-4">
                                     <?php if($result->photo5 !=''){ ?>
                                        <img style="margin-top:50px" src="<?php echo base_url(); ?>resources/news/<?php echo $result->photo5; ?>" width="200"  />
                                        <?php }else{ ?>
                                        <div style="height: 150px">
                                        </div>
                                        <?php } ?>
                                     </div>
                                     <div class="col-md-5" style="clear:both"></div>
                                     <br>
                                                                
                                </div>
                                <br>
                                <div class="form-group col-sm-12">
                                     <div class="col-md-3" style="margin-top:25px">
                                    <label>Photo 6</label>                                        
                                    <input type="file" name="photo6">
                                     </div>
                                     <div class="col-md-4">
                                     <?php if($result->photo6 !=''){ ?>
                                        <img style="margin-top:50px" src="<?php echo base_url(); ?>resources/news/<?php echo $result->photo6; ?>" width="200"  />
                                        <?php }else{ ?>
                                        <div style="height: 150px">
                                        </div>
                                        <?php } ?>
                                     </div>
                                     <div class="col-md-5" style="clear:both"></div>
                                     <br>
                                                                
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