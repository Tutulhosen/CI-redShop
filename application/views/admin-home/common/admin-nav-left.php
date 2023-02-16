        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color:#ac1f24;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color: white" href="<?php echo base_url(); ?>admin/admin_home">Redshop - Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
<!--                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                     /.dropdown-messages 
                </li>-->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url()?>admin/change_password"><i class="fa fa-gear fa-fw"></i> Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url()?>admin/admin_logout/user_logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">

                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/admin_home"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                        </li>
                        <li class="<?php if($menu=='slider'){echo 'active'; }?>">
                            <a href="<?php echo base_url(); ?>admin/slider"><i class="fa fa-files-o fa-fw"></i> Slider<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php if($menu=='slider'){echo 'collapse in'; }else{ echo 'collapse'; }?> ">
                                <li>                              
                                    <a href="<?php echo base_url(); ?>admin/slider">Home Slider</a>
                                </li>
                            </ul>
                        </li>
    
                        <li class="<?php if($menu=='user'){echo 'active'; }?>">
                            <a href="<?php echo base_url(); ?>admin/user/user"><i class="fa fa-files-o fa-fw"></i> All User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php if($menu=='user'){echo 'collapse in'; }else{ echo 'collapse'; }?> ">
                                <li>                              
                                    <a href="<?php echo base_url(); ?>admin/user/create">Create User</a>
                                    <a href="<?php echo base_url(); ?>admin/user">All Active User</a>
                                    <a href="<?php echo base_url(); ?>admin/user/de_active">All De-Active User</a>                                                            
                                    <a href="<?php echo base_url(); ?>admin/user/all_customer">All Customer</a>                     
                                </li>
                            </ul>
                        </li>
                        
                        <li class="<?php if($menu=='category_banner'){echo 'active'; }?>">
                            <a href="<?php echo base_url(); ?>admin/category/banner_all"><i class="fa fa-files-o fa-fw"></i> Category Banner<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php if($menu=='category_banner'){echo 'collapse in'; }else{ echo 'collapse'; }?> ">
                                <li>                              
                                    <a href="<?php echo base_url(); ?>admin/category/banner_all">Category Banner</a>                                                            
                                                                     
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if($menu=='category'){echo 'active'; }?>">
                            <a href="<?php echo base_url(); ?>admin/category"><i class="fa fa-files-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php if($menu=='category'){echo 'collapse in'; }else{ echo 'collapse'; }?> ">
                                <li>                              
                                    <a href="<?php echo base_url(); ?>admin/category">Category</a>                                                            
                                                                     
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if($menu=='sub_category'){echo 'active'; }?>">
                            <a href="<?php echo base_url(); ?>admin/subcategory"><i class="fa fa-files-o fa-fw"></i> Sub Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php if($menu=='sub_category'){echo 'collapse in'; }else{ echo 'collapse'; }?> ">
                                <li>                                                           
                                    <a href="<?php echo base_url(); ?>admin/sub_category">Sub Category</a>                               
                                                                     
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if($menu=='Products'){echo 'active'; }?>">
                            <a href="<?php echo base_url(); ?>admin/products"><i class="fa fa-files-o fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php if($menu=='Products'){echo 'collapse in'; }else{ echo 'collapse'; }?> ">
                                <li>                                                           
                                    <a href="<?php echo base_url(); ?>admin/products">Products</a>                                                  
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if($menu=='Invoice'){echo 'active'; }?>">
                            <a href="<?php echo base_url(); ?>admin/invoice"><i class="fa fa-files-o fa-fw"></i> Order/Invoice<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php if($menu=='Invoice'){echo 'collapse in'; }else{ echo 'collapse'; }?> ">
                                <li>                                                           
                                    <a href="<?php echo base_url(); ?>admin/invoice">Order/Invoice</a>                                                  
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if($menu=='Options'){echo 'active'; }?>">
                            <a href="<?php echo base_url(); ?>admin/options"><i class="fa fa-files-o fa-fw"></i> Options<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php if($menu=='Options'){echo 'collapse in'; }else{ echo 'collapse'; }?> ">
                                <li>                                                           
                                    <a href="<?php echo base_url(); ?>admin/options">Options</a>                               
                                                                     
                                </li>
                            </ul>
                        </li>               
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>