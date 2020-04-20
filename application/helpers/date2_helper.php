<?php

defined('BASEPATH') OR exit('No direct script access allowed');
if (! function_exists('this_month')) {
	
	function this_month($month,$year='')
	{	  	
	    $year=!empty($year)?$year:date('Y');
	    if (strtotime($month." ".$year) == strtotime(date('M Y'))) {
	    	return TRUE;
	    }
	    else
	    {
	    	return FALSE;
	    }
		
	} 
}


	// ------------------------------------------------------------------------
if (! function_exists('is_last_month')) {
	
	function is_last_month($month,$year='')
	{	  	
	   //$ab = date_default_timezone_get(); 
			//date_default_timezone_set($ab);
			date_default_timezone_set("Asia/Kolkata");
		$lastyear=!empty($year)?$year:date('Y'); 
		$currmonth=date("M");//Janaury
		$lastmonth=Date('M', strtotime($currmonth . " last month"));//Janaury
			if (strtotime($lastmonth." ".date('Y')) == strtotime($month." ".$lastyear)) {
	    		return TRUE;
		    }
		    else
		    {
		    	return FALSE;
		    }
		
	} 
}
// ------------------------------------------------------------------------
	if (! function_exists('before_months')) {
	
	function before_months($month,$year='')
	{	  	
	   //$ab = date_default_timezone_get(); 
			//date_default_timezone_set($ab);
		date_default_timezone_set("Asia/Kolkata");
			$a= 12 - date('m');
		$byear=!empty($year)?$year:date('Y');
		for ($i = 1; $i <= $a; $i++) 
		{
		   $months = date("M", strtotime( date( 'M' )." +$i months"));
		   if (strtotime($months." ".date('Y')) == strtotime($month." ".$byear)) {
	    		$a = TRUE;	    		
		    }
		    else
		    {
		    	$a = FALSE;
		    }
		    if ($a == TRUE) {
		    	return TRUE;
		    	break;
		    }		   
		}		
		
	} 
}

function getTotalDays($year, $month, $day){
     $count=0;
        $from = $year."-".$month."-01";        	 
        $t=date("t",strtotime($from));
        for($i=1; $i<$t; $i++){
           if( strtolower(date("l",strtotime($year."-".$month."-".$i))) == strtolower($day)){             	
             $count++;
          }          	  
      }     
      return $count;
 }

 function hours_tofloat($val){
    if (empty($val)) {
        return 0;
    }
    $parts = explode(':', $val);
    return $parts[0] + floor(($parts[1]/60)*100) / 100;
}


?>