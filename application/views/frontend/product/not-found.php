<?php
if (isset($header)) {
    echo $header;
}
?>
<?php
if (isset($menu)) {
    echo $menu;
}
?>

<style>
    .error p{
        color:red;
    }
</style>

<?php
if (isset($left_mob_category)) {
    echo $left_mob_category;
}
?>
<?php
if (isset($menu)) {
    echo $menu;
}
?>
<?php
if (isset($cart_aside)) {
    echo $cart_aside;
}
?>


<main class="main u-p-t-20">
    <div class="container">
        <div class="row10 u-flex">
            <?php
            if (isset($left_category)) {
                echo $left_category;
            }
            ?>
            <div class="col-content">

                <div class="category-intro">
                    <nav>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="active">Category</li>
                        </ol>
                    </nav>
                </div>

                <div class="section section--category">                   
                    <div class="col-sm-12 text-center">
                        <h5></h5>
                        <h5>Products not found!</h5>                        
                    </div>       
                </div>

            </div>
        </div>
    </div>
</main>

<?php
if (isset($footer)) {
    echo $footer;
}
?>