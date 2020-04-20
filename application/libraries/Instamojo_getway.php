<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  ======================================= 
 *  Author     : hitler Team
 *  License    : Protected 
 *  Email      : admin@hitler.com 
 * 
 *  ======================================= 
 */
require_once APPPATH . "/third_party/instamojo_payment_getway/src/Instamojo.php";
class Instamojo_getway {
	Protected $ista;
	Protected $api;
	Protected $API_KEY;
	Protected $AUTH_TOKEN;
	Protected $SALT;
	Protected $EndPoint;
	function __construct()
	{
		$this->ista= & get_instance();
		$this->ista->load->config('instamojo');
		$this->API_KEY =$this->ista->config->item('api_key');	
		$this->AUTH_TOKEN =$this->ista->config->item('auth_token');	
		$this->SALT =$this->ista->config->item('salt');	
		$this->EndPoint =$this->ista->config->item('end_point');	
		$this->api = new Instamojo\Instamojo($this->API_KEY, $this->AUTH_TOKEN,$this->EndPoint);
	}
	/*
		$data format is  for example:
		$data=array(
	        "purpose" => "for testing",
	        "amount" => "100",
	        "send_email" => true,
	        "email" => "tech@compliancetrack.in",
	        "redirect_url" => "http://thetatel.com/demo/payrole/Dashboard/success",
	        'buyer_name' => $name,
			'send_email' => true,
		    'webhook' => '',
		    'send_sms' => true,
		    'email' => $email,
		    'allow_repeated_payments' => false
	        );
	*/
	public function Set_payment($data='')
	{		
		try {
			    $response = $this->api->paymentRequestCreate($data);
				    // print_r($response);	  
				$long_url = $response['longurl'];
				header('Location:'.$long_url);
		}
		catch (Exception $e) {
		   		print('Error: ' . $e->getMessage());
		}
	}
	public function success($value='')
	{
		try {
		    $response = $this->api->paymentRequestStatus(['PAYMENT REQUEST ID']);
		    // print_r($response);
		     return $response;
		}
		catch (Exception $e) {
		    print('Error: ' . $e->getMessage());
		}
	}

}