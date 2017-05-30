<?php echo $html_heading;?><?php echo $header;?><?php //echo $HomePageSlider;?>
<?php echo $bread_crumb;?>      
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: normal;
    position: relative;	
}

html,body {
     overflow-x: hidden;
     font-size: 100%;
     width: 100%;
	 height:100%;
     -webkit-font-smoothing: antialiased;
     -moz-osx-font-smoothing: grayscale;
     vertical-align: baseline;
  }

img {
  vertical-align: middle;
  max-height: 360px;
  width: 100%;
}

/* Typography
------------------------------------- */
h1,h2,h3,h4,h5 {
  font-family: 'Unica One', cursive;
  font-weight: bold;
}

/* All Section styles
------------------------------------- */
.section-title {
  padding: 10px;
  position: relative;
  text-align: center;
  margin-bottom: 50px;
}

.section-title, #plan .section-title {
  border-color: #ffffff;
  padding-top: 40px;
}

.heading{
	color:#FFFFFF;
	font-size:36px;
}

#team h4 {
  color: #092756;
  font-weight: bold;
  text-align: center;
}
#team h3 {
  color: #000000;
  font-size: 14px;
  font-weight: bold;
  text-align: center;
}

#team .team-wrapper .team-des {
  cursor: pointer;
  position: relative;
  bottom: 0;
  transition: all 0.4s linear;
  padding: 22px 12px 22px 12px;
  background: #ffffff;
}

#team .team-wrapper:hover .team-des {
  background: #ffffff;
  bottom: 50px;
}

#team .team-wrapper .social-icon li a {
  font-size: 16px;
}




.social-icon {
  padding: 0;
  margin: 0;
}

.social-icon li {
  list-style: none;
  display: inline-block;
  padding: 6px;
}

.social-icon li a {
  color: #000000;
  font-size: 20px;
  font-weight: 300;
  width: 40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  text-decoration: none;
  transition: all 0.4s ease-in-out;
  margin: 0 8px 14px 8px;
}

.social-icon li a:hover {
  background: #000000;
  color: #ffffff;
}
</style>

<!-- team section
================================================== -->
<section id="team" class="parallax-section">
    <div class="container">
        <div class="row">
            <!-- Section title
            ================================================== -->
            <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
                <div class="section-title">
                    <h1 class="heading">OUR EXPERT TEAM</h1>					
                </div>
            </div>
            
            <?php $sql="SELECT * FROM `team` WHERE Status=1";
            $rsTeam=$this->db->query($sql)->result();
            foreach ($rsTeam As $k):?>
            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                <div class="team-wrapper">
                    <img src="<?php echo SiteResourcesURL;?>team/400X400/<?php echo $k->Image;?>"  class="img-responsive" alt="team img" >
                    <div class="team-des">
                        <h4><?php echo $k->Name;?></h4>
                        <h3><?php echo $k->Desingnation;?></h3>
                        <div><?php echo $k->About;?></div>
                        <!--<ul class="social-icon">
                                <li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
                                <li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
                                <li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.6s"></a></li>
                                <li><a href="#" class="fa fa-behance wow fadeIn" data-wow-delay="0.6"></a></li>
                        </ul>-->
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<?php echo $footer;?>