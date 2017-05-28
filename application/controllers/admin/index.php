<?php
class Index extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->library('session');
	}
	
	function index(){
		if($this->_is_admin_loged_in()==FALSE){
			$this->session->set_flashdata('Message','Please login to access admin section');
			redirect(base_url().'admin/index/login');
			
		}else{
			redirect(base_url().'admin/index/admin_home');
		}
	}
	
	function admin_home(){
		$this->_show_admin_home();
		/*if($this->_is_admin_loged_in()==TRUE){
			//die('true');
			
		}else{
			//die('false');
			
		}*/
	}
	
	public function login(){
		$this->_show_admin_login();
	}
	
	public function check_login(){
		$UserName=$this->input->post('UserName',TRUE);
		$Password=$this->input->post('Password',TRUE);
		$DataArr=$this->Admin_model->is_valid_data($UserName,$Password);
		//print_r($DataArr);die;
		if(count($DataArr)>0){
			$this->session->set_userdata('ADMIN_SESSION_VAR',$DataArr[0]->AdminID);
			$this->session->set_userdata('ADMIN_SESSION_USERNAME_VAR',$UserName);
			$this->session->set_flashdata('Message','You have loged successfully.');
			redirect(base_url().'admin/index/admin_home');
		}else{
			$this->session->set_flashdata('Message','Invalid Login,Please try again');
			redirect(base_url().'admin/index/login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('ADMIN_SESSION_VAR');
		$this->session->unset_userdata('ADMIN_SESSION_USERNAME_VAR');
		$this->session->set_flashdata('LoginPageMsg', 'You are logout successfully');
		redirect(base_url().'admin/index/admin_home');
	}
}
?>