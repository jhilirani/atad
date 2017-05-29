<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends MY_Controller{
	
	public function __consturct(){
		parent::__construct();
		$this->load->model('Cms_model');
	}
	
	public function index(){
		redirect(base_url());
	}

	function generate_seo_data_arr($id){
		$CMSDetails=$this->Cms_model->get_content_by_id($id);
        //$CMSDetails=$this->Cms_model->get_content('terms_conditions');
        //echo '<pre>';print_r($CMSDetails);die;
        $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
        $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
        $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
     	return $SEODataArr;   
	}

	public function about_atad(){
		$CmsData=$this->Cms_model->get_content('about_atad'); //get_content_by_id(2);
		$SEODataArr=$this->generate_seo_data_arr($CmsData[0]->CMSID);
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template($SEODataArr);
		}else{
			$data=$this->_get_tobe_login_template($SEODataArr);
		}
		
		$data['CmsData']=$CmsData;
		$data['bread_crumb_data']="About ATAD";
		$data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
		
		$this->load->view('cms',$data);
	}
	
	public function career_center(){
		$CmsData=$this->Cms_model->get_content('career_center'); //get_content_by_id(2);
		$SEODataArr=$this->generate_seo_data_arr($CmsData[0]->CMSID);
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template($SEODataArr);
		}else{
			$data=$this->_get_tobe_login_template($SEODataArr);
		}
		
		$data['CmsData']=$CmsData;
		$data['bread_crumb_data']="Career Center";
		$data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
		$this->load->view('cms',$data);
	}
	
	public function demo_schedules(){
		$CmsData=$this->Cms_model->get_content('demo_schedules'); //get_content_by_id(2);
		$SEODataArr=$this->generate_seo_data_arr($CmsData[0]->CMSID);
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template($SEODataArr);
		}else{
			$data=$this->_get_tobe_login_template($SEODataArr);
		}
		
		$data['CmsData']=$CmsData;
		$data['bread_crumb_data']="Demo Schedules";
		$data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
		$this->load->view('cms',$data);
	}
	
	public function our_vision(){
		$CmsData=$this->Cms_model->get_content('our_vision'); //get_content_by_id(2);
		$SEODataArr=$this->generate_seo_data_arr($CmsData[0]->CMSID);
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template($SEODataArr);
		}else{
			$data=$this->_get_tobe_login_template($SEODataArr);
		}
		
		$data['CmsData']=$CmsData;
		$data['bread_crumb_data']="Our Vision";
		$data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
		$this->load->view('cms',$data);
	}
	
	
	public function our_activity(){
		$CmsData=$this->Cms_model->get_content('our_activity'); //get_content_by_id(2);
		$SEODataArr=$this->generate_seo_data_arr($CmsData[0]->CMSID);
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template($SEODataArr);
		}else{
			$data=$this->_get_tobe_login_template($SEODataArr);
		}
		
		$data['CmsData']=$CmsData;
		$data['bread_crumb_data']="Our Activity";
		$data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
		$this->load->view('cms',$data);
	}
	
	public function privacy_policy(){
		$CmsData=$this->Cms_model->get_content('privacy_policy'); //get_content_by_id(2);
		$SEODataArr=$this->generate_seo_data_arr($CmsData[0]->CMSID);
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template($SEODataArr);
		}else{
			$data=$this->_get_tobe_login_template($SEODataArr);
		}
		
		$data['CmsData']=$CmsData;
		$data['bread_crumb_data']="Privacy Policy";
		$data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
		$this->load->view('cms',$data);
	}
	
	public function  terms_and_conditions(){
		$CmsData=$this->Cms_model->get_content('terms_and_conditions'); //get_content_by_id(2);
		$SEODataArr=$this->generate_seo_data_arr($CmsData[0]->CMSID);
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template($SEODataArr);
		}else{
			$data=$this->_get_tobe_login_template($SEODataArr);
		}
		
		$data['CmsData']=$CmsData;
		$data['bread_crumb_data']="Terms & Conditions";
		$data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
		$this->load->view('cms',$data);
	}

	function press_release(){
		$CmsData=$this->Cms_model->get_content('press_release'); //get_content_by_id(2);
		$SEODataArr=$this->generate_seo_data_arr($CmsData[0]->CMSID);
		if($this->is_loged_in()){
			$data=$this->_get_logedin_template($SEODataArr);
		}else{
			$data=$this->_get_tobe_login_template($SEODataArr);
		}
		
		$data['CmsData']=$CmsData;
		$data['bread_crumb_data']="Press Release";
		$data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
		$this->load->view('cms',$data);	
	}
}