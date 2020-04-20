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

class Fileupload {
    public $file_name;
    public $file_path;
	public $error;
   
    public function upload($data='')
    {
    	if (!empty($data)) {
    	$path=$data['path'];
    	$allowed_type=$this->type_of_file(!empty($data['type'])?$data['type']:FALSE);
    	$config['upload_path'] = $path;
        $config['allowed_types'] = $allowed_type;
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $CI =& get_instance();
        $CI->load->library('upload', $config);
        $CI->upload->initialize($config);            
	        if (!$CI->upload->do_upload($data['file_name'])) {
                $this->error=$CI->upload->display_errors();
	            return FALSE;            
	        }
	        else
            {
                $pic = array('upload_data' => $CI->upload->data());
                
                $this->file_name = $pic['upload_data']['file_name'];
                $this->file_path = $path.$pic['upload_data']['file_name'];	                 
                return TRUE;
	        } 

    	}
    	else
    	{
    		return "Please share parameter";
    	}
    	
    }
    public function type_of_file($type='')
    {
    	$allowed_type='';
		switch(TRUE){
		    case ($type=="image" || $type=="photo" || $type=="picture"):
		        $allowed_type="gif|jpg|png|jpeg|bmp|GIF|JPG|JPEG|jpeg|BMP";
		        break;
		    case ($type=="excel"):
		        $allowed_type="xlsx|xls";
		        break;
		    case ($type=="pdf"):
		         $allowed_type="pdf";
		        break;		    
		    default:
		        $allowed_type="*";
		        break;
		}
		return $allowed_type;
    }
    public function file_name()
    {
        return $this->file_name;   
    }
    public function file_path()
    {
        return $this->file_path;   
    }
    public function error()
    {
        return $this->error;   
    }
    
}
?>