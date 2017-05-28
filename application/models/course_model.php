<?php
class Course_model extends CI_Model {
	public $_table='course';
	function __construct() {
	}
	
	public function get_all(){
		$this->db->select('*')->from($this->_table)->where('Status <','2');
		return $this->db->get()->result();
	}
	
	public function get_all_course(){
		$this->db->select('*')->from($this->_table)->where('Status','1');
		return $this->db->get()->result();
	}
	
	public function add($dataArr){
		$this->db->insert($this->_table,$dataArr);
		return $this->db->insert_id();
	}
	
	public function edit($DataArr,$CourseID){
		$this->db->where('CourseID',$CourseID);
		$this->db->update($this->_table,$DataArr);
		//echo $this->db->last_query();die;
		return TRUE;		
	}
	
	public function get_details_by_id($CourseID){
		$this->db->select('*')->from($this->_table)->like('CourseID',$CourseID);
		return $this->db->get()->result();
	}
	
	
	
	public function change_status($CourseID,$Status){
		$this->db->where('CourseID',$CourseID);
		$this->db->update($this->_table,array('Status'=>$Status));
		return TRUE;
	}
        
        public function show_hide_to_home($CourseID,$Status){
            $this->db->where('CourseID',$CourseID);
            if($Status==0){
                $DataArr=array('AddToHome'=>0,'AddToHomeDate'=>'');
            }else{
                $DataArr=array('AddToHome'=>1,'AddToHomeDate'=>date('Y-m-d'));
            }
            $this->db->update($this->_table,$DataArr);
            return TRUE;
        }
	
	public function delete($CourseID){
		$this->db->delete($this->_table, array('CourseID' => $CourseID)); 
		return TRUE;
	}
	
	public function get_by_cateory($CategoryID){
            return $this->db->select('*')->from($this->_table)->where('Status',1)->where('CategoryID',$CategoryID)->get()->result();
            //echo $this->db->last_query();die;
        }
        
        public function training_courses(){
            $this->db->select('Title,CourseID')->from($this->_table);
            $this->db->where('AddToHome',1)->order_by('AddToHomeDate','DESC')->order_by('CourseID','DESC');
            $rs=$this->db->limit(6)->get()->result();
            return $rs;
        }
}
?>