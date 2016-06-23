<?php 
class Pictures extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index($param = NULL)
	{
		$data['dynamic_view'] = 'uploads/upload_pic';
		$data['error'] = $param;
		$this->load->view('templates/main_template', $data);
	}

	public function do_upload(){
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = $this->upload->display_errors();

                        $this->index($error);
                }
                else
                {
                        $data['upload_data'] = $this->upload->data('file_name');
                        $data['dynamic_view'] = 'uploads/success_upload_pic';
					
						$this->load->view('templates/main_template', $data);

                       
                }
        }
	
}