<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends MY_Controller{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 public $CurrentLang='';
	public function __construct() {        
	    parent::__construct();
            $this->load->model('Category_model');
            $this->load->model('Banner_model');
            $this->load->model('Cms_model');
            $this->load->model('Course_model');
        }
        
	public function index(){
            $AllCategory=$this->Category_model->get_for_course();
            $LeftDataArr=array();
            $CourseDataArr=array();
            foreach($AllCategory AS $k){
                $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
            }
            
            //echo '<pre>';print_r($LeftDataArr);die;
            
            $CMSDetails=$this->Cms_model->get_content_by_id(9);
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            //print_r($data);die;
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            
            
            $data['DataArr']=$LeftDataArr;
            $data['CourseContent']=$CMSDetails[0]->Body;
            $this->load->view('course',$data);
        }
        
        public function detailsof($str){
            if($str==''){
                redirect(base_url());
            }
            
            $CourseID=(int)current(explode('-', $str));
            $CourseDetails=$this->Course_model->get_details_by_id($CourseID);
            
            $SEODataArr["MetaTitle"]=$CourseDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CourseDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CourseDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Details']=$CourseDetails;
            $this->load->view('details',$data);
        }
}       