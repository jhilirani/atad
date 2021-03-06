<?php echo $html_heading;?><?php echo $header;?><?php //echo $HomePageSlider;?>
<?php echo $bread_crumb;?>      
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">Recent Works</h4>
                <div id="grid-container" class="cbp-l-grid-projects">
                    <ul>
                        <?php $sql="SELECT v.*,c.CategoryName FROM `photo_gallery` AS v JOIN category AS c ON(v.CategoryID=c.CategoryID) WHERE v.Status=1";
                        $rsAllVideos=$this->db->query($sql)->result();
                        //pre($rsAllVideos);die;
                        foreach($rsAllVideos AS $k):?>
                        <li class="cbp-item graphic">
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
                            <!--<div class="cbp-l-grid-projects-desc">Web Design / Graphic</div>-->
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
 </section>
<?php echo $footer;?>