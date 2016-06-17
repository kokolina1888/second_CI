<?php 
class Cars_model extends CI_Model {

	public function get_all_cars()
	{
		$year = '2007';
		$this->db->select('*');
		$this->db->from('cars');
		$this->db->where('cars.yearmade >', $year);
		$this->db->join('makes', 'makes.make_id = cars.make_id');
		
		$query = $this->db->get();

		return $query->result_array();
	}

	public function add_car(){
		$car = array(
			'make_id' 		=> $this->input->post('make_id'),
			'yearmade' 		=> $this->input->post('yearmade'),
			'mileage' 		=> $this->input->post('mileage'),
			'price' 		=> $this->input->post('price'),
			'description' 	=> $this->input->post('description'),
			
			);

		return  $this->db->insert('cars', $car);
	}	
}
