<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/Base_controller.php";

class Holiday extends Base_controller {
	public function __construct($value='')
	{
		parent::__construct();
	}
	public function index($value='')
	{
		if ($this->hr==TRUE) {
			if ($this->input->post()) {
				if (!empty($this->input->post('eventTitle'))) {
					$saveEvent=array('title'=>$this->input->post('eventTitle'),
								 'start'=>$this->input->post('eventDate'),
								 'custid'=>user_id()
					);

					$this->db->select('*');
					$this->db->from('holiday');
					$this->db->where('custid',$saveEvent['custid']);
					$this->db->where('start',$saveEvent['start']);
					$this->db->where('title',$saveEvent['title']);
					$isExist = $this->db->get()->result_array();
					if($isExist)
					{
						//echo "exist";
					}
					else
					{
						$this->db->insert('holiday',$saveEvent);
					}
					//var_dump($saveEvent);
					//$this->db->insert('holiday',$saveEvent);
				}
				
			}
			$holiday=$this->db->select('title, start')->where('custid',user_id())->get('holiday')->result_array();
			$myArray=[];
			foreach ($holiday as $key) {
				$key['className']='label-important';				
				$myArray[]=$key;
			}
			$this->data['result']=$holiday;
			$this->data['events']=json_encode($myArray);
			$this->render('holiday/setup');
		}
		else{
			__goto();
		}
	}
	public function import($value='')
	{
		$this->load->library('Fileupload');
    	$this->load->library('Excel');
    	$set['path']='data/holidays/';
    	$set['type']='xlsx';
    	$set['file_name']='file';
    	if(!$this->fileupload->upload($set))
    	{
    		var_dump($this->fileupload->error());
    		// goto_back();
    		exit();
    	}
    	else
    	{
           
    		$inputFileName=$this->fileupload->file_path(); 
            
    		$this->excel->set_json(APPPATH."json/process/holidays.json");  		
    		if($this->excel->import($inputFileName)!==TRUE)
    		{
    			var_dump($this->excel->import_error());
    			// goto_back();
                exit();
    		}
    		else
    		{
                
    			$saveExcelData =$this->excel->get_output();
             
              
    			$i=0;
    			$j=0;
                $delete_temp=false;
    			$html='';
    			$saveHolidays=[];
    			foreach ($saveExcelData as $key =>$value) { 
    					$value['custid']=user_id();
    					$original_date = $value['start'];
 						$timestamp = strtotime($original_date);
 						$value['start'] = date("Y-m-d", $timestamp);
 						$this->db->select('*');
						$this->db->from('holiday');
						$this->db->where('custid',$value['custid']);
						$this->db->where('start',$value['start']);
						$this->db->where('title',$value['title']);
						$isExist = $this->db->get()->result_array();
						if($isExist)
						{
							//echo "exist";
						}	
						else
						{
							$saveHolidays[]=$value;	
						}
	    								
				}
				// dd($saveHolidays);
				//var_dump($saveHolidays);
				if (!empty($saveHolidays)) {
					$this->db->insert_batch('holiday',$saveHolidays);
					
				}
				$this->index();
    		}
    	}

	}
	public function weekoff($value='')
	{
		$days=$this->input->post('days');
		$year   = date("Y");  
		$save=[];
		$temp=[];
		for ($i=0; $i < sizeof($days); $i++) { 
			$dateArr = $this->getDateForSpecificDayBetweenDates($year.'-01-01', $year.'-12-31', $days[$i]);
			// $save=[];
			for ($j=0; $j <sizeof($dateArr) ; $j++) { 
					$this->db->select('*');
					$this->db->from('holiday');
					$this->db->where('custid',user_id());
					$this->db->where('start',$dateArr[$j]); 
					$isExist = $this->db->get()->result_array();
					if($isExist)
					{
						//echo "exist";
					}	
					else
					{
						$save[] = array('custid'=>user_id(),'title' => 'Week-Off', 'start'=>$dateArr[$j]);	
					}
				
				
			}

		}
		if($save){
			$this->db->insert_batch('holiday',$save);
		
		}
		
	
		//dd($save);
		$this->index();

	}

	function getDateForSpecificDayBetweenDates2($startDate, $endDate, $weekdayNumber)
	{
	    $startDate = strtotime($startDate);
	    $endDate = strtotime($endDate);

	    $dateArr = array();

	    do
	    {
	        if(date("w", $startDate) != $weekdayNumber)
	        {
	            $startDate += (24 * 3600); // add 1 day
	        }
	    } while(date("w", $startDate) != $weekdayNumber);


	    while($startDate <= $endDate)
	    {
	        $dateArr[] = date('Y-m-d', $startDate);
	        $startDate += (7 * 24 * 3600); // add 7 days
	    }

	    return $dateArr;
	}
	function getDateForSpecificDayBetweenDates($start, $end, $weekday = 0){
	  $weekdays="Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday";
	  $arr_weekdays=explode(",", $weekdays);
	  $weekday = $arr_weekdays[$weekday];
	 
	  if(!$weekday)
	    die("Invalid Weekday!");
	  $start= strtotime("+0 day", strtotime($start) );
	  $end= strtotime($end);
	  $dateArr = array();
	  $friday = strtotime($weekday, $start);
	  while($friday <= $end) {
	    $dateArr[] = date("Y-m-d", $friday);
	    $friday = strtotime("+1 weeks", $friday);
	  }
	  $dateArr[] = date("Y-m-d", $friday);
	  return $dateArr;
	}
}