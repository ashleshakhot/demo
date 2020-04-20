<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
	public function __construct($value='')
	{
		parent::__construct();
	}
	/*
		load view login page;
	*/
	public function index()
	{
		if (Is_login() == TRUE) {
		 	redirect('dashboard', 'refresh');

		}
		else{
			$this->load->view('login');
		}
	}

	public function process($value='')
	{
		$this->form_validation->set_rules('username', 'User Name', 'required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|strip_tags|trim');      
		
         if ($this->form_validation->run() == FALSE) {	         	
         	var_dump(validation_errors());
         	// return FALSE;   
        } 
        else
        {	        
			$put= array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
		
			$put = $this->security->xss_clean($put);
			$this->load->model('login_model');
			if ($this->login_model->check_login($put) == TRUE) {
		 		redirect('dashboard', 'refresh');
			}
			else
			{				
				goto_back();
			}
		 
		}
	}
	public function quite()
	{		
		$this->session->sess_destroy();
		__goto();
			
	}

	

}
