<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller{

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
        $this->load->model('Banner_model');
        $this->load->model('Cms_model');
    }
    public function index(){
        $SEODataArr=array();
        $data=$this->_get_tobe_login_template($SEODataArr);
        $this->db->insert('site_views',array('IP'=>$this->input->ip_address()));
        $lastViewId=$this->db->insert_id();
        //echo $lastViewId;die;
        $data['LastViewNo']=$lastViewId;
        $sliderData=$this->Banner_model->get_for_fe();
        $data['BannerImageData']=$sliderData;
        $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
        //pre($data);die;
        $this->load->view('home',$data);
    }

    function photo(){
        $SEODataArr=array();
        $data=$this->_get_tobe_login_template($SEODataArr);
        $data['bread_crumb_data']="All Photo";
        $data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
        $this->load->view('photo',$data);
    }

    function video(){
        $SEODataArr=array();
        $data=$this->_get_tobe_login_template($SEODataArr);
        $data['bread_crumb_data']="All Videos";
        $data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
        $this->load->view('videos',$data);
    }
    
    function team(){
        $SEODataArr=array();
        $data=$this->_get_tobe_login_template($SEODataArr);
        $data['bread_crumb_data']="Our Team";
        $data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
        $this->load->view('team',$data);
    }
    
    function contact_us_submit(){
        $Email=$this->input->post('email',TRUE);
        $Name=$this->input->post('name',TRUE);
        $Name=$this->input->post('subject',TRUE);
        $Phone=$this->input->post('Phone',TRUE);
        $Message=$this->input->post('message',TRUE);
        $secret=$this->input->post('secret',TRUE);
        $error=FALSE;
        $error_message='';

        if($error==FALSE){
            $server_secret=$this->session->userdata('secret');
            //echo '$server_secret :- '.$server_secret;die;
            if($server_secret!=$secret){
                    //print_r($_SESSION);
                    $error=TRUE;
                    //die('zzzzzzzzzz');
                    $error_message='Please enter valid security code';
            }
        }

        if($error==FALSE){
            $dataArr=array('Name'=>$Name,'Email'=>$Email,'Phone'=>$Phone,'Message'=>$Message,'addedDate'=>date('Y-m-d H:i:s'),'IP'=>  $this->input->ip_address());

            $this->User_model->post_contact($dataArr);
            die("OK");
        }else{
            die('<i class="fa fa-exclamation-triangle fa-2x"></i> '.$error_message);
        }
    }
     
    public function underconstrunction(){
        $data=$data=$this->_get_tobe_login_template();
        $data['BannerImageData']=$this->Banner_model->get_for_fe();
        $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
        
        $this->load->view('underconstrunction',$data);
    }
    
        
    public function contact_us(){
        $CMSDetails=array();
        /*$CMSDetails=$this->Cms_model->get_content_by_id(10);
        //$CMSDetails=$this->Cms_model->get_content('terms_conditions');
        //echo '<pre>';print_r($CMSDetails);die;
        $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
        $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
        $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;*/
        $data=$this->_get_tobe_login_template($CMSDetails);
        
        //$data['BannerImageData']=$this->Banner_model->get_for_fe();
        //$data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
        $data['bread_crumb_data']="Contact Us";
        $data['bread_crumb']=$this->load->view('bread_crumb',$data,TRUE);
        
        //$data['Body']=$CMSDetails[0]->Body;
        
        $this->load->view('contact_us',$data);
        
    }
        
        public function check_already_demo(){
            $this->load->mode('Demo_model');
            $IP=$this->input->ip_address();
            $Email=  $this->input->post('Email',TRUE);
            if(count($this->Demo_model->checkDemo($Email,$IP))>0){
                echo '1';die;
            }else{
                echo '0';die;
            }
        }
        
        public function reset_secret(){
		$secret=$this->input->post('secret',TRUE);
		$this->session->set_userdata('secret',$secret);
	}
        
        
	
        private function my_unique_number($Length){
		$listAlpha = '0123456789';
		return substr(str_shuffle($listAlpha),0,$Length);
	}
        
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */