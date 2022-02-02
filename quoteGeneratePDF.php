<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('pdf/examples/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('18J');
$pdf->setTitle('Quotation');
$pdf->setSubject('Quotatio');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
//$pdf->setFont('times', 'BI', 20);

// add a page
$pdf->AddPage();

$html = file_get_contents('https://18jorissen.co.za/app/getQuoteHtml.php?id='.$last_id);

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF documents

$path = 'C:\xampp\htdocs\18J\generatedPDFs\\'.$PDFfilename;
$path = 'https://18jorissen.co.za/app/generatedPDFs/'.$PDFfilename;
$path = '/public_html/app/generatedPDFs/'.$PDFfilename;
//echo realpath($_SERVER["DOCUMENT_ROOT"]); exit(); die();
//echo realpath($_SERVER["DOCUMENT_ROOT"])."/".$PDFfilename; exit(); die();
$path = realpath($_SERVER["DOCUMENT_ROOT"])."/".$PDFfilename;
$path = "/public_html/app/generatedPDFs/".$PDFfilename;
$path = $_SERVER['DOCUMENT_ROOT']."generatedPDFs/$PDFfilename";
$path = "/public_html/app/generatedPDFs/$PDFfilename";
//echo $path; exit(); die();

//echo is_dir("/public_html/app/generatedPDFs/"); exit(); die();

echo file_exists("/public_html/app/generatedPDFs/testtt.txt"); exit(); die();

echo $pdf->Output($path, 'F');

//$pdf->Output('example_006.pdf', 'I');

//exit(); die();