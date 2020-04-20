<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/Base_controller.php";
class Employee extends Base_controller {
	public function __construct($value='')
	{
		parent::__construct();
	}
	/*
		show employee data of for admin
	*/
	public function details($value='')
	{
		$this->render('employee/details');
	}
	public function import($value='')
	{
		$this->render('employee/import');
	}
	public function save($value='')
	{
		$this->load->library('Fileupload');
    	$this->load->library('Excel');
    	$set['path']='data/employeeUpload/';
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
    		$this->excel->set_json(APPPATH."json/process/employee.json");  		
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
    			$SAVE_EMP=[];
    			$EXIST_EMP=[];
    			foreach ($saveExcelData as $key =>$value ) {
    				$CUST_ID=$value['custid'];
    				$EMP_ID=$value['empid'];
	    			if (idExists($EMP_ID,$SAVE_EMP)== false) {	
	    				$SAVE_EMP[]=$value;
		    			$EXIST_EMP[]=$value;
					}
					else
					{
						$IS_DUPLICATE[]=$value;
						$html.="<br>Duplicate id=".$value['empid']." AND Name is:-".$value['name'];
					}
				}
				if (!empty($EXIST_EMP)) {
					$this->db->insert_batch('employee_master',$EXIST_EMP);
				}
    		}
    	}

	}

}
