<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/Base_controller.php";

class Manager extends Base_controller {
	public function __construct($value='')
	{
		parent::__construct();
	}	
	public function index($value='')
	{
		if ($this->hr==TRUE ) {
			$this->load->model('Employee_model');

			$this->data['result']=$this->Employee_model->getAllEmployee(TRUE);
			$this->render('managerAccess');			
		}
		else{
			__goto();
		}
	}
	public function giveItToAccess($value='')
	{
		if ($this->hr==TRUE ) {
			$empId=$this->uri->segment(3);
			$this->db->where('id',$empId)->update('users',['user_type'=>2]);		
		}
		else{
			__goto();
		}
	}
}