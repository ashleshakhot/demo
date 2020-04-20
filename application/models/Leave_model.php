<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
// require_once APPPATH."core/Base_model.php";
class Leave_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		//$this->load->database();
			
	}
	public function save($data)
	{
		return $this->db->insert('leave_records',$data);
	}
	public function getAllLeave($value='')
	{
		return $this->db->where('emp_id',user_id())->get('leave_records')->result();
	}
	public function updateLeaveRequest($id='',$data='')
	{
		$this->db->where('emp_id',$id);
 		if( $this->db->update('leave_records',$data))
	      {
	        return TRUE;
	      }
	      else
	      {
	        return FALSE;
	      }
	}
	public function getLeaves($sts='',$isHR=FALSE,$month='',$year='')
	{
		if ($isHR==TRUE) {
			return $this->db->select('a.*, b.emp_name')->from('leave_records a')->join('employee_master b','a.emp_id=b.empid')->where(['status'=>$sts,'custid'=>user_id()])->get()->result();
		}
		return $this->db->select('a.*, b.emp_name')->from('leave_records a')->join('employee_master b','a.emp_id=b.empid')->where('status',$sts)->get()->result();
	}
	public function getRecords($sts='',$isHR=FALSE,$month='',$year='')
	{
		if ($isHR==TRUE) {
			return $this->db->select('a.*, b.emp_name')->from('leave_records a')->join('employee_master b','a.emp_id=b.empid')->where(['status'=>$sts,'custid'=>user_id()])->get()->result();
		}
		return $this->db->select('a.*, b.emp_name')->from('leave_records a')->join('employee_master b','a.emp_id=b.empid')->where('status',$sts)->get()->result();
	}

}