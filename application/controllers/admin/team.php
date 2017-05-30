<?php
class Team extends MY_Controller{
    private $_resize_file_array;    
	public function __construct(){
            parent::__construct();
            $this->load->model('Team_model');
            $this->_resize_file_array=array('400X400','100X100','75X75');
	}
	
	public function index(){
		redirect(base_url().'admin');
	}
	
	public function viewlist(){
		$data=$this->_show_admin_logedin_layout();
		$data['DataArr']=$this->Team_model->get_all();
		$this->load->view('admin/team_list',$data);
	}
	
	public function add(){
            if($_FILES['Banner']['name']!=""){
                $upload_path=$this->config->item('ResourcesPath').'team/';

                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '0';
                $config['max_filename'] = '255';
                $config['encrypt_name'] = TRUE;
                $config['quality'] = "30";
                $image_data = array();
                $is_file_error = FALSE;
                
                //load the preferences
                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('Banner')) {
                    //if file upload failed then catch the errors
                    $errMsg=$this->upload->display_errors();
                    $this->session->set_flashdata('Message',$errMsg);
                    redirect(base_url().'admin/team/viewlist');
                } else {
                    //store the file info
                    $image_data = $this->upload->data();
                    $is_resize_done=$this->resize_image($image_data['full_path'],$image_data['file_name']);
                }
                
                $Status=$this->input->post('Status',TRUE);

                if($is_resize_done != 1){
                    $this->session->set_flashdata('Message',$is_resize_done);
                    redirect(base_url().'admin/team/viewlist');
                }
                
                $Name=  $this->input->post("Name");
                $Desingnation=  $this->input->post("Desingnation");
                $Eamil=  $this->input->post("Email");
                $About=  $this->input->post("About");
                
                if($Name!="" && $Desingnation !="" && $About !=""){
                    $dataArr=array(
                        'Name'=>$Name,
                        'Email'=>$Eamil,
                        'Desingnation'=>$Desingnation,
                        'About'=>$About,
                        'Image'=>$image_data['file_name'],
                        'Status'=>$Status
                    );
                    //$this->delete_image($image_data['file_name']);
                    //pre($dataArr);die;
                    $this->Team_model->add($dataArr);

                    $this->session->set_flashdata('Message','Team Member added successfully.');
                    redirect(base_url().'admin/team/viewlist');	
                }else{
                
                }
            }else{
                $this->session->set_flashdata('Message','Invalid Team member Photo uploaded.');
                redirect(base_url().'admin/team/viewlist');	
            }
	}
	
	
	public function edit(){
            $EditImage=$this->input->post('EditImage',TRUE);
            //die($EditImage);
            $Status=$this->input->post('EditStatus',TRUE);
            $TeamID=$this->input->post('TeamID',TRUE);
            $image_data = array();
            if($_FILES['EditBanner']['name']!=""){    
                $upload_path=$this->config->item('ResourcesPath').'team/';
                
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '0';
                $config['max_filename'] = '255';
                $config['encrypt_name'] = TRUE;
                $config['quality'] = "30";
                
                $is_file_error = FALSE;
                
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'image_name' is the name of the input
                if (!$this->upload->do_upload('EditBanner')) {
                    //if file upload failed then catch the errors
                    $errMsg=$this->upload->display_errors();
                    $this->session->set_flashdata('Message',$errMsg);
                    redirect(base_url().'admin/team/viewlist');
                } else {
                    //store the file info
                    $image_data = $this->upload->data();
                    $is_resize_done=$this->resize_image($image_data['full_path'],$image_data['file_name']);
                }
                
                if($is_resize_done != 1){
                    $this->session->set_flashdata('Message',$is_resize_done);
                    redirect(base_url().'admin/team/viewlist');
                }
            }
            
            $Name=  $this->input->post("EditName");
            $Desingnation=  $this->input->post("EditDesingnation");
            $Eamil=  $this->input->post("EditEmail");
            $About=  $this->input->post("EditAbout");

            if($Name!="" && $Desingnation !="" && $About !=""){
                $dataArr=array(
                    'Name'=>$Name,
                    'Email'=>$Eamil,
                    'Desingnation'=>$Desingnation,
                    'About'=>$About,
                    'Status'=>$Status
                );
                if(!empty($image_data)){
                    $dataArr['Image']=$image_data['file_name'];
                    $this->delete_image($EditImage);
                }
                $this->Team_model->edit($dataArr,$TeamID);
                $this->session->set_flashdata('Message','Team Member updated successfully.');
            }else{
                //pre($_POST);die;
                $this->session->set_flashdata('Message','Plz enter all data for the Team Member for update.');
            }
            redirect(base_url().'admin/team/viewlist');
	}
	
	
	public function change_status($TeamID,$Action){
		$this->Team_model->change_status($TeamID,$Action);
		
		$this->session->set_flashdata('Message','Team Member status updated successfully.');
		redirect(base_url().'admin/team/viewlist');
	}
	
	public function delete($TeamID){
            $rs=  $this->db->get_where('team',array('TeamID'=>$TeamID))->result();
            $this->Team_model->delete($TeamID);
            $this->delete_image($rs[0]->Image);
            $this->session->set_flashdata('Message','Team Member deleted successfully.');
            redirect(base_url().'admin/team/viewlist');
	}
        
        function delete_image($file_name){
            foreach($this->_resize_file_array As $k){
                $upload_path=$this->config->item('ResourcesPath').'team/';
                @unlink($upload_path.$k.'/'.$file_name);
            }
            @unlink($upload_path.$file_name);
        }
        
        function resize_image($full_path,$file_name){
            $is_file_error=FALSE;
            foreach($this->_resize_file_array As $k){
                $upload_path=$this->config->item('ResourcesPath').'team/';
                $imagePathArr=  explode('X', $k);
                
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $full_path; //get original image
                $config2['maintain_ratio'] = TRUE;
                //$config2['create_thumb'] = TRUE;
                $config2['width'] = $imagePathArr[0];
                $config2['height'] = $imagePathArr[1];
                $config2['new_image'] = $upload_path.$k.'/'.$file_name;
                //$config['thumb_marker'] = '_thumb';
                $config2['quality'] = '100';
                //echo '<pre>';print_r($config2);//die;
                 $this->image_lib->clear(); // added this line
                 $this->image_lib->initialize($config2); // added this line
                //$this->load->library('image_lib', $config2);
                if (!$this->image_lib->resize()) {
                    $errMsg=$this->image_lib->display_errors();
                    //echo '<pre>';print_r($errMsg);
                    $is_file_error=TRUE;
                }
            }
            if($is_file_error==TRUE){
                return $errMsg;
            }else{
                return 1;
            }
        }
}
?>