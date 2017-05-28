<?php echo $html_heading;?><?php echo $header;?><?php echo $HomePageSlider;?>
<div id="maincontainer">
    <div class="testimonial_box">
        <div class="testimonial">
            <div class="testimonial_left">
                <div><h1><?php echo get_cms_title($CMSDataArr,9);?></h1></div>
                <?php 
                if(count($LeftDataArr)>0){
                    foreach ($LeftDataArr as $k =>$v) {
                    if(count($v["CourseData"])>0){ ?>
                        <div><h2><?php echo $v["Name"];?></h2></div>
                        <div class="clear"></div>
                        <ul style="border: 1px solid #CCCCCC; overflow: hidden; ">
                            <?php foreach ($v["CourseData"] as $key) { //print_r($key);die;?>
                            <li><a href="<?php echo base_url().'course/detailsof/'.$key->CourseID;?>"><?php echo $key->Title?></a></li>
                            <?php }?>
                        </ul>
                        <div class="clear"></div>
            <?php    }
                    }
                }
                ?>
                
            </div>
            <div class="testimonial_right"> 
                <style>
                    table.contactus{margin: 0px;}
                    .error{color: red;}
                </style>
                <div><h1><?php echo $Title;?></h1></div>
                <div class="clear"></div>
                
                <div class="testimonial_right2">
                    <?php echo $Body;?>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php echo $footer;?>