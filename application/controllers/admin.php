<?php 
Class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('program_types_model');
		$this->load->model('program_dates_model');
		$this->load->model('tests_model');

		$this->output->enable_profiler(TRUE);

	}

	public function add_view()
	{
		$data['title_admin'] = 'администратор';	
		$data['dynamic_view'] = 'admin/add_view';
		$this->load->view('templates/main_template_admin', $data);

	}//end of add view

	public function update_view()
	{
		$data['title_admin'] = 'администратор';	
		$data['dynamic_view'] = 'admin/update_view';
		$this->load->view('templates/main_template_admin', $data);

	}//end of update view



	public function add_new_user()
	{
		/////////////////////////////////////////////////////////
		//	DEMO FOR FORM VALIDATION          			/////////
		// SEE FOR THE CORRESPONDING admin/add_new_user_form////
		////////////////////////////////////////////////////////

		$this->load->library('form_validation');

		//------------SETTING CUSTOM ERROR MESSAGES

		$this->form_validation->set_message('required', 'Полето е задължително');
		$this->form_validation->set_message('min_length', 'Полето {field} трябва да е по-дълго от {param} знака');
		$this->form_validation->set_message('max_length', 'Полето {field} не трябва да е по-дълго от 12 знака');

		$this->form_validation->set_message('matches', 'Полето {field} не съвпада с полето {param}');
		$this->form_validation->set_message('is_unique', 'Съществува потребител с такова потребителско име.');


		//-----------STYLING THE ERROR MESSAGES
		$this->form_validation->set_error_delimiters('<p class="error" id="errors">', '</p>');


		//-----------SETTING CUSTOM FORM VALIDATION RULES

		$this->form_validation->set_rules('username', 'потребителско име', 'trim|required|min_length[4]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'парола', 'trim|required|min_length[8]|matches[password_confirm]|md5');
		$this->form_validation->set_rules('password_confirm', 'повторете паролата', 'trim|required');
		$this->form_validation->set_rules('lab_name', 'Име на лабораторията', 'required');
		$this->form_validation->set_rules('address', 'Адрес на лабораторията', 'required');



		if ($this->form_validation->run() === FALSE) 
		{
			$this->add_new_user_form();
		} 
		else 
		{
			$this->user_model->add_user();
			$this->show_all_users();
		}
	}//end of add user

	public function add_new_user_form() {
		$this->load->library('form_validation');
		$data['title_admin'] = 'администратор';
		$data['dynamic_view']= 'admin/add_new_user_form';
		$this->load->view('templates/main_template_admin', $data);
	}//end of add new user form

	public function show_all_users()
	{
		$data['all_users'] = $this->user_model->get_all_users();

		$data['title_admin'] = 'администратор';
		$data['dynamic_view']= 'admin/show_all_users';
		$this->load->view('templates/main_template_admin', $data);
	}//end of show all users

	public function update_user_form($id)
	{
		$data['user_info'] = $this->user_model->get_user($id);

		$data['title_admin'] = 'администратор';
		$data['dynamic_view']= 'admin/update_user_form';
		$this->load->view('templates/main_template_admin', $data);

	}//end of upfate user form

	public function update_user($id)
	{
		$this->load->library('form_validation');
		
		//------------SETTING CUSTOM ERROR MESSAGES

		$this->form_validation->set_message('required', 'Полето е задължително');
		$this->form_validation->set_message('min_length', 'Полето {field} трябва да е по-дълго от {param} знака');
		$this->form_validation->set_message('max_length', 'Полето {field} не трябва да е по-дълго от 12 знака');
		
		$this->form_validation->set_message('matches', 'Полето {field} не съвпада с полето {param}');
		$this->form_validation->set_message('is_unique', 'Съществува потребител с такова потребителско име.');

		//-----------STYLING THE ERROR MESSAGES
		$this->form_validation->set_error_delimiters('<p class="error" id="errors">', '</p>');


		//-----------SETTING CUSTOM FORM VALIDATION RULES

		$this->form_validation->set_rules('username', 'потребителско име', 'trim|required|min_length[4]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'парола', 'trim|required|min_length[8]|matches[password_confirm]|md5');
		$this->form_validation->set_rules('password_confirm', 'повторете паролата', 'trim|required');
		$this->form_validation->set_rules('lab_name', 'Име на лабораторията', 'required');
		$this->form_validation->set_rules('address', 'Адрес на лабораторията', 'required');
		
		

		if ($this->form_validation->run() === FALSE) 
		{
			
			$this->update_user_form($id);
			
		} 
		else 
		{
			
			$this->user_model->update_user($id);
			$this->show_all_users();
		}

	}//end of update user
	public function delete_user($id)
	{
		$this->user_model->delete_user($id);
		$this->show_all_users();
	}//end of delete user

	//PROGRAM REQUESTS
	//
	//adds program request to a user

	public function program_request() 
	{
		$data['user_info'] 				= $this->user_model->get_all_users();
		$data['program_types_info'] 	= $this->program_types_model->get_all_program_types();

		$data['title_admin'] = 'администратор';
		$data['dynamic_view']= 'program_request/select_user_program_type_form';

		$this->load->view('templates/main_template_admin', $data);

	}

	//ads program-date-test-request

	public function program_date_test_request()
	{
		
		$user_id 			= $this->input->post('user_id');
		$program_type_id 	= $this->input->post('programm_type_id');

		$data['program_dates_info'] 	= $this->program_dates_model->get_program_dates($program_type_id);
		$data['tests_info'] 			= $this->tests_model->get_program_tests($program_type_id);
		$data['user_info'] 				= $this->user_model->get_user($user_id);
		$data['program_type_info'] 	= $this->program_types_model->get_program_type($program_type_id);


		$data['title_admin'] = 'администратор';
		$data['dynamic_view']= 'program_request/program_date_test_request_form';

		$this->load->view('templates/main_template_admin', $data);

	}

//inserts program request in db
	public function insert_program_request_db()
	{
		$this->user_model->add_program_request();

		$id = $this->db->insert_id();

	

		//$data['user_program_requests'] = $this->user_model->get_user_program_requests($user_id);
		//GETS THE LAST REQUEST INSERTED IN DB


		$data['program_request_details'] = $this->user_model->get_latest_program_request_details($id);

		$data['title_admin'] = 'администратор';
		//$data['dynamic_view']= 'program_request/show_user_program_requests';
		$data['dynamic_view']= 'program_request/show_request_details';

		$this->load->view('templates/main_template_admin', $data);


	}
}//end of class