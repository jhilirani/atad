<?php
class Testimonial extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Testimonial_model');
		$this->load->model('User_model');
	}
	
	public function index(){
		redirect(base_url().'admin');
	}
	
	public function viewlist(){
		$data=$this->_show_admin_logedin_layout();
		$data['UserData']=$this->User_model->get_active_user();
		$data['DataArr']=$this->Testimonial_model->get_all_admin();
		$this->load->view('admin/testimonial_list',$data);
	}
	
	public function add(){
		$FirstName=$this->input->post('FirstName',TRUE);
		$LastName=$this->input->post('LastName',TRUE);
		$Email=$this->input->post('Profile',TRUE);
		$Testimonial=$this->input->post('Testimonial',TRUE);
		$Status=1;
		$PostedDate=date('Y-m-d');
		
		$dataArr=array(
		'Email'=>$Email,
		'FirstName'=>$FirstName,
		'LastName'=>$LastName,
		'Testimonial'=>$Testimonial,
		'PostedDate'=>$PostedDate,
		'Status'=>$Status
		);
		
		//print_r($dataArr);die;
		$this->Testimonial_model->add($dataArr);
		
		$this->session->set_flashdata('Message','Testimonial added successfully.');
		redirect(base_url().'admin/testimonial/viewlist');
	}
	
	
	public function edit(){
		$TestimonialID=$this->input->post('TestimonialID',TRUE);
		$FirstName=$this->input->post('EditFirstName',TRUE);
		$LastName=$this->input->post('EditLastName',TRUE);
		$Email=$this->input->post('EditProfile',TRUE);
		$Testimonial=$this->input->post('EditTestimonial',TRUE);
		$Status=1;
		
		$dataArr=array(
		'Email'=>$Email,
		'FirstName'=>$FirstName,
		'LastName'=>$LastName,
		'Testimonial'=>$Testimonial,
		'Status'=>$Status
		);
		
		//print_r($dataArr);die;
		$this->Testimonial_model->edit($dataArr,$TestimonialID);
		
		$this->session->set_flashdata('Message','Testimonial edited successfully.');
		redirect(base_url().'admin/testimonial/viewlist');
	}
	
	
	public function change_status($UserID,$Action){
		$this->User_model->change_user_status($UserID,$Action);
		
		$this->session->set_flashdata('Message','User status updated successfully.');
		redirect(base_url().'admin/user/viewlist');
	}
	
	public function delete($TestimonialID){
		$this->Testimonial_model->delete($TestimonialID);
		
		$this->session->set_flashdata('Message','Testimonial deleted successfully.');
		redirect(base_url().'admin/testimonial/viewlist');
	}
	
	public function test(){
		
	}
}
?>