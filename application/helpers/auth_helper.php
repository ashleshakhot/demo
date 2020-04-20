<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (! function_exists('user_id')) {
	# code..
	function user_id()
	  {
	  	$CI =& get_instance();
	    $userID=!empty($CI->session->ID)?$CI->session->ID:0;
	    return $userID;
	  } 
}

// ------------------------------------------------------------------------
if (! function_exists('username')) {
	# code...
	function username()
	  {
	  	$CI =& get_instance();
	  	$user=!empty($CI->session->SESS_USER_NAME)?$CI->session->SESS_USER_NAME:"HACKER";								
	      return $user;
	  } 
}
// ------------------------------------------------------------------------
if (! function_exists('user_type')) {
	# code...
	function user_type()
	  {
	  	$CI =& get_instance();
	  	$type=!empty($CI->session->TYPE)?$CI->session->TYPE:0;								
	      return $type;
	  } 
}
// ------------------------------------------------------------------------
if (!function_exists('Is_login')) {
	function Is_login()
	{
		$CI =& get_instance();
		if (!empty($CI->session->ID) && $CI->session->ID !== '') {
          return TRUE;
	    }
	    else
	    {
	      return FALSE;
	    }
	}
}



?>