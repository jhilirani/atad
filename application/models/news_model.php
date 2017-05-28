<?php
class News_model extends CI_Model {
	public $_table='news';
	function __construct() {
		
	}
	
	function get_all_admin(){
            return $this->db->get($this->_table)->result();
	}
	
	function get_all(){
            $this->db->select('*')->from($this->_table)->where('Status','1')->order_by('NewsID','DESC');
            return $this->db->get()->result();
            //echo $this->db->last_query();die;
	}
	
	public function add($dataArr){
		$this->db->insert($this->_table,$dataArr);
		return $this->db->insert_id();
	}
	
	public function get_details_by_id($NewsID){
		$this->db->select('*')->from($this->_table)->like('NewsID',$NewsID);
		return $this->db->get()->result();
	}
	
	public function edit($DataArr,$NewsID){
		$this->db->where('NewsID',$NewsID);
		$this->db->update($this->_table,$DataArr);
		//echo $this->db->last_query();die;
		return TRUE;		
	}
	
	public function delete($NewsID){
		$this->db->delete($this->_table, array('NewsID' => $NewsID)); 
		return TRUE;
	}
}
?>