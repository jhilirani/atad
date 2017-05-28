<?php echo $html_heading;?><?php echo $header;?><?php echo $HomePageSlider;?>
<div id="maincontainer">
    <div class="testimonial_box">
        <div class="testimonial">
            <div class="testimonial_left">
                <div><h1>Courses</h1></div>
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
                <?php //echo '<pre>';print_r($tempDemoSessionData);?>
                <style>
                    table.contactus{margin: 0px;}
                    .error{color: red;}
                </style>
                <?php if($this->session->flashdata('Message')){?>
                <div style="color: #ED2212;float: left; font: normal 12px/17px arial; text-decoration: blink; font-weight: bold; width: 540px;" id="E-LearingSystemMessage"><?php echo $this->session->flashdata('Message');?></div>
                <div class="clear"></div>
                <?php }?>
                <div><h1>Testimonial</h1></div>
                <div class="clear"></div>
                <?php if(count($dataArr)>0){
                    foreach($dataArr AS $k){?>
                <div class="testimonial_right2"> 
<p><?php echo $k->Testimonial;?></p>
<p><strong>- <?php echo $k->FirstName.' '.$k->LastName;?></strong></p>
</div>
                <?php       }
                }?>
                
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php echo $footer;?>