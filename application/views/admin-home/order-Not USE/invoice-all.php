

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Invoice Sent Report</h1>
            <?php $this->load->view('admin-home/message/message-display-view'); ?>
            <div class="message_display" style="text-align: center; color:green"></div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Actions</th>                              
                                <th>Send to Packing</th>                     
                                <th>Product Name</th>
                                <th>Code</th>
                                <th>Customer</th>
                                <th>Mobile</th>                           
                                <th>Address</th>                           
                                <th>Date</th>                           
                                <th>Status</th>                     
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            foreach ($result as $row) {
                                $createdAt = $row->updated_at;
                                $createdAt = explode(" ", $createdAt);
                                ?>
                            <script>
                                $(document).ready(function () { 
                                $('#order_status_<?php echo $row->id; ?>').change(function () {
                                        event.preventDefault();                                        
                                        var order_id = $('#order_status_<?php echo $row->id; ?>').val();
//                                        alert('hi');
                                    if (confirm('Are you sure you want to do this?')) {
                                        $.ajax({
                                            type: "post",
                                            dataType: "html",
                                            url: '<?php echo base_url(); ?>admin/order/order_send_to_packing',
                                            data: 'order_id=' + order_id,
                                            success: function (response) {
                                                //write here any code needed for handling success
                                                if(response == 'true'){
                                                $('.message_display').html('Success! Sent to Packing.');
                                                $('.rowID_<?php echo $row->id; ?>').hide();
                                                }
                                            },
                                        });
                                        };
                                });
                                });
                                </script>
                                <tr class="rowID_<?php echo $row->id; ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td class="center">
                                        <a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/order/view_invoice/<?php echo $row->id; ?>" target="_blank" class="btn btn-info">View Inv</a>
                                    </td>
                                     <td>
                                        <div class="form-group">
                                            <!--                                            <label>Selects</label>-->
                                            <select class="form-control" id="order_status_<?php echo $row->id; ?>" name="order_id">
                                                <option value="">Select..</option>
                                                <option value="<?php echo $row->id; ?>">Send to packing</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td><?php echo $row->product_name; ?></td>
                                    <td><?php echo $row->product_code; ?></td>
                                    <td><?php echo $row->customer_name; ?></td>
                                    <td><?php echo $row->mobile; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $createdAt[0]; ?></td>
                                   
                                    <td style="color:green"><?php echo $row->status; ?></td>


                                </tr>
                                <?php $sl++;
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->