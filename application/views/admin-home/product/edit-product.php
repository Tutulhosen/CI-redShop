<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 200,
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

<script type="text/javascript">
    $(document).ready(function () {
        /* attach a submit handler to the form */
        $("#category_id").change(function (event) {
            /* stop form from submitting normally */
            var values = "category_id=" + $("#category_id").val();
            $.ajax({

                url: "<?php echo base_url() ?>admin/products/getSubCategory",
                type: "POST",
                data: values,
                cache: false,
                dataType: 'html',
                beforeSend: function () {
                },
                success: function (data) {
                    $("#subCat").html(data);
                },
                error: function () {
                    alert('there is error while submit');
                }
            });
        });
    });
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit [<?php echo $result->name; ?>]</h1>
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
                            <form role="form" action="<?php echo base_url(); ?>admin/products/product_update" method="post"  enctype="multipart/form-data">

                                <?php
                                $categoryID = $result->category_id;
                                $subCategoryID = $result->sub_category_id;

                                $categoryInfo = $this->db
                                        ->select('*')
                                        ->where('status', 1)
                                        ->where('id', $categoryID)
                                        ->get('category')
                                        ->row();

                                $subCategoryInfo = $this->db
                                        ->select('*')
                                        ->where('status', 1)
                                        ->where('id', $subCategoryID)
                                        ->get('sub_category')
                                        ->row();

                                $productImg = $this->db
                                        ->select('*')
                                        ->where('status', 1)
                                        ->where('product_id', $result->id)
                                        ->get('product_img')
                                        ->result();
                                ?>
                                <div class="form-group">
                                    <label>Category Name</label>                                    
                                    <select class="form-control" id="category_id" name="category_id" required="">   
                                        <option value="<?php echo $categoryInfo->id; ?>"><?php echo $categoryInfo->name; ?></option>
                                        <?php foreach ($category as $row) { ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>   



                                <div class="form-group">
                                    <label>Sub Category Name</label>                                    
                                    <div id="subCat">
                                        <select class="form-control" name="sub_category_id" required="">   
                                            <option value="<?php echo $subCategoryInfo->id; ?>"><?php echo $subCategoryInfo->name; ?></option>
                                            <?php foreach ($sub_category as $row2) { ?>
                                                <option value="<?php echo $row2->id; ?>"><?php echo $row2->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>       
                                </div>

                                <div class="form-group">
                                    <label>Product Name</label>                                    
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $result->id; ?>"  required="">
                                    <input type="text" class="form-control" name="name" value="<?php echo $result->name; ?>"  required="">
                                </div>     
                                <div class="form-group">
                                    <label>Product Code(SKU)</label>                                    
                                    <input type="text" class="form-control" name="product_code" value="<?php echo $result->product_code; ?>"  required="">
                                </div>   
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control ckeditor" cols="10" rows="5" name="description" > <?php echo htmlspecialchars_decode($result->description); ?></textarea>
                                </div>   
                                <div class="form-group">
                                    <label>Size</label>                                    
                                    <input type="text" class="form-control" name="size" value="<?php echo $result->size; ?>"  >
                                </div>  
                                <div class="form-group">
                                    <label>Color</label>                                    
                                    <input type="text" class="form-control" name="color" value="<?php echo $result->color; ?>"  >
                                </div>  
                                <div class="form-group">
                                    <label>Qty</label>                                    
                                    <input type="text" class="form-control" name="qty" value="<?php echo $result->qty; ?>"  >
                                </div>  
                                <div class="form-group">
                                    <label>Price</label>                                    
                                    <input type="text" class="form-control" name="price" value="<?php echo $result->price; ?>"  >
                                </div>  
                                <div class="form-group">
                                    <label>Discount</label>                                    
                                    <input type="text" class="form-control" name="discount" value="<?php echo $result->discount; ?>"  >
                                </div>  
                                <div class="form-group">
                                    <label>Currency</label>                                    
                                    <select class="form-control" name="currency" required="">   
                                        <option value="<?php echo $result->currency; ?>"><?php echo $result->currency; ?></option>
                                        <option value="৳">৳</option>
                                        <option value="$">$</option>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Availability status</label>                                    
                                    <select class="form-control" name="availability_status" required="">   
                                        <option value="<?php echo $result->availability_status; ?>"><?php echo $result->availability_status; ?></option>
                                        <option value="available">Available</option>
                                        <option value="stock_out">Stock Out</option>
                                    </select>
                                </div>  

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        var maxField = 10; //Input fields increment limitation
                                        var addButton = $('.add_button'); //Add button selector
                                        var wrapper = $('.field_wrapper'); //Input field wrapper
//    var fieldHTML = '<label>Product Photo</label><div><input style="float:left" type="file" name="img_name[]" value=""/><a style="float:left" href="javascript:void(0);" class="remove_button"><img src="<?php echo base_url(); ?>resources/images/remove-icon.png"/></a></div><br><br>'; //New input field html 
                                        var fieldHTML = '<div><input style="float:left" type="file" name="img_name[]" value=""/><a style="float:left" href="javascript:void(0);" class="remove_button"><span class="btn-danger">Remove Product Photo</span></a></div><br><br>'; //New input field html 
                                        var x = 1; //Initial field counter is 1

                                        //Once add button is clicked
                                        $(addButton).click(function () {
                                            //Check maximum number of input fields
                                            if (x < maxField) {
                                                x++; //Increment field counter
                                                $(wrapper).append(fieldHTML); //Add field html
                                            }
                                        });

                                        //Once remove button is clicked
                                        $(wrapper).on('click', '.remove_button', function (e) {
                                            e.preventDefault();
                                            $(this).parent('div').remove(); //Remove field html
                                            x--; //Decrement field counter
                                        });
                                    });
                                </script>

                                <?php foreach ($productImg as $pImg) { ?>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            /* attach a submit handler to the form */
                                            $("#prodImg_<?php echo $pImg->id; ?>").click(function (event) {
                                                /* stop form from submitting normally */
                                                var imgid = <?php echo $pImg->id ?>;

                                                var values = 'imgid=' + imgid;
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>admin/products/delete_product_image/<?php echo $pImg->id; ?>",
                                                                    type: "GET",
                                                                    data: values,
                                                                    cache: false,
                                                                    beforeSend: function () {
                                                                    },
                                                                    success: function (data) {
    //                                                                        alert(data);
                                                                        $(".remove_img_<?php echo $pImg->id; ?>").hide();

                                                                    },
                                                                    error: function () {
                                                                        alert('there is error while submit');
                                                                    }
                                                                });
                                                            });
                                                        });
                                    </script>	

                                    <div class="form-group remove_img_<?php echo $pImg->id; ?>" style="clear:both">
                                        <label></label>
                                        <div>
                                            <div class="col-sm-4">                
                                                <img src="<?php echo base_url(); ?>resources/product-image/<?php echo $pImg->img_name; ?>" height="100" />
                                            </div>
                                            <div class="col-sm-8">                                           
                                                <a style="cursor:pointer" id="prodImg_<?php echo $pImg->id; ?>" class="btn-danger" onclick="if (!confirm('Are you sure want to Delete?')) {
                                                                return false
                                                            }">Delete Photo (X)</a>
                                            </div>
                                            <br>
                                            <br>
                                        </div>                                                        
                                    </div>
                                <?php } ?>
                                <br>
                                <br>

                                <div class="form-group" style="clear:both">
                                    <div class="field_wrapper">
                                        <label>New Product Photo</label>
                                        <div>
                                            <div class="col-sm-4">                
                                                <input type="file" name="img_name[]" value="" />
                                            </div>
                                            <div class="col-sm-8">
                                            <!--<a href="javascript:void(0);" class="add_button" title="Add Product Image"><img src="<?php echo base_url(); ?>resources/images/add-icon.png"/></a>-->
                                                <a href="javascript:void(0);" class="add_button" title="Add Product Image"><span class="btn-success">Add More Product Photo</span></a>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                    </div>                                                           
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
<!-- /.row -->
</div>
<!-- /#page-wrapper -->