
<!DOCTYPE html>
<html>

    <head>
        <title>Sign In</title>
        <!-- meta data -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Sign In">
        <meta itemprop="description" content="">

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width">
        <meta name="keywords" content="" />
        <meta name="author" content="" />

        <!-- Load stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/magic-check.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/icofont.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/owl.carousel.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/slidr.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/main.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/presets/preset1.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/responsive.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/homepage.css" />
        <!--<link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/font-awesome-animation.min.css" />-->
        <!--<link rel="stylesheet" href="<?php echo base_url() ?>resources/admin/login/css/registration-login.css" />-->

        <!-- Favicon Icon -->
        <!--<link rel="shortcut icon" href="<?php echo base_url() ?>resources/admin/login/images/favicon.ico" type="image/x-icon">-->
        <!--<link rel="icon" href="<?php // echo base_url() ?>resources/admin/login/images/favicon3.ico" type="image/x-icon">-->

        <!-- Load font -->
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

        <!-- icons -->
        <!--<link rel="icon" href="images/ico/favicon.ico">-->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>resources/admin/login/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>resources/admin/login/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>resources/admin/login/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo base_url() ?>resources/admin/login/images/ico/apple-touch-icon-57-precomposed.png">
        <!-- icons -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Template Developed By Shyam Sedai -->

        <script>
            var baseUrl = "<?php echo base_url() ?>";
        </script>

    </head>


            <!-- signin-page -->
            <section id="" class="clearfix user-page">
                <div class="container">
                    <div class="row text-center">
                        <!-- user-login -->
                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                            <div class="user-account">
                                <h2>Admin Login</h2>
                                <!-- form -->
                                <form id="login-form22" action="<?php echo base_url() ?>admin/admin_login/signin_ajax" method="post">
                                    <div style="color:red; padding: 5px;">
                                        <?php
                                        if ($this->session->userdata('notification_message')) {
                                            echo $this->session->userdata('notification_message');
                                            $this->session->unset_userdata('notification_message');
                                        }
                                        if ($this->session->userdata('exception')) {
                                            echo $this->session->userdata('exception');
                                            $this->session->unset_userdata('exception');
                                        }
                                        ?>

                                        <?php //echo $_COOKIE['username'];?>

                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Email or Username or Mobile" required>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        <span class="help-block"></span>
                                    </div>
                                    <button type="submit" class="btn login-btn">Admin Login</button>

                                    <!-- forgot-password -->
                                    <div class="user-option">
                                        <!--                            <div class="checkbox pull-left">
                                                                        <label for="logged"><input type="checkbox" name="logged" value="keep_login" id="logged"> Keep me logged in </label>
                                                                    </div>-->

                                        <div class="pull-right forgot-password">
                                            <!--<a href="<?php // echo base_url()  ?>forgot_password">Forgot password</a>-->
                                        </div>
                                    </div><!-- forgot-password -->

                                </form><!-- form -->
                            </div>
                            <!--<a href="<?php // echo base_url()  ?>signup" class="btn-primary">Create a New Account</a>-->
                        </div><!-- user-login -->
                    </div><!-- row -->
                </div><!-- container -->
            </section><!-- signin-page -->


        </body>
    </html>   