<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller{
	public $CurrentLang='';
	public function __construct(){
		parent::__construct();
		//$this->CurrentLang=$this->session->userdata('site_lang');
		//$this->lang->load('a_user_manager',$this->CurrentLang);
		//$this->lang->load('valid_login',$this->CurrentLang);
		$this->load->model('User_model');
	}
	
	public function Index(){
		
	}
	public function login(){
		$UserName=$this->input->post('UserName',TRUE);
		$Password=$this->input->post('Password',TRUE);
		
		if($UserName=='' || $Password==''){
			$this->session->set_flashdata('Message',$this->lang->line('BLANK_EMAIL_VALIDATION_MSG'));
			redirect(base_url().'index','location');
		}
		
		$dataArr=$this->User_model->check_login_data($UserName,$Password);
		if(count($dataArr)>0){
			$this->session->set_userdata('FE_SESSION_VAR',$dataArr[0]->UserID);
			$this->session->set_userdata('FE_SESSION_USERNAME_VAR',$UserName);
			$this->session->set_userdata('FE_SESSION_USER_EMAIL_VAR',$UserName);
			$this->session->set_userdata('FE_SESSION_USER_SiteNickName_VAR',$dataArr[0]->SiteNickName);
			$this->session->set_userdata('FE_SESSION_USER_PROFILE_IMG_VAR',$dataArr[0]->Image);
			$this->session->set_userdata('FE_SESSION_VAR_PASSWORD',base64_encode($Password));
			$this->session->set_userdata('FE_SESSION_VAR_TYPE',$dataArr[0]->UserTypeID);
			
			$this->session->set_flashdata('Message',$this->lang->line('LOGIN_SUCCESS_MSG'));
			 redirect(base_url().'my_account', 'local');
		}else{
			$this->session->set_flashdata('Message',$this->lang->line('LOGIN_FAIL_MSG'));
			$data=$this->_get_tobe_login_template();
		
			$data['SiteImagesURL']=$this->config->item('SiteImagesURL');
			$data['SiteCSSURL']=$this->config->item('SiteCSSURL');
			$data['SiteJSURL']=$this->config->item('SiteJSURL');
			$data['SiteResourcesURL']=$this->config->item('SiteResourcesURL');
			
			$this->load->view('login',$data);
		}
		
	}
	
	public function register(){
		
		$UserName=$this->input->post('UserName',TRUE);
		$Password=$this->input->post('Password',TRUE);
		$FirstName=$this->input->post('FirstName',TRUE);
		$LastName=$this->input->post('LastName',TRUE);
		$SiteNickName=$this->input->post('SiteNickName',TRUE);
		$UserType=$this->input->post('UserType',TRUE);
		$secret=$this->input->post('secret',TRUE);
		$error=FALSE;
		$error_message='';
		if($UserName==''){
			$error=TRUE;
			$error_message='BLANK_EMAIL_VALIDATION_MSG';
		}
		
		if($error==FALSE){
			if($_COOKIE['secret']!=$secret){
				$error=TRUE;
				$error_message='INVALID_SECURE_CODE';
			}
		}
		
		if($error==FALSE){
			if($this->User_model->check_username_exists($UserName)==TRUE){
				$error=TRUE;
				$error_message='EMAIL_ALREADY_EXIST_VALIDATION_MSG';
			}
		}
		
		if($error==FALSE){
			$dataArr=array('Email'=>$UserName,'Password'=>base64_encode($Password),'FName'=>$FirstName,'LName'=>$LastName,'UserTypeID'=>$UserType,'AddDate'=>date('Y-m-d H:i:s'),'SiteNickName'=>$SiteNickName);
			$NewUserID=$this->User_model->add_user($dataArr);
			
			$this->session->set_userdata('FE_SESSION_VAR',$NewUserID);
			$this->session->set_userdata('FE_SESSION_USERNAME_VAR',$UserName);
			$this->session->set_userdata('FE_SESSION_USER_EMAIL_VAR',$UserName);
			$this->session->set_userdata('FE_SESSION_USER_SiteNickName_VAR',$SiteNickName);
			$this->session->set_userdata('FE_SESSION_USER_PROFILE_IMG_VAR','');
			$this->session->set_userdata('FE_SESSION_VAR_PASSWORD',base64_encode($Password));
			$this->session->set_userdata('FE_SESSION_VAR_TYPE',$UserType);
			
			$this->session->set_flashdata('Message',$this->lang->line('REGISTERATION_SUCC_MSG'));
			redirect(base_url().'my_account','location');
		}else{
			$this->session->set_flashdata('Message',$this->lang->line($error_message));
			$data=$this->_get_tobe_login_template();
		
			$data['SiteImagesURL']=$this->config->item('SiteImagesURL');
			$data['SiteCSSURL']=$this->config->item('SiteCSSURL');
			$data['SiteJSURL']=$this->config->item('SiteJSURL');
			$data['SiteResourcesURL']=$this->config->item('SiteResourcesURL');
			
			$this->load->view('register',$data);
		}
		
	}
	
	public function logout(){
		$this->_logout();
		redirect(base_url());
	}
	
	public function show_login(){
		
	}
	
	public function show_register(){
		
	}
        
        
        public function contact_us_action(){
            $Email=$this->input->post('Email',TRUE);
            $Name=$this->input->post('Name',TRUE);
            $Phone=$this->input->post('Phone',TRUE);
            $Message=$this->input->post('Message',TRUE);
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
                $dataArr=array('Name'=>$Name,'Email'=>$Email,'Phone'=>$Phone,'Message'=>$Message,'ContactedDate'=>date('Y-m-d H:i:s'));
                
                $this->User_model->post_contact($dataArr);
                $this->session->set_flashdata('Message',"Thanks you for contacting us,Our staff will get back to you shortly.");
                redirect(base_url());
            }else{
                $this->session->set_flashdata('Message',$error_message);
                redirect(base_url().'index/contact_us');
            }
        }
        
    function search_student(){
        $searchData=  $this->input->post("search");
        if($searchData==""){
            echo '';die;
        }else{
            // search for name;
            $data=array();
            $sql="SELECT * FROM (`student`) WHERE `card` = '$searchData' OR `belt` = '$searchData' OR `name` LIKE '%$searchData%'";
            //$this->db->where('card',$searchData)->or_where('belt',  strtolower($searchData))->or_like('name',$searchData);
            $rs=  $this->db->query($sql)->result();
            //echo $this->db->last_query();die;
            if(count($rs)==0){
                echo '';die;
            }else{
                $data['rs']=$rs;
                $data['searchData']=$searchData;
                //pre($data);die;
                $this->load->view('student_search',$data);
            }
        }
    }    
}