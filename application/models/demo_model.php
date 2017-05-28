<?php
class Demo_model extends CI_Model {
	public $_table='demo';
	
	public $result=NULL;
	
	function __construct() {
		
	}
	
	public function get_all(){
            $sql="SELECT d.*,c.Title FROM demo AS d JOIN course AS c ON(d.CourseID=c.CourseID) ORDER BY d.DemoID DESC";
            return $this->db->query($sql)->result();
	}
	
	
	public function add($dataArr){
		$this->db->insert($this->_table,$dataArr);
		return $this->db->insert_id();
	}
	
	public function edit($DemoID,$DataArr){
                $this->db->where('DemoID',$DemoID);
		$this->db->update($this->_table,$DataArr);
		return TRUE;
	}
	
	public function checkDemo($Email,$IP){
            return $this->db->from($this->_table)->where('Email',$Email)->or_where('IP',$IP)->get()->result();
        }
        
        public function delete($id){
            $this->db->delete($this->_table, array('DemoID' => $id)); 
            return TRUE;
        }
        
        
}
?>