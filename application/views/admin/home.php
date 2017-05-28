<?php echo $AdminHomeLeftPanel;?>
<table cellspacing=5 cellpadding=5 width=90% border=0 >
  
  <tr>
    <td colspan="3"><?php echo $this->session->flashdata('Message');?></td>
  </tr>  
  <tr>
  <td width="375" valign="top">
  <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
            <tr bgcolor="#FEF191" height="20">
              <td style="padding-left:10px; font-weight:bold;"> Site Management</td>
            </tr>
            <tr height="20">
              <td  style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="<?php echo base_url().'admin/site_config'?>">Site Configuration</a> </td>
            </tr>
			<tr height="20">
              <td  style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="<?php echo base_url().'admin/index/change_pass';?>">Change Password</a> </td>
            </tr>
      </table>
    <br />
          <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
            <tr bgcolor="#FEF191" height="20">
              <td style="padding-left:10px; font-weight:bold;"> Banner Manager </td>
            </tr>
            <tr height="20">
              <td  style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="<?php echo base_url().'admin/banner/viewlist/'?>">Manage Banner</a> </td>
            </tr>
      </table>
    <br />
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
            <tr bgcolor="#FEF191" height="20">
              <td style="padding-left:10px; font-weight:bold;"> Team Management </td>
            </tr>
            <tr height="20">
              <td  style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="<?php echo base_url().'admin/team/viewlist/'?>">Manage Team</a> </td>
            </tr>
      </table>
    <br />

      <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
          <tr bgcolor="#FEF191" height="20">
            <td style="padding-left:10px; font-weight:bold;">News Management</td>
          </tr>
          <tr height="20">
            <td height="20" style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/><a href="<?php echo base_url().'admin/news/viewlist/'?>">News Manager </a> </td>
          </tr>
         
      </table>
      <br />
      <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
          <tr bgcolor="#FEF191" height="20">
            <td style="padding-left:10px; font-weight:bold;">Media Category Management</td>
          </tr>
          <tr height="20">
            <td height="20" style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/><a href="<?php echo base_url().'admin/category/viewlist/'?>">Media Category Manager </a> </td>
          </tr>
         
      </table>
      <br />
      </td>
  <td width="20">&nbsp;		  </td>
      <td width="450">
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
            <tr bgcolor="#FEF191" height="20">
              <td height="21" style="padding-left:10px; font-weight:bold;">Photo Gallery Management </td>
        </tr>
            <tr height="20">
              <td style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="<?php echo base_url().'admin/photo_gallery/viewlist/'?>">Photo Gallery Manager</a></td>
        </tr>
        </table>
       <br />
       	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
            <tr bgcolor="#FEF191" height="20">
              <td height="21" style="padding-left:10px; font-weight:bold;">Video Gallery Management </td>
        </tr>
            <tr height="20">
              <td style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="<?php echo base_url().'admin/video_gallery/viewlist/'?>">Video Gallery Manager</a></td>
        </tr>
        </table>
       <br />
  	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
            <tr bgcolor="#FEF191" height="20">
              <td height="21" style="padding-left:10px; font-weight:bold;">  Contacts Management </td>
        </tr>
            <tr height="20">
              <td style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="<?php echo base_url().'admin/user/contact_list/'?>">Contacts Manager</a></td>
        </tr>
        </table>
       <br />
       <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
            <tr bgcolor="#FEF191" height="20">
              <td style="padding-left:10px; font-weight:bold;"> Site Content </td>
            </tr>
            <tr height="20">
              <td style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="<?php echo base_url().'admin/cms/viewlist/'?>">Manage Static Pages Content</a> </td>
            </tr>
        </table>
        <br />
    
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
      <tr bgcolor="#FEF191" height="20">
        <td style="padding-left:10px; font-weight:bold;">Testimonials Management
      </tr>
      <tr height="20">
        <td style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="<?php echo base_url().'admin/testimonial/viewlist/'?>">Testimonials Manager</a> </td>
      </tr>
    </table>
    <br />
    
    </td>
  </tr>
</table>
<?php echo $AdminHomeRest;?>