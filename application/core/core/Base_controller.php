<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_controller extends CI_Controller
{
  protected $data = array();
  protected $SAB = false;// Site Admin for Boss login
  protected $SAE = false;// Site Admin for Operator/Employee login
  protected $SCB = false;// Site Customer for Boss login
  protected $SCE = false;// Site Customer for Operator/Employee login
  // protected $page = array();
  function __construct()
  {
    parent::__construct();
    if (Is_login() == TRUE) {   
       // $this->load->model('Employee_model','emp');
        $this->data['page_title'] = 'Complaincetrack';
        $this->data['where'] = 'Home';
        $this->data['sub_menu'] = 'Dashboard';
        $menu=file_get_contents(APPPATH."/json/menu.json");
        $this->data['menu_list'] = json_decode($menu);
       /*AUTHOR AUTHOUNDICATION*/
        $this->set_user_access(); 
          define('USERNAME',username());
          define('USER_TYPE',user_type());
          define('USER_ID',user_id());
          define('SAB',$this->SAB);
          define('SAE',$this->SAE);
          define('SCB',$this->SCB);
          define('SCE',$this->SCE);
                                  
    }
    else{    
        _goto('logout');
    }
  }
    

  protected function render($template = '')
  {
    $this->load->view('layout/header', $this->data);
    $this->load->view($template, $this->data);
    $this->load->view('layout/footer');
          
  }

  private function set_user_access()
  {
    switch (user_type()) {
      case 9:
          $this->SAB=true;
          break;
      case 8:
          $this->SAE=true;
          break;
      case 1:
          $this->SCB=true;
          break;
       case 2:
          $this->SCE=true;
          break;    
      default:
        echo "Sorry the script are not working,, you are not authorise user please enter valid username and password";
        header( "refresh:5;url="._goto('logout')."");
        
    }
  }

  

}