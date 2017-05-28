<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Admin Panel</title>
<?php //echo link_tag($link);?>
<link href="<?=$SiteCSSURL?>admin/style.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript" src="<?=$SiteJSURL?>validator.js"></script>
<script type="text/JavaScript" src="<?=$SiteJSURL?>jquery.min.js"></script>
<script type="text/JavaScript" src="<?=$SiteJSURL?>jzaefferer-jquery-form-validatation.js"></script>
<script type="text/JavaScript" src="<?=$SiteJSURL?>swfobject.js"></script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
  <tr>
    <td  align="left" valign="top" class="leftmenubg">
<div class="menulft">
        <ul>
          <li><a href="<?php echo base_url().'admin/';?>" <?php if($CurrentCont=='' || $CurrentCont=='index') echo 'class="active"';?>>Home</a></li>
          <li><a href="<?php echo base_url().'admin/site_config'?>" <?php if($CurrentCont=='site_config') echo 'class="active"';?>>Site Config</a></li>
          <li><a href="<?php echo base_url().'admin/index/change_pass';?>" <?php //if($p=='admin_edit') echo 'class="active"';?>>Change Password</a></li>
          <li><a href="<?php echo base_url().'admin/category/viewlist/'?>" <?php if($CurrentCont=='category' && $this->uri->segment(3)=='viewlist') echo 'class="active"';?>>Category Management</a></li>
          <li><a href="<?php echo base_url().'admin/team/viewlist/'?>" <?php if($CurrentCont=='team' && $this->uri->segment(3)=='viewlist') echo 'class="active"';?>>Team Management</a></li>
          <li><a href="<?php echo base_url().'admin/news/viewlist/'?>" <?php if($CurrentCont=='news' && $this->uri->segment(3)=='viewlist') echo 'class="active"';?>>News Manager</a></li>
          <li><a href="<?php echo base_url().'admin/photo_gallery/viewlist/'?>" <?php if($CurrentCont=='photo_gallery' && $this->uri->segment(3)=='viewlist') echo 'class="active"';?>>Photo Gallery Management</a></li>
          <li><a href="<?php echo base_url().'admin/video_gallery/viewlist/'?>" <?php if($CurrentCont=='vide_gallery' && $this->uri->segment(3)=='viewlist') echo 'class="active"';?>>Video Gallery Management</a></li>
          
          <li><a href="<?php echo base_url().'admin/testimonial/viewlist/'?>" <?php if($CurrentCont=='testimonial' && $this->uri->segment(3)=='viewlist') echo 'class="active"';?>>Testimonials Manager</a></li>
        <li><a href="<?php echo base_url().'admin/cms/viewlist/'?>" <?php if($CurrentCont=='cms' && $this->uri->segment(3)=='viewlist') echo 'class="active"';?>>Site Pages Manager</a></li>
        <li><a href="<?php echo base_url().'admin/banner/viewlist/'?>" <?php if($CurrentCont=='banner' && $this->uri->segment(3)=='viewlist') echo 'class="active"';?>>Banner Manager</a></li>
        <li><a href="<?php echo base_url().'admin/user/contact_list/'?>" <?php if($CurrentCont=='user' && $this->uri->segment(3)=='contact_list') echo 'class="active"';?>>Contact List</a></li>
        <?php /*<li><a href="<?php echo base_url().'admin/user/demo_list/'?>" <?php if($CurrentCont=='user' && $this->uri->segment(3)=='demo_list') echo 'class="active"';?>>Demo Request List</a></li> */?>
        
          <li><a href="<?php echo base_url().'admin/index/logout/'?>">Logout</a></li>
        </ul>
      </div>
</td>
    <td  align="left" valign="top" class="pad1">
    <!-- Body  with header -- stated here-->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <!-- header started here-->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
                    <td width="315px;"><a href="./"><img src="<?=$SiteImagesURL?>admin/<?php echo 'logo.png';?>" height="75" width="75" border="0"  align="left"/></a>
				<span style="font-family:Mistral; font-size:25px; float:left; margin-left:-8px;">&nbsp; Next Generation Martial Art Training &nbsp;</span></td>
				<td class="textHadr bdr">ATAD</td>
		</tr>
</table>
	<!-- header ended here-->
</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
    <td>