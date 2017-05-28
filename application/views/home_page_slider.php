<?php //pre($BannerImageData);?>
<section id="featured" class="bg">
    <!-- start slider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Slider -->
                <div id="main-slider" class="main-slider flexslider">
                    <ul class="slides">
                        <?php foreach ($BannerImageData AS $k):?>
                        <li>
                            <img src="<?php echo SiteResourcesURL;?>banner/<?php echo $k->Image;?>" alt="" />
                            <?php if($k->Caption!=""):?>
                            <div class="flex-caption">
                                <!--<h3>Modern Design</h3> -->
                                <p><?php echo $k->Caption;?></p> 
                                <!--<a href="#" class="btn btn-theme">Learn More</a>-->
                            </div>
                            <?php endif;?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <!-- end slider -->
            </div>
        </div>
    </div>	
</section>