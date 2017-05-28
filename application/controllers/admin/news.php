<?php
class News extends MY_Controller{
	public function __construct(){
            parent::__construct();
            $this->load->model('News_model');
	}
	
	public function index(){
            redirect(base_url().'admin');
	}
	
	public function viewlist(){
            $data=$this->_show_admin_logedin_layout();
            $data['DataArr']=$this->News_model->get_all_admin();
            $this->load->view('admin/news_list',$data);
	}
	
	public function add(){
		$News=$this->input->post('News',TRUE);
		$Status=1;
		$PostedDate=date('Y-m-d');
		
		$dataArr=array(
		'News'=>$News,
		'PostedDate'=>$PostedDate,
		'Status'=>$Status
		);
		
		//print_r($dataArr);die;
		$this->News_model->add($dataArr);
		
		$this->session->set_flashdata('Message','News added successfully.');
		redirect(base_url().'admin/news/viewlist');
	}
	
	
	public function edit(){
		$NewsID=$this->input->post('NewsID',TRUE);
		$News=$this->input->post('EditNews',TRUE);
		$Status=1;
		
		$dataArr=array(
		'News'=>$News,
		'Status'=>$Status
		);
		
		//print_r($dataArr);die;
		$this->News_model->edit($dataArr,$NewsID);
		
		$this->session->set_flashdata('Message','News edited successfully.');
		redirect(base_url().'admin/news/viewlist');
	}
	
	
	public function change_status($NewsID,$Action){
		$this->News_model->change_user_status($NewsID,$Action);
		
		$this->session->set_flashdata('Message','News status updated successfully.');
		redirect(base_url().'admin/news/viewlist');
	}
	
	public function delete($NewsID){
		$this->News_model->delete($NewsID);
		
		$this->session->set_flashdata('Message','News deleted successfully.');
		redirect(base_url().'admin/news/viewlist');
	}
	
	public function test(){
		
	}
}
?>