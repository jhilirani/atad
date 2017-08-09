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
                        <div class="col-md-5">
                            <div class="col-md-4 text-center">
                                <img src="<?php echo SiteResourcesURL?>images/soumya.jpg" alt="" width="60" height="70">
                                <div style="font-size: 11px;color:#000;font-weight: bold;">Secretary ATAD</div>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="<?php echo SiteResourcesURL?>images/judhisthira.png" alt="" width="65" height="70">
                                <div style="font-size: 11px;color:#000;font-weight: bold;">CTO & Advisory ATAD</div>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="<?php echo SiteResourcesURL?>images/atad_precident_img.jpg" alt="" width="70" height="70">
                                <div style="font-size: 11px;color:#000;font-weight: bold;">President ATAD</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="sb-search" class="sb-search">
                                <form name="header_search" id="header_search" action="javascript:void(0);">
                                    <input class="sb-search-input" placeholder="Enter your i-card number" type="text" value="" name="search" id="search">
                                    <input class="sb-search-submit" type="button" value="" />
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
                        <a class="navbar-brand" href="<?php echo BASE_URL;?>"><img src="<?php echo SiteResourcesURL;?>img/logo.png" alt="" width="90" height="90" /></a>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo BASE_URL;?>">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">About ATAD &nbsp; <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="our-vision">Our Vision</a></li>
                                    <li><a href="about-us">About ATAD</a></li>
                                    <li><a href="team">Our Team</a></li>
                                    <li><a href="our-activity">Our Activity</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Media &nbsp; <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="photo">Photo Gallery</a></li>
                                    <li><a href="video">Video Gallery</a></li>
                                </ul>				

                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Information &nbsp; <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="privacy-policy">Privacy Policy</a></li>
                                    <li><a href="terms-condition">Terms & Condition</a></li>
                                    <li><a href="press-release">Press release</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
        