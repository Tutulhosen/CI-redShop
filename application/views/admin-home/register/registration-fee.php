

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Registration Fees</h1>

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
                                <th>Local Students</th>
                                <th>Local Participants</th>
                                <th>Foreign Students</th>
                                <th>Foreign Participants</th>
                                <th>Site visit local participants</th>
                                <th>Site visit foreign participants</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>Taka <?php echo $result->local_students; ?></td>
                                <td>Taka <?php echo $result->local_participants; ?></td>
                                <td>USD <?php echo $result->foreign_students; ?></td>
                                <td>USD <?php echo $result->foreign_participants; ?></td>
                                <td>Taka <?php echo $result->site_visit_local_participants; ?></td>
                                <td>USD <?php echo $result->site_visit_foreign_participants; ?></td>

                                <td class="center">
                                    <a href="<?php echo base_url(); ?>admin/register/edit_register_fees/<?php echo $result->id; ?>" class="btn btn-success">Edit</a>

                                </td>
                            </tr>

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