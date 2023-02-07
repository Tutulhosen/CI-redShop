<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">All User</h1>
                        <a href="<?php echo base_url(); ?>admin/user/create" class="btn btn-success">Create New</a>

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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>SL#</th>
                                                <th>Actions</th>                              
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>User Group</th>
                                                <th>Photo</th>                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sl = 1;
                                            foreach ($result as $row) {
                                                $userGroup = $this->db->select('*')->where('id', $row->user_group)->get('user_type')->row();
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td class="center">
                                                        <a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/user/delete_user/<?php echo $row->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                                        <a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/user/edit_user/<?php echo $row->id; ?>" class="btn btn-info" target="_blank">Details/ Edit</a>
                                                    </td>
                                                    <td><?php echo $row->first_name . ' ' . $row->last_name; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <td><?php echo $userGroup->name; ?></td>
                                                    <td></td>
                                                </tr>
                                                <?php $sl++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>

                                </div>
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
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->