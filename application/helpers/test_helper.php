<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// ------------------------------------------------------------------------
if (! function_exists('dd')) {
	# code...
	function dd($data='')
	  {	
	  		echo "<pre>";
	  	 	var_dump($data);
        	exit();
	  } 
}
// ------------------------------------------------------------------------
if (! function_exists('show_msg')) {
	# code...
	function show_msg()
	  {
	  	$CI =& get_instance();
	      return $CI->session->flashdata('msg');
	  } 
}
// ------------------------------------------------------------------------
if (! function_exists('put_msg')) {
	# code...
	function put_msg($msg)
	  {
	  	$CI =& get_instance();
	      return $CI->session->set_flashdata('msg',$msg);
	  } 
}
// ------------------------------------------------------------------------

if (! function_exists('goto_back')) {
	# code...
	function goto_back()
	  {	  	
	    echo "<script> window.history.back(); </script>";
	  } 
}
// ------------------------------------------------------------------------


if (! function_exists('is')) {
	# code...
	function is($value,$val="")
	  {	 
	  	$val=!empty($val)?$val:" "; 	
	    $i=!empty($value)?$value:$val;
		return $i;
	  } 
}
// ------------------------------------------------------------------------

if (! function_exists('alert')) {
	# code...
	function alert()
	  {	
	  	$CI =& get_instance();
	    $msg= $CI->session->flashdata('msg');
		if (!empty($msg)) {     
        	$data['msg'] =array('msg' => $msg);
       		return $CI->load->view('alert',$data);
       	}

	  } 
}
// ------------------------------------------------------------------------
if (!function_exists('test')) {

    function test($data, $exit = TRUE) {
        print '<pre>';
        print_r($data);
        print '</pre>';
        if ($exit)
            exit;
    }
}
// ------------------------------------------------------------------------
if (!function_exists('_goto')) {

    function __goto($text='') {
    	$url= !empty($text)?$text:"/";
    	
       return redirect(base_url(''.$url.''));
    }
}
// ------------------------------------------------------------------------
if (! function_exists('hash_id')) {
	
	function hash_id($id)
	{	  	
	    $CI =& get_instance();
	    //encryption
	    $CI->load->library('encryption');
	    $enc_id=$CI->encryption->encrypt($id);
		$enc_id=str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_id);
		return $enc_id;
		
	} 
}
// ------------------------------------------------------------------------
if (! function_exists('verify_id')) {
	
	function verify_id($id)
	{	  	
	    $CI =& get_instance();
	    $CI->load->library('encryption');
	    $dec_id=str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$dec_id=$CI->encryption->decrypt($dec_id);
		return $dec_id;
		
	} 
}
// ------------------------------------------------------------------------
if (! function_exists('trim_value')) {
	# code...
	function trim_value($value) 
	{ 
		$value= clean_string($value);
		$val=preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u','',$value);
		$val=strlen($val) == 0 ?'':trim($val);
		return $val;
	}

}
if (! function_exists('excelColumnRange')) {
	# code...
	function excelColumnRange($lower, $upper) {
	    ++$upper;
	    for ($i = $lower; $i !== $upper; ++$i) {
	        yield $i;
	    }
	}

}

if (! function_exists('deleteDir')) {
	function deleteDir($path) {
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
	}
}
if (! function_exists('clean_string')) {

     function clean_string($string){     
     	// $string=preg_replace('/[^A-Za-z0-9-]/', ' ', $string);
     	return $string=preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u','',$string);       
    }
}
if (! function_exists('safe_string')) {
     function safe_string($string){     	
     	return $string=trim(preg_replace('/\s\s+/', ' ', $string));       
    }
}

function idExists($needle='', $haystack=array())
{ 
    foreach ($haystack as $item) {
        if ($item['empid']===$needle) {
            return true;
        }
    }
    return false;
}
function is_month($month)
{
	$month_names= array("January","February","March","April","May","June","July","August","September","October","November","December");
	$m= strlen($month)==3 ? array_map('shortmonths',$month_names):$month_names;

	if (in_array($month, $m)) 
	  { 
	 	return TRUE;
	  } 
	else
	  { 
	  	return FALSE;
	  }
}
function shortmonths($month)
	{
	    return substr($month,0,3);
	}
function numberTowords($number)
{ 
	
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
      if ($points==0) {
          return $result . "Rupees  ";
          } 

  return $result . "Rupees  " . $points . " Paise";
} 


?>