<?php 

class Ajax extends MY_Controller{
	public function __construct(){
		parent::__construct();
		//$this->load->model('User_model');
		//$this->load->model('Country');
	}
	
	public function get_state(){
		$this->load->model('Country');
		$CountryID=$this->input->post('CountryID',TRUE);
		$StateData=$this->Country->get_state_country($CountryID);
		$html='<select id="StateID" name="StateID" class="required">';
		$html .= '<option value="">Select</soption>';
		foreach($StateData AS $k){
			$html .='<option value="'.$k->StateID.'">'.$k->StateName.'</soption>';
		}
		$html .= '</select>';
		echo $html;die;
	}
	
	public function get_edit_state(){
		$this->load->model('Country');
		$CountryID=$this->input->post('CountryID',TRUE);
		$StateData=$this->Country->get_state_country($CountryID);
		$html='<select id="EditStateID" name="EditStateID" class="required">';
		$html .= '<option value="">Select</soption>';
		foreach($StateData AS $k){
			$html .='<option value="'.$k->StateID.'">'.$k->StateName.'</soption>';
		}
		$html .= '</select>';
		echo $html;die;
	}
	
	public function check_user_name(){
		$this->load->model('User_model');
		$EmailID=$this->input->post('EmailID',TRUE);
		if($this->User_model->check_username_exists($EmailID)){
			echo 1;die;
		}else{
			echo 0;die;
		}
	}
	
	public function check_edit_user_name(){
		$this->load->model('User_model');
		$EmailID=$this->input->post('EmailID',TRUE);
		$UserID=$this->input->post('UserID',TRUE);
		if($this->User_model->check_edit_username_exists($EmailID,$UserID)){
			echo 1;die;
		}else{
			echo 0;die;
		}
	}
	
	
	public function check_category_name(){
		$this->load->model('Category_model');
		$CategoryName=$this->input->post('CategoryName',TRUE);
		if($this->Category_model->check_category_name_exists($CategoryName)){
			echo 1;die;
		}else{
			echo 0;die;
		}
	}
	
	public function check_edit_category_name(){
		$this->load->model('Category_model');
		$CategoryName=$this->input->post('CategoryName',TRUE);
		$CategoryID=$this->input->post('CategoryID',TRUE);
		if($this->Category_model->check_edit_category_name_exists($CategoryName,$CategoryID)){
			echo 1;die;
		}else{
			echo 0;die;
		}
	}
}	