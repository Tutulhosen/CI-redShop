

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Sub Category</h1>
            <a href="<?php echo base_url(); ?>admin/sub_category/create_new" class="btn btn-success">Create New</a>

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
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Actions</th>                                                       
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            foreach ($result as $row) {
                                $category_id=$row->category_id;
                                
                                $categoryInfo = $this->db
                                                ->select('*')
                                                ->where('id', $category_id)
                                                ->get('category')
                                                ->row();
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $categoryInfo->name; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td class="center">
                                        <a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/sub_category/details/<?php echo $row->id; ?>" class="btn btn-info" target="_blank">Edit</a>
                                        <a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/sub_category/delete/<?php echo $row->id; ?>" onclick="if (!confirm('Are you sure want to Delete?')) { return false }"  class="btn btn-danger">Delete</a>
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