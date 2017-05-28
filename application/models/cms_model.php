<?php
class Cms_model extends CI_Model {
	public $_table='cms';
	function __construct() {
		parent::__construct();
	}
	
	function get_all(){
		$this->db->select('*')->from($this->_table);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function add($dataArr){
		$this->db->insert($this->_table,$dataArr);
		return $this->db->insert_id();
	}
	
	public function edit($DataArr,$CMSID){
		$this->db->where('CMSID',$CMSID);
		$this->db->update($this->_table,$DataArr);
		//echo $this->db->last_query();die;
		return TRUE;		
	}
	
	public function get_content_by_id($CMSID){
		$this->db->select('*')->from($this->_table)->where('CMSID',$CMSID);
		return $this->db->get()->result();
	}
	
	public function change_status($CMSID,$Status){
		$this->db->where('CMSID',$CMSID);
		$this->db->update($this->_table,array('Status'=>$Status));
		return TRUE;
	}
	
	public function delete($CMSID){
		$this->db->delete($this->_table, array('CMSID' => $CMSID)); 
		return TRUE;
	}
	
	public function get_content($string){
		$funIdArr=array(
		'job_oriented_training'=>2,
		'demo_schedules'=>3,
		'skills'=>4,
		'terms_conditions'=>5,
		'privacy_policy'=>6,
                'about_us'=>11    
		);
		return $this->get_content_by_id($funIdArr[$string]);
	}
}
?>