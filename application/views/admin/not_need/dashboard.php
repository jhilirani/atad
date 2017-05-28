<?php echo $html_head;?>
<?php echo $header;?>
<link href="<?=$SiteCSSURL.'admin.css'?>" rel="stylesheet" type="text/css">
<?php echo $left;?>
<td width="80%"><table cellspacing=5 cellpadding=5 width=90% border=0 >
  
  <tr>
    <td colspan="3"><?php echo $this->session->flashdata('LoginPageMsg');?></td>
  </tr>
 
  <tr>
  <td width="375" valign="top">
          <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
            <tr bgcolor="#FEF191" height="20">
              <td style="padding-left:10px; font-weight:bold;" class="AdminDashBoardHeadText"> Admin Management </td>
            </tr>
            <tr height="20">
              <td  style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<?php echo anchor('admin/adminuser', 'Admin Manager',array('title'=>'Admin Manager','class'=>'AdminDashBoardLinkText'));?></td>
            </tr>
            <tr height="20">
              <td  style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<?php echo anchor('admin/adminuser/add', 'Add New Admin',array('title'=>'Add New Admin','class'=>'AdminDashBoardLinkText'));?> </td>
            </tr>
            
          </table>
    <br />
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
		<tr bgcolor="#FEF191" height="20">
              <td style="padding-left:10px; font-weight:bold;" class="AdminDashBoardHeadText"> User Management </td>
          </tr>
            
			<tr height="20">
              <td  style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<?php echo anchor('admin/feuser', 'User Manager',array('title'=>'User Manager','class'=>'AdminDashBoardLinkText'));?></td>
            </tr>
           
            
            
        </table>
    <br />
          <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
            <tr bgcolor="#FEF191" height="20">
              <td style="padding-left:10px; font-weight:bold;" class="AdminDashBoardHeadText"> Site Content </td>
            </tr>
            <tr height="20">
              <td style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<?php echo anchor('admin/cms', 'CMS Manager',array('title'=>'CMS Manager','class'=>'AdminDashBoardLinkText'));?> </td>
              <!------------------- -->
            </tr>
          </table>
      <br /></td>
  <td width="20">&nbsp; 
		  </td>
      <td width="450">
	  
	  
	  <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
          <tr bgcolor="#FEF191" height="20">
            <td style="padding-left:10px; font-weight:bold;" class="AdminDashBoardHeadText">Product Managemnet</td>
          </tr>
          <tr height="20">
            <td height="20" style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<?php echo anchor('admin/product', 'Product Manager',array('title'=>'Product Manager','class'=>'AdminDashBoardLinkText'));?> </td>
          </tr>
		  <tr height="20">
            <td height="20" style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<?php echo anchor('admin/product/add', 'Add New Product',array('title'=>'Add New Product','class'=>'AdminDashBoardLinkText'));?> </td>
          </tr>
         
        </table>
		<br />
		<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
          <tr bgcolor="#FEF191" height="20">
            <td style="padding-left:10px; font-weight:bold;" class="AdminDashBoardHeadText">Product Category Managemnet</td>
          </tr>
          <tr height="20">
            <td height="20" style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<?php echo anchor('admin/productcategoty', 'Product Category Manager',array('title'=>'Product Category Manager','class'=>'AdminDashBoardLinkText'));?> </td>
          </tr> 
		  
		  <tr height="20">
            <td height="20" style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<?php echo anchor('admin/productcategoty/add', 'Add New Product Category',array('title'=>'Add New Product Category','class'=>'AdminDashBoardLinkText'));?> </td>
          </tr>
         
        </table>
		<br />
		<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:#FBE554 1px solid;">
          <tr bgcolor="#FEF191" height="20">
            <td style="padding-left:10px; font-weight:bold;" class="AdminDashBoardHeadText">City Managemnet</td>
          </tr>
          <tr height="20">
            <td height="20" style="padding-left:10px;"><img src="<?=$SiteImagesURL?>admin/arrow.gif" border="0" align="absmiddle"/>&nbsp;<a href="index.php?p=city_list">City Manager </a> </td>
          </tr>
         
        </table>
          <br />
          <br />
	<br />
		  <br /></td>
  </tr>

</table></td>
      </tr>
    </table></td>
  </tr>
  <?php echo $footer;?>