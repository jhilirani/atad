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
	
	
        
    public function free_demo_action(){
        //redirect(base_url().'index/underconstrunction');
        $this->load->model('Demo_model');
        $CategoryID         =  $this->input->post('CategoryID',TRUE);
        $CourseID           =  $this->input->post('CourseID',TRUE);
        $selectedDateTime   =  $this->input->post('selectedDateTime',TRUE);
        $FirstName          =  $this->input->post('FirstName',TRUE);
        $LastName           =  $this->input->post('LastName',TRUE);
        $Email              =  $this->input->post('Email',TRUE);
        $Address            =  $this->input->post('Address',TRUE);
        $City               =  $this->input->post('City',TRUE);
        $State              =  $this->input->post('State',TRUE);
        $Zip                =  $this->input->post('Zip',TRUE);
        $Phone              =  $this->input->post('Phone',TRUE);
        $secret                =  $this->input->post('secret',TRUE);
        
        $tempDataArr=array();
        $tempDataArr=array(
        'CategoryID'=>$CategoryID,
        'CourseID'=>$CourseID,
        'selectedDateTime'=>$selectedDateTime,
        'FirstName'=>$FirstName,
        'LastName'=>$LastName,
        'Email'=>$Email,
        'Phone'=>$Phone,
        'Address'=>$Address,
        'State'=>$State,
        'City'=>$City,
        'Zip'=>$Zip
        );
        $this->session->set_userdata('TmpDemoDataArr',$tempDataArr);

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
        
        
        $IP=$this->input->ip_address();
        if($error==FALSE){
            if(count($this->Demo_model->checkDemo($Email,$IP))>0){
                $error=TRUE;
                //die('zzzzzzzzzz');
                $error_message='You have already attend an demo,second demo not allowed.<br /> Please contact us by Contact Us form.';
            }
        }
        
        if($error==FALSE){
            $this->session->unset_userdata('TmpDemoDataArr');
            unset($tempDataArr['CategoryID']);
            $tempDataArr['IP']=$IP;
            $arr=explode(' ',$tempDataArr['selectedDateTime']);
            $dateDataArr=  explode('/', $arr[0]);
            $tempDataArr['selectedDateTime']=$dateDataArr[2].'-'.$dateDataArr[0].'-'.$dateDataArr[1].' '.$arr[1].':00';
            //echo $tempDataArr['selectedDateTime'];die;
            $tempDataArr['RegisterDate']=date('Y-m-d H:i:s');
            $this->Demo_model->add($tempDataArr);
            
            
            
            
            $this->session->set_flashdata('Message','Thanks for demo registration,Our staff will contact you shortly');
            
            redirect(base_url());
        }else{
            $this->session->set_flashdata('Message',$error_message);
            redirect(base_url().'index/free_demo');
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
        
        public function ajax_course(){
            $CategoryID=  $this->input->post('CategoryID',TRUE);
            //echo $CategoryID;die;
            $CourseDataArr=  $this->Course_model->get_by_cateory($CategoryID);
            //print_r($CourseDataArr);die;
            if(count($CourseDataArr)>0){
                $PriceDataArr=array();
                foreach($CourseDataArr AS $k){
                    $PriceDataArr[]=$k->Charges.'@'.$k->Discount;
                }
                $PriceData=  implode('^', $PriceDataArr);
                $html='<select name="CourseID" id="CourseID" class="required">
                                <option value="">*Select*</option>';
                                foreach($CourseDataArr AS $k){
                        $html.='<option value="'.$k->CourseID.'">'.$k->Title.'</option>';
                                }
                        $html.='</select>~'.$PriceData;
                echo $html;die; 
            }else{
                echo '0';die;
            }
        }
	
        private function my_unique_number($Length){
		$listAlpha = '0123456789';
		return substr(str_shuffle($listAlpha),0,$Length);
	}
        
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */