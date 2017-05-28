<?php echo $AdminHomeLeftPanel;

//print_r($UserDataArr);die;?>
<table cellspacing=5 cellpadding=5 width=90% border=0 >
  
  <tr id="PageHeading">
    <td class="PageHeading" >Demo Requested User List</td>
  </tr>

  
  <tr>
    <td style="padding-left:50px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-left:50px;"><div id="MessaeBox" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#009900; text-decoration:blink; text-align:center;"><?php echo $this->session->flashdata('Message');?></div></td>
  </tr>
<script language="javascript">

 function ShowDetailsBox(id)
 {
     //alert(id);
 	$('#MessaeBox').html("");
	$('#PageHeading').fadeOut();
	$('#ListBox').fadeOut(400);
	
	$('#EditBox').fadeIn(2500);
        //alert(DataArr[id]['FirstName']+' '+DataArr[id]['LastName']);
	$('#EditBoxTitle').text(DataArr[id]['FirstName']+' '+DataArr[id]['LastName']);
	$('#Email').text(DataArr[id]['Email']);
	$('#FirstName').text(DataArr[id]['FirstName']);
	$('#LastName').text(DataArr[id]['LastName']);
	$('#City').text(DataArr[id]['City']);
	$('#State').text(DataArr[id]['State']);
	$('#Zip').text(DataArr[id]['Zip']);
	$('#ContactNo').text(DataArr[id]['Phone']);
	$('#Address').text(DataArr[id]['Address']);
	$('#RegisterDate').text(DataArr[id]['RegisterDate']);
	$('#selectedDateTime').text(DataArr[id]['selectedDateTime']);
	$('#Course').text(DataArr[id]['Title']);
	$('#IP').text(DataArr[id]['IP']);
	$('#DemoAttend').text(DataArr[id]['DemoAttend']);
	$('#DemoAttendDate').text(DataArr[id]['DemoAttendDate']);
	
 }

 function CancelView()
 {
	$('#AddBox').hide();
	$('#PageHeading').fadeIn(3000);
	$('#ListBox').fadeIn(3000);
	$('#AddBtn').fadeIn(3000);
	$('#EditBox').fadeOut(3500);
	return false;
 }
 
function AskDelete(id){
	if(confirm('Are you sure to delete(Y/N) ?')){
		location.href='<?php echo base_url()?>admin/user/demo_delete/'+id;
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
    <td width="8%">Sl No </td>
    <td width="17%">Full Name </td>
    <td width="17%">Email</td>
    <td width="17%">Contact No</td>
    <td width="17%">Course</td>
    <td width="10%">Status</td>
    <td width="17%">Action</td>
  </tr>
  <script language="javascript">
  var DataArr=new Array(<?=count($DataArr)?>);
  </script>
  <?php $val=0; 
  if(count($DataArr)>0){
  foreach($DataArr as $InerArr){?>
  <tr class="ListTestLable" height="20px;">
    <td><?php echo $val+1;?></td>
    <td><?php echo $InerArr->FirstName.' '.$InerArr->LastName;?></td>
    <td><?php echo $InerArr->Email;?></td>
    <td><?php echo $InerArr->Phone;?></td>
    <td><?php echo $InerArr->Title;?></td>
    <td><?php echo ($InerArr->DemoAttend=='1')?'Demo Attended on '.date('d-m-Y',strtotime($InerArr->DemoAttendDate)):'No Yet Not';?></td>
    <td>
	<?php if($InerArr->DemoAttend=='0'){?>
	<a href="<?php echo base_url().'admin/user/demo_change_status/'.$InerArr->DemoID.'/1'?>" class="AdminDashBoardLinkText"><img src="<?php echo $SiteImagesURL.'admin/';?>inactive1.png" alt="Make Attended" title="Make Attended" /></a> &nbsp;&nbsp;
	<?php }?>
	<a href="javascript:void(0);" onclick="ShowDetailsBox('<?php echo $InerArr->DemoID;?>');" class="AdminDashBoardLinkText"><img src="<?php echo $SiteImagesURL.'admin/';?>publish.png" width="15" height="15" title="View Details"/></a>
	&nbsp;&nbsp;
	<a href="javascript:void(0);" onclick="AskDelete('<?php echo $InerArr->DemoID;?>');" class="AdminDashBoardLinkText"><img src="<?php echo $SiteImagesURL.'admin/';?>delete.png" width="15" height="15" title="Delete"/></a>
	</td> 
  </tr>
  <script language="javascript">
  DataArr[<?php echo $InerArr->DemoID?>]=new Array();
  DataArr[<?php echo $InerArr->DemoID?>]['Email']='<?php echo $InerArr->Email?>';
  DataArr[<?php echo $InerArr->DemoID?>]['FirstName']='<?php echo $InerArr->FirstName?>';
  DataArr[<?php echo $InerArr->DemoID?>]['LastName']='<?php echo $InerArr->LastName?>';
  DataArr[<?php echo $InerArr->DemoID?>]['Address']='<?php echo $InerArr->Address?>';
  DataArr[<?php echo $InerArr->DemoID?>]['City']='<?php echo $InerArr->City?>';
  DataArr[<?php echo $InerArr->DemoID?>]['State']='<?php echo $InerArr->State?>';
  DataArr[<?php echo $InerArr->DemoID?>]['Zip']='<?php echo $InerArr->Zip?>';
  DataArr[<?php echo $InerArr->DemoID?>]['Phone']='<?php echo $InerArr->Phone?>';
  DataArr[<?php echo $InerArr->DemoID?>]['IP']='<?php echo $InerArr->IP?>';
  DataArr[<?php echo $InerArr->DemoID?>]['Title']='<?php echo $InerArr->Title?>';
  DataArr[<?php echo $InerArr->DemoID?>]['RegisterDate']='<?php echo date('d-m-Y',strtotime($InerArr->RegisterDate));?>';
  DataArr[<?php echo $InerArr->DemoID?>]['selectedDateTime']='<?php echo date('d-m-Y H:i:s',strtotime($InerArr->selectedDateTime));?>';
  DataArr[<?php echo $InerArr->DemoID?>]['DemoAttend']='<?php echo ($InerArr->DemoAttend=='0') ? 'No Yet Not' : 'Yes Already Attended';?>';
  <?php if($InerArr->DemoAttend=='1'){?>
  DataArr[<?php echo $InerArr->DemoID?>]['DemoAttendDate']='<?php echo date('d-m-Y',strtotime($InerArr->DemoAttendDate));?>';    
  <?php }else{?>
 DataArr[<?php echo $InerArr->DemoID?>]['DemoAttendDate']='Yest not selected';
      <?php }?>
  </script>
  <?php $val++;}
  }else{?>
  <tr class="ListHeadingLable">
    <td colspan="6" style="text-align: center; height: 40px;"> No Report Found</td>
  </tr>
  <?php }?>
</table></td>
  </tr>
 
  <tr>
    
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" id="EditBox" style="display:none;">
  <tr>
    <th colspan="4"><span class="PageHeading">Details View of <span id="EditBoxTitle"></span></span></th>
  </tr>
  <tr>
    <td align="left" valign="top" height="40px;">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable"> Email </td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="Email"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">First Name</td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="FirstName" ></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Last Name </td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="LastName"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Address </td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="Address" ></span></td>
  </tr>
  
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">City </td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="City" ></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">State </td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="State"></span></td>
  </tr>
  
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Zip </td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="Zip"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Contact No </td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="ContactNo"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Demo Registered Date</td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="RegisterDate"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Demo Selected Date</td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="selectedDateTime"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Course Requested</td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="Course"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Requested IP From</td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="IP"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Demo Attend</td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="DemoAttend"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" class="ListHeadingLable">Demo Attended Date</td>
    <td align="left" valign="top"><label><strong>:</strong></label></td>
    <td align="left" valign="top"><span id="DemoAttendDate"></span></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><label></label></td>
    <td align="left" valign="top">
      <input type="button" name="Submit22" value="Cancel" onclick="return CancelView();" class="common_button"/></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table></td>
  </tr>

</table>
<?php echo $AdminHomeRest;?>