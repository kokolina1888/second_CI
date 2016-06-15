<?php 
class Names extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('names_model');

	}

	public function show_all_names(){

		//$this->load->model('names_model');

		$data['all_names'] = $this->names_model->get_all_names();

		$this->load->view('names/show_all_names_view', $data);

	}

	public function show_add_name(){

		$this->load->library('form_validation');

		$this->load->view('names/add_name_view');

	}

	public function insert_name()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Име', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->show_add_name();
		}
		else 
		{
			$this->names_model->add_name();
			echo "Successfully added a new name in DB!";
		}


	}
}