<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}
	public function check_login($value)
	{
		$this->load->helper('Password');
    	$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
		$username=$value['username'];
		$password= $value['password'];
		$where = array('username ' => $username);
		$result=$this->db->where($where)->get('users');		
		if ($result->num_rows() > 0) {
			$result=$result->row();
			$hashpass=$result->password;
			$type=$result->user_type;
			$accesscode=$result->access_code;

			// echo $hasher->HashPassword('demo@123');
			// var_dump($hasher->CheckPassword($password, $hashpass));
			// exit();

			if($hasher->CheckPassword($password, $hashpass)) 
			{
				if($accesscode == "1") 
				{
				 	$sess_data = array(		    						
		    						'SESS_USER_NAME' => $result->username,
		    						'TYPE'=> $type,
		    						'ID' =>$result->id,
		    						
		    					);		        
				  		
			    	$this->session->set_userdata($sess_data);
					return TRUE;
				}
				else
				{
					put_msg("access deniedted");
					return FALSE;
				}
				
			}
			else
			{
				put_msg("Wrong Password");
				return FALSE;
			}
		}
		else
		{
			put_msg("wrong username");
			return FALSE;
		}
		
	}
}