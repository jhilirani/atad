<?php echo $AdminHomeLeftPanel;

//print_r($UserDataArr);die;?>
<table cellspacing=5 cellpadding=5 width=90% border=0 >
  
  <tr id="PageHeading">
    <td class="PageHeading" >Site Content Page Manager</td>
  </tr>

  
  <tr>
    <td style="padding-left:50px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-left:50px;"><div id="MessaeBox" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#009900; text-decoration:blink; text-align:center;"><?php echo $this->session->flashdata('Message');?></div></td>
  </tr>
  <tr>
    <td style="padding-left:10px;"></td>
  </tr>
<script language="javascript">

 function ShowEditBox(id){
 	location.href='<?php echo base_url()?>admin/cms/view_edit/'+id;
 }

function AskDelete(id){
	if(confirm('Are you sure to delete(Y/N) ?'))
	{
		location.href='<?php echo base_url()?>admin/cms/delete/'+id;
	}
	return false;
}
 </script>
  <tr>
  <td valign="top"> 
  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" id="ListBox" style="border:#FBE554 1px solid;">
  <tr class="ListHeadingLable" bgcolor="#FBE554" height="25px;">
    <td width="10%">Sl No </td>
    <td width="60%">CMS Page Title </td>
    <td width="10%">Status</td>
    <td width="20%">Action</td>
  </tr>
  <?php $val=0; 
  if(count($DataArr)>0){
  foreach($DataArr as $InerArr){?>
  <tr class="ListTestLable" height="20px;">
    <td><?php echo $val+1;?></td>
    <td><?php echo $InerArr->Title;?></td>
    <td><?php echo ($InerArr->Status=='1')?'Active':'Inactive';?></td>
    <td>
	<?php /* if($InerArr->Status=='1'){$action=0;}else{$action=1;}?>
	<a href="<?php echo base_url().'admin/cms/change_status/'.$InerArr->CMSID.'/'.$action;?>" class="AdminDashBoardLinkText"><?php if($InerArr->Status=='1'){?><img src="<?php echo $SiteImagesURL.'admin/';?>active1.png" alt="Inactive" title="Active" /><?php }else{?><img src="<?php echo $SiteImagesURL.'admin/';?>inactive1.png" alt="Inactive" title="Inactive" /><?php }?></a>
	&nbsp;&nbsp; */?>
	<a href="javascript:void(0);" onclick="ShowEditBox('<?php echo $InerArr->CMSID;?>');" class="AdminDashBoardLinkText"><img src="<?php echo $SiteImagesURL.'admin/';?>edit.png" width="15" height="15" title="Edit"/></a>
	</td> 
  </tr>
  <?php $val++;}
  }else{?>
  <tr class="ListHeadingLable">
    <td colspan="4" style="text-align: center; height: 40px;"> No Record Found</td>
  </tr>
  <?php }?>
</table></td>
  </tr>
 
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table></td>
  </tr>

</table>
<?php echo $AdminHomeRest;?>