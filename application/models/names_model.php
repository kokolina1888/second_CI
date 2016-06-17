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

	public function get_name($id){
		$this->db->select('*');
		$this->db->from('names');
		$this->db->where('id=', $id);

		$q = $this->db->get();

		return $result = $q->row();

	}

	public function update_name($id){

		$name = array(
			'name' 		=> $this->input->post('name'),
			'meaning' 	=> $this->input->post('meaning'),
			'gender'	=> $this->input->post('gender')
			);

		
		
		$this->db->where('id', $id);
		$this->db->update('names', $name);
	}
}