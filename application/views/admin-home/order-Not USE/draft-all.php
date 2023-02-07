

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Draft Report</h1>

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
                                $createdAt = $row->created_at;
                                $createdAt = explode(" ",$createdAt);
                                
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td class="center">
                                        <!--<a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/products/details/<?php // echo $row->id; ?>" class="btn btn-info" target="_blank">Details/ Edit</a>-->
                                        <!--<a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/products/edit_product/<?php // echo $row->id; ?>" class="btn btn-info" target="_blank">Details/ Edit</a>-->
                                        <a style="margin-bottom:5px;" href="#" class="btn btn-info">Details/ Edit</a>
                                    </td>
                                    <td><?php echo $row->product_name; ?></td>
                                    <td><?php echo $row->product_code; ?></td>
                                    <td><?php echo $row->customer_name; ?></td>
                                    <td><?php echo $row->mobile; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $createdAt[0]; ?></td>
                                    <td style="color: yellowgreen"><?php echo $row->status; ?></td>
                                                                                                                              
                                   
                                </tr>
   <?php $sl++;
} ?>

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