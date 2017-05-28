<?php echo $html_heading;?><?php echo $header;?><?php echo $HomePageSlider;?>
<div class="clear"></div>
    <div id="maincontainer">
      <div class="testimonial_box">
        <div class="testimonial">
        <!--=============================Take from here for courses page ============================-->
        		<div class="testimonial_full">
                  <div class="innercommon">
              <h1><?php echo get_cms_title($CMSDataArr,9);?></h1>
              <span><?php echo $CourseContent;?></span> 
              </div>
              <?php 
              //echo '<pre>';print_r($DataArr);die;
              foreach($DataArr AS $k => $v){ //print_r($v);die;?>
              <div class="CourseMain">
                <p><?php echo $v['Name'];?></p>
                <?php foreach($v['CourseData'] AS $k){?>
                <ul>
                  <li><a href="<?php echo base_url().'course/detailsof/'.$k->CourseID.'-'.$k->Title;?>"><?php echo $k->Title?></a></li>
                  
                </ul>
                <?php }?>
              </div>
              <?php }?>              
              
            </div>
         <!--=============================Take up to here for courses page ============================-->   
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <?php echo $footer;?>