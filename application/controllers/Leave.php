<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/Base_controller.php";
/*
	|1 - leave request send
	|2 - leave approve by manager
	|3 - leave approve by HR
	|9 - rejected
	*/
	/*
	|1 - pl
	|2 - sl
	|3 - cl
	|9 - other

	*/
class Leave extends Base_controller {
	public function __construct($value='')
	{
		parent::__construct();
		$this->load->model('Leave_model');
	}	
	public function index($value='')
	{
		if ($this->employee==TRUE ) {
			$this->data['result']=$this->Leave_model->getAllLeave();
			$this->render('leaves/leaveRequest');			
		}
		else{
			__goto();
		}
	}
	
	public function save($value='')
	{
		if ($this->employee==TRUE) {
			 $data['emp_id'] 		= user_id();
			 $data['leave_start'] 	= $this->input->post('startdate');
			 $data['leave_end'] 	= $this->input->post('enddate');			  
			 $data['leavetype'] 	= $this->input->post('type');
			   
			 $date1 = date("Y-m-d", strtotime($data['leave_start'] ));
			 $date2 = date("Y-m-d", strtotime($data['leave_end'] ));
			 $diff = strtotime($date2) - strtotime($date1);    
	    	 $totalleave =   abs(round($diff / 86400)) + 1;
	    	 $data['total_day_of_leaves'] = $totalleave;
	    	// if($date1 > $date2)
	    	// {
	    	// 	echo "start date is greater than end date";
	    	// 	die();
	    	// }
	    	// else
	    	// {
	    	// 	echo "dates are rights";
	    	// 	die();
	    		
	    	// }
	    	 // dd($data);
	    	 
	    	$result = $this->Leave_model->save($data);
	    	if($result > 0)
	    	{
	    		//insert leave in database 
	    		__goto('leave');
	    	}else
	    	{
	    		echo "not saved";
	    	}  
    	}
    	else{
    		__goto();
    	}     
		 
	}
	public function edit($value='')
	{
		# code...
	}
	public function delete($value='')
	{
		# code...
	}
	public function details($value='')
	{
		if ($this->hr==TRUE ) {			
			$this->data['result']=$this->Leave_model->getLeaves(2,TRUE);
			$this->render('leaves/details');			
		}
		elseif ($this->manager==TRUE) {
			$this->data['result']=$this->Leave_model->getLeaves(1);
			$this->render('leaves/details');			
		}
		else{
			__goto();
		}
	}
	public function process($value='')
	{
		if ($this->hr==TRUE || $this->manager == TRUE) {
			$this->form_validation->set_rules('status', 'Status', 'required|trim|xss_clean|strip_tags');
	        $this->form_validation->set_rules('remark', 'Remark', 'required|xss_clean|strip_tags|trim');      
	        
         	if ($this->form_validation->run() == FALSE) {	         	
         		dd(validation_errors());
         		// return FALSE; 

	        } 
	        else
	        {	
	        	$empId=$this->input->post('emp_id');
	        	$data = array('status' => $this->input->post('status'),'remark'=>$this->input->post('remark') );
	        	 
	        	if($this->Leave_model->updateLeaveRequest($empId,$data)==TRUE)
	        	{
	        		// echo "update successfully";
	        		__goto('leave/details');
	        	}
	        	else{
	        		//something went wrong;
	        		__goto('leave/details');
	        	}
	        }
		}
		else{
			__goto();
		}
	}
	public function records($value='')
	{
		if ($this->hr==TRUE ) {			
			$this->data['result']=$this->Leave_model->getRecords(3,TRUE);
			$this->render('leaves/records');			
		}
		elseif ($this->manager==TRUE) {
			$this->data['result']=$this->Leave_model->getRecords(3);
			$this->render('leaves/records');			
		}
		else{
			__goto();
		}
	}
	 
}