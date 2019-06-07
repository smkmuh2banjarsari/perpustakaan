<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define( 'DOM_DIR', APPPATH.'libraries/' );

require_once(DOM_DIR."dompdf/autoload.inc.php");

use Dompdf\Dompdf;

class Pdf  {

	public function nilai_ujian($html, $filename="a", $stream=true, $papersize = 'A4', $orientation = 'portrait')
	{
		$dompdf = new DOMPDF();
		$dompdf->loadHtml($html);
		$dompdf->setPaper($papersize, $orientation);
		$dompdf->render();

        if ($stream) {
			$options['Attachment'] = 0;
            $options['Accept-Ranges'] = 0;
            $options['compress'] = 1;
			
			$dompdf->stream($filename.".pdf", $options);
		} else {
			return $dompdf->output();
		}
	}
}
