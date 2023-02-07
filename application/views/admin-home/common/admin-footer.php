

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>resources/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>resources/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url() ?>resources/admin/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url() ?>resources/admin/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url() ?>resources/admin/data/morris-data.js"></script>
    
    
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url() ?>resources/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>resources/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>resources/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>resources/admin/dist/js/sb-admin-2.js"></script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    jQuery(document).ready(function() {
        jQuery('#dataTables-example').DataTable({
            responsive: true,
            "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]]
        });
    });
    </script>

</body>

</html>
