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
        templates: [{
                title: 'Test template 1',
                content: 'Test 1'
            },
            {
                title: 'Test template 2',
                content: 'Test 2'
            }
        ],
        content_css: [
            //    'http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '<?php echo base_url() ?>css/lato_font.css',
            'https://www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        /* attach a submit handler to the form */
        $("#category_id").change(function(event) {
            /* stop form from submitting normally */
            var values = "category_id=" + $("#category_id").val();
            $.ajax({

                url: "<?php echo base_url() ?>admin/products/getSubCategory",
                type: "POST",
                data: values,
                cache: false,
                dataType: 'html',
                beforeSend: function() {},
                success: function(data) {
                    $("#subCat").html(data);
                },
                error: function() {
                    alert('there is error while submit');
                }
            });
        });
    });
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Product</h1>
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
                            <form role="form" action="<?php echo base_url(); ?>admin/products/product_save" method="post" enctype="multipart/form-data">

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
                                    <label>Sub Category Name</label>
                                    <div id="subCat">
                                        <select class="form-control" name="sub_category_id" required="">
                                            <option value="">==Select==</option>
                                            <?php foreach ($sub_category as $row2) { ?>
                                                <option value="<?php echo $row2->id; ?>"><?php echo $row2->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="name" value="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Product Code(SKU)</label>
                                    <input type="text" class="form-control" name="product_code" value="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control ckeditor" cols="10" rows="5" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <input type="text" class="form-control" name="size" value="">
                                </div>
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="text" class="form-control" name="color" value="">
                                </div>
                                <div class="form-group">
                                    <label>Qty</label>
                                    <input type="text" class="form-control" name="qty" value="">
                                </div>
                                <div class="form-group">
                                    <label>Maximum Qty in Single Order</label>
                                    <input type="text" class="form-control" name="max_qty_single_order" value="">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" value="">
                                </div>
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" class="form-control" name="discount" value="">
                                </div>
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select class="form-control" name="currency" required="">
                                        <option value="৳">৳</option>
                                        <option value="$">$</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Availability status</label>
                                    <select class="form-control" name="availability_status" required="">
                                        <option value="available">Available</option>
                                        <option value="stock_out">Stock Out</option>
                                    </select>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        var maxField = 10; //Input fields increment limitation
                                        var addButton = $('.add_button'); //Add button selector
                                        var wrapper = $('.field_wrapper'); //Input field wrapper
                                        //    var fieldHTML = '<label>Product Photo</label><div><input style="float:left" type="file" name="img_name[]" value=""/><a style="float:left" href="javascript:void(0);" class="remove_button"><img src="<?php echo base_url(); ?>resources/images/remove-icon.png"/></a></div><br><br>'; //New input field html 
                                        var fieldHTML = '<div><input style="float:left" type="file" name="img_name[]" value=""/><a style="float:left" href="javascript:void(0);" class="remove_button"><span class="btn-danger">Delete Photo (X)</span></a></div><br><br>'; //New input field html 
                                        var x = 1; //Initial field counter is 1

                                        //Once add button is clicked
                                        $(addButton).click(function() {
                                            //Check maximum number of input fields
                                            if (x < maxField) {
                                                x++; //Increment field counter
                                                $(wrapper).append(fieldHTML); //Add field html
                                            }
                                        });

                                        //Once remove button is clicked
                                        $(wrapper).on('click', '.remove_button', function(e) {
                                            e.preventDefault();
                                            $(this).parent('div').remove(); //Remove field html
                                            x--; //Decrement field counter
                                        });
                                    });
                                </script>

                                <div class="form-group">
                                    <div class="field_wrapper">
                                        <label>Product Photo</label>
                                        <div>
                                            <div class="col-sm-4">
                                                <input type="file" name="img_name[]" value="" required="" />
                                            </div>
                                            <div class="col-sm-8">
                                                <!--<a href="javascript:void(0);" class="add_button" title="Add Product Image"><img src="<?php echo base_url(); ?>resources/images/add-icon.png"/></a>-->
                                                <a href="javascript:void(0);" class="add_button" title="Add Product Image"><span class="btn btn-primary">Add More Product Photo(+)</span></a>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <!--                                 <div class="form-group">
                                                                    <label>Photo 1</label>                                        
                                                                    <input type="file" name="photo1" >                                                                
                                                                </div>-->


                                <div class="form-group">
                                    <div class="col-sm-12 text-center">
                                        <br>
                                        <button type="submit" class="btn btn-success">Create</button>
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