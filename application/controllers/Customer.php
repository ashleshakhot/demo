<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/Base_controller.php";

class Customer extends Base_controller {
	public function __construct($value='')
	{
		parent::__construct();
	}
	public function index($value='')
	{
		$this->render('customerRegistration');		
	}
	
	public function save($value='')
	{		
		$this->load->model('Customer_model','cust');
		$this->form_validation->set_rules($this->rules());	
		$cust_type=1;	
		$custid=$this->cust->get_custid($this->input->post('comp_pin'),$cust_type);		
		// echo $custid;		
		$save_data = $this->security->xss_clean($this->fillup_data($cust_type,$custid));
		 if ($this->form_validation->run() == FALSE) { 
	         	// echo validation_errors();
	         	 dd(validation_errors());
             $this->lists();
	         	 // __goto('customer');
        } 
        else
        {
          if ($this->db->where('entity_email',$this->input->post('comp_mail'))->or_where('ph_no',$this->input->post('comp_phone'))->get('customer_master')->num_rows() > 0 ) {
            put_msg("Please provide uniq phone number and email");
             //__goto('customer');
             $this->lists();
          }
          else{
               	if ($this->cust->create_company($this->fillup_data($cust_type,$custid))) {
               		$this->cust->create_backup_company($this->backup_fillup_data($cust_type,$custid));
                  $this->sendUsernamePassword($custid,$cust_type,$this->input->post('comp_mail'),$this->input->post('comp_phone'));
                  //echo "save";
                  $this->lists();
               		
               	}
               	else
               	{
               		put_msg("something went wronge...!");
               		 __goto('customer');
               	}
              }
        }

	
	}
	public function edit($value='')
	{
		$this->load->model('Customer_model','cust');
		$this->form_validation->set_rules($this->rules());	
		$cust_type=1;	
		$custid=$this->input->post('custid');		
		// echo $custid;		
		$save_data = $this->security->xss_clean($this->fillup_data($cust_type,$custid));
		 if ($this->form_validation->run() == FALSE) { 
	         	// echo validation_errors();
	         	 put_msg(validation_errors());
	         	 __goto('customer');
	        } 
	        else
	        {
	         	if ($this->cust->edit_company($this->fillup_data($cust_type,$custid))) {
	         		$this->cust->create_backup_company($this->backup_fillup_data($cust_type,$custid));
	         		
	         	}
	         	else
	         	{
	         		put_msg("something went wronge...!");
	         		 __goto('customer');
	         	}
	        }

	}
	public function remove($value='')
	{
		$id=verify_id($this->uri->segment(3));
		$custid=$this->input->post('custid');
		$where=['custid'=>$custid];
		$this->db->delete('customer_master',$where);
	}
	public function lists($value='')
	{
		$this->data['result']=$this->db->get('customer_master')->result();
		$this->render('employee/list');
	}
	public function update($value='')
	{
		$id=verify_id($this->uri->segment(3));
		$this->data['entity']= $this->db->where('custid',$id)->get('customer_master')->row();	

		$this->render('editClient');
	}
	protected function rules()
	{
		$company_rules = array(               
               array(
                     'field'   => 'comp_pan', 
                     'label'   => 'Company PAN Number', 
                     'rules'   => 'required|xss_clean|strtoupper'
                  ),   
               array(
                     'field'   => 'comp_name', 
                     'label'   => 'Company Name', 
                     'rules'   => 'required|xss_clean'
                  ),
                array(
                     'field'   => 'comp_addr', 
                     'label'   => 'Company Address', 
                     'rules'   => 'required|xss_clean'
                  ),
                 array(
                     'field'   => 'comp_landmark', 
                     'label'   => 'Company Landmark', 
                     'rules'   => 'required|xss_clean'
                  ),
                  array(
                     'field'   => 'comp_state', 
                     'label'   => 'State', 
                     'rules'   => 'required|xss_clean'
                  ),
                  array(
                     'field'   => 'comp_pin', 
                     'label'   => 'Company Pincode', 
                     'rules'   => 'required|xss_clean|trim|numeric'
                  ),   
               array(
                     'field'   => 'comp_phone', 
                     'label'   => 'Corporate Phone Number', 
                     'rules'   => 'required|xss_clean|trim|numeric'
                  ),
                array(
                     'field'   => 'hr_ex_name', 
                     'label'   => 'HR Executive Name', 
                     'rules'   => 'required|xss_clean'
                  ),
                 array(
                     'field'   => 'hr_ex_mail', 
                     'label'   => 'HR Executive Email ', 
                     'rules'   => 'required|xss_clean|valid_email'
                  ),
                  array(
                     'field'   => 'hr_ex_phone', 
                     'label'   => 'HR Executive Phone Number', 
                     'rules'   => 'required|xss_clean|trim|numeric'
                  ),
                  array(
                     'field'   => 'hr_mg_name', 
                     'label'   => 'HR Manager Name', 
                     'rules'   => 'required|xss_clean'
                  ),
                 array(
                     'field'   => 'hr_mg_mail', 
                     'label'   => 'HR Manager Email ', 
                     'rules'   => 'required|xss_clean|valid_email'
                  ),
                  array(
                     'field'   => 'hr_mg_phone', 
                     'label'   => 'HR Manager Phone Number', 
                     'rules'   => 'required|xss_clean|trim|numeric'
                  ),
                  array(
                     'field'   => 'hr_vp_name', 
                     'label'   => 'HR Vice Precident Name', 
                     'rules'   => 'required|xss_clean'
                  ),
                 array(
                     'field'   => 'hr_vp_mail', 
                     'label'   => 'HR Vice Precident Email ', 
                     'rules'   => 'required|xss_clean|valid_email'
                  ),
                  array(
                     'field'   => 'hr_vp_phone', 
                     'label'   => 'HR Vice Precident Phone Number', 
                     'rules'   => 'required|xss_clean|trim|numeric'
                  ),


                  array(
                     'field'   => 'sp_ex_name', 
                     'label'   => 'Service Provider Executive Name', 
                     'rules'   => 'required|xss_clean'
                  ),
                 array(
                     'field'   => 'sp_ex_mail', 
                     'label'   => 'Service Provider Executive Email ', 
                     'rules'   => 'required|xss_clean|valid_email'
                  ),
                  array(
                     'field'   => 'sp_ex_phone', 
                     'label'   => 'Service Provider Executive Phone Number', 
                     'rules'   => 'required|xss_clean|trim|numeric'
                  ),
                  array(
                     'field'   => 'sp_mg_name', 
                     'label'   => 'Service Provider Manager Name', 
                     'rules'   => 'required|xss_clean'
                  ),
                 array(
                     'field'   => 'sp_mg_mail', 
                     'label'   => 'Service Provider Manager Email ', 
                     'rules'   => 'required|xss_clean|valid_email'
                  ),
                  array(
                     'field'   => 'sp_mg_phone', 
                     'label'   => 'Service Provider Manager Phone Number', 
                     'rules'   => 'required|xss_clean|trim|numeric'
                  ),
                  array(
                     'field'   => 'sp_vp_name', 
                     'label'   => 'Service Provider Vice Precident Name', 
                     'rules'   => 'required|xss_clean'
                  ),
                 array(
                     'field'   => 'sp_vp_mail', 
                     'label'   => 'Service Provider Vice Precident Email ', 
                     'rules'   => 'required|xss_clean|valid_email'
                  ),
                  array(
                     'field'   => 'sp_vp_phone', 
                     'label'   => 'Service Provider Vice Precident Phone Number', 
                     'rules'   => 'required|xss_clean|trim|numeric'
                  )
              );
			return $company_rules;
	}
	protected function fillup_data($custtype="",$custid="")
	{
		$save_data = array( 'custtype' 		=> $custtype,
							'custid'		=> $custid,
							'entity_pan' 	=> $this->input->post('comp_pan'),
							'entity_name' 	=> $this->input->post('comp_name') ,
							'address' 		=> $this->input->post('comp_addr') ,
							'landmark' 		=> $this->input->post('comp_landmark') ,
							'entity_email' 	=> $this->input->post('comp_mail') ,
							'pin' 			=> $this->input->post('comp_pin') ,
							'ph_no' 		=> $this->input->post('comp_phone') ,
              'gst'       => $this->input->post('gst') ,
              'cin'     => $this->input->post('cin') ,
							'res_person' 	=> $this->input->post('hr_ex_name') ,
							'res_email' 	=> $this->input->post('hr_ex_mail') ,
							'res_ph' 		=> $this->input->post('hr_ex_phone') ,
							'hr_person' 	=> $this->input->post('hr_mg_name') ,
							'hr_email' 		=> $this->input->post('hr_mg_mail') ,
							'hr_ph' 		=> $this->input->post('hr_mg_phone') ,
							'vp_person' 	=> $this->input->post('hr_vp_name') ,
							'vp_email'		=> $this->input->post('hr_vp_mail') ,
							'vp_ph' 		=> $this->input->post('hr_vp_phone') ,
							'dh_person' 	=> $this->input->post('sp_ex_name') ,
							'dh_email' 		=> $this->input->post('sp_ex_mail') ,
							'dh_ph' 		=> $this->input->post('sp_ex_phone') ,
							'dh_mgr' 		=> $this->input->post('sp_mg_name') ,
							'mgr_email' 	=> $this->input->post('sp_mg_mail') ,
							'mgr_ph' 		=> $this->input->post('sp_mg_phone') ,
							'dh_vp' 		=> $this->input->post('sp_vp_name') ,
							'dh_vp_email' 	=> $this->input->post('sp_vp_mail') ,
							'dh_vp_ph' 		=> $this->input->post('sp_vp_phone') ,
							'state' 		=> $this->input->post('comp_state'), 
							'branch_code' 	=> 1,
							
		 );
		
		return $save_data;
	}
	protected function backup_fillup_data($custtype, $custid)
	{
	 	$backup_save_data = array('custtype' 		=> $custtype ,
							'custid'		=> $custid,
													
							'entity_name' 	=> $this->input->post('comp_name') ,							
							'entity_email' 	=> $this->input->post('comp_mail') ,
							'pin' 			=> $this->input->post('comp_pin') ,
							'ph_no' 		=> $this->input->post('comp_phone')						
		 );
	 	return $backup_save_data;

	}
}