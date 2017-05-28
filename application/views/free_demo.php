<?php echo $html_heading;?><?php echo $header;?><?php echo $HomePageSlider;?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.16/themes/hot-sneaks/jquery-ui.css" />
<script type="text/javascript" language="javascript" src="<?php echo $SiteJSURL;?>jquery-ui-timepicker-addon.js"></script>
<style>
    .ui-timepicker-div .ui-widget-header{ margin-bottom: 8px; }
.ui-timepicker-div dl{ text-align: left; }
.ui-timepicker-div dl dt{ height: 25px; }
.ui-timepicker-div dl dd{ margin: -25px 0 10px 65px; }
.ui-timepicker-div td { font-size: 20%; }
#ui-datepicker-div{
    z-index: 100 !important;
}
.ui-datepicker {
    display: none;
    padding: 0.1em 0.1em 0;
    width: 12em !important;
}

.ui-widget {
    font-family: Gill Sans,Arial,sans-serif;
    font-size: 1.1em !important;
}

.ui_tpicker_minute_label{
    text-decoration:none !important;
}
</style>
<?php 
$tempDemoSessionData=$this->session->userdata('TmpDemoDataArr');
if(empty($tempDemoSessionData)){
    $tempDemoSessionData=array(
            'CategoryID'=>0,
            'CourseID'=>0,
            'selectedDateTime'=>'',
            'FirstName'=>'',
            'LastName'=>'',
            'Email'=>'',
            'Phone'=>'',
            'Address'=>'',
            'State'=>'',
            'City'=>'',
            'Zip'=>''
            );
}
?>
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
                <?php //echo '<pre>';print_r($tempDemoSessionData);?>
                <style>
                    table.contactus{margin: 0px;}
                    .error{color: red;}
                </style>
                <?php if($this->session->flashdata('Message')){?>
                <div style="color: #ED2212;float: left; font: normal 12px/17px arial; text-decoration: blink; font-weight: bold; width: 540px;" id="E-LearingSystemMessage"><?php echo $this->session->flashdata('Message');?></div>
                <div class="clear"></div>
                <?php }?>
                <div><h1><?php echo get_cms_title($CMSDataArr,8);?></h1></div>
                <div class="clear"></div>
                <div>Please provide the information for free demo registration.</div>
                <div class="testimonial_right2">
                    <form name="free_demo" id="free_demo" action="<?php echo base_url().'index/free_demo_action'?>" method="post">       
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="contactus" align="left">
            <tr>
                    <td><strong>Select Course Type :</strong><br/>
                        <select name="CategoryID" id="CategoryID" class="required">
                            <option value="">*Select*</option>
                            <?php foreach($AllCategory AS $k){?>
                            <option value="<?php echo $k->CategoryID;?>" <?php if($tempDemoSessionData['CategoryID']==$k->CategoryID){echo 'selected'; }?>><?php echo $k->CategoryName;?></option>
                            <?php }?>
                        </select></td>
                </tr>
            <tr>
                <td><strong>Select Course :</strong><br/>
                    <div id="CourseDiv">
                        <select id="CourseID" name="CourseID" class="required">
                            <option value="">*Select Course*</option>
                            <?php if($TempCourseData!=''){
                                foreach($TempCourseData AS $kk){?>
                            <option value="<?php echo $kk->CourseID?>" <?php if($tempDemoSessionData['CourseID']==$kk->CourseID){ echo 'selected';}?>><?php echo $kk->Title?></option>
                            <?php }
                            }?>
                        </select>
                    </div>
                <input type="hidden" id="CourseData" name="CourseData" value="" /></td>
            </tr>
            <tr>
                <td><strong>Select datetime for demo :</strong><br/><input type="text" name="selectedDateTime" id="selectedDateTime" class="textfield_bg required" value="<?php echo $tempDemoSessionData['selectedDateTime'];?>"/></td>
            </tr>
            
            <tr>
                <td><strong>First Name :</strong><br/><input type="text" name="FirstName" id="FirstName" class="textfield_bg required" value="<?php echo $tempDemoSessionData['FirstName'];?>"/></td>
            </tr>
            <tr>
                <td><strong>Last Name :</strong><br/><input type="text" name="LastName" id="LastName" class="textfield_bg required" value="<?php echo $tempDemoSessionData['LastName'];?>"/></td>
            </tr>
            <tr>
              <td><strong>E-mail :</strong><br/><input type="text" name="Email" id="Email" class="textfield_bg required email" value="<?php echo $tempDemoSessionData['Email'];?>"/></td>
            </tr>
            <tr>
                <td><strong>Address :</strong><br/><input type="text" name="Address" id="Address" class="textfield_bg required" value="<?php echo $tempDemoSessionData['Address'];?>"/></td>
            </tr>
            <tr>
                <td><strong>City :</strong><br/><input type="text" name="City" id="City" class="textfield_bg required" value="<?php echo $tempDemoSessionData['City'];?>"/></td>
            </tr>
            <tr>
                <td><strong>State :</strong><br/><input type="text" name="State" id="State" class="textfield_bg required" value="<?php echo $tempDemoSessionData['State'];?>"/></td>
            </tr>
            </tr>
            <tr>
              <td><strong>Zip: </strong><br/><input type="text" name="Zip" id="Zip" class="textfield_bg required" value="<?php echo $tempDemoSessionData['Zip'];?>"/></td>
            </tr>
            <tr>
              <td><strong>Phone :</strong><br/><input type="text" name="Phone" id="Phone" class="textfield_bg required" value="<?php echo $tempDemoSessionData['Phone'];?>"/></td>
            
            <tr>
              <td><canvas id="secret_img" width="130" height="25" style="border:1px solid #d3d3d3;padding-top: 8px; padding-left: 15px;"> <?php echo 'Browser Not Support HTML5';?>.</canvas><br />Not getting it ?<a href="javascript:void(0);" onclick="GeneratNewImage();">Click here</a>  to get a new.</td>
            </tr>
            <tr>
              <td><strong>Security Code: </strong><br/><input type="text" class="textfield1 required" name="secret" id="secret" style="width:110px;"/></td>
            </tr>
            <tr>
              <td><input type="submit" name="Submit" value="SUBMIT" class="search_btn"/></td>
            </tr>  
          </table>
		  </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php echo $footer;?>
<script>
    function GeneratNewImage(){

		$('#secret_img').html("");

		var c=document.getElementById("secret_img");

		c.width = c.width;

		var ctx=c.getContext("2d");

		var str='';

		ctx.font="20px cursive"; //monotype corsiva  Helvetica  sans-serif

		str=js_dynamic_text(8);

		ctx.fillText(str,5,15);

		var SecretTextSetAjaxURL='<?php echo base_url().'index/reset_secret/'?>';

		var SecretTextSetAjaxData='secret='+str;

		$.ajax({

		   type: "POST",

		   url: SecretTextSetAjaxURL,

		   data: SecretTextSetAjaxData,

		   success: function(msg){ //alert(msg);

		   }

		 });

	}
        
	function dynamic_s_text(){
		str=js_dynamic_text(8);
		ctx.save();

		// Use the identity matrix while clearing the canvas
		ctx.setTransform(1, 0, 0, 1, 0, 0);
		ctx.clearRect(0, 0, c.width, c.height);

		// Restore the transform
		ctx.restore();
		ctx.fillText(str,5,15);
	}

	
	function js_dynamic_text(length){
		var randomStuff =["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9","0","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

		var sl=0;
		var index;
		var char;
		var str='';

		for(sl=0;sl<length;sl++){
			index=Math.floor((Math.random()*61)+1);
			char=randomStuff[index];
			str=str+char;
		}
		document.cookie= '<?php echo $this->config->item('CAPTCHA_COOKIE_NAME');?>='+str;
		return str;
	}
        
    $(document).ready(function(){
        $(function() { $('#selectedDateTime').datetimepicker({ minDate: 1 }); });
        $('#free_demo').validate();
        //$("#register_form").validate();
        
        var str='';
        var c=document.getElementById("secret_img");
        var ctx=c.getContext("2d");
        ctx.font="20px cursive"; //monotype corsiva  Helvetica  sans-serif
        str=js_dynamic_text(8);
        var SecretTextSetAjaxURL='<?php echo base_url().'index/reset_secret/'?>';
        var SecretTextSetAjaxData='secret='+str;
        $.ajax({
            type: "POST",
            url: SecretTextSetAjaxURL,
            data: SecretTextSetAjaxData,
            success: function(msg){ //alert(msg);
            }
        });
        //alert(str);
        ctx.fillText(str,5,15);
        
        
        
        $('#Email').live('blur',function(){
            var ajaxUrl='<?php echo base_url().'index/check_already_demo'?>';
            var ajaxData='{Email:'+$(this).val()+'}';
            $.ajax({
                type:"POST",
                url:ajaxUrl,
                data:ajaxData,
                success:function(msg){
                    if(msg==1){
                        alert('You have already attend an demo,second demo not allowed. \n Please contact us by Contact Us form.');
                        $(this).val('');
                    }
                }
            });
        });
        
        $('#CategoryID').live('change',function(){
            var img='<img src="<?php echo $SiteImagesURL.'ajax_img.gif';?>" alt=""/>';
            $('#CourseDiv').html(img);
            var invalidData="<select id='CourseID' id='CourseID' class='required'><option value=''>*Select Course*</option></select>";
            var ajaxUrl='<?php echo base_url().'index/ajax_course'?>';
            var ajaxData='CategoryID='+$(this).val();
            //alert(ajaxData);
            $.ajax({
                type:"POST",
                url:ajaxUrl,
                data:ajaxData,
                success:function(msg){
                    if(msg=="0"){
                        alert('Please contact us by Contact for the selected Course Type,Thise are not available at online.');
                        $('#CourseDiv').html(invalidData);
                        $('#CourseData').val('');
                        $('#CourseChargesLbl').text('Select Course');
                        $('#CourseCharges').val('');
                    }else{
                        var msgArr=msg.split('~');
                        $('#CourseDiv').html(msgArr[0]);
                        $('#CourseData').val(msgArr[1]);
                    }
                }
            });
        });
    });
    </script>