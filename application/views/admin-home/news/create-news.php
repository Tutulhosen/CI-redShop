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
            <h1 class="page-header">Create News</h1>
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
                            <form role="form" action="<?php echo base_url(); ?>admin/news/news_save" method="post"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Title</label>                                    
                                    <input type="text" class="form-control" name="title" value=""  required="">
                                </div>                                                  
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control ckeditor" cols="10" rows="5" name="description" ></textarea>
                                </div>        
                                
                                 <div class="form-group">
                                    <label>Photo 1</label>                                        
                                    <input type="file" name="photo1" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 2</label>                                        
                                    <input type="file" name="photo2" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 3</label>                                        
                                    <input type="file" name="photo3" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 4</label>                                        
                                    <input type="file" name="photo4" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 5</label>                                        
                                    <input type="file" name="photo5" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 6</label>                                        
                                    <input type="file" name="photo6" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 7</label>                                        
                                    <input type="file" name="photo7" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 8</label>                                        
                                    <input type="file" name="photo8" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 9</label>                                        
                                    <input type="file" name="photo9" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 10</label>                                        
                                    <input type="file" name="photo10" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 11</label>                                        
                                    <input type="file" name="photo11" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 12</label>                                        
                                    <input type="file" name="photo12" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 13</label>                                        
                                    <input type="file" name="photo13" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 14</label>                                        
                                    <input type="file" name="photo14" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 15</label>                                        
                                    <input type="file" name="photo15" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 16</label>                                        
                                    <input type="file" name="photo16" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 17</label>                                        
                                    <input type="file" name="photo17" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 18</label>                                        
                                    <input type="file" name="photo18" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 19</label>                                        
                                    <input type="file" name="photo19" >                                                                
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label>Photo 20</label>                                        
                                    <input type="file" name="photo20" >                                                                
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