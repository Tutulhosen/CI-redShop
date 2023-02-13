<?php
if (isset($header)) {
    echo $header;
}
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v16.0" nonce="o4dXJtPJ"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
if (isset($menu)) {
    echo $menu;
}
?>

<style>
    .error p{
        color:red;
    }
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-bottom: 20px;
    }
    .best_cnt{
        height: 25px;
        width: 70px;
        color: white;
        background-color: red;
        text-align: center;
        font-size: 10px;
        border-radius: 40%;
        padding-top: 5px;
    }
    .new_cnt{
        height: 25px;
        width: 70px;
        color: white;
        background-color: blue;
        text-align: center;
        font-size: 10px;
        border-radius: 40%;
        padding-top: 5px;
    }
    .offer{
        height: 45px;
        width: 45px;
        color: white;
        background-color: #1c361f;
        font-weight: bold;
        text-align: center;
        font-size: 14px;
        border-radius: 50%;
        padding-top: 5px;
        position: absolute;
        right: 7px;
        bottom: 86px;
    }
    .product{
        position: relative;
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



<main class="main u-p-t-20 page-wrap">
    <div class="container">
        <div class="row10 u-flex">
            <?php
if (isset($left_category)) {
    echo $left_category;
}
$prodImg = $this->db->select('*')->where('product_id', $result->id)->get('product_img')->result();
?>

            <div class="col-content">
                <form id="add-to-cart">
                    <div class="content-det has-shadow u-flex">
                        <div class="product-preview">
                            <div class="product__fig" id="product__fig">
                                <img src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImg[0]->img_name; ?>" alt="">
                            </div>
                            <div class="product__thum">
                                <ul class="u-flex u-flex--wrap">
                                    <?php
$i = 1;
if (!empty($prodImg)) {
    foreach ($prodImg as $rowImg) {
        ?>
                                            <li <?php if ($i == 1) {?>class="active" data-img="1" <?php }?>>
                                                <div class="wrap"><img src="<?php echo base_url(); ?>resources/product-image/<?php echo $rowImg->img_name; ?>" alt=""></div>
                                            </li>
                                            <?php
$i++;
    }
}
?>
                                </ul>
                            </div>
                        </div>


                        <div class="det-content">
                            <div class="id">
                                <div class="inner">
                                    <span>ID#</span>
                                    <span><?php echo '10' . $result->id; ?></span>
                                </div>
                            </div>

                            <div class="product-inf">
                                <h4><?php echo $result->name; ?></h4>
                                <div class="price">
                                    <div class="top u-flex u-flex--item-center">
                                        <?php if ($result->discount != '') {?>
                                            <div class="old"><?php echo $result->currency . '' . $result->price; ?></div>
                                        <?php }?> &nbsp;

                                        <?php if ($result->discount != '' || $result->discount != null) {?>
                                            <div class="save">
                                                Save <?php
                                            $discount = $result->discount;
                                                if ($discount == '' || $discount == null) {
                                                    $discount = 0;
                                                }

                                                $save = $result->price - $discount;
                                                echo $result->currency . '' . $save;
    ?>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="bottom">
                                        <?php if ($result->discount == '') {?>
                                            <?php echo $result->currency . '' . $result->price; ?>
                                        <?php } else {?>
                                            <?php echo $result->currency . '' . $result->discount; ?>
                                        <?php }?>
                                    </div>
                                </div>

                                <?php if ($result->size != "") {?>
                                    <div class="color-meta">
                                        <h6>Size</h6>
                                        <div class="btn-set">
                                            <!--<button class="active">Dark Gray</button>-->
                                            <button><?php echo $result->size; ?></button>
                                        </div>
                                    </div>
                                <?php }?>
                                <?php if ($result->color != "") {?>
                                    <div class="color-meta">
                                        <h6>Color</h6>
                                        <div class="btn-set">
                                            <!--<button class="active">Dark Gray</button>-->
                                            <button><?php echo $result->color; ?></button>
                                        </div>
                                    </div>
                                <?php }?>

                                <?php
                                    if ($result->discount == '' || $result->discount == null) {
                                        $finalPrice = $result->price;
                                    } else {
                                        $finalPrice = $result->discount;
                                    }
                                    ?>

                                <div class="product-act">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                                    <input type="hidden" name="name" value="<?php echo $result->name; ?>">
                                    <input type="hidden" name="price" value="<?php echo $finalPrice; ?>">

                                    <?php if ($result->availability_status == 'stock_out') {?>
                                        <a style="margin-left:-2px" href="#" class="act-det buy">STOCK OUT</a>
                                    <?php } else {?>
                                        <input type="submit" class="act-det cart clickButton" name="addtocart" value="Add to cart">
                                        <input type="submit" style="margin-left:-2px" class="act-det buy clickButton" name="buyNow" value="Buy now">
                                    <?php }?>
                            <!--                                    <a style="margin-left:-2px" href="<?php // echo base_url();  ?>products/cart_details" class="act-det buy">Buy now</a>
                                <a style="margin-left:-2px" href="<?php // echo base_url();  ?>products/cart_details" class="act-det buy">Buy now</a>-->
                                </div>
                                <!--                                <div class="product-meta">
                                                                    <ul>
                                                                        <li>
                                                                            <svg class="Svg__icon" viewBox="0 0 20 20">
                                                                            <path d="M10,0A10,10,0,1,0,20,10,9.971,9.971,0,0,0,10,0Zm5.773,6.864h0L8.5,14.409a.413.413,0,0,1-.318.136.354.354,0,0,1-.318-.136L4.318,10.591,4.227,10.5a.439.439,0,0,1,0-.636l.636-.636a.439.439,0,0,1,.636,0l.045.045,2.5,2.682a.22.22,0,0,0,.318,0l6.091-6.318H14.5a.439.439,0,0,1,.636,0l.636.636A.388.388,0,0,1,15.773,6.864Z"></path>
                                                                            </svg>
                                                                            Deliverable to <a href="#">Agent Stores</a></li>
                                                                        <li>
                                                                            <svg class="Svg__icon" viewBox="0 0 20 20">
                                                                            <path d="M10,0A10,10,0,1,0,20,10,9.971,9.971,0,0,0,10,0Zm5.773,6.864h0L8.5,14.409a.413.413,0,0,1-.318.136.354.354,0,0,1-.318-.136L4.318,10.591,4.227,10.5a.439.439,0,0,1,0-.636l.636-.636a.439.439,0,0,1,.636,0l.045.045,2.5,2.682a.22.22,0,0,0,.318,0l6.091-6.318H14.5a.439.439,0,0,1,.636,0l.636.636A.388.388,0,0,1,15.773,6.864Z"></path>
                                                                            </svg>
                                                                            Deliverable to <a href="#">Your Home</a></li>
                                                                        <li>
                                                                            <svg class="Svg__icon" viewBox="0 0 20 20">
                                                                            <path d="M10,0A10,10,0,1,0,20,10,9.971,9.971,0,0,0,10,0Zm5.773,6.864h0L8.5,14.409a.413.413,0,0,1-.318.136.354.354,0,0,1-.318-.136L4.318,10.591,4.227,10.5a.439.439,0,0,1,0-.636l.636-.636a.439.439,0,0,1,.636,0l.045.045,2.5,2.682a.22.22,0,0,0,.318,0l6.091-6.318H14.5a.439.439,0,0,1,.636,0l.636.636A.388.388,0,0,1,15.773,6.864Z"></path>
                                                                            </svg>
                                                                            Deliverable to <a href="#">Your Friend</a></li>
                                                                    </ul>
                                                                </div>-->
                            </div>
                        </div> <!-- det-content -->
                    </div> <!-- content det -->

                    <div class="offers-det has-shadow det-box u-m-t-20">
                        <div class="title">
                            Product Description
                        </div>

                        <div class="box-body">
                            <?php echo htmlspecialchars_decode($result->description, ENT_QUOTES); ?>
                        </div>
                    </div> <!-- offers-det -->
                </form>

                <div class="offers-det has-shadow det-box u-m-t-20">
                    <div class="title">
                        Offers
                    </div>
                    <div class="box-body">
                        <!--<h6>bKash Cashback Offer Conditions:</h6>-->
                        <ul>
                            <li>Bkash Payment করলে ১০%  থেকে ৩০% পর্যন্ত ছাড়।  পেমেন্ট নাম্বার- <b>01872737759</b>.</li>
                            <li>Nagad payment করলে ১০%  থেকে ৪০% পর্যন্ত ছাড়। </li>
                            <li>Rocket Payment- করলে ৫%  থেকে ১৫% পর্যন্ত ছাড়।  পেমেন্ট নাম্বার- <b>01872737757</b>.</li>
                        </ul>

                    </div>
                </div> <!-- offers-det -->

                <div class="offers-det has-shadow det-box u-m-t-20">
                    <div class="title">
                        Share This Website
                    </div>
                    <div class="box-body">
                        <!--<h6>bKash Cashback Offer Conditions:</h6>-->

                       <div class="fb-like" data-href="http://redshop.com.bd/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                    </div>
                </div> <!-- offers-det -->

                <div class="offers-det has-shadow det-box u-m-t-20">
                    <div class="title">
                        Share This Product link
                    </div>
                    <div class="box-body">
                        <!--<h6>bKash Cashback Offer Conditions:</h6>-->
                     <input type="text" value="<?=$product_url?>" id="myInput" style="display:none">
                      <button class="button" onclick="myFunction()"> Share This Product Link</button>
                    </div>
                </div> <!-- offers-det -->

                <div class="offers-det has-shadow det-box u-m-t-20">
                    <div class="title">
                        Rating of This Product
                    </div>
                    <div class="box-body">
                        <div style="padding:10px;margin: 0 auto">
                        <p>প্রোডাক্টটি কতবার sell হয়েছে , তার সাপেক্ষে rating auto তৈরি করা হয়েছে</p>
                        <i class="fa-solid fa-star" id="st1" style="cursor: pointer;font-size:40px"></i>
                        <i class="fa-solid fa-star" id="st2" style="cursor: pointer;font-size:40px"></i>
                        <i class="fa-solid fa-star" id="st3" style="cursor: pointer;font-size:40px"></i>
                        <i class="fa-solid fa-star" id="st4" style="cursor: pointer;font-size:40px"></i>
                        <i class="fa-solid fa-star" id="st5" style="cursor: pointer;font-size:40px"></i>
                        </div>
                    </div>
                </div> <!-- offers-det -->

                <div class="section section--home" style="padding-top:20px ;">
                        <div class="sec-head u-flex u-flex--content-between u-flex--item-center">
                            <h4>Related Products</h4>
                                    <?php $url_categori_product=base_url().'products/categorywise/'.$product_category[0]->category_id; ?>
                            <a class="Btn" href="<?php echo $url_categori_product ?>">More <i
                                class="ti-angle-right"></i></a>
                        </div>
                        <div class="products u-flex u-flex--wrap">
                                <?php
                                    foreach ($related as $prod) {
                                        $prodImgSingle = $this->db->select('*')->where('product_id', $prod->id)->get('product_img')->row();
                                ?>

                                <?php
                                    if($prod->slug !=$result->slug)
                                    {
                                        ?>
                                            <div class="product">
                                            <a class="has-shadow" href="<?php echo base_url(); ?>products/details/<?php echo $prod->slug; ?>">
                                                <figure>
                                                    <img class="lazyload"
                                                        data-src="<?php echo base_url(); ?>resources/product-image/<?php echo $prodImgSingle->img_name; ?>"
                                                        alt="">
                                                </figure>

                                                <!-- product parcentange  -->
                                                <?php 
                                
                                                    if(!empty($prod->discount))
                                                    {
                                                        ?>
                                                            <div class="offer">
                                                                <?php
                                                                    
                                                                    if(!empty($prod->discount))
                                                                    {
                                                                        
                                                                    echo $percentage=($prod->price - $prod->discount)/100 . '%' . '<br>' . 'off';
                                                                    }
                                                                    
                                                                ?>
                                                            </div>
                                                            
                                                        <?php
                                                    }
                                                
                                                ?>
                                                
                                                <?php
                                                
                                                
                                                // if (in_array($prod['id'], $best_product_id)) {
                                                //     echo "okay";
                                                // }else{
                                                //     echo "folse";
                                                // }
                                                
                                                ?>
                                                
                                                <!-- <div class="new_cnt">
                                                    new Launch
                                                </div> -->

                                                <!-- <div class="best_cnt">
                                                    Best Selling
                                                </div> -->
                                                <div class="content">
                                                    <div class="price">
                                                        <div class="top u-flex u-flex--content-center u-flex--item-center">
                                                            <?php if ($prod->discount != '') { ?>
                                                            <div class="old"><?php echo $prod->currency . '' . $prod->price . ' '; ?></div>
                                                            <?php } ?> &nbsp;
                                                            <div class="new">
                                                                <?php if ($prod->discount == '') { ?>
                                                                <?php echo $prod->currency . '' . $prod->price . ' '; ?>
                                                                <?php } else { ?>
                                                                <?php echo $prod->currency . '' . $prod->discount . ' '; ?>
                                                                <?php } ?>
                                                            </div>
                                                            <?php if ($prod->availability_status == 'stock_out') { ?>
                                                            <div class="btn-set" style="margin-left:5px">
                                                                <button class="btn btn-danger"> Stock Out</button>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <h5><?php echo $prod->name; ?></h5>
                                                </div>
                                            </a>
                                        </div><!-- product -->
                                        <?php
                                    }
                                ?>
                                        
                            <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- gellary popup -->
                <div class="popup">
                    <span class="popup__close">&times;</span>
                    <div class="popup__btnset">
                        <button class="prev"><i class="ti-angle-left"></i></button>
                        <button class="next"><i class="ti-angle-right"></i></button>
                    </div>
                    <div class="inner">
                        <div class="figure" id="popup__fig">
                            <?php
                $j = 1;
                if (!empty($prodImg)) {
                    foreach ($prodImg as $rowImg) {
                        ?>
                                    <img src="<?php echo base_url(); ?>resources/product-image/<?php echo $rowImg->img_name; ?>" alt="">
                                    <?php
                $j++;
                    }
                }
                ?>
                        </div>
                    </div>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied the Link: " + copyText.value);
}
      $(document).ready(function() {
            <?php 
            if($product_rating > 0 && $product_rating <= 50)
            {
                ?>$('#st1,#st2').css("color", " #FFCC00");<?php
            }
            elseif($product_rating > 50 && $product_rating <= 100)
            {
                ?>$('#st1,#st2,#st3').css("color", " #FFCC00");<?php
            }
            elseif($product_rating > 100 && $product_rating < 150)
            {
                ?>$('#st1,#st2,#st3,#st4').css("color", " #FFCC00");<?php
            }
            else
            {
                ?>$('#st1,#st2,#st3,#st4,#st5').css("color", " #FFCC00");<?php
            } 
            ?>  
      })

</script>


<?php
if (isset($footer)) {
    echo $footer;
}
?>