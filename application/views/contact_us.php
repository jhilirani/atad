<?php echo $html_heading;?><?php echo $header;?><?php //echo $HomePageSlider;?>
<?php echo $bread_crumb;?>      
<section id="content">
  <div class="map">
    <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <h2>Contact us <small>get in touch with us by filling form below</small></h2>
          <hr class="colorgraph">
          <div id="sendmessage"><i class="fa fa-check-square-o fa-2x"></i>Your message has been sent. Thank you!</div>
                <div id="errormessage"><i class="fa fa-exclamation-triangle fa-2x"></i></div>
                <form action="" method="post" role="form" class="contactForm">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="tel" class="form-control" name="Phone" id="Phone" placeholder="Your phone number" data-rule="minlen:10" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <canvas id="secret_img" width="130" height="25" style="border:1px solid #d3d3d3;padding-top: 8px; padding-left: 15px;"> <?php echo 'Browser Not Support HTML5';?>.</canvas><br />Not getting it ?<a href="javascript:void(0);" onclick="GeneratNewImage();">Click here</a>  to get a new.
                            <input type="text" class="form-control" name="secret" id="secret" data-rule="required" data-msg="Please enter the code"/>
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-5">&nbsp;</div>
                    <div class="col-md-4">&nbsp;</div>
                    <div class="col-md-3"><div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md">Send Message</button></div></div>
                </form>
                <hr class="colorgraph">

      </div>
    </div>
  </div>
  </section>
<?php echo $footer;?>
<script src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyCLnr7TcsTEGSwSGvsblqWc1XDdSkIC9lg"></script>
<script>
jQuery(document).ready(function( $ ) {
    
    //Google Map
    var get_latitude = $('#google-map').data('latitude');
    var get_longitude = $('#google-map').data('longitude');

    function initialize_google_map() {
        var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
        var mapOptions = {
            zoom: 14,
            scrollwheel: false,
            center: myLatlng
        };
        var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize_google_map);
    
});
</script>

<script src="<?php echo $SiteJSURL;?>contactform.js"></script>
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