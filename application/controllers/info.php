<?php 
class Info extends CI_Controller{
 
 public function show_calendar(){
 	$prefs = array(
        'start_day'    => 'monday',
        'month_type'   => 'long',
        'day_type'     => 'short'
);

 	$this->load->library('calendar', $prefs);
 	// $data['calendar'] = $this->calendar->generate(2016, 7);

 	$data = array(
        4  => 'http://school.vratsasoftware.com/wp-content/uploads/2015/10/1.-OOP-Class-Object-Properties-Scope.pdf',
        5  => 'http://school.vratsasoftware.com/wp-content/uploads/2016/05/PHP_oop_3.pdf',
        12 => 'http://school.vratsasoftware.com/wp-content/uploads/2016/05/mvc_ci_intro.pdf',
        14 => 'http://school.vratsasoftware.com/wp-content/uploads/2016/05/ci_models.pdf'
);
	$data['calendar'] = $this->calendar->generate(2016, 6, $data);
 	$this->load->view('calendar/calendar', $data);
 }
}