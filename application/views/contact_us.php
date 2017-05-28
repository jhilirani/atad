<?php echo $html_heading;?><?php echo $header;?><?php echo $HomePageSlider;?>
<style>
                    table.contactus{margin: 0px;}
                    .error{color: red;}
                </style>
      
<div id="maincontainer">
    <div class="aboutus_box">
    <div class="about_us">
        <?php if($this->session->flashdata('Message')){?>
                <div style="color: #ED2212;float: left; font: normal 12px/17px arial; text-decoration: blink; font-weight: bold; width: 540px;" id="E-LearingSystemMessage"><?php echo $this->session->flashdata('Message');?></div>
                <div class="clear"></div>
                <?php }?>
      <h1>Contacts Info<span style="margin-left: 319px;">Contact form</span></h1>
      <div class="clear"></div>
       <div class="about_left">
           <?php echo $Body;?>
        </div> 
                
          <div class="about_right">
              <form name="free_demo" id="free_demo" action="<?php echo base_url().'user/contact_us_action'?>" method="post">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="contactus">
          <tr>
           <td><strong>Name :</strong><br/><input type="text" name="Name" id="Name" class="textfield_bg required"/></td>
            </tr>
            <tr>
              <td><strong>E-mail :</strong><br/><input type="text" name="Email" id="Email" class="textfield_bg required"/></td>
            </tr>
            <tr>
              <td><strong>Phone :</strong><br/><input type="text" name="Phone" id="Phone" class="textfield_bg required "/></td>
            </tr>
            <tr>
              <td><strong>Message</strong><br/><textarea name="Message" id="Message" class="textareabg required"></textarea></td>
            </tr>
            <tr>
              <td><canvas id="secret_img" width="130" height="25" style="border:1px solid #d3d3d3;padding-top: 8px; padding-left: 15px;"> <?php echo 'Browser Not Support HTML5';?>.</canvas><br />Not getting it ?<a href="javascript:void(0);" onclick="GeneratNewImage();">Click here</a>  to get a new.</td>
            </tr>
            <tr>
              <td><strong>Security Code: </strong><br/><input type="text" class="textfield1 required" name="secret" id="secret" style="width:110px;"/></td>
            </tr>
            
            <tr>
              <td><input type="submit" name="Submit" value="SEND" class="search_btn"/> &nbsp; <input type="submit" name="Submit" value="CLEAR" class="search_btn"/></td>
            </tr>           
          </table>
                  </form>
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
        
    });
</script>