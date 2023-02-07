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
            <h1 class="page-header">Customer Order Details</h1>
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
                    <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<!--                                <thead>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </thead>-->
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>Invoice Number: </td>
                                        <td><b><?php echo $customer->invoice_number; ?></b></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>Name: </td>
                                        <td><?php echo $customer->name; ?></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>Mobile: </td>
                                        <td><?php echo $customer->mobile; ?></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>Address: </td>
                                        <td><?php echo $customer->address; ?></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>City: </td>
                                        <td><?php echo $customer->city; ?></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>District: </td>
                                        <td><?php echo $customer->district; ?></td>
                                    </tr>
                                    
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                               
                                 <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    $grandTotal = 0;
                                    foreach($result as $row){?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->qty; ?></td>
                                        <td><?php echo $row->price; ?></td>
                                        <td><?php echo $total = $row->qty*$row->price; ?></td>
                                    </tr>
                                    <?php
                                    $grandTotal += $total;
                                    $i++; } ?>
                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Grand Total</th>
                                        <th><?php echo $grandTotal; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- /.table-responsive -->
                           
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