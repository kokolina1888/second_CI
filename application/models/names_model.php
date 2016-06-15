<?php 

class Names_model extends CI_Model{

	public function get_all_names()
	{
		$q = $this->db->get('names');

		return $q->result_array();
	}


	public function add_name()
	{
		$name = array(
			'name' 		=> $this->input->post('name'),
			'meaning' 	=> $this->input->post('meaning'),
			'gender'	=> $this->input->post('gender')
			);

		return  $this->db->insert('names', $name);
	}
}