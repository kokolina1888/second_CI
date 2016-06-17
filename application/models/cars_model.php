<?php 

class Cars_model extends CI_Model{

	public function get_all_cars(){
		$yearmade = 2007;
		$this->db->select('*');
		$this->db->from('cars');
		$this->db->join('makes', 'makes.make_id = cars.make_id');
		$this->db->where('yearmade >', $yearmade);
		
		$query = $this->db->get();

		return $result = $query->result_array();

	}
}