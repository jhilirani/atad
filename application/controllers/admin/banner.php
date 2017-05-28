<?php
class Banner extends MY_Controller{
    private $_resize_file_array;    
	public function __construct(){
            parent::__construct();
            $this->load->model('Banner_model');
            $this->_resize_file_array=array('75X75');
	}
	
	public function index(){
            redirect(base_url().'admin');
	}
	
	public function viewlist(){
            $data=$this->_show_admin_logedin_layout();
            $data['DataArr']=$this->Banner_model->get_all();
            $this->load->view('admin/banner_list',$data);
	}
	
	public function add(){
            if($_FILES['Banner']['name']!=""){
                $upload_path=$this->config->item('ResourcesPath').'banner/';
                
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
                    redirect(base_url().'admin/banner/viewlist');
                }else{
                    $image_data = $this->upload->data();
                    $is_resize_done=$this->resize_image($image_data['full_path'],$image_data['file_name']);
                }    
                $Status=$this->input->post('Status',TRUE);
                $Caption=$this->input->post('Caption',TRUE);
                if($is_resize_done != 1){
                    $this->session->set_flashdata('Message',$is_resize_done);
                    redirect(base_url().'admin/banner/viewlist');
                }
                $dataArr=array(
                'Image'=>$image_data['file_name'],
                'Status'=>$Status,
                'Caption'=>$Caption
                );

                //print_r($dataArr);die;
                $this->Banner_model->add($dataArr);

                $this->session->set_flashdata('Message','Banner added successfully.');
                redirect(base_url().'admin/banner/viewlist');	
            }else{
                $this->session->set_flashdata('Message','Invalid Banner uploaded.');
                redirect(base_url().'admin/banner/viewlist');	
            }
	}
	
	
	public function edit(){
            $EditImage=$this->input->post('EditImage',TRUE);
            $EditCaption=$this->input->post('EditCaption',TRUE);
            $Status=$this->input->post('EditStatus',TRUE);
            $BannerID=$this->input->post('BannerID',TRUE);
            $image_data = array();
            if($_FILES['EditBanner']['name']!=""){
                $upload_path=$this->config->item('ResourcesPath').'banner/';
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '0';
                $config['max_filename'] = '255';
                $config['encrypt_name'] = TRUE;
                $config['quality'] = "30";
                
                $is_file_error = FALSE;
                
                //load the preferences
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('EditBanner')) {
                    //if file upload failed then catch the errors
                    $errMsg=$this->upload->display_errors();
                    $this->session->set_flashdata('Message',$errMsg);
                    redirect(base_url().'admin/banner/viewlist');
                } else {
                    //store the file info
                    $image_data = $this->upload->data();
                    $is_resize_done=$this->resize_image($image_data['full_path'],$image_data['file_name']);
                }
                
                if($is_resize_done != 1){
                    $this->session->set_flashdata('Message',$is_resize_done);
                    redirect(base_url().'admin/banner/viewlist');
                }
            }
            
            if(!empty($image_data)){
                $dataArr['Image']=$image_data['file_name'];
                $this->delete_image($EditImage);
            }
            
            if($EditCaption!=""){
                $dataArr['Caption']=$EditCaption;
            }
            
            $dataArr['Status']=$Status;

            //print_r($BannerID);die;

            $this->Banner_model->edit($dataArr,$BannerID);

            $this->session->set_flashdata('Message','Banner updated successfully.');
            redirect(base_url().'admin/banner/viewlist');
	}
	
	
	public function change_status($BannerID,$Action){
		$this->Banner_model->change_status($BannerID,$Action);
		
		$this->session->set_flashdata('Message','Banner status updated successfully.');
		redirect(base_url().'admin/banner/viewlist');
	}
	
	public function delete($BannerID){
            $rs=  $this->db->get_where('banner',array('BannerID'=>$BannerID))->result();
            $this->Banner_model->delete($BannerID);
            $this->delete_image($rs[0]->Image);
            $this->session->set_flashdata('Message','Banner deleted successfully.');
            redirect(base_url().'admin/banner/viewlist');
	}
        
        function delete_image($file_name){
            foreach($this->_resize_file_array As $k){
                $upload_path=$this->config->item('ResourcesPath').'banner/';
                @unlink($upload_path.$k.'/'.$file_name);
            }
            @unlink($upload_path.$file_name);
        }
        
        function resize_image($full_path,$file_name){
            $is_file_error=FALSE;
            foreach($this->_resize_file_array As $k){
                $upload_path=$this->config->item('ResourcesPath').'banner/';
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