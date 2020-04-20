<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
// require_once APPPATH."core/Base_model.php";
class Company_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		//$this->load->database();
			
	}
	/*+++++ save company details +++++*/
	public function create_company($value='')
	{
		$save_details=$this->add('customer_master',$value);
		if ($save_details) {
			$this->add('timeline',array('spgid'=>user_id(),'custid'=>$value['custid'],'entity_name'=>$value['entity_name']));
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function create_backup_company($value='')
	{
		$save_details=$this->add('custid_backup',$value);
		if ($save_details) {
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
	 public function get_branchCode($pan)
	 {
	 	$result=$this->get_data('customer_master','count(entity_pan) AS pancount',array('entity_pan' =>$pan));
	 		$result = $result->row()->pancount;
	 		return $result + 1 ;
	 }

	 public function all_companys($key='')
	 {	
	 	if (!empty($key)) {
	 		$result =$this->db->select('*')
	 					  ->from('customer_master')
	 					  ->where('custid',$key)	 					 
	 					  ->get();
	 		$result = $result->row();
	 		
	 		 return $result;
	 	}
	 	else
	 	{
	 		$result =$this->db->select('custid,entity_name')
	 					  ->from('customer_master')	 					 
	 					  ->get();
	 		$result = $result->result();
	 		
	 		 return $result;
	 	}
	 	
	 }
	 public function acts($value='')
	 {	 	
	 	return $this->db->get('act_particular')->result();	 	
	 }
	 public function get_acts($id='')
	 {
	 	// $returnActs=[];
	 	$select="a.act,a.act_code,IF(b.custid = '".$id."','check','uncheck') as is_check";
	 	$result=$this->db->select($select)
    					 ->from('act_particular as a')
    					 ->join('act_applicable_to_customer as b','a.act_code=b.act_code AND b.custid="'.$id.'"','left')
    					 ->group_by('a.act_code')
                        
    					 ->order_by('a.act','desc')

    					 ->get()
    					 ->result();
    	return $result;	

	 	
	 }
	 public function attach_act_to_company($value='')
	 {
	 	
	 	if (!empty($value['act_code'])) {
	 			$len=count($value['act_code']);
	 	
	 	for ($i=0; $i < $len ; $i++) {

	 		$valuesArr1 = array('custid' => $value['custid'],
	 							'name'=>$value['name'],
	 							'act_code'=>$value['act_code'][$i],
	 							'spgid'=>user_id());

	 			if($this->db->insert('act_applicable_to_customer', $valuesArr1))
				 	{
				 		$get_act_data=$this->join('act_applicable_to_customer as A','act_particular as B',' B.act_code = A.act_code','A.custid as id, A.act_code as code, B.act as act, B.particular as p',array('A.custid' =>$value['custid'], 'A.act_code' => $value['act_code'][$i] ));
	 		 	$get_act_data=$get_act_data->result();
	 		 
				 		foreach ($get_act_data as $key ) {
	 		 		$valuesArr = array('custid' => $key->id,
	 							'act'=>$key->act,
	 							'act_code'=>$key->code,
	 							'spg_id'=>user_id(),	 	
	 							'Particular'=>$key->p
	 						);
	 					$this->db->insert('compliance_scope', $valuesArr);
	 		 	}
	 					$r=TRUE;				
				 	}
				 } 
	 	}
	 	else
	 	{
	 		put_msg('Please Act selected....!');
	 		$r=FALSE;	 	
	 	}

	 		return $r;
	 }

	public function get_allCompanydetails($reg_type)
	{
		$this->db->select("entity_name,custid,allianceid,entity_pan");
		$this->db->from('customer_master');
		if($reg_type=="subcontractor")
		{
			if (!empty(IS_SPG) && IS_SPG == TRUE) {
				$this->db->where(array('custtype' => 3));
			}
			else
			{
				$this->db->where(array(	'spgid' =>user_id(),'custtype' => 3));
			}
			
		}
		else
		{
			if (!empty(IS_SPG) && IS_SPG == TRUE) {
				$this->db->where(array('custtype' => 1));
				$this->db->or_where(array('custtype' => 2));
			}
			else
			{
				$this->db->where(array(	'spgid' =>user_id(),'custtype' => 1));
				$this->db->or_where(array('custtype' => 2));
				
			}
			
		}					
		$result=$this->db->get()->result();
		return $result;
	}

	// get act for for attact company
	public function get_attachActs($custid='')
	{
		return $custid;
	}
	public function get_Entities()
	{
		$select="entity_name,custid, custtype, CASE custtype 
						WHEN  1 THEN 'COMPANY'
						WHEN  2 THEN 'BRANCH'
						WHEN  3 THEN 'CONTRACTOR'
						WHEN  4 THEN 'SUB-CONTRACTOR'
						WHEN  5 THEN 'SPG-USER'
						WHEN  9 THEN 'SPG'
						ELSE 'OTHER'
						END AS catagory
			";
		$this->db->select($select);
		$this->db->from('customer_master');	
		$this->db->where(array('spgid' =>user_id()));	
		$result=$this->db->order_by('entity_name','asc')->get()->result();
	

		return $result;
	}
	public function update_entity($data,$id)
	{
		return	$this->edit('customer_master',array('custid'=>$id),$data);	
	}
	public function delete_entity($id='')
	{
		return $this->remove('customer_master',array('custid'=>$id));
	}
	public function get_remove_acts($id='')
	 {
	 	// $returnActs=[];
	 	$select="a.act,a.act_code";
	 	$result=$this->db->select($select)
    					 ->from('act_particular as a')
    					 ->join('act_applicable_to_customer as b','a.act_code=b.act_code AND b.custid="'.$id.'"','right')
    					 ->group_by('a.act_code')
                        
    					 ->order_by('a.act','desc')

    					 ->get()
    					 ->result();
    	return $result;	

	 	
	 }
	public function remove_act_to_company($value='')
	 {
	 	
	 	if (!empty($value['act_code'])) {
	 			$len=count($value['act_code']);
	 	
	 	for ($i=0; $i < $len ; $i++) {

	 		$valuesArr1 = array('custid' => $value['custid'],
	 							'act_code'=>$value['act_code'][$i],
	 							);

	 			if($this->remove('act_applicable_to_customer', $valuesArr1))
				 	{				 		
	 		 
				 		$valuesArr = array('custid' => $value['custid'],
	 							'act_code'=>$value['act_code'][$i]			
	 						);
	 					$this->remove('compliance_scope', $valuesArr);
	 					$this->remove('compliance_working_prior', $valuesArr);
	 					$r=TRUE;				
				 	}
				 } 
	 	}
	 	else
	 	{
	 		put_msg('Please Act selected2....!');
	 		$r=FALSE;	 	
	 	}

	 		return $r;
	 }
	 public function get_pan($type,$id='',$pan='')
	 { 
	 	echo $this->input->post('cust_type');

	 	if ($type == 1) {
	 		if($this->check_pan($pan) == TRUE)
			{				
				return $pan;
			}
			else
			{
				put_msg($pan." This pan no is not unique. <br>please enter valid PAN Number");
	         	goto_back(); 
			}	
	 	
	 	}
	 	else
	 	{
	 		echo $id;
	 		$c_pan=$this->db->select('entity_pan')->from('customer_master')
			->where('custid',$id)->get()->row()->entity_pan;
			
			if ($c_pan == $pan) {				
				return $pan;
			}
			else
			{
				put_msg($pan." This pan no is not unique. <br>please enter valid PAN Number");
				goto_back();
			}
	 	}

	 }
	 public function check_pan($pan='')
	 {
	 	$r=$this->db->select('entity_pan')->from('customer_master')->where('entity_pan',$pan)->get();
	 	if ($r->num_rows() > 0) {
	 		return FALSE;
	 	}
	 	else
	 	{
	 		return TRUE;	 		
	 		
	 	}
	 }

	 public function get_govtacts($value='')
	{
		$acts= $this->db->select('act_code,act')
						->from('act_particular')
						->group_by('act_code')
						->get()
						->result();
		return $acts;
	}


}	