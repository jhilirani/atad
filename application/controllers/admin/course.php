<?php
class Course extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Course_model');
		$this->load->model('Category_model');
	}
	
	public function index(){
		redirect(base_url().'admin');
	}
	
	public function viewlist(){
		$data=$this->_show_admin_logedin_layout();
		$data['ckeditor'] = array(
			//ID of the textarea that will be replaced
			'id' 	=> 	'Description',
			'path'	=>	$this->config->item('SiteJSURL').'ckeditor',
			'judhipath'	=>	$this->config->item('SiteJSURL'),
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"120%",	//Setting a custom width
				'height' 	=> 	'250px',	//Setting a custom height
			),
			//Replacing styles from the "Styles tool"
			'styles' => array(
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)
			)
		);
		$data['CategoryData']=$this->Category_model->get_for_course();
		$data['DataArr']=$this->Course_model->get_all();
		$this->load->view('admin/course_list',$data);
	}
	
	public function add(){
		$CategoryID=$this->input->post('CategoryID',TRUE);
		$Title=$this->input->post('Title',TRUE);
		$Description=$this->input->post('Description',TRUE);
		$Charges=$this->input->post('Charges',TRUE);
		$Duration=$this->input->post('Duration',TRUE);
		$MetaTitle=$this->input->post('MetaTitle',TRUE);
		$MetaKeyWord=$this->input->post('MetaKeyWord',TRUE);
		$MetaDescription=$this->input->post('MetaDescription',TRUE);
		$Status=$this->input->post('Status',TRUE);
		
		
		$dataArr=array(
		'CategoryID'=>$CategoryID,
		'Title'=>$Title,
		'Description'=>$Description,
		'Charges'=>$Charges,
		'Duration'=>$Duration,
		'MetaTitle'=>$MetaTitle,
		'MetaKeyWord'=>$MetaKeyWord,
		'MetaDescription'=>$MetaDescription,
		'Status'=>$Status
		);
		
		//print_r($dataArr);die;
		$this->Course_model->add($dataArr);
		
		$this->session->set_flashdata('Message','Course added successfully.');
		redirect(base_url().'admin/course/viewlist');
	}
	
	public function view_edit($CourseID=0){
		if($CourseID==0){
			$this->session->set_flashdata('Message','Invalid Course selected,Please try again.');
			redirect(base_url().'admin/course/viewlist');
		}else{
			$data=$this->_show_admin_logedin_layout();
			$data['ckeditor'] = array(
				//ID of the textarea that will be replaced
				'id' 	=> 	'Description',
				'path'	=>	$this->config->item('SiteJSURL').'ckeditor',
				'judhipath'	=>	$this->config->item('SiteJSURL'),
				//Optionnal values
				'config' => array(
					'toolbar' 	=> 	"Full", 	//Using the Full toolbar
					'width' 	=> 	"120%",	//Setting a custom width
					'height' 	=> 	'250px',	//Setting a custom height
				),
				//Replacing styles from the "Styles tool"
				'styles' => array(
					//Creating a new style named "style 1"
					'style 1' => array (
						'name' 		=> 	'Blue Title',
						'element' 	=> 	'h2',
						'styles' => array(
							'color' 	=> 	'Blue',
							'font-weight' 	=> 	'bold'
						)
					),
					//Creating a new style named "style 2"
					'style 2' => array (
						'name' 	=> 	'Red Title',
						'element' 	=> 	'h2',
						'styles' => array(
							'color' 		=> 	'Red',
							'font-weight' 		=> 	'bold',
							'text-decoration'	=> 	'underline'
						)
					)
				)
			);
			$data['CategoryData']=$this->Category_model->get_for_course();
			$data['dataArr']=$this->Course_model->get_details_by_id($CourseID);
			$this->load->view('admin/course_edit',$data);
		}
	}
	
	public function edit(){
		$CategoryID=$this->input->post('CategoryID',TRUE);
		$CourseID=$this->input->post('CourseID',TRUE);
		$Title=$this->input->post('Title',TRUE);
		$Description=$this->input->post('Description',TRUE);
		$Charges=$this->input->post('Charges',TRUE);
		$Duration=$this->input->post('Duration',TRUE);
		$MetaTitle=$this->input->post('MetaTitle',TRUE);
		$MetaKeyWord=$this->input->post('MetaKeyWord',TRUE);
		$MetaDescription=$this->input->post('MetaDescription',TRUE);
		$Status=$this->input->post('Status',TRUE);
		
		
		$dataArr=array(
		'CategoryID'=>$CategoryID,
		'Title'=>$Title,
		'Description'=>$Description,
		'Charges'=>$Charges,
		'Duration'=>$Duration,
		'MetaTitle'=>$MetaTitle,
		'MetaKeyWord'=>$MetaKeyWord,
		'MetaDescription'=>$MetaDescription,
		'Status'=>$Status
		);
		
		//print_r($dataArr);die;
		$this->Course_model->edit($dataArr,$CourseID);
		
		$this->session->set_flashdata('Message','Course updated successfully.');
		redirect(base_url().'admin/course/viewlist');
	}
	
	
	public function change_status($CourseID,$Action){
		$this->Course_model->change_status($CourseID,$Action);
		
		$this->session->set_flashdata('Message','Course status updated successfully.');
		redirect(base_url().'admin/course/viewlist');
	}
	
	public function delete($CourseID){
		$this->Course_model->delete($CourseID);
		
		$this->session->set_flashdata('Message','Course deleted successfully.');
		redirect(base_url().'admin/course/viewlist');
	}
	
	public function test(){
		
	}
        
        public function show_hide_to_home($CourseID,$action){
            $ret=$this->Course_model->show_hide_to_home($CourseID,$action);
            $this->session->set_flashdata('Message','Course Home page state changed successfully.');
            redirect(base_url().'admin/course/viewlist');
        }
}
?>