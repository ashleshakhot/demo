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
use Dompdf\Dompdf;
use Dompdf\Options;
class D_pdf {
	public function __construct($value='')
	{
		# code...

		require_once dirname(__FILE__).'/dompdf/autoload.inc.php';
		$options = new Options();
		$options->set('defaultFont', 'Courier');
		$options->set('isRemoteEnabled', TRUE);
		$options->set('debugKeepTemp', TRUE);
		$options->set('isHtml5ParserEnabled', true);
		$pdf= new DOMPDF($options);
		$contxt = stream_context_create([ 
		    'ssl' => [ 
		        'verify_peer' => FALSE, 
		        'verify_peer_name' => FALSE,
		        'allow_self_signed'=> TRUE
		    ] 
		]);
		$pdf->setHttpContext($contxt);
		$CI= & get_instance();
		$CI->dompdf=$pdf;
	}

}
