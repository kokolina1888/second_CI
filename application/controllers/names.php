<?php 
class Names extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('names_model');

		$this->output->enable_profiler(TRUE);

		
	}

	public function show_all_names(){
		$this->benchmark->mark('start');

		//$this->load->model('names_model');

		$data['all_names'] = $this->names_model->get_all_names();
		
		$data['dynamic_view'] = 'names/show_all_names_view';
		$data['title'] = 'All names';

		$this->load->view('templates/main_template', $data);
		$this->benchmark->mark('end');

		echo 'Time: ' . $this->benchmark->elapsed_time('start', 'end');
	}

	public function show_add_name(){

		$this->load->library('form_validation');

		$data['dynamic_view'] = 'names/add_name_view';

		$data['title'] = 'Add name';

		$this->load->view('templates/main_template', $data);


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


	public function show_update_name($id){
		$data['name_info'] = $this->names_model->get_name($id);

		$data['dynamic_view'] = 'names/update_name_view';
		$data['title'] = 'Update name';


		$this->load->view('templates/main_template', $data);

	}

	public function update_name($id)
	{
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Име', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->show_update_name($id);
		}
		else 
		{
			$this->names_model->update_name($id);
			echo "Successfully updated a new name in DB!";
		}
	}
}