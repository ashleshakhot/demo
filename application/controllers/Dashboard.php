<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/Base_controller.php";

class Dashboard extends Base_controller {
	public function __construct($value='')
	{
		parent::__construct();
	}
	public function index($value='')
	{
		$this->render('dashboard');		
	}
	// public function hr($value='')
	// {
	// 	$menu=file_get_contents(APPPATH."/json/hr_menu.json");
 //        $this->data['menu_list'] = json_decode($menu);
	// 	$this->load->view('layout/header',$this->data);
	// 	$this->load->view('customerRegistration');
	// 	$this->load->view('layout/footer');
	// }
	// public function employee($value='')
	// {
	// 	$menu=file_get_contents(APPPATH."/json/employee_menu.json");
 //        $this->data['menu_list'] = json_decode($menu);
	// 	$this->load->view('layout/header',$this->data);
	// 	$this->load->view('customerRegistration');
	// 	$this->load->view('layout/footer');
	// }
	// public function superwiser($value='')
	// {
	// 	$menu=file_get_contents(APPPATH."/json/manager_menu.json");
 //        $this->data['menu_list'] = json_decode($menu);
	// 	$this->load->view('layout/header',$this->data);
	// 	$this->load->view('customerRegistration');
	// 	$this->load->view('layout/footer');
	// }
	public function FunctionName($value='')
	{
		# code...
	}
}