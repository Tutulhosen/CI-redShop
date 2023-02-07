<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">All Customer</h1>
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
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>District</th>
                                                <th>Email</th>                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sl = 1;
                                            foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $row->customer_name; ?></td>
                                                    <td><?php echo $row->customer_mobile; ?></td>
                                                    <td><?php echo $row->customer_address; ?></td>
                                                    <td><?php echo $row->customer_city; ?></td>
                                                    <td><?php echo $row->customer_district; ?></td>
                                                    <td><?php echo $row->email; ?></td>
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