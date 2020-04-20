<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
// require_once APPPATH."core/Base_model.php";
class Employee_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		//$this->load->database();
			
	}
	public function getAllEmployee($isHR='')
	{
		if ($isHR==TRUE) {
			return $this->db->where('custid',user_id())->get('employee_master')->result();
		}
		else
		{
			return false;
		}
	}
}