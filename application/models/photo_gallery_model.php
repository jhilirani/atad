<?php
class Photo_gallery_model extends CI_Model {
	public $_table='photo_gallery';
	function __construct() {
		
	}
	
	public function get_all(){
		$this->db->select('*')->from($this->_table)->where('Status <','2');
		return $this->db->get()->result();
	}
	
	public function get_for_fe(){
		$this->db->select('*')->from($this->_table)->where('Status','1');
		return $this->db->get()->result();
	}
	
	public function add($dataArr){
		$this->db->insert($this->_table,$dataArr);
		return $this->db->insert_id();
	}
	
	public function edit($DataArr,$PhotoGalleryID){
		$this->db->where('PhotoGalleryID',$PhotoGalleryID);
		$this->db->update($this->_table,$DataArr);
		//echo $this->db->last_query();die;
		return TRUE;		
	}
	
	public function change_status($PhotoGalleryID,$Status){
		$this->db->where('PhotoGalleryID',$PhotoGalleryID);
		$this->db->update($this->_table,array('Status'=>$Status));
		return TRUE;
	}
	
	public function delete($PhotoGalleryID){
		$this->db->delete($this->_table, array('PhotoGalleryID' => $PhotoGalleryID)); 
		return TRUE;
	}
}
?>