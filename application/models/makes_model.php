<?php 
class Makes_model extends CI_Model{

	public function get_all_makes()
	{
		$this->db->select('*');
		$this->db->from('makes');		
		
		$query = $this->db->get();

		return $query->result_array();
	}
}