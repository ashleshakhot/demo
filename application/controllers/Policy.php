<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/Base_controller.php";

class Policy extends Base_controller {
	public function __construct($value='')
	{
		parent::__construct();
	}

	public function index($value='')
	{		
		if ($this->hr==TRUE) {
			$this->data['result']=$this->db->where('custid',user_id())->get('policy_master')->result();
			$this->render('policy/details');

		}
		else{
			__goto();
		}
	}
	public function save($value='')
	{
		if ($this->getValidData()!=FALSE) {
			if($this->db->insert('policy_master',$this->getValidData()))
				__goto('policy');
			else
				__goto('policy');
		}
		else{
			__goto('policy');
		}
	}
	public function edit($value='')
	{
		if ($this->getValidData()!=FALSE) {
			if($this->db->where('sr_no',$this->input->post('id'))->update('policy_master',$this->getValidData()))
				__goto('policy');
			else
				__goto('policy');
		}
		else{
			__goto('policy');
		}
	}
	public function delete($value='')
	{
		if ($this->hr==TRUE) {
			$this->db->delete('policy_master',['sr_no'=>$this->input->post('id')]);
		}
		else{
			__goto('policy');
		}
	}
	private function getValidData($value='')
	{
		
		if ($this->hr==TRUE) {			
		$this->form_validation->set_rules('policy_name', 'Policy Name', 'required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('policy_desc', 'Policy Description', 'required|xss_clean|strip_tags|trim');      
        $this->form_validation->set_rules('policy_amount', 'Policy Amount', 'required|xss_clean|strip_tags|trim');      
		
         	if ($this->form_validation->run() == FALSE) {	         	
         		dd(validation_errors());
         		// return FALSE; 

	        } 
	        else
	        {	        
				$put= array(
					'policy_name' => $this->input->post('policy_name'),
					'policy_description' => $this->input->post('policy_desc'),
					'policy_values' => $this->input->post('policy_amount'),
					'custid'=>user_id()
				);
		
				$put = $this->security->xss_clean($put);

				return $put;
			}
		}
		else{
			__goto();
		}
	}
}