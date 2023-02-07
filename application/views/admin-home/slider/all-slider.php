

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Slider Image</h1>
            <a href="<?php echo base_url(); ?>admin/slider/create_new" class="btn btn-success">Create New</a>

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
                                <th>Image</th>
                                <th>Actions</th>                                                       
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo base_url(); ?>resources/home-slider/<?php echo $row->slider_name; ?>" width="200"/></td>
                                    <td class="center">
                                        <a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/slider/delete/<?php echo $row->id; ?>" onclick="if (!confirm('Are you sure want to Delete?')) { return false }" class="btn btn-danger">Delete</a>
                                    </td>
                                   
                                                                                                                              
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