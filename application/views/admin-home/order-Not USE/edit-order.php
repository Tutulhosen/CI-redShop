
<script src='<?php echo base_url(); ?>resources/select-example/jquery-3.2.1.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>resources/select-example/select2/dist/js/select2.min.js' type='text/javascript'></script>

<link href='<?php echo base_url(); ?>resources/select-example/select2/dist/css/select2.css' rel='stylesheet' type='text/css'>
<!--<link href='<?php echo base_url(); ?>resources/select-example/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>-->

<!--https://forum.jquery.com/topic/disable-submit-button-if-input-is-none-->



<script>

    function submitDetailsForm() {
//       alert('HI');
        $("#orderForm").submit();

        $("#orderForm").submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: "post",
                dataType: "html",
                url: '<?php echo base_url(); ?>admin/order/send_invoice',
                data: $("#orderForm").serialize(),
                success: function (response) {
                    //write here any code needed for handling success         }
//                    $('.orderid').val(response);
                    var link = "<?php echo base_url(); ?>admin/order/view_invoice_by_edit/<?php echo $result->id; ?>";
                    window.open(link, 'newStuff'); //open's link in newly opened tab!
//                    $('#orderForm')[0].reset();
window.location = '<?php echo base_url(); ?>admin/order/follow_up';
                },
            });
        });
    }

</script>

<div id="page-wrapper">

    <div class="row">

        <!-- /.col-lg-12 -->

        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Order => [Current Status: <b><?php echo $result->status; ?></b>]
                <?php $this->load->view('admin-home/message/message-display-view'); ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--<form id="orderForm" action="<?php // echo base_url();  ?>admin/order/formData" method="post"  enctype="multipart/form-data">-->
                        <form id="orderForm" action="" method="post">
                                   

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Product Name</label>                                    
                                    <input type="hidden" class="form-control orderid" name="orderid" value="<?php echo $result->id; ?>"  required="">
                                    <input readonly="" type="text" class="form-control productName" id="" name="product_name" value="<?php echo $result->product_name; ?>"  required="">
                                </div>                                                  
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <input readonly="" type="text" class="form-control categoryName" id="" name="category_name" value="<?php echo $result->category_name; ?>"  required="">
                                </div>   
                                <div class="form-group">
                                    <label>Product Sub Category</label>
                                    <input readonly="" type="text" class="form-control subCategoryName" id="" name="sub_category_name" value="<?php echo $result->sub_category_name; ?>"  required="">
                                </div>   

                                <div class="form-group">
                                    <label>Customer Name</label>                                    
                                    <input type="text" class="form-control" name="customer_name" id="input1" value="<?php echo $result->customer_name; ?>" placeholder="Customer Name"  required="">
                                </div>      
                                <div class="form-group">
                                    <label>Facebook ID/URL</label>                                    
                                    <input type="text" class="form-control" name="facebook_url" id="input2" value="<?php echo $result->facebook_url; ?>" placeholder="Facebook ID/URL">
                                </div>      

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Mobile</label>                                    
                                    <input type="text" class="form-control" name="mobile" value="<?php echo $result->mobile; ?>" id="input3" placeholder="Mobile Number" required="" >
                                </div>  
                                <div class="form-group">
                                    <label>Address</label>                                    
                                    <input type="text" class="form-control" name="address" value="<?php echo $result->address; ?>" id="input4" placeholder="Type Address"  required="">
                                </div>  
                                <div class="form-group">
                                    <label>Qty</label>                                    
                                    <input type="text" class="form-control" name="qty" value="<?php echo $result->qty; ?>" id="input5" placeholder="Quantity" required="" >
                                </div>      
                                <div class="form-group">
                                    <label>Price</label>                                    
                                    <input type="text" class="form-control" name="price" value="<?php echo $result->price; ?>" id="input6" placeholder="Price" required="" >
                                </div>     
                                <div class="form-group">
                                    <label>Order Source</label>                                    
                                    <select id="input7" class="form-control" name="order_source">
                                        <option value="<?php echo $result->order_source; ?>"><?php echo $result->order_source; ?></option>
                                        <option value="Fb Message">Fb Message</option>
                                        <option value="Direct Order">Direct Order</option>
                                        <option value="Website">Web</option>
                                    </select>
                                </div>   
                                 
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Note</label>                                    
                                    <textarea class="form-control" cols="10" rows="3" name="description" ><?php echo $result->description; ?></textarea>
                                </div>   
                            </div>
                            <script>
                                $(function () {
                                    $('#input1,#input2,#input3,#input4,#input5,#input6').change(function () {
                                        $('#submit').attr('disabled', !($('#input1').val() && $('#input2').val() && $('#input3').val() && $('#input4').val() && $('#input5').val() && $('#input6').val()));
                                    });
                                });
                            </script>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <br>
                                    <!--<button type="submit" class="btn btn-warning btn-lg">Follow Up</button>-->
                                    <!--<button id="submit" type="submit" name="submit" class="btn btn-success btn-lg">Send Invoice</button>-->
                                    <input onClick='submitDetailsForm()' id="submit" type="submit" name="submit" class="btn btn-success btn-lg" value="Send Invoice">
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->