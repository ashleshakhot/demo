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
    public function registration($value='')
    {
        $custid = user_id();
        $this->db->select('entity_name,address');
        $this->db->from('customer_master');
        $this->db->where('custid',$custid);
        $result = $this->db->get()->result_array();
         
        $this->data['company'] =  $result;
        
        $this->render('employee/employeeRegistration');
    }
    
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
    			 goto_back();
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
    			foreach ($saveExcelData as $key =>$value) {
    				$CUST_ID=$value['custid'];
    				$EMP_ID=$value['empid'];
                    $emp_name = $value['emp_name'];
                    $phone = $value['phone_no'];
                    $email = $value['email'];
                    $empid = $value['empid'];
                    $type = 3;
                    

                    $this->sendUsernamePassword($empid ,$type,$email,$phone);
	    			 
                    if (idExists($EMP_ID,$SAVE_EMP)== false) {	
                        $this->sendUsernamePassword($empid ,$type,$email,$phone);
                     
                         
	    				$SAVE_EMP[]=$value;
		    			$EXIST_EMP[]=$value;
					}
					else
					{
                         
						$IS_DUPLICATE[]=$value;
						$html.="<br>Duplicate id=".$value['empid']." AND Name is:-".$value['emp_name'];
					}
				}
				if (!empty($EXIST_EMP)) {
					$this->db->insert_batch('employee_master',$EXIST_EMP);
                    $this->render('employee/details');
                    // goto_back();
				}
    		}
    	}

	}
    public function saveEmployee($value='')
    {
       $data['custid']=user_id();
        
        $data['empid'] = $this->input->post('emp_id');
        $data['client_name'] = $this->input->post('comp_name');
        $data['emp_name'] = $this->input->post('emp_name');
        $data['location'] = $this->input->post('comp_landmark');
        $data['state'] = $this->input->post('comp_state');
        $data['state'] = $this->input->post('comp_state');
        $data['joining_date'] = $this->input->post('date');
        $data['designation'] = $this->input->post('designation');
        $data['phone_no'] = $this->input->post('emp_phone');
        $data['gross'] = $this->input->post('gross');
        $data['ctc'] = $this->input->post('ctc');
        //////

        $data['net'] = $this->input->post('net');
        $data['email'] = $this->input->post('emp_mail');
        $data['account_no'] = $this->input->post('accountno');
        $data['bank_name'] = $this->input->post('bname');
        $data['ifsc'] = $this->input->post('ifsc');
        $data['gender'] = $this->input->post('gender');
        $data['dob'] = $this->input->post('dob');
        $data['marital_status'] = $this->input->post('married');
        $data['emergency_contact_name'] = $this->input->post('ename');
        $data['emergency_contact_no'] = $this->input->post('ephone');
        ////
        $data['current_address'] = $this->input->post('caddress');
        $data['permanent_address'] = $this->input->post('paddress');
        $data['father_name'] = $this->input->post('father_name');
        $data['father_DOB'] = $this->input->post('fatherDOB');
        $data['father_adhar_no'] = $this->input->post('fatheradhar');
        $data['mothers_name'] = $this->input->post('mother_name');
        $data['mother_DOB'] = $this->input->post('motherDOB');
        $data['mother_adhar_no'] = $this->input->post('motheradhar');
        $data['spouse_name'] = $this->input->post('spousename');
        $data['spouse_DOB'] = $this->input->post('spouseDOB');

        //////
        $data['first_daughter_name'] = $this->input->post('fdname');
        $data['first_daughter_DOB'] = $this->input->post('fdDOB');
        $data['first_daughter_adhar'] = $this->input->post('fdadhar');
        $data['second_daughter_name'] = $this->input->post('sdname');
        $data['second_daughter_DOB'] = $this->input->post('sdDOB');
        $data['second_daughter_adhar'] = $this->input->post('sdadhar');
        $data['first_son_name'] = $this->input->post('fsname');
        $data['first_son_DOB'] = $this->input->post('fsDOB');
        $data['first_son_adhar'] = $this->input->post('fsadhar');
        $data['second_son_name'] = $this->input->post('ssname');
        //////
        $data['second_son_DOB'] = $this->input->post('ssDOB');
        $data['second_son_adhar'] = $this->input->post('ssadhar');

        $data['qulification'] = $this->input->post('qualification'); 
        $data['university'] = $this->input->post('university');
        $data['prev_company'] = $this->input->post('precomp');
        $data['prev_exp'] = $this->input->post('preexp');
        $data['total_yr_exp'] = $this->input->post('totalexp');
        $data['per_ref_first_name'] = $this->input->post('rname');
        $data['per_ref_first_address'] = $this->input->post('raddress');
        $data['per_ref_first_mobile_no'] = $this->input->post('rphone');
        ////
        $data['nominee_name'] = $this->input->post('nname');
        $data['voting_card_no'] = $this->input->post('voting');
        $data['driving_licence_no'] = $this->input->post('driving');
        $data['passport_no'] = $this->input->post('passport');
        $data['pan'] = $this->input->post('pan');
        $data['aadhar_card'] = $this->input->post('emp_adhar');
        $data['blood_group'] = $this->input->post('blood');
        $data['uan'] = $this->input->post('uno');
        $data['pf_no'] = $this->input->post('pfno');
        $data['esic_no'] = $this->input->post('esic');
        ///
        $data['joining_status'] = $this->input->post('joiningstatus');
        $data['last_working_date'] = $this->input->post('ldate');
        $data['manager_name'] = $this->input->post('mname');
        $data['manager_phone_no'] = $this->input->post('mphone');
        $data['manager_email'] = $this->input->post('memail');
        $data['hr_name'] = $this->input->post('hname');
        $data['hr_phone_no'] = $this->input->post('hphone');
        $data['hr_email'] = $this->input->post('hemail');
        $this->db->select('*');
        $this->db->from('employee_master');
        $this->db->where('empid',$data['empid']);
        $this->db->where('custid',$data['custid']);
        $result = $this->db->get()->result_array();
        if($result)
        {

             
            echo "<script>alert('This Employee ID already exist'); ";
            echo "window.location.href = '" . base_url() . "Employee/employeeList';";
            echo "</script>";
        }
        else
        {
            
            if($this->db->insert('employee_master',$data)){
                $type  = 1;
                $empid = $data['empid'];
                $email = $data['email'];
                $phone = $data['phone_no'];
                 $this->sendUsernamePassword($empid ,$type,$email,$phone);
                         
                $this->employeeList();
            }
                else{
                    $this->employeeList();
                }
        }
 
    }
    public function employeeList($value='')
    {
       $this->data['result']=$this->db->get('employee_master')->result();
        $this->render('employee/emplist');
    }
    public function update($value='')
    {
         $id=verify_id($this->uri->segment(3));
         $this->data['entity']= $this->db->where('empid',$id)->get('employee_master')->row();  
     
        $this->render('employee/editEmployee');
    }
    public function updateEmployee($value='')
    {
        $data['custid']=user_id();
        
        $data['empid'] = $this->input->post('emp_id');
        $data['client_name'] = $this->input->post('comp_name');
        $data['emp_name'] = $this->input->post('emp_name');
        $data['location'] = $this->input->post('comp_landmark');
        $data['state'] = $this->input->post('comp_state');
        $data['state'] = $this->input->post('comp_state');
        $data['joining_date'] = $this->input->post('date');
        $data['designation'] = $this->input->post('designation');
        $data['phone_no'] = $this->input->post('emp_phone');
        $data['gross'] = $this->input->post('gross');
        $data['ctc'] = $this->input->post('ctc');
        //////

        $data['net'] = $this->input->post('net');
        $data['email'] = $this->input->post('emp_mail');
        $data['account_no'] = $this->input->post('accountno');
        $data['bank_name'] = $this->input->post('bname');
        $data['ifsc'] = $this->input->post('ifsc');
        $data['gender'] = $this->input->post('gender');
        $data['dob'] = $this->input->post('dob');
        $data['marital_status'] = $this->input->post('married');
        $data['emergency_contact_name'] = $this->input->post('ename');
        $data['emergency_contact_no'] = $this->input->post('ephone');
        ////
        $data['current_address'] = $this->input->post('caddress');
        $data['permanent_address'] = $this->input->post('paddress');
        $data['father_name'] = $this->input->post('father_name');
        $data['father_DOB'] = $this->input->post('fatherDOB');
        $data['father_adhar_no'] = $this->input->post('fatheradhar');
        $data['mothers_name'] = $this->input->post('mother_name');
        $data['mother_DOB'] = $this->input->post('motherDOB');
        $data['mother_adhar_no'] = $this->input->post('motheradhar');
        $data['spouse_name'] = $this->input->post('spousename');
        $data['spouse_DOB'] = $this->input->post('spouseDOB');

        //////
        $data['first_daughter_name'] = $this->input->post('fdname');
        $data['first_daughter_DOB'] = $this->input->post('fdDOB');
        $data['first_daughter_adhar'] = $this->input->post('fdadhar');
        $data['second_daughter_name'] = $this->input->post('sdname');
        $data['second_daughter_DOB'] = $this->input->post('sdDOB');
        $data['second_daughter_adhar'] = $this->input->post('sdadhar');
        $data['first_son_name'] = $this->input->post('fsname');
        $data['first_son_DOB'] = $this->input->post('fsDOB');
        $data['first_son_adhar'] = $this->input->post('fsadhar');
        $data['second_son_name'] = $this->input->post('ssname');
        //////
        $data['second_son_DOB'] = $this->input->post('ssDOB');
        $data['second_son_adhar'] = $this->input->post('ssadhar');

        $data['qulification'] = $this->input->post('qualification'); 
        $data['university'] = $this->input->post('university');
        $data['prev_company'] = $this->input->post('precomp');
        $data['prev_exp'] = $this->input->post('preexp');
        $data['total_yr_exp'] = $this->input->post('totalexp');
        $data['per_ref_first_name'] = $this->input->post('rname');
        $data['per_ref_first_address'] = $this->input->post('raddress');
        $data['per_ref_first_mobile_no'] = $this->input->post('rphone');
        ////
        $data['nominee_name'] = $this->input->post('nname');
        $data['voting_card_no'] = $this->input->post('voting');
        $data['driving_licence_no'] = $this->input->post('driving');
        $data['passport_no'] = $this->input->post('passport');
        $data['pan'] = $this->input->post('pan');
        $data['aadhar_card'] = $this->input->post('emp_adhar');
        $data['blood_group'] = $this->input->post('blood');
        $data['uan'] = $this->input->post('uno');
        $data['pf_no'] = $this->input->post('pfno');
        $data['esic_no'] = $this->input->post('esic');
        ///
        $data['joining_status'] = $this->input->post('joiningstatus');
        $data['last_working_date'] = $this->input->post('ldate');
        $data['manager_name'] = $this->input->post('mname');
        $data['manager_phone_no'] = $this->input->post('mphone');
        $data['manager_email'] = $this->input->post('memail');
        $data['hr_name'] = $this->input->post('hname');
        $data['hr_phone_no'] = $this->input->post('hphone');
        $data['hr_email'] = $this->input->post('hemail');
        $this->db->where('empid',$data['empid']);
        $this->db->where('custid',$data['custid']);
        $this->db->update('employee_master',$data);
         
        $this->employeeList();
         
    }
    public function remove($empid='')
    {
        $custid = user_id();
        $id=verify_id($this->uri->segment(3));
         
       
        $this->db->where('empid',$id);
        $this->db->where('custid',$custid);
         $this->db->delete('employee_master');
        $this->employeeList();
    }
    

}
