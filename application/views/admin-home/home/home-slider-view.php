

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All</h1>
            <a href="<?php echo base_url(); ?>admin/home/new_slider" class="btn btn-success">Create New</a>

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
                                <th>Photo</th>                         
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
                                    <td>
                                        <?php if (isset($row->image_name) && $row->image_name != '') { ?>
                                            <img src="<?php echo base_url(); ?>resources/img/slider/home/<?php echo $row->image_name; ?>" width="150" />
                                        <?php } ?>
                                    </td>                                                                                         
                                    <td class="center">
                                        <a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/home/slider_delete/<?php echo $row->id; ?>" class="btn btn-warning" onclick="if (!confirm('Are you sure want to Delete?')) { return false }">Delete</a>
                                    </td>
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