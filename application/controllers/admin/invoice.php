<?php
class Invoice extends MY_Controller{
	public function __construct(){
            parent::__construct();
            $this->load->model('Category_model');
            $this->load->model('Order_model');
	}
	
	public function index(){
            redirect(base_url().'admin');
	}
	
	public function viewlist(){
            $data=$this->_show_admin_logedin_layout();
            $data['DataArr']=$this->Order_model->get_all_admin();
            $data['AllCategory']=  $this->Category_model->get_for_course();
            $this->load->view('admin/invoice_list',$data);
	}
	
	public function send_link_user(){
            $CategoryID=$this->input->post('CategoryID',TRUE);
            $CourseID=$this->input->post('CourseID',TRUE);
            $FirstName=$this->input->post('FirstName',TRUE);
            $LastName=$this->input->post('LastName',TRUE);
            $Email=$this->input->post('Email',TRUE);
            
            $link=md5(mktime().rand(1,100000));
            $dataArr=array(
            'CategoryID'=>$CategoryID,
            'CourseID'=>$CourseID,
            'FirstName'=>$FirstName,
            'LastName'=>$LastName,
            'Email'=>$Email,
            'RequestDate'=>date('Y-m-d'),
            'UniqueID'=>$link
            );

            //print_r($dataArr);die;
            $this->Order_model->add_send_link_user($dataArr);
            
            // sending mail
            $this->load->library('email');

            
            //$this->email->from('no-reply@daily-plaza.com', 'Daily Plaza Administrator');
            $to=$Email;
            $to_name=$FirstName.' '.$LastName;
            $this->email->from('info@e-learningforyou.com', 'E-Learningforyou Administrator');
            //$this->email->to('judhisahoo@gmail.com','judhisthia sahoo');
            $this->email->to($to,$to_name);

            $this->email->subject('Payment request for online training.');

            $msg=$this->online_payment_request_msg($link);
            //echo $msg;die;
            //$msg1='Hi TEst';
            $this->email->message($msg);

            $this->email->send();
            
            $this->session->set_flashdata('Message','Payment request send user successfully.');
            redirect(base_url().'admin/invoice/viewlist');
	}
	
	
	public function change_status($CategoryID,$Action){
		$this->Category_model->change_category_status($CategoryID,$Action);
		
		$this->session->set_flashdata('Message','Invoice status updated successfully.');
		redirect(base_url().'admin/invoice/viewlist');
	}
	
	public function delete($CategoryID){
		$this->Category_model->delete($CategoryID);
		
		$this->session->set_flashdata('Message','Invoice deleted successfully.');
		redirect(base_url().'admin/invoice/viewlist');
	}
        
        public function featured($CategoryID){
            $this->Category_model->featured($CategoryID);
            $this->session->set_flashdata('Message','Invoice featured successfully.');
            redirect(base_url().'admin/invoice/viewlist');
        }
        
        public function online_payment_request_msg($link,$Name=''){
        $http_link=  base_url().'index/pay_online_from_email/'.$link;    
        $content='<div style="width:900px;float:none;margin:0 auto;padding:0px;overflow:hidden;background:#FFF;" >
  <div align="center" style="width:92%;float:none;margin:0 auto; height:138px; background-image:url(http://e-learningforyou.com/resources/images/logo_bg.png); background-repeat:no-repeat;-webkit-border-top-left-radius: 10px;
-webkit-border-top-right-radius: 10px;
-moz-border-radius-topleft: 10px;
-moz-border-radius-topright: 10px;
border-top-left-radius: 10px;
border-top-right-radius: 10px;">
    <div style="width:226px;color:#FFF;line-height:24px;font-size:21px;font-weight:normal; float:right; padding-top:50px;" >Online payment request Link for online training.</div>
  </div>
  <div style="clear:both;"></div>
  <div style="width:90%;float:none;margin:0 auto;background:#F2F2F2;overflow:hidden;padding:10px;" >
    <div style="width:90%;float:left;margin:0 auto;color:#5A5A5A;line-height:17px;font-size:12px;padding-bottom:10px;font-weight:normal;">
    </div>
    <div style="clear:both;"></div>
    <div style="float:left;margin:20px auto 0 auto;width:90%;color:#797979;line-height:17px;font-size:21px;font-weight:normal;" >
        <div style="width:100%;float:left;margin:0 auto;color:#797979;line-height:17px;font-size:12px;padding-bottom:10px;font-weight:bold;"> Please click the bellow link to pay online. </div>
      <div style="clear:both;"></div>
      <br />
      <table width="90%" border="0" style="color:#222222;line-height:17px;font-size:13px;margin:0;padding:0px;font-weight:normal;">
          <tr>
            <td><a href="'.$http_link.'">'.$http_link.'</a></td>
          </tr>
          <tr>
            <td style="height:30px;">&nbsp;</td>
          </tr>
        </table>
      <div style="clear:both;"></div>
       
      <br />
    </div>
   
    <div style="clear:both;"></div>
    <br />
    <div style="width:100%;float:none;margin:0 -10px -10px;padding:10px;overflow:hidden;background-image:url(http://e-learningforyou.com/resources/images/footer-bg.png); background-repeat:repeat-x; margin-bottom:-10px; height:auto;">
      <div style="color:#FFF;width:40%;float:left;line-height:17px;font-size:13px;margin:10px 30px;padding:9px 0px;font-weight:normal;">&copy 2014 e-learningforyou.com | All rights reserved.</div>
      <div style="color:#FFF;width:25%;float:right;line-height:17px;font-size:11px;margin:10px 0;padding:9px 0px;font-weight:normal;"> <a style="padding:0 8px; color:#FFF;" href="http://e-learningforyou.com/index/privacy_policy" target="_blank" rel="nofollow"> Privacy Policy</a> | <a style="padding:0 8px;  color:#FFF;" href="http://e-learningforyou.com/index/faq" target="_blank" rel="nofollow">FAQs</a></div>
    </div>
  </div>
</div>';
        return $content;
    }

}
?>