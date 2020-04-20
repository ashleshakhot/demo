<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_controller extends CI_Controller
{
  protected $data = array();
  protected $admin = false;
  protected $hr = false;
  protected $manager = false;
  protected $employee = false;
  function __construct()
  {
    parent::__construct();
    if (Is_login() == TRUE) {   
       // $this->load->model('Employee_model','emp');
        $this->data['page_title'] = 'Complaincetrack';
        $this->data['where'] = '';
        $this->data['sub_menu'] = '';
        /*AUTHOR AUTHOUNDICATION*/
        $this->set_user_access(); 
        $this->set_constance();                                  
    }
    else{    
        __goto('logout');
    }
  }
  protected function set_constance($value='')
  {
    define('USERNAME',username());
    define('USER_TYPE',user_type());
    define('USER_ID',user_id());
    define('ADMIN',$this->admin);
    define('HR',$this->hr);
    define('MANAGER',$this->manager);
    define('EMPLOYEE',$this->employee); 
  }
  protected function menu($menu){ 
    $this->data['menu_list'] = json_decode($menu);
  }   

  protected function render($template = ''){
    $this->load->view('layout/header', $this->data);
    $this->load->view($template, $this->data);
    $this->load->view('layout/footer');          
  }

  private function set_user_access(){
    $menu;
    switch (user_type()) {   
      case 9:
          $this->admin=TRUE;
          $menu=file_get_contents(APPPATH."/json/admin_menu.json");          
          break;
      case 1:
          $this->hr=TRUE;
          $menu=file_get_contents(APPPATH."/json/hr_menu.json");
          break;
      case 2:
          $this->manager=TRUE;
          $menu=file_get_contents(APPPATH."/json/manager_menu.json");         
          break;
      case 3:
          $this->employee=TRUE;
          $menu=file_get_contents(APPPATH."/json/employee_menu.json");        
          break;    
      default:
          echo "Sorry the script are not working,, you are not authorise user please enter valid username and password";
          header( "refresh:8;url=".__goto('logout')."");        
    }

    $this->menu($menu);
  }
  protected function sendUsernamePassword($empid='',$type='',$email='',$phone='')
    {
        $this->load->helper('Password');
        $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        $Password=uniqid();
        $pass= $hasher->HashPassword($Password);
        $user = array('id' => $empid,
                            'username'=>$empid,
                            'password'=>$pass,
                            'user_type'=>$type,
                            'access_code'=>1,
         );
        $this->db->insert('users',$user);
        $message = "Welcome to Attendand Management System. Please note the Username is ".$empid." & Password is ".$Password." for all your future reference.";
            $this->load->library('email'); 
            $this->email->from();
            $this->email->to($email);
            $this->email->subject('Username and Password are set.');
            $this->email->message($message);
            if($this->email->send())
            {
                $this->email->sendsms($phone,$message);
            }  
            return true; 
        
    }

  

}