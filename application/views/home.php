<?php  echo $html_heading; ?><?php echo $header; ?><?php echo $HomePageSlider; ?>
<link href="<?php echo $SiteCSSURL?>jquery.simpleTicker.css" rel="stylesheet" />
<?php $rsNew=$this->db->from('news')->where(array('Status'=>'1'))->get()->result();
if(!empty($rsNew)):?>
<section class="callaction">
    <div class="container">
        <div class="row">
            <div id="ticker-slide" class="ticker" style="height: 45px !important;">
                <ul>
                    <?php foreach ($rsNew AS $k):?>
                    <li><?php echo $k->News;?></li>
                    <?php endforeach;?>
                </ul>
            </div>	
        </div>
    </div>
</section>
<?php endif; ?>
<section id="content">
    <!-- divider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="solidline">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end divider -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <h4>About ATAD</h4>
                        <p>
                            <?php $rsAboutUS=$this->db->from('cms')->where(array('CMSID'=>1))->get()->result();
                            echo $rsAboutUS[0]->ShortBody;?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- divider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blankline">
                </div>
            </div>
        </div>
    </div>
    <!-- end divider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h4>Testimonials</h4>
                        <div class="testimonialslide clearfix flexslider">
                            <ul class="slides">
                                <?php $rsTestimonial=$this->db->from('testimonial')->where('Status','1')->get()->result();
                                foreach($rsTestimonial AS $k):?>
                                <li>
                                    <blockquote>
                                        <?php echo $k->Testimonial;?>
                                    </blockquote>
                                    <h4><?php echo $k->FirstName.' '.$k->LastName;?> <span>&#8213; <?php echo $k->Email;?></span></h4> 
                                </li>	
                                <?php endforeach;?>
                            </ul>
                        </div>					
                    </div>	
                </div>
            </div>
        </div>
    </div>	

    <!-- divider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="solidline">
                </div>
            </div>
        </div>
    </div>
    <!-- end divider -->
    <!-- Portfolio Projects -->
    <div class="container marginbot50">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">Our Activity in Visual</h4>
                <div id="filters-container" class="cbp-l-filters-button">
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All<div class="cbp-filter-counter"></div></div>
                    <div data-filter=".identity" class="cbp-filter-item" data-type="photo">Photo<div class="cbp-filter-counter"></div></div>
                    <div data-filter=".web-design" class="cbp-filter-item" data-type="video">Video<div class="cbp-filter-counter"></div></div>
                </div>
                <!-- // all web design are videos and all identity are photos-->
                <div id="grid-container" class="cbp-l-grid-projects">
                    <ul>
                        <?php $sql="SELECT v.*,c.CategoryName FROM `video_gallery` AS v JOIN category AS c ON(v.CategoryID=c.CategoryID) WHERE v.Status=1 LIMIT 0,8";
                        //echo $sql;
                        $rsAllVideos=$this->db->query($sql)->result();
                        //pre($rsAllVideos);die;
                        foreach($rsAllVideos AS $k)://pre($k);?>
                        <li class="cbp-item web-design">
                            <div class="cbp-caption">
                                <div class="cbp-caption-defaultWrap">
                                    <?php $urlArr=  explode('watch?v=', $k->Url);?>
                                    <iframe width="270" height=225" src="https://www.youtube.com/embed/<?php echo $urlArr[1];?>" frameborder="0" allowfullscreen data-title="<?php $k->CategoryName;?>"></iframe>
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <iframe src="https://www.youtube.com/embed/<?php echo $urlArr[1];?>" frameborder="0" allowfullscreen data-title="<?php $k->CategoryName;?>"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cbp-l-grid-projects-title"><?php echo $k->CategoryName;?></div>
                            <!--<div class="cbp-l-grid-projects-desc">Web Design / Graphic11</div>-->
                        </li>
                        <?php endforeach;?>
                        <?php $sql="SELECT v.*,c.CategoryName FROM `photo_gallery` AS v JOIN category AS c ON(v.CategoryID=c.CategoryID) WHERE v.Status=1 LIMIT 0,8";
                        $rsAllVideos=$this->db->query($sql)->result();
                        //pre($rsAllVideos);die;
                        foreach($rsAllVideos AS $k):?>
                        <li class="cbp-item identity">
                            <div class="cbp-caption">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="<?php echo SiteResourcesURL;?>photo_gallery/250X350/<?php echo $k->Image;?>" alt="" class="img-responsive" />
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <a href="<?php echo SiteResourcesURL;?>photo_gallery/<?php echo $k->Image;?>" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="<?php echo $k->CategoryName;?>">view larger</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cbp-l-grid-projects-title"><?php echo $k->CategoryName;?></div>
                            <!--<div class="cbp-l-grid-projects-desc">Web Design / Identity</div>-->
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="cbp-l-loadMore-button">
                    <a href="<?php echo BASE_URL;?>video" class="cbp-l-loadMore-button-link">LOAD MORE VIDEOS</a>
                </div>
            </div>
        </div>
    </div>
    <!-- divider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="solidline">
                </div>
            </div>
        </div>
    </div>
    <!-- end divider -->

    <!-- clients -->
    <!--<div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-2 aligncenter client">
                <img alt="logo" src="img/clients/logo1.png" class="img-responsive" />
            </div>											

            <div class="col-xs-6 col-md-2 aligncenter client">
                <img alt="logo" src="img/clients/logo2.png" class="img-responsive" />
            </div>											

            <div class="col-xs-6 col-md-2 aligncenter client">
                <img alt="logo" src="img/clients/logo3.png" class="img-responsive" />
            </div>											

            <div class="col-xs-6 col-md-2 aligncenter client">
                <img alt="logo" src="img/clients/logo4.png" class="img-responsive" />
            </div>									

            <div class="col-xs-6 col-md-2 aligncenter client">
                <img alt="logo" src="img/clients/logo5.png" class="img-responsive" />
            </div>									
            <div class="col-xs-6 col-md-2 aligncenter client">
                <img alt="logo" src="img/clients/logo6.png" class="img-responsive" />
            </div>	

        </div>
    </div> --->
    
    <!-- parallax  -->
    <div id="parallax1" class="parallax text-light text-center marginbot50" data-stellar-background-ratio="0.5">	
        <div class="container">
            <div class="row appear stats">
                <div class="col-xs-6 col-sm-3 col-md-3">&nbsp;</div>
                <div class="col-xs-6 col-sm-3 col-md-3">&nbsp;</div>
                <div class="col-xs-6 col-sm-3 col-md-3">&nbsp;</div>
                <div class="col-xs-6 col-sm-3 col-md-3">
                    <div class="align-center color-white txt-shadow">
                        <div class="icon">
                            <i class="fa fa-clock-o fa-5x"></i>
                        </div>
                        <strong id="counter-coffee" class="number"><?php echo $LastViewNo;?></strong><br />
                        <span class="text">Total Views</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $footer; ?>
<script src="<?php echo $SiteJSURL;?>jquery.simpleTicker.js"></script>
<script>
$(function(){
  $.simpleTicker($("#ticker-slide"),{'effectType':'slide'});
  //$.simpleTicker($("#ticker-one-item"),{'effectType':'fade'});
    $("#ticker-slide").css("height","45px");
    $("#ticker-slide").css("border-radius","45px");
    $('.cbp-filter-item').click(function(){
        if($(this).data("type")=="photo"){
            $('.cbp-l-loadMore-button').html('<a href="<?php echo BASE_URL;?>photo" class="cbp-l-loadMore-button-link">LOAD MORE PHOTO</a>');
        }else{
            $('.cbp-l-loadMore-button').html('<a href="<?php echo BASE_URL;?>video" class="cbp-l-loadMore-button-link">LOAD MORE Video</a>');
        }
    });
});
</script>