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
						<li><a href="#">Press release</a></li>
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Privacy policy</a></li>
						<li><a href="#">Career center</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
				
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Information</h4>
					<ul class="link-list">
						<li><a href="#">About ATAD</a></li>
						<li><a href="#">Our Team</a></li>
						<li><a href="#">Our Our Vision</a></li>
						<li><a href="#">Our Demo Schedules</a></li>
						<li><a href="#">Our Activity</a></li>
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
<script type="text/javascript" language="javascript" src="<?php echo $SiteJSURL;?>jzaefferer-jquery-form-validatation.js"></script>
</body>
</html>