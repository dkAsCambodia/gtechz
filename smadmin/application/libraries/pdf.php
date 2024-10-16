<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='a4', $orientation='portrait'){
        $dompdf = new Dompdf\DOMPDF();
        $dompdf->set_option('isRemoteEnabled',TRUE);
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->set_option('setIsPhpEnabled',TRUE);
        //define ("DOMPDF_DEFAULT_PAPER_SIZE", "letter");
        $dompdf->render();
        //$dompdf->stream($filename.'.pdf', array('Attachment' => 1));
         if($download)
             $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
         else
             $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }
}
?>