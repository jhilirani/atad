<body><?php //pre($CMSDataArr);die; ?>

    <div id="wrapper">
        <!-- start header -->
        <header>
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="topleft-info">
                                <li><i class="fa fa-phone"></i>
                                    <?php $rsHeaderPhone=$this->db->get_where('system_constants',array('ConstantName'=>'ContactNo'))->result();
                                    echo $rsHeaderPhone[0]->ConstantValue;?>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-4"><img src="<?php echo SiteResourcesURL?>img/avatar.png" alt="" width="70" height="70"></div>
                            <div class="col-md-4"><img src="<?php echo SiteResourcesURL?>img/avatar.png" alt="" width="70" height="70"></div>
                            <div class="col-md-4"><img src="<?php echo SiteResourcesURL?>img/avatar.png" alt="" width="70" height="70"></div>
                        </div>
                        <div class="col-md-5">
                            <div id="sb-search" class="sb-search">
                                <form>
                                    <input class="sb-search-input" placeholder="Enter your i-card number" type="text" value="" name="search" id="search">
                                    <input class="sb-search-submit" type="submit" value="">
                                    <span class="sb-icon-search" title="Click to start searching"></span>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>	

            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html"><img src="<?php echo SiteResourcesURL;?>img/logo.png" alt="" width="90" height="90" /></a>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo BASE_URL;?>">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">About ATAD<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog-rightsidebar.html">Our Vision</a></li>
                                    <li><a href="blog-leftsidebar.html">Our Team</a></li>
                                    <li><a href="blog-leftsidebar.html">Our Activity</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Media<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">Photo Gallery</a></li>
                                    <li><a href="index2.html">Video Gallery</a></li>
                                </ul>				

                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Information<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="post-rightsidebar.html">Privacy Policy</a></li>
                                    <li><a href="post-leftsidebar.html">Terms & Condition</a></li>
                                    <li><a href="post-leftsidebar.html">Press release</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->