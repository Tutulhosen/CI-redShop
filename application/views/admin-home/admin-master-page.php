<?php
if (isset($admin_header)) {
    echo $admin_header;
}
?>

<div id="wrapper">

    <?php
    if (isset($nav_left)) {
        echo $nav_left;
    }
    ?>

    <?php
    if (isset($admin_body)) {
        echo $admin_body;
    }
    ?>

</div>
<!-- /#wrapper -->

<?php
if (isset($admin_footer)) {
    echo $admin_footer;
}
?>