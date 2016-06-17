<?php 
class Cars extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cars_model');
		$this->load->model('makes_model');
	}

	public function show_all_cars()
	{

		$data['all_cars'] = $this->cars_model->get_all_cars();

		$this->load->view('car/all_cars_view', $data);

	}

	public function show_add_car()
	{
		
		$data['makes'] = $this->makes_model->get_all_makes();
		$this->load->view('car/add_car_view', $data);




	}

}