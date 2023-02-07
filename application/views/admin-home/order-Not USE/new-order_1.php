
<script src='<?php echo base_url(); ?>resources/select-example/jquery-3.2.1.min.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>resources/select-example/select2/dist/js/select2.min.js' type='text/javascript'></script>

<link href='<?php echo base_url(); ?>resources/select-example/select2/dist/css/select2.css' rel='stylesheet' type='text/css'>
<!--<link href='<?php echo base_url(); ?>resources/select-example/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>-->

<!--https://forum.jquery.com/topic/disable-submit-button-if-input-is-none-->


<!-- Script -->
<script>
    $(document).ready(function () {
        // Initialize select2
        $("#selUser").select2();
        // Read selected option
        $('.but_read').change(function () {
            var username = $('#selUser option:selected').text();
            var prodId = $('#selUser').val();
            $('#result').html("id : " + prodId + ", name : " + username);
            $('.name').val(username);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>admin/order/order_details_by_orderid",
                data: 'act=demo&prodId=' + prodId,
                success: function (data) {
                    var jsondata = $.parseJSON(data);
//                    console.log(jsondata);

                    $('.productName').val(jsondata.name);
                    $('.productCode').val(jsondata.product_code);
                    $('.categoryName').val(jsondata.category_name);
                    $('.categoryId').val(jsondata.category_id);
                    $('.subCategoryName').val(jsondata.sub_category_name);
                    $('.subCategoryId').val(jsondata.sub_category_id);
                }
            });
        });
    });
</script>

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
                    
                   var link = "<?php echo base_url(); ?>admin/order/view_invoice";
                window.open(link,'newStuff'); //open's link in newly opened tab!
                },
            });
        });
    }
    
    
    
    
    
        $(document).ready(function () {
            
            $("#submit").attr('disabled', 'disabled');

    $('#input3').change(function() { 
//    $('#orderForm').delay(200).submit();
    $('#orderForm').submit();


$("#orderForm").submit(function (event) {
    event.preventDefault();
    $.ajax({
        type: "post",
        dataType: "html",
        url: '<?php echo base_url(); ?>admin/order/formData',
        data: $("#orderForm").serialize(),
        success: function (response) {
                                //write here any code needed for handling success         }
                                $('.orderid').val(response);
                            },
                        });
                    });
                });
                
//    $('#input4').blur(function() { 
    $('#input4').change(function() { 
//    $('#orderForm').delay(200).submit();
    $('#orderForm').submit();


$("#orderForm").submit(function (event) {
    event.preventDefault();
    $.ajax({
        type: "post",
        dataType: "html",
        url: '<?php echo base_url(); ?>admin/order/formData',
        data: $("#orderForm").serialize(),
        success: function (response) {
                                //write here any code needed for handling success         }
                                $('.orderid').val(response);
                            },
                        });
                    });
                });

            });
</script>

<div id="page-wrapper">

    <div class="row">

        <!-- /.col-lg-12 -->

        <div class="panel panel-default">
            <div class="panel-heading">
                New Order
                <?php $this->load->view('admin-home/message/message-display-view'); ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!--<form id="orderForm" action="<?php // echo base_url(); ?>admin/order/formData" method="post"  enctype="multipart/form-data">-->
                        <form id="orderForm" action="" method="post">
                            <div class="form-group">                              
                                <div class="col-lg-12 text-center" style="margin-bottom: 20px">
                                    <!-- Dropdown -->       
                                    <select id='selUser' class="but_read form-control" style='width: 500px; font-size: 30px'>
                                        <option value='0'>-- Search Item --</option> 
                                        <?php foreach ($product as $row) { ?>
                                            <option value='<?php echo $row->id; ?>'><?php echo $row->product_code; ?></option>  
                                        <?php } ?>
                                    </select>   

                                    <br/>
                                    <!--<div id='result'></div>-->



                                </div>
                            </div>            

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Product Name</label>                                    
                                    <input type="hidden" class="form-control orderid" name="orderid"  required="">
                                    <input type="hidden" class="form-control productCode" name="productCode" value=""  required="">
                                    <input readonly="" type="text" class="form-control productName" id="" name="product_name" value=""  required="">
                                </div>                                                  
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <input type="hidden" class="form-control categoryId" name="category_id" value=""  required="">
                                    <input readonly="" type="text" class="form-control categoryName" id="" name="category_name" value=""  required="">
                                </div>   
                                <div class="form-group">
                                    <label>Product Sub Category</label>
                                    <input type="hidden" class="form-control subCategoryId" name="sub_category_id" value=""  required="">
                                    <input readonly="" type="text" class="form-control subCategoryName" id="" name="sub_category_name" value=""  required="">
                                </div>   

                                <div class="form-group">
                                    <label>Customer Name</label>                                    
                                    <input type="text" class="form-control" name="customer_name" id="input1" value="" placeholder="Customer Name" >
                                </div>      
                                <div class="form-group">
                                    <label>Facebook ID/URL</label>                                    
                                    <input type="text" class="form-control" name="facebook_url" id="input2" value="" placeholder="Facebook ID/URL">
                                </div>      

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Mobile</label>                                    
                                    <input type="text" class="form-control mobile" name="mobile" value="" id="input3" placeholder="Mobile Number" >
                                </div>      
                                <div class="form-group">
                                    <label>Address</label>                                    
                                    <input type="text" class="form-control" name="address" value="" id="input4" placeholder="Type Address" >
                                </div>  
                                <div class="form-group">
                                    <label>Qty</label>                                    
                                    <input type="text" class="form-control" name="qty" value="" id="input5" placeholder="Quantity" >
                                </div>      
                                <div class="form-group">
                                    <label>Price</label>                                    
                                    <input type="text" class="form-control" name="price" value="" id="input6" placeholder="Price" >
                                </div>     
                                <div class="form-group">
                                    <label>Order Source</label>                                    
                                    <select id="input7" class="form-control" name="order_source">
                                        <option value="">Select any..</option>
                                        <option value="Fb Message">Fb Message</option>
                                        <option value="Direct Order">Direct Order</option>
                                        <option value="Website">Web</option>
                                    </select>
                                </div>      
                            </div>

                            <script>
                                $(function () {
                                    $('#input1,#input2,#input3,#input4,#input5,#input6').change(function () {
                                        $('#submit').attr('disabled', !($('#input1').val() && $('#input2').val() && $('#input3').val() && $('#input4').val ()&& $('#input5').val() && $('#input6').val()));
                                    });
                                });
                            </script>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <br>
                                    <!--<button type="submit" class="btn btn-warning btn-lg">Follow Up</button>-->
                                    <!--<button id="submit" type="submit" name="submit" class="btn btn-success btn-lg">Send Invoice</button>-->
                                    <input onClick='submitDetailsForm()' id="submit" type="submit" name="submit" class="btn btn-success btn-lg" value="submit">
                                   
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