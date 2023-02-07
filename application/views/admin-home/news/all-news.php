

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All News</h1>
            <a href="<?php echo base_url(); ?>admin/news/create_new" class="btn btn-success">Create New News</a>

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
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Description</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td class="center">
                                        <a style="margin-bottom:5px;" href="<?php echo base_url(); ?>admin/news/details/<?php echo $row->id; ?>" class="btn btn-info" target="_blank">Details/ Edit</a>
                                        
                                        <!--<a href="<?php // echo base_url(); ?>admin/faculty/delete/<?php echo $row->id; ?>" class="btn btn-danger" target="_blank">Delete</a>-->
                                    </td>
                                    <td><?php echo $row->title; ?></td>
                                    <td>
                                        <?php if(isset($row->photo1) && $row->photo1 !=''){ ?>
                                        <img src="<?php echo base_url(); ?>resources/news/<?php echo $row->photo1; ?>" width="150" />
                                        <?php } ?>
                                    </td>
                                    <td><?php 
                                    $desc=htmlspecialchars_decode($row->description, ENT_QUOTES); 
                                    $limit_description= word_limiter($desc, 30); // need to load $this->load->helper('text');
//                                    $string = character_limiter($string, 20); // another char limit function 
                                    echo $limit_description;
                                    ?></td>                                                                                            
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