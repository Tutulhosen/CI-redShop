<div class="char_box">
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
           <a href="javascript:void(0)">
           <div style="height:50px; width:150px; background-color:red; border-radius:%" class="chat">
                <p style="color:white; text-align:center; padding-top:12px">Live Chat</p>
           </div>
           </a>
        </div>
    </div>
</div>
<footer class="footer">

    <div class="footer-blocks">
        <div class="container">
            <div class="row">
  
                <div class="col-lg-5">
                    <div class="footer-block">
                        <div class="about-block">
                            <div class="footer-logo">
                                <a href="<?php echo base_url(); ?>">
                                    <img src="<?php echo base_url(); ?>resources/main/img/logo-red.png" alt="">
                                </a>
                            </div>
                            <p class="text-justify">
                                <b>Red Shop</b> is established in 1st March 2015 to provide the eCommerce product to all our valuable customers, office equipment and also industrial Market. Since then we are (Fashion, Electronics, Gadget Item, Mobile Phone & Accessories, Home & Kitchen Appliance, Health & Beauty, Security Device (IP Camera, CC Camera Access Control) we represent the most renowned manufacturers in the world and we ensure our quality
                            </p>
                            <p>Hotline-01872737757,<br>Optional- 01872737759,  01872737752,<br>(01872737751 delivery team )</p>
                            <div class="social">
                                <ul class="u-flex u-flex--item-center">
                                    <li><a href="https://www.facebook.com/bdredshop" target="_blank"><i class="ti-facebook"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UCXVh85e0HmzUaO9FthCHgyQ"  target="_blank"><i class="ti-youtube"></i></a></li>
                                    <li><a href="#"  target="_blank"><i class="ti-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="footer-block">
                                <div class="block-title">
                                    <h6>Red Shop</h6>
                                </div>
                                <div class="block-link">
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>about">About</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="footer-block">
                                <div class="block-title">
                                    <h6>Help</h6>
                                </div>
                                <div class="block-link">
                                    <ul>
                                        <li><a href="#">How To Buy</a></li>
                                        <li><a href="#">Cancellation & Returns</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="footer-block">
                                <div class="block-title">
                                    <h6>Payment</h6>
                                </div>
                                <div class="block-pament">
                                    <img src="<?php echo base_url(); ?>resources/main/img/payment.png" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer__end">
            <p class="address">RED SHOP, 3rd Floor, Nahar Plaza, Songaon CR Dutta Road, Dhaka 1205.</p>
            <div class="copyright u-flex u-flex--content-center">
                <ul class="u-flex">
                    <li><a href="#">Return Policy</a></li>
                    <li><a href="#">Term of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
                <span>© 2022 Red Shop</span>
            </div>
        </div>
    </div>
</footer>



<div class="login__modal">
    <div class="inner">
        <div class="modal__hero">
            
            <img src="<?php echo base_url(); ?>resources/main/img/logo-red.png" alt="">
            <!--<img src="<?php echo base_url(); ?>resources/main/img/modal-hero-login.svg" alt="">-->
            <span class="login__close" style="color:black">&times;</span>
        </div>
        <div class="modal__content">
            <div class="login__fb">
<!--            <p>One-click sign in or sign up to Deligram if your account is connected to Facebook.</p>
                <button class="btn-fb">
                    <i class="ti-facebook"></i>
                    Continue with facebook
                </button>-->
                <a id="openFb" href="#">Sign in or sign up with phone number</a>
            </div>
            <form id="login__phone" class="login__phone d_none">
                <div class="login__box">
                    <label for="PhoneNumber">Mobile Number</label>
                    <input id="PhoneNumber" type="text" name="mobile" placeholder="Ex: 01xxxxxxxxx" required="" minlength="11" maxlength="14">
                </div>
                
                <div class="nameInputBox"></div>
                <div class="ajax_loader"></div>
                <button class="btn-number">
                    Sign In / Sign Up
                </button>
                <!--<a href="#">Sign in or sign up with Facebook</a>-->
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+8801741315099", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

<!-- Main JS -->    
<script src="<?php echo base_url(); ?>resources/main/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>resources/main/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>resources/main/js/index.js"></script>

<script src="<?php echo base_url(); ?>resources/custom-script.js"></script>
<script>
    var ajax_loader = '<img src="<?php echo base_url(); ?>resources/img/ajax-loader.gif">';
    var base_url = '<?php echo base_url(); ?>';
</script>

</body>

</html>