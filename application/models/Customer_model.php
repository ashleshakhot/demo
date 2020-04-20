<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Customer_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}
	public function is_custid($pin,$type)
	 {
	 	$this->db->select('*');
		$this->db->where('pin',$pin);
		$this->db->where('custtype',$type);
		$query=$this->db->get('custid_backup');

		if ($query->num_rows() > 0) {
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	 }
	 protected function get_data($table,$select,$where)
	{
		$this->db->select($select);
		$this->db->where($where);
		$query=$this->db->get($table);
		return $query;
	}
	  public function get_custid($pin,$type)
	 {
	 	if ($this->is_custid($pin,$type) == TRUE) {
	 		$result=$this->get_data('custid_backup','Max(custid) AS custid',array('pin' =>$pin,'custtype' => $type));
	 		$result = $result->row()->custid;
	 		return $result + 1 ;
	 	}
	 	else
	 	{
	 		$result=$this->get_data('customer_master','count(custid) AS pincount',array('pin' =>$pin));
	 		$result = $result->row()->pincount;
	 		$result +=1;
	 		$custid= ($type*1000000+($pin));
			$custid = (($custid*10000)+$result);
	 		return $custid;
	 	}
	}
	public function create_backup_company($value='')
	{
		var_dump($value);
		$save_details=$this->db->insert('custid_backup',$value);
		if ($save_details) {
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function create_company($value='')
	{
		$save_details=$this->db->insert('customer_master',$value);
		if ($save_details) {
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function edit_company($data='',$custid='')
	{

		$where=['custid'=>$data['custid']];
		
		$this->db->where($where);
		if( $this->db->update('customer_master',$data))
      	{

      	  return TRUE;
      	}	
      	else
      	{
          return FALSE;
      	}
		
	}
}