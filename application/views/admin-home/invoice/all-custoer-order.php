

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Customer Order</h1>

            <?php $this->load->view('admin-home/message/message-display-view'); ?>
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
                                <th>Name</th>
                                <th>Invoice Number</th>
                                <th>Mobile</th>                           
                                <th>Address</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            foreach ($result as $row) {
                                $itemInfo = $this->db
                                        ->select('*')
                                        ->where('delivery_address_id',$row->id)
                                        ->get('delivery_item')
                                        ->result();
                                
                                if(!empty($itemInfo)){
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td class="center">
                                        <a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/invoice/view_details/<?php echo $row->id; ?>" class="btn btn-info" target="_blank">Details</a>
                                    </td>
                                    <td><?php echo $row->name; ?></td>                                                                                           
                                    <td><?php echo $row->invoice_number; ?></td>                                                                                           
                                    <td><?php echo $row->mobile; ?></td>                                                                                           
                                    <td>
                                        <?php echo $row->address; ?>
                                        
                                    </td>
                                </tr>
                                <?php
                                }
                                $sl++;
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