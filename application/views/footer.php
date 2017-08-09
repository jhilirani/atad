<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Get in touch with us</h4>
					<address>
					<strong>ATAD</strong><br>
					 Sailor suite room V124, DB 91<br>
					 Someplace 71745 Earth </address>
					<p>
						<i class="icon-phone"></i><?php $rsHeaderPhone=$this->db->get_where('system_constants',array('ConstantName'=>'ContactNo'))->result();
                                    echo $rsHeaderPhone[0]->ConstantValue;?><br>
						<i class="icon-envelope-alt"></i> <?php $rsHeaderEmail=$this->db->get_where('system_constants',array('ConstantName'=>'SiteMail'))->result();
                                    echo $rsHeaderEmail[0]->ConstantValue;?>
					</p>
				</div>
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Pages</h4>
					<ul class="link-list">
						<li><a href="press-release">Press release</a></li>
						<li><a href="terms-condition">Terms and conditions</a></li>
						<li><a href="privacy-policy">Privacy policy</a></li>
						<li><a href="career-center">Career center</a></li>
						<li><a href="contact-us">Contact us</a></li>
					</ul>
				</div>
				
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Information</h4>
					<ul class="link-list">
						<li><a href="about-us">About ATAD</a></li>
						<li><a href="team">Our Team</a></li>
						<li><a href="our-vision">Our Our Vision</a></li>
						<li><a href="demo-schedules">Our Demo Schedules</a></li>
						<li><a href="our-activity">Our Activity</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Newsletter</h4>
					<p>Fill your email and sign up for monthly newsletter to keep updated</p>
                    <div class="form-group multiple-form-group input-group">
                        <input type="email" name="email" class="form-control">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-theme btn-add">Subscribe</button>
                        </span>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>&copy; ATAD - All Right Reserved</p>
                        
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $SiteJSURL;?>jquery.min.js"></script>
<script src="<?php echo $SiteJSURL;?>modernizr.custom.js"></script>
<script src="<?php echo $SiteJSURL;?>jquery.easing.1.3.js"></script>
<script src="<?php echo $SiteJSURL;?>bootstrap.min.js"></script>
<script src="<?php echo SiteResourcesURL;?>plugins/flexslider/jquery.flexslider-min.js"></script> 
<script src="<?php echo SiteResourcesURL;?>plugins/flexslider/flexslider.config.js"></script>
<script src="<?php echo $SiteJSURL;?>jquery.appear.js"></script>
<script src="<?php echo $SiteJSURL;?>stellar.js"></script>
<script src="<?php echo $SiteJSURL;?>classie.js"></script>
<script src="<?php echo $SiteJSURL;?>uisearch.js"></script>
<script src="<?php echo $SiteJSURL;?>jquery.cubeportfolio.min.js"></script>
<script src="<?php echo $SiteJSURL;?>google-code-prettify/prettify.js"></script>
<script src="<?php echo $SiteJSURL;?>animate.js"></script>
<script src="<?php echo $SiteJSURL;?>custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo $SiteJSURL;?>jzaefferer-jquery-form-validatation.js"></script>
</body>
</html>
<script type="text/javascript">
            $(document).ready(function(){ 
                $('.sb-search-submit').on('click',function(){ //alert('bb');
                    var data=$('#search').val();
                    //alert("=="+$.trim(data)+'==');
                    if($.trim(data)==""){
                        bootbox.alert("Please enter 'Student Name' or 'Student Id card No' or 'Belt Type'");
                        return false;
                    }
                    
                    var dialog = bootbox.dialog({
                        size: 'large',
                        message: '<p class="text-center">Please wait while , i am collecting student data</p><br /><br /><img src="<?php echo SiteImagesURL;?>3.gif" alt="loading">',
                        closeButton: false
                    });
                    setTimeout(function(){
                        var ajaxSearchURL='<?php echo BASE_URL.'user/search_student/';?>';
                        $.ajax({
                            url:ajaxSearchURL,
                            type:'POST',
                            data:'search='+$.trim(data),
                            success:function(msg){
                                dialog.modal("hide");
                                if(msg==""){
                                    bootbox.alert("There is not record with us as per your search criteria,Plz chck once again the criteria");
                                    return false;
                                }else{
                                    var successDialog = bootbox.dialog({
                                        size: 'large',
                                        message: msg,
                                        closeButton:true
                                    });
                                }

                            }
                        });
                    },3000);
                    
                });
            });
        </script>