<?php
class Video_gallery extends MY_Controller{
    private $_resize_file_array;    
	public function __construct(){
            parent::__construct();
                $this->load->model('Video_gallery_model');
            $this->load->model("Category_model");
	}
	
	public function index(){
		redirect(base_url().'admin');
	}
	
	public function viewlist(){
            $data=$this->_show_admin_logedin_layout();
            $data['DataArr']=$this->Video_gallery_model->get_all();
            $data['CaegoryDataArr']=  $this->Category_model->get_all_active();
            $this->load->view('admin/video_gallery_list',$data);
	}
	
	public function add(){
            $video_url=  $this->input->post("VideoUrl",TRUE);
            $CategoryID=$this->input->post('CategoryID',TRUE);
            $Status=  $this->input->post("Status",TRUE);
            if($video_url!="" && $Status !=""){
                $dataArr=array(
                    'Url'=>$video_url,
                    'CategoryID'=>$CategoryID,
                    'Status'=>$Status
                );

                //print_r($dataArr);die;
                $this->Video_gallery_model->add($dataArr);
                
                $this->session->set_flashdata('Message','Video Gallery added successfully.');
                redirect(base_url().'admin/video_gallery/viewlist');	
            }else{
                pre($_POST);die;
                $this->session->set_flashdata('Message','Invalid Video Gallery uploaded.');
                redirect(base_url().'admin/video_gallery/viewlist');	
            }
	}
	
	
	public function edit(){
            $video_url=  $this->input->post("EditVideoUrl",TRUE);
            $Status=  $this->input->post("EditStatus",TRUE);
            $CategoryID=$this->input->post('EditCategoryID',TRUE);
            $VideoGalleryID=  $this->input->post("VideoGalleryID",TRUE);
            if($video_url !="" && $Status !="" && $VideoGalleryID !=""){    
                $dataArr=array(
                    'Url'=>$video_url,
                    'CategoryID'=>$CategoryID,
                    'Status'=>$Status
                );

                $this->Video_gallery_model->edit($dataArr,$VideoGalleryID);
                $this->session->set_flashdata('Message','Video Gallery updated successfully.');
                redirect(base_url().'admin/video_gallery/viewlist');
            }else{
                $this->session->set_flashdata('Message','Invalid Video Gallery data uploaded.');
                redirect(base_url().'admin/video_gallery/viewlist');
            }
	}
	
	
	public function change_status($VideoGalleryID,$Action){
		$this->Video_gallery_model->change_status($VideoGalleryID,$Action);
		
		$this->session->set_flashdata('Message','Video Gallery status updated successfully.');
		redirect(base_url().'admin/video_gallery/viewlist');
	}
	
	public function delete($VideoGalleryID){
            $rs=  $this->db->get_where('video_gallery',array('VideoGalleryID'=>$VideoGalleryID))->result();
            $this->Video_gallery_model->delete($VideoGalleryID);
            $this->session->set_flashdata('Message','Vieo Gallery deleted successfully.');
            redirect(base_url().'admin/video_gallery/viewlist');
	}
}
?>