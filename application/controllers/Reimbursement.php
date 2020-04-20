<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/Base_controller.php";

class Reimbursement extends Base_controller {
	public function __construct($value='')
	{
		parent::__construct();
	}
	public function index($value='')
	{
		$this->render('customerRegistration');		
	}
	public function request($value='')
	{
		if ($this->employee == TRUE) {
			$this->render('reimbursement/request');
		}
		else{
			__goto(); 
		}
	}
	public function saveTravel($value='')
	{
		
    		 
		//print_r($_REQUEST);
		 
		$start_place = $this->input->post('start_place');
		$end_place = $this->input->post('end_place');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$type_of_use = $this->input->post('type_of_use');
		$reason = $this->input->post('reason');
		$amount = $this->input->post('amount');
		$bill_slip = $this->input->post('bill_slip');
		$now = date('Y-m');
		$yearMonth = explode('-',$now);
		 
		//var_dump(COUNT($this->input->post('start_place')));
		for($i= 0; $i<COUNT($start_place); $i++ )
		{
			
			$data['empid'] 		= user_id();
			$data['start_place'] = $start_place[$i];
			$data['end_place'] = $end_place[$i];
			$data['start_date'] = $start_date[$i];
			$data['end_date'] = $end_date[$i];
			$data['trave_use'] = $type_of_use[$i];
			$data['reason'] = $reason[$i];
			$data['amount'] = $amount[$i];
			$data['year'] = $yearMonth[0];
			$data['month'] = $yearMonth[1];
			$this->db->insert('travel_reimbursement',$data);
				
		}
		$this->request();

		
	}
	public function saveFoodBill($value='')
	{
		//print_r($_REQUEST);
		$place = $this->input->post('place');
		$date = $this->input->post('date');
		$reason = $this->input->post('reason');
		$amount = $this->input->post('amount');
		$now = date('Y-m');
		$yearMonth = explode('-',$now); 
		for($i= 0; $i<COUNT($place); $i++ )
		{
			
			$data['empid'] 		= user_id();
			$data['place'] = $place[$i];
			$data['date'] = $date[$i];
			$data['reason'] = $reason[$i];
			$data['amount'] = $amount[$i]; 
			$data['year'] = $yearMonth[0];
			$data['month'] = $yearMonth[1];
			$this->db->insert('food_reimbursement',$data);
				
		}
		$this->request();
		  
	}
	public function saveStayBill($value='')
	{
		 
		$place = $this->input->post('place');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$reason = $this->input->post('reason');
		$amount = $this->input->post('amount');
		$now = date('Y-m');
		$yearMonth = explode('-',$now); 
		for($i= 0; $i<COUNT($place); $i++ )
		{
			
			$data['empid'] 		= user_id();
			$data['place'] = $place[$i];
			$data['start_date'] = $start_date[$i];
			$data['end_date'] = $end_date[$i];
			$data['reason'] = $reason[$i]; 
			$data['amount'] = $amount[$i]; 
			$data['year'] = $yearMonth[0];
			$data['month'] = $yearMonth[1];
			$this->db->insert('stay_reimbursement',$data);
				
		}
		$this->request();
	}
	public function saveOtherReimbursement($value='')
	{
		$data['empid'] 		= user_id();
		$data['equipment'] = $this->input->post('equipment');
		$data['description'] = $this->input->post('desc');
		$data['amount'] = $this->input->post('amount');
		 
		$now = date('Y-m');
		$yearMonth = explode('-',$now); 
		 
		$data['year'] = $yearMonth[0];
		$data['month'] = $yearMonth[1];
		$this->db->insert('other_reimbursement',$data);
				
		 
		$this->request();
	}
	public function saveRecharge($value='')
	{
		
		$data['empid'] 		= user_id();

		$data['handset_no'] = $this->input->post('phone_no');
		$data['amount'] = $this->input->post('amount');
		 
		$now = date('Y-m');
		$yearMonth = explode('-',$now); 
		 
		$data['year'] = $yearMonth[0];
		$data['month'] = $yearMonth[1];

		$this->db->insert('recharge_reimbursement',$data);
				
		 
		$this->request();
	}
}
	