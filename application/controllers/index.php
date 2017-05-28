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
	
	public function courses(){
            
        }
        
        public function detailsof(){
            
        }
        
        public function free_demo(){
            $AllCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($AllCategory)>0){
                foreach($AllCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            $AllCategory=  $this->Category_model->get_for_course();
            $CMSDetails=$this->Cms_model->get_content_by_id(8);
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            $data['AllCategory']=$AllCategory;
            
            $tempData=$this->session->userdata('TmpDemoDataArr');
            if(!empty($tempData)){
                $TempCourseData=$this->Course_model->get_by_cateory($tempData['CategoryID']);
                //print_r($TempCourseData);die;
                $data['TempCourseData']= $TempCourseData ;
            }else{
                $data['TempCourseData']='';
            }
            
            $this->load->view('free_demo',$data);
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
        
        public function pay_online(){
            $FeaturedCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($FeaturedCategory)>0){
                foreach($FeaturedCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            $AllCategory=  $this->Category_model->get_for_course();
            
            $CMSDetails=$this->Cms_model->get_content_by_id(8);
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            $data['AllCategory']=$AllCategory;
            
            $tempData=$this->session->userdata('TmpPayDataArr');
            if(!empty($tempData)){
                $TempCourseData=$this->Course_model->get_by_cateory($tempData['CategoryID']);
                //print_r($TempCourseData);die;
                $data['TempCourseData']= $TempCourseData ;
            }else{
                $data['TempCourseData']='';
            }
            
            $this->load->view('pay_online',$data);
        }
        
        public function pay_online_from_email($str){
            if($str==''){
                redirect(base_url());
            }
            $TempPaymentInfoDetails=  $this->Order_model->get_request_details($str);
            
            $FeaturedCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($FeaturedCategory)>0){
                foreach($FeaturedCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            $AllCategory=  $this->Category_model->get_for_course();
            
            $CMSDetails=$this->Cms_model->get_content_by_id(8);
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            $data['AllCategory']=$AllCategory;
            
            $TempCourseData=$this->Course_model->get_by_cateory($TempPaymentInfoDetails['CategoryID']);
            //print_r($TempCourseData);die;
            $data['TempCourseData']= $TempCourseData ;
            $data['tempDemoSessionData']= $TempPaymentInfoDetails ;
            $this->load->view('pay_online1',$data);
        }


        public function pay_online_action(){
            $this->load->model('Order_model');
            $CategoryID         =  $this->input->post('CategoryID',TRUE);
            $CourseID           =  $this->input->post('CourseID',TRUE);
            $FirstName          =  $this->input->post('FirstName',TRUE);
            $LastName           =  $this->input->post('LastName',TRUE);
            $Email              =  $this->input->post('Email',TRUE);
            $Address            =  $this->input->post('Address',TRUE);
            $City               =  $this->input->post('City',TRUE);
            $State              =  $this->input->post('State',TRUE);
            $Zip                =  $this->input->post('Zip',TRUE);
            $Phone              =  $this->input->post('Phone',TRUE);
            $secret             =  $this->input->post('secret',TRUE);
            $CourseCharges      =  $this->input->post('CourseCharges',TRUE);
            $Discount           =  $this->input->post('Discount',TRUE);
            
            //echo '<pre>';print_r($_POST);die;
            
            $tempPayArr=array();
            $tempPayArr=array(
            'CategoryID'=>$CategoryID,
            'CourseID'=>$CourseID,
            'FirstName'=>$FirstName,
            'LastName'=>$LastName,
            'Email'=>$Email,
            'Phone'=>$Phone,
            'Address'=>$Address,
            'State'=>$State,
            'City'=>$City,
            'Zip'=>$Zip
            );
            
            
            $error=FALSE;
            $error_message='';
            if($CourseID==""){
                $error=TRUE;
                $error_message="Please select a Course for payment";
                $tempPayArr['CategoryID']="";;
                $this->session->set_userdata('TmpPayDataArr',$tempPayArr);
            }
            
            if($error==FALSE){
                    $this->session->set_userdata('TmpPayDataArr',$tempPayArr);
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
                $this->load->model('User_model');
                $this->load->model('Order_model');
                $this->session->unset_userdata('TmpPayDataArr');
                unset($tempPayArr['CategoryID']);
                $tempPayArr['RegisterData']=date('Y-m-d H:i:s');
                $UserID=$this->User_model->get_details_by_email($Email);
                // saveing user data in db
                if($UserID==0){
                    $UserDataArr=array('FirstName'=>$FirstName,'LastName'=>$LastName,'Address'=>$Address,'City'=>$City,'State'=>$State,'Zip'=>$Zip,'ContactNo'=>$Phone,'Email'=>$Email,'AddDate'=>date('Y-m-d H:i:s'));
                
                    $UserID=$this->User_model->add($UserDataArr);
                }
                // creating order
                $InvoiceNo='EL-'.$this->my_unique_number(8);
                $OrderDataArr=array('UserID'=>$UserID,'CourseID'=>$CourseID,'InvoiceNo'=>$InvoiceNo,'Amount'=>$CourseCharges,'Tax'=>'0','Discount'=>$Discount,'Total'=>($CourseCharges-$Discount),'OrderDate'=>date('Y-m-d H:i:s'),'Status'=>'0');
                $OrderID=$this->Order_model->add($OrderDataArr);
                
                $FinalAmount=$CourseCharges-$Discount;
                $OrderDetails=array();
                $OrderDetails['Title']="E-Learning Course Study Charge";
                $OrderDetails['CourseID']=$CourseID;
                $OrderDetails['Amount']=$FinalAmount;
                $OrderDetails['OrderID']=$OrderID;
                $OrderDetails['UserID']=$UserID;

                $this->session->set_userdata('OrderDetails',$OrderDetails);
                
                $request = array(
                            "PARTNER" => "PayPal",
                            "VENDOR" => "elearn",
                            "USER" => "elearn",
                            "PWD" => "Letmein10", 
                            "TRXTYPE" => "S",
                            "AMT" => $FinalAmount,
                            "CURRENCY" => "USD",
                            "CREATESECURETOKEN" => "Y",
                            "SECURETOKENID" => uniqid('MySecTokenID-'), //Should be unique, never used before
                            "RETURNURL" => base_url().'index/paypal_advanced_success',
                            "CANCELURL" => base_url().'index/paypal_fail',
                            "ERRORURL" => base_url().'index/paypal_fail',

                        // In practice you'd collect billing and shipping information with your own form,
                        // then request a secure token and display the payment iframe.
                        // --> See page 7 of https://cms.paypal.com/cms_content/US/en_US/files/developer/Embedded_Checkout_Design_Guide.pdf
                        // This example uses hardcoded values for simplicity.


                            "BILLTOFIRSTNAME" =>$FirstName,
                            "BILLTOLASTNAME" =>$LastName,
                            "BILLTOSTREET" =>$Address,
                            "BILLTOCITY" =>$City,
                            "BILLTOSTATE" =>$State,
                            "BILLTOZIP" =>$Zip,
                            "BILLTOCOUNTRY" =>"US",

                            "SHIPTOFIRSTNAME" => $FirstName,
                            "SHIPTOLASTNAME" => $LastName,
                            "SHIPTOSTREET" =>$Address,
                            "SHIPTOCITY" =>$City,
                            "SHIPTOSTATE" =>$State,
                            "SHIPTOZIP" =>$Zip,
                            "SHIPTOCOUNTRY" => "US",
                        );
                        $environment = "LIVE"; //sandbox       LIVE

                        //echo '<pre>';print_r($OrderDetails);print_r($request);die;
                        //Run request and get the secure token response
                        $response = $this->run_payflow_call($request,$environment);
                        //echo '<pre>';print_r($response);die;
                        if ($response['RESULT'] != 0) {
                                $data['Arr']=$response;
                                $data['Status']='fail';
                                $this->load->view('iframe',$data);
                        } else { 
                                $data=$this->_get_tobe_login_template();
                                //echo '<pre>';print_r($data);die;
                                $data['BannerImageData']=$this->Banner_model->get_for_fe();
                                $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);

                                $securetoken = $response['SECURETOKEN'];
                                $securetokenid = $response['SECURETOKENID'];
                                $arr=array($securetoken,$securetokenid);
                                $data['Arr']=$arr;
                                $data['Status']='pass';
                                if($environment == "sandbox" || $environment == "pilot") $mode='TEST'; else $mode='LIVE';
                                $data['Mode']=$mode;
                                $this->load->view('iframe',$data);
                        }
                
                
            }else{
                $this->session->set_flashdata('Message',$error_message);
                redirect(base_url().'index/pay_online');
            }
        }
        
        public function testimonial(){
            $AllCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($AllCategory)>0){
                foreach($AllCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            $this->load->model('Testimonial_model');
            $dataArr=$this->Testimonial_model->get_all();
            
            $data=$this->_get_tobe_login_template();
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['LeftDataArr']=$LeftDataArr;
            $data['dataArr']=$dataArr;
            
            $this->load->view('testimonial',$data);
        }


        public function online_training(){
            $AllCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($AllCategory)>0){
                foreach($AllCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            $CMSDetails=$this->Cms_model->get_content_by_id(7);
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            
            $this->load->view('cms',$data);
        }
        
        
        public function privacy_policy(){
            $AllCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($AllCategory)>0){
                foreach($AllCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            //$CMSDetails=$this->Cms_model->get_content_by_id(7);
            $CMSDetails=$this->Cms_model->get_content('privacy_policy');
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            
            $this->load->view('cms',$data);
            
        }
        
        public function about_us(){
            $AllCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($AllCategory)>0){
                foreach($AllCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            //$CMSDetails=$this->Cms_model->get_content_by_id(7);
            $CMSDetails=$this->Cms_model->get_content('about_us');
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            
            $this->load->view('cms',$data);
            
        }
        
        public function terms_conditions(){
            $AllCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($AllCategory)>0){
                foreach($AllCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            //$CMSDetails=$this->Cms_model->get_content_by_id(7);
            $CMSDetails=$this->Cms_model->get_content('terms_conditions');
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            
            $this->load->view('cms',$data);
            
        }
        
        public function job_oriented_training(){
            $AllCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($AllCategory)>0){
                foreach($AllCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            //$CMSDetails=$this->Cms_model->get_content_by_id(7);
            $CMSDetails=$this->Cms_model->get_content('job_oriented_training');
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            
            $this->load->view('cms',$data);
        }
        
        function demo_schedules(){
            $AllCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($AllCategory)>0){
                foreach($AllCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            //$CMSDetails=$this->Cms_model->get_content_by_id(7);
            $CMSDetails=$this->Cms_model->get_content('demo_schedules');
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            
            $this->load->view('cms',$data);
        }
        
        function skills(){
            $AllCategory=$this->Category_model->get_latest_3_featured();
            //echo '<pre>';print_r($AllCategory);die;
            $LeftDataArr=array();
            if(count($AllCategory)>0){
                foreach($AllCategory AS $k){
                    $CourseDataArr=  $this->Course_model->get_by_cateory($k->CategoryID);
                    $LeftDataArr[]=array('Name'=>$k->CategoryName,'CourseData'=>$CourseDataArr);
                }
            }
            
            //$CMSDetails=$this->Cms_model->get_content_by_id(7);
            $CMSDetails=$this->Cms_model->get_content('skills');
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Title']=$CMSDetails[0]->Title;
            $data['Body']=$CMSDetails[0]->Body;
            $data['LeftDataArr']=$LeftDataArr;
            
            $this->load->view('cms',$data);
        }
        
        public function contact_us(){
            $CMSDetails=$this->Cms_model->get_content_by_id(10);
            //$CMSDetails=$this->Cms_model->get_content('terms_conditions');
            //echo '<pre>';print_r($CMSDetails);die;
            $SEODataArr["MetaTitle"]=$CMSDetails[0]->MetaTitle;
            $SEODataArr["MetaKeyWord"]=$CMSDetails[0]->MetaKeyWord;
            $SEODataArr["MetaDescription"]=$CMSDetails[0]->MetaDescription;
            $data=$this->_get_tobe_login_template($SEODataArr);
            
            $data['BannerImageData']=$this->Banner_model->get_for_fe();
            $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
            $data['Body']=$CMSDetails[0]->Body;
            
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
        
        private function run_payflow_call($params,$environment='sandbox'){
	    //print_r($params);die;
	    $paramList = array();
	    foreach($params as $index => $value) {
	        $paramList[] = $index . "[" . strlen($value) . "]=" . $value;
	    }
	    
	    $apiStr = implode("&", $paramList);
	    
	    // Which endpoint will we be using?
	    if($environment == "pilot" || $environment == "sandbox")
	      $endpoint = "https://pilot-payflowpro.paypal.com/";
	    else $endpoint = "https://payflowpro.paypal.com";

	    // Initialize our cURL handle.
	    $curl = curl_init($endpoint);
	    
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	    
	    // If you get connection errors, it may be necessary to uncomment
	    // the following two lines:
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	    
	    curl_setopt($curl, CURLOPT_POST, TRUE);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $apiStr);
	    
	    $result = curl_exec($curl);
	    if($result === FALSE) {
	      echo curl_error($curl);
	      return FALSE;
	    }else{
			
			 return $this->parse_payflow_string($result);
		}
	}
	
    private function parse_payflow_string($str){
		$workstr = $str;
	    $out = array();
	    
	    while(strlen($workstr) > 0) {
	        $loc = strpos($workstr, '=');
	        if($loc === FALSE) {
	            // Truncate the rest of the string, it's not valid
	            $workstr = "";
	            continue;
	        }
	        
	        $substr = substr($workstr, 0, $loc);
	        $workstr = substr($workstr, $loc + 1); // "+1" because we need to get rid of the "="
	        
	        if(preg_match('/^(\w+)\[(\d+)]$/', $substr, $matches)) {
	            // This one has a length tag with it.  Read the number of characters
	            // specified by $matches[2].
	            $count = intval($matches[2]);
	            
	            $out[$matches[1]] = substr($workstr, 0, $count);
	            $workstr = substr($workstr, $count + 1); // "+1" because we need to get rid of the "&"
	        } else {
	            // Read up to the next "&"
	            $count = strpos($workstr, '&');
	            if($count === FALSE) { // No more "&"'s, read up to the end of the string
	                $out[$substr] = $workstr;
	                $workstr = "";
	            } else {
	                $out[$substr] = substr($workstr, 0, $count);
	                $workstr = substr($workstr, $count + 1); // "+1" because we need to get rid of the "&"
	            }
	        }
	    }
	    
	    return $out;
	}
        
    public function paypal_advanced_success(){
        //echo '<pre>';print_r($_REQUEST);die;
        $resArray=$_REQUEST;
        //if(key_exists('RESULT', $resArray) && $resArray["RESULT"]==0)
        //$this->load->model('Paypal_exp_model');
        //$resArray=$this->Paypal_exp_model->PaymentFinalize();

        //$ack = strtoupper($resArray["ACK"]);

        $retArray=array();
        /*echo '<pre>';print_r($resArray);
        if($resArray['METHOD']=='P'){
            echo '<br>Payapl';
        }else if($resArray['METHOD']=='CC'){
            echo '<br>Credit Card';
        }else{
            echo '<br>jj';
        }
        die;*/
        //if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" ){
        if(key_exists('RESULT', $resArray) && $resArray["RESULT"]==0){    
            $OrderDetails=$this->session->userdata('OrderDetails');
            if($resArray['METHOD']=='P'){
                $PayapalDataArr=array(
                'PaypalToken'=>$resArray["TOKEN"],
                'PayPalPayerID'=>$resArray["PAYERID"],
                'PayPalTransactionID'=>$resArray['PNREF'],
                'PayPalTrasactionType'=>$resArray['METHOD'],
                'PayPalOrderTime'=>$resArray['TRANSTIME'],
                'PayPalAmt'=>$resArray['AMT'],
                //'PayPalFeeCharges'=>$resArray['PAYMENTINFO_0_FEEAMT'],
                //'PapalSettleAmount'=>$resArray['TAX'],
                'PayPalTaxAmount'=>$resArray['TAX']
                //'PaypalPaymentStatus'=>$resArray['PAYMENTINFO_0_PAYMENTSTATUS'],
                //'PaypalPendingReason'=>$resArray['PAYMENTINFO_0_PENDINGREASON'],
                //'PayPalReasonCode'=>$resArray['PAYMENTINFO_0_REASONCODE']
                );
            }else if($resArray['METHOD']=='CC'){
                $PayapalDataArr=array(
                'PaypalToken'=>$resArray["SECURETOKEN"], //$this->session->userdata('token'),
                //'PayPalPayerID'=>$this->session->userdata('PayerID'),
                'PayPalTransactionID'=> $resArray['PNREF'],
                'PayPalTrasactionType'=>$resArray['METHOD'],
                'PayPalOrderTime'=>$resArray['TRANSTIME'],
                'PayPalAmt'=>$resArray['AMT'],
                //'PayPalFeeCharges'=>$resArray['PAYMENTINFO_0_FEEAMT'],
                'PapalSettleAmount'=>$resArray['TAX'],
                //'PayPalTaxAmount'=>$resArray['PAYMENTINFO_0_TRANSACTIONTYPE'],
                'PaypalPaymentStatus'=>$resArray['AUTHCODE']
                //'PaypalPendingReason'=>$resArray['PAYMENTINFO_0_PENDINGREASON'],
                //'PayPalReasonCode'=>$resArray['PAYMENTINFO_0_REASONCODE']
                );
            }
            $this->load->model('Order_model');
            //echo '<pre>';print_r($PayapalDataArr);die;
            $PaypalDataID=$this->Order_model->add_paypal_data($PayapalDataArr);
            $OrderID=$OrderDetails['OrderID'];
            //echo '$OrderID :- '.$OrderID;die;
            //$this->Order_model->update_status(1,$OrderID);
            $OrderUpdateArr=array('PaymentDate'=>date('Y-m-d H:i:s'),'PaypalID'=>$PaypalDataID,'Status'=>'1');
            $this->Order_model->edit($OrderID,$OrderUpdateArr);

            /// email confirmationto user about the order.
            //echo '$OrderID :- '.$OrderID;
            /*$this->load->library('email');

            $OrderDetailsForMail=$this->Order_model->details($OrderID);

            //$this->email->from('no-reply@daily-plaza.com', 'Daily Plaza Administrator');
            $to=$OrderDetailsForMail[0]->Email;
            $to_name=$OrderDetailsForMail[0]->FirstName.' '.$OrderDetailsForMail[0]->LastName;
            if($to=="")
            {
                    echo '<pre>';print_r($OrderDetailsForMail);
                    die('not to');
            }
            //echo $to;die;
            //$this->email->to($to);
            $this->email->from('breehal@gmail.com', 'Daily Plaza Administrator');
            //$this->email->to('judhisahoo@gmail.com','judhisthia sahoo');
            $this->email->to($to,$to_name);

            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');

            $this->email->subject('Order Confirmation information from Daily Plaza.');

            $msg=$this->user_order_confirmation_mail($OrderID);
            //echo $msg;die;
            //$msg1='Hi TEst';
            $this->email->message($msg);

            $this->email->send();
                    //echo 'ssucess';
            //}else{
            //echo $this->email->print_debugger();
            //}
            //die('client mail had sent');
            ////message to admin.
            $this->load->model('Siteconfig_model');
            $AdminEmail=$this->Siteconfig_model->get_value_by_name('AdminMail');

            $this->email->from('breehal@gmail.com', 'Daily Plaza Administrator');
            $this->email->to($AdminEmail,'Admin Email');

            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');

            $this->email->subject('A new order has been placed.');
            $msg=$this->admin_order_confirmation_mail($OrderID);
            $this->email->message($msg);

            $this->email->send();
            //$this->session->set_userdata('PaymentThanksPageOrderID',$OrderID);
            //redirect(BASE_URL.'payment/thanks');

            */
            if($resArray["METHOD"]=='CC'){
                $data=array();
                $data["ReferenceNumber"]=$resArray["PPREF"];
                //$data["AuthoCode"]=$resArray["AUTHCODE"];
                $this->session->unset_userdata('OrderDetails');
                $this->load->view('payapl_advanced_success',$data);
            }else{
                //$this->session->set_userdata('PaymentThanksPageOrderID',$OrderID);
                redirect(base_url().'index/thanks');
            }
        }  else {
            //$this->paypal_fail('error');
            $OrderDetails=$this->session->userdata('OrderDetails');
            $OrderID=$OrderDetails['OrderID'];
            //echo '$OrderID : '.$OrderID;die;
            $this->Order_model->remove_order($OrderID);

            $this->session->unset_userdata('OrderDetails');
            $msg='Sorry error arise to process your order,Please try again.';
            echo $msg;die;
        }
    }
    
    
    public function thanks(){
        $this->load->model('Order_model');
        $OrderDetails=$this->session->userdata('OrderDetails');
        $OrderID=$OrderDetails['OrderID'];
        $TransactionID=$this->Order_model->get_paypal_transaction_id($OrderID);
        
        $data=$this->_get_tobe_login_template();

        $data['BannerImageData']=$this->Banner_model->get_for_fe();
        $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
        
        $data["TransactionID"]=$TransactionID;
        $this->session->unset_userdata('OrderDetails');
        $this->load->view('success',$data);
    }
    
    public function paypal_fail(){
        $this->load->model('Order_model');
        //echo '<pre>';print_r($_REQUEST);print_r($_SESSION);die;
        $OrderDetails=$this->session->userdata('OrderDetails');
        //echo '$OrderID : '.$OrderID;die;
        $this->Order_model->remove_order($OrderDetails['OrderID']);

        $msg='You havecancel order in paypal,So all data related to this order has been removed.You can start a new order from product list.';
        
        $this->session->unset_userdata('OrderDetails');
        
        $data=$this->_get_tobe_login_template();
        $data['BannerImageData']=$this->Banner_model->get_for_fe();
        $data['HomePageSlider']=$this->load->view('home_page_slider',$data,TRUE);
        
        $data["msg"]=$msg;
        $this->load->view('fail',$data);
    }
    
    public function demo_request_mail(){
        $content='<div style="width:900px;float:none;margin:0 auto;padding:0px;overflow:hidden;background:#FFF;" >
  <div align="center" style="width:92%;float:none;margin:0 auto; height:138px; background-image:url(http://e-learningforyou.com/resources/images/logo_bg.png); background-repeat:no-repeat;-webkit-border-top-left-radius: 10px;
-webkit-border-top-right-radius: 10px;
-moz-border-radius-topleft: 10px;
-moz-border-radius-topright: 10px;
border-top-left-radius: 10px;
border-top-right-radius: 10px;">
    <div style="width:226px;color:#FFF;line-height:24px;font-size:21px;font-weight:normal; float:right; padding-top:50px;" >Free Demo Request</div>
  </div>
  <div style="clear:both;"></div>
  <div style="width:90%;float:none;margin:0 auto;background:#F2F2F2;overflow:hidden;padding:10px;" >
    <div style="width:90%;float:left;margin:0 auto;border-bottom:1px solid #cccccc;color:#5A5A5A;line-height:17px;font-size:12px;padding-bottom:10px;font-weight:normal;">Thanks you for place Free Demo request with us,Your request details as bellow.</div>
    <div style="clear:both;"></div>
    <div style="float:left;margin:20px auto 0 auto;width:90%;color:#797979;border-bottom:1px solid #cccccc;line-height:17px;font-size:21px;font-weight:normal;" ><div style="width:100%;float:left;margin:0 auto;border-bottom:1px solid #cccccc;color:#797979;line-height:17px;font-size:12px;padding-bottom:10px;font-weight:normal;"> &ensp; </div>
      <div style="clear:both;"></div>
      <br />
      <table width="90%" border="0" style="color:#222222;line-height:17px;font-size:13px;margin:0;padding:0px;font-weight:normal;">
          <tr>
            <td width="23%"><strong>Selected Course Type :</strong></td>
            <td width="31%">Dummy Type</td>
             <td><strong>Address :</strong></td>
            <td width="27%">dummy text</td>
          </tr>
          <tr>
            <td><strong>Select Course :</strong></td>
            <td width="31%">Dummy Course</td>
            <td width="19%"><strong>City :</strong></td>
            <td width="27%">dummy town</td>
          </tr>
          <tr>
            <td><strong>Select datetime for demo :</strong></td>
            <td width="31%">7th-May-2014</td>
            <td width="19%"><strong>State :</strong></td>
            <td width="27%">dummy </td>
          </tr>
          <tr>
            <td><strong>First Name :</strong></td>
            <td width="31%">dummy</td>
            <td width="19%"><strong>Zip: </strong></td>
            <td width="27%">700075</td>
          </tr>
          <tr>
            <td><strong>Last Name :</strong></td>
            <td width="31%">Text</td>
            <td width="19%"><strong>Phone :</strong></td>
            <td width="27%">1458963270</td>
          </tr>
          <tr>
            <td><strong>E-mail :</strong></td>
            <td width="31%">dummy@text.com</td>
            <td width="19%">&nbsp;</td>
            <td width="27%">&nbsp;</td>
          </tr>
          
        </table>

      
      
      <div style="clear:both;"></div>
       
      <br />
    </div>
   
    <div style="clear:both;"></div>
    <br />
    <div style="width:100%;float:none;margin:0 -10px -10px;padding:10px;overflow:hidden;background-image:url(http://e-learningforyou.com/resources/images/footer-bg.png); background-repeat:repeat-x; margin-bottom:-10px; height:auto;">
      <div style="color:#FFF;width:40%;float:left;line-height:17px;font-size:13px;margin:10px 30px;padding:9px 0px;font-weight:normal;">Â© 2014 e-learningforyou.com | All rights reserved.</div>
      <div style="color:#FFF;width:25%;float:right;line-height:17px;font-size:11px;margin:10px 0;padding:9px 0px;font-weight:normal;"> <a style="padding:0 8px; color:#FFF;" href="http://e-learningforyou.com/index/privacy_policy" target="_blank" rel="nofollow"> Privacy Policy</a> | <a style="padding:0 8px;  color:#FFF;" href="http://e-learningforyou.com/index/faq" target="_blank" rel="nofollow">FAQs</a></div>
    </div>
  </div>
</div>';
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */