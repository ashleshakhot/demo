<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/Base_controller.php";
class Ot extends Base_controller {
	public function __construct($value='')
	{
		parent::__construct();
		// $this->load->model('Leave_model');
	}

	
	public function index($value='')
	{
		if ($this->employee==TRUE) 
			$this->render('ot/details');
		else
			__goto();
	}
}