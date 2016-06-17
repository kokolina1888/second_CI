<?php 
class Cars extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('cars_model');
		$this->load->model('makes_model');

	}

	public function show_cars_info(){
		
		$data['all_cars'] = $this->cars_model->get_all_cars();

		$this->load->view('cars/show_all_cars_view', $data);
	}

	public function show_add_car(){
		
		$data['makes_info'] = $this->makes_model->get_all_makes();

		$this->load->view('cars/add_car_view', $data);
	}

	public function insert_car(){

		$this->cars_model->add_car();
		echo "Success!";
	}
}