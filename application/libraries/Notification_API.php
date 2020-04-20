<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  ======================================= 
 *  Author     : Web Preparations Team
 *  License    : Protected 
 *  Email      : admin@webpreparations.com 
 * 
 *  ======================================= 
 */
class Notification_API {
	public $url='http://compliancetrack.in/testapi.php';
	public $API='';
	public $API_KEY='ke98$@!KJKkdi849nkjdk';
    public function __construct() {
         
        $CI =& get_instance();
        
    }
    
    /*
	 *  ======================================= 
	 *  FUNCTION     	: read
	 *  DESCRIPTION    	: Read the feedback  
	 *  ======================================= 
	 */
    public function get($value='')
    {	
    	$this->API = curl_init($this->url);	
		curl_setopt($this->ch, CURLOPT_HTTPGET, true);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($this->ch);
		curl_close($this->ch);
		$response=json_decode($response_json, true);
		$save=array();
      	$i=0;
     	if (!empty($r)) {
      		foreach ($response as $result) {
      			if ($result->key !== NULL) {     			         
	        		$save[$i] =array('name'=> $result->name,
	                         'organisation'=> $result->org,
	                         'mobileno'=> $result->number,
	                         'email'=> $result->mail,
	                         'message'=> $result->msg,
	                         'status'=> $result->status
	                       );
	        		$i++;    
      			}
      		}
      		if (!empty($save)) {
      			if($CI->db->insert_batch('tbl_customer_msg',$save))
      			{
      				$this->put($this->API_KEY);
      			}
      		}
      	     
     	}
     	return TRUE;
    }
    /*
	 *  ======================================= 
	 *  FUNCTION     	: put
	 *  DESCRIPTION    	: update new feedback to old  
	 *  ======================================= 
	 */
    public function put($value='')
    {
    	$this->url=$this->url.'/'.$this->API_KEY;
    	$this->API = curl_init($this->url);
    	$data=array('API_VIEW'=>0);
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($this->ch);
		curl_close($this->ch);
		$response=json_decode($response_json, true);
    }
    /*
	 *  ======================================= 
	 *  FUNCTION     	: remove 
	 *  DESCRIPTION    	: Delete all data of compliancetrack  
	 *  ======================================= 
	 */
    public function remove($value='')
    {
    	
    }
    /*
	 *  ======================================= 
	 *  FUNCTION    	 : delete
	 *  DESCRIPTION  	 : delete specific feedback
	 *  ======================================= 
	 */
    public function delete($key='')
    {
    	
    }


}
?>