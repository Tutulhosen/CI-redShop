

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Product</h1>
            <a href="<?php echo base_url(); ?>admin/products/create_new" class="btn btn-success">Create New Products</a>

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
                                <th>Code</th>
                                <!--<th>Description</th>-->
                                <th>Photo</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            foreach ($result as $row) {
                                $productImg=$this->db
                                        ->select('*')
                                        ->where('product_id',$row->id)
                                        ->where('category_name','apparel')
                                        ->get('product_img')
                                        ->row();
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td class="center">
                                        <a style="margin-bottom:2px;" href="<?php echo base_url(); ?>admin/products/edit_product/<?php echo $row->id; ?>" class="btn btn-info" target="_blank">Edit</a>
                                        <a style="margin-bottom:2px;" href="<?php echo base_url(); ?>admin/products/delete/<?php echo $row->id; ?>" onclick="if (!confirm('Are you sure want to Delete?')) { return false }" class="btn btn-danger">Delete</a>
                                    </td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->product_code; ?></td>
<!--                                    <td>
                                        <?php 
//                                        $desc=htmlspecialchars_decode($row->description, ENT_QUOTES); 
//                                        $limit_description= word_limiter($desc, 30); // need to load $this->load->helper('text');
    //                                    $string = character_limiter($string, 20); // another char limit function 
//                                        echo $limit_description;
                                        ?>
                                    </td>                                                                                            -->
                                    <td>
                                        <?php if(!empty($productImg) && $productImg->img_name !=''){ ?>
                                        <img src="<?php echo base_url(); ?>resources/product-image/<?php echo $productImg->img_name; ?>" width="100" />
                                        <?php } ?>
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