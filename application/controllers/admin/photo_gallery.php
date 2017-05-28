<?php
class Photo_gallery extends MY_Controller{
    private $_resize_file_array;    
	public function __construct(){
            parent::__construct();
            $this->load->model('Photo_gallery_model');
            $this->_resize_file_array=array('200X200','150X150','100X100','75X75');
            $this->load->model("Category_model");
	}
	
	public function index(){
		redirect(base_url().'admin');
	}
	
	public function viewlist(){
		$data=$this->_show_admin_logedin_layout();
		$data['DataArr']=$this->Photo_gallery_model->get_all();
                $data['CaegoryDataArr']=  $this->Category_model->get_all_active();
		$this->load->view('admin/photo_gallery_list',$data);
	}
	
	public function add(){
            if($_FILES['Banner']['name']!=""){
                $upload_path=$this->config->item('ResourcesPath').'photo_gallery/';

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
                    redirect(base_url().'admin/photo_gallery/viewlist');
                } else {
                    //store the file info
                    $image_data = $this->upload->data();
                    $is_resize_done=$this->resize_image($image_data['full_path'],$image_data['file_name']);
                }
                
                $Status=$this->input->post('Status',TRUE);
                $CategoryID=$this->input->post('CategoryID',TRUE);

                if($is_resize_done != 1){
                    $this->session->set_flashdata('Message',$is_resize_done);
                    redirect(base_url().'admin/photo_gallery/viewlist');
                }
                
                $dataArr=array(
                    'Image'=>$image_data['file_name'],
                    'CategoryID'=>$CategoryID,
                    'Status'=>$Status
                );

                //print_r($dataArr);die;
                $this->Photo_gallery_model->add($dataArr);

                $this->session->set_flashdata('Message','Photo Galleryadded successfully.');
                redirect(base_url().'admin/photo_gallery/viewlist');	
            }else{
                $this->session->set_flashdata('Message','Invalid Photo Galleryuploaded.');
                redirect(base_url().'admin/photo_gallery/viewlist');	
            }
	}
	
	
	public function edit(){
            $EditImage=$this->input->post('EditImage',TRUE);
            //die($EditImage);
            $Status=$this->input->post('EditStatus',TRUE);
            $CategoryID=$this->input->post('EditCategoryID',TRUE);
            $PhotoGalleryID=$this->input->post('PhotoGalleryID',TRUE);
            $image_data = array();
            if($_FILES['EditBanner']['name']!=""){    
                $upload_path=$this->config->item('ResourcesPath').'photo_gallery/';
                
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
                    redirect(base_url().'admin/photo_gallery/viewlist');
                } else {
                    //store the file info
                    $image_data = $this->upload->data();
                    $is_resize_done=$this->resize_image($image_data['full_path'],$image_data['file_name']);
                }
                
                if($is_resize_done != 1){
                    $this->session->set_flashdata('Message',$is_resize_done);
                    redirect(base_url().'admin/photo_gallery/viewlist');
                }
                
                

                
            }
            /*else{
                $this->session->set_flashdata('Message','Invalid Photo Galleryuploaded.');
                redirect(base_url().'admin/photo_gallery/viewlist');
            }*/
            $dataArr=array(
                'Status'=>$Status,
                'CategoryID'=>$CategoryID
                );
            if(!empty($image_data)){
                $dataArr['Image']=$image_data['file_name'];
                $this->delete_image($EditImage);
            }
            
            $this->Photo_gallery_model->edit($dataArr,$PhotoGalleryID);
            $this->session->set_flashdata('Message','Photo Galleryupdated successfully.');
            redirect(base_url().'admin/photo_gallery/viewlist');
	}
	
	
	public function change_status($PhotoGalleryID,$Action){
		$this->Photo_gallery_model->change_status($PhotoGalleryID,$Action);
		
		$this->session->set_flashdata('Message','Photo Gallerystatus updated successfully.');
		redirect(base_url().'admin/photo_gallery/viewlist');
	}
	
	public function delete($PhotoGalleryID){
            $rs=  $this->db->get_where('photo_gallery',array('PhotoGalleryID'=>$PhotoGalleryID))->result();
            $this->Photo_gallery_model->delete($PhotoGalleryID);
            $this->delete_image($rs[0]->Image);
            $this->session->set_flashdata('Message','Photo Gallerydeleted successfully.');
            redirect(base_url().'admin/photo_gallery/viewlist');
	}
        
        function delete_image($file_name){
            foreach($this->_resize_file_array As $k){
                $upload_path=$this->config->item('ResourcesPath').'photo_gallery/';
                @unlink($upload_path.$k.'/'.$file_name);
            }
            @unlink($upload_path.$file_name);
        }
        
        function resize_image($full_path,$file_name){
            $is_file_error=FALSE;
            foreach($this->_resize_file_array As $k){
                $upload_path=$this->config->item('ResourcesPath').'photo_gallery/';
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