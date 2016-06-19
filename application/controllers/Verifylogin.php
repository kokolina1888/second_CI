<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Verifylogin extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', '', TRUE);
	}
	public function login() {
		$data['title'] = 'вход';
		$data['dynamic_view'] = 'login/login_view';
		$this->load->view('templates/main_template', $data);
	}//end of login

	public function index()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_message('required', 'Полето %s е задължително');

		$this->form_validation->set_rules('username', 'Потребител', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

		//direction

		if ($this->form_validation->run() == FALSE) 
		{
			//field validation failed. User redirected to log in page
			$this->load->view('login/login_view');
		}
		else
		{
			//go to member`s area
			
			$session_data = $this->session->userdata();
		//echo "<pre>".var_dump($session_data['logged_in']['user_role'])."</pre>";	
			switch ($session_data['logged_in']['user_role']) {
				case 'admin_user':
				redirect('home_admin');
				break;

				case 'plain_user':
				redirect('home_user');
				break;

			}//end of going to member`s area 

		}//end of direction

	}//END OF INDEX

	public function check_database()
	{
		//field validation succeeded. Validate against database

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);

		//query the database

		$result = $this->user_model->login($username, $password);

		if($result)
		{
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'user_id' => $row->user_id,
					'username' => $row->username,
					'lab_name' => $row->lab_name,
					'address' => $row->address,
					'user_role' => $row->user_role);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;

		}//end of if
		else
		{
			$this->form_validation->set_message('check_database', 'Невалидно потребителско име и/или парола');
			return FALSE;
		}//end of else
		

	}//end of check_database
}//end of class