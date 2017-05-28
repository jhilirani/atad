<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends MY_Controller{
	
	public function __consturct(){
		parent::__construct();
	}
	
	public function index(){
		redirect(base_url());
	}
	
	public function job_oriented_training(){
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template();
		}else{
			$data=$this->_get_tobe_login_template();
		}
		
		$data['CmsData']=$this->Cms_model->get_content('job_oriented_training'); //get_content_by_id(2);
		
		/*$data['SiteImagesURL']=$this->config->item('SiteImagesURL');
		$data['SiteCSSURL']=$this->config->item('SiteCSSURL');
		$data['SiteJSURL']=$this->config->item('SiteJSURL');
		$data['SiteResourcesURL']=$this->config->item('SiteResourcesURL');*/
		
		$this->load->view('cms',$data);
	}
	
	public function demo_schedules(){
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template();
		}else{
			$data=$this->_get_tobe_login_template();
		}
		
		$data['CmsData']=$this->Cms_model->get_content('demo_schedules');
		
		$this->load->view('cms',$data);
	}
	
	public function terms_conditions(){
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template();
		}else{
			$data=$this->_get_tobe_login_template();
		}
		
		$data['CmsData']=$this->Cms_model->get_content('terms_conditions');
		
		$this->load->view('cms',$data);
	}
	
	
	public function skills(){
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template();
		}else{
			$data=$this->_get_tobe_login_template();
		}
		
		$data['CmsData']=$this->Cms_model->get_content('skills');
		
		$this->load->view('cms',$data);
	}
	
	public function privacy_policy(){
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template();
		}else{
			$data=$this->_get_tobe_login_template();
		}
		
		$data['CmsData']=$this->Cms_model->get_content('privacy_policy');
		
		$this->load->view('cms',$data);
	}
	
	
}