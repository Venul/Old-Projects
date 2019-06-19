<?php

	/**
	* PHP class to creates array representations for common 1D barcodes to be used with TCPDF (http://www.tcpdf.org)
	* @name TCPDF
	* @link http://www.tcpdf.org
	*/

require_once('images/pdf/config/lang/eng.php');
require_once('images/pdf/tcpdf.php');

$id= $_GET["id"]; 
$id=286;
$host="62.149.150.155"; $user="Sql547995"; $pass="efe7c4ff"; $dbase="Sql547995_1";
$db = @mysql_connect($host,$user,$pass) or die("Could not connect: " . mysql_error()); mysql_select_db($dbase,$db);

$result=mysql_query("SELECT * FROM orders WHERE proforma='".$id."'");
$data=mysql_fetch_array($result,MYSQL_ASSOC); $rows=@mysql_num_rows($result);

$result2=mysql_query("SELECT * FROM utenti WHERE id='".$data[client_id]."'");
$intest=mysql_fetch_array($result2,MYSQL_ASSOC);

$result3=mysql_query("SELECT * FROM price WHERE id='".$intest[paese]."'");
$paese=mysql_fetch_array($result3,MYSQL_ASSOC);

$codsize=array("40","60","65","80","100","150");
$codpack=array(
			array("SF","BL8","BL12"),
			array("SF","CR1","BL1"),
			array("SF","CR1","BL1"),
			array("SF","CR1","BL1"),
			array("SF","CR1","BL1"),
			array("SF","CR1"));
			
//if ( !$rows || $rows==0 ) {
//	mysql_close();
//	echo "Значения $id в базе нет";
//	} else {

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

//do not show header or footer
$pdf->SetPrintHeader(false); $pdf->SetPrintFooter(false);

// set document information
$pdf->SetCreator(IDEENATALIZIE.COM);
$pdf->SetAuthor('IDEENATALIZIE.COM');
$pdf->SetTitle('Factura-Invoice');

// ---------------------------------------------------------
//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

//set some language-dependent strings
$pdf->setLanguageArray($l); 

// set font
$pdf->SetFont('candara', '', 10);
//$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table
// create some HTML content <td width="100%" height="740px">aaa</td>
$htmltable =	'<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="100%" height="740px">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="267px">
						<table border="0" cellspacing="0" cellpadding="0">
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td>LeonStyle di Kuznetsov Sergiy</td></tr>
							<tr><td>Via G. B. Pergolesi 18 - 20124 MILANO (MI)</td></tr>
							<tr><td>Tel: +39 02 87063478 - Fax: +39 02 36741793</td></tr>
							<tr><td>www.ideenatalizie.com - info@ideenatalizie.com</td></tr>
							<tr><td>Partita IVA 04945990960 - KZNSGY78M01Z138M</td></tr>
						</table>
					</td>
					<td width="4px"></td>
					<td width="267px">
						<table border="1" cellspacing="0" cellpadding="0">
							<tr>
								<td colspan="2" align="center">
									<table border="0" cellspacing="0" cellpadding="0" align="center">
										<tr><td>Document Type</td></tr>
										<tr><td>FATTURA-INVOICE</td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" cellspacing="0" cellpadding="0" align="center">
										<tr><td>N Document</td></tr>
										<tr><td>345</td></tr>
									</table>
								</td>
								<td>
									<table border="0" cellspacing="0" cellpadding="0" align="center">
										<tr><td>Document Date</td></tr>
										<tr><td>10/10/2013</td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" cellspacing="0" cellpadding="0" align="center">
										<tr><td>Client Code</td></tr>
										<tr><td>0023049</td></tr>
									</table>
								</td>
								<td>
									<table border="0" cellspacing="0" cellpadding="0" align="center">
										<tr><td>Tax Code</td></tr>
										<tr><td>IT05666688837</td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" cellspacing="0" cellpadding="0" align="center">
										<tr><td>Payment Conditions</td></tr>
										<tr><td>100% PREPAYMENT</td></tr>
									</table>
								</td>
								<td>
									<table border="0" cellspacing="0" cellpadding="0" align="center">
										<tr><td>Document Discount</td></tr>
										<tr><td></td></tr>
									</table>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr><td colspan="3" style="font-size:6px;">&nbsp;</td></tr>
				<tr>
					<td width="267px">
						<table border="1" cellspacing="0" cellpadding="0">
							<tr><td>
								<table border="0" cellspacing="0" cellpadding="0" style="background-color: #cccccc;">
									<tr><td>&nbsp;Sold to:</td></tr>
									<tr><td>&nbsp;'.$intest[impresa].'</td></tr>
									<tr><td>&nbsp;'.$intest[via].'</td></tr>
									<tr><td>&nbsp;'.$intest[cap].' - '.$intest[localita].' - '.$paese[country].'</td></tr>
								</table>
							</td></tr>
						</table>
					</td>
					<td width="4px"></td>
					<td width="267px">
						<table border="1" cellspacing="0" cellpadding="0">
							<tr><td>
								<table border="0" cellspacing="0" cellpadding="0" style="background-color: #cccccc;">
									<tr><td>&nbsp;Ship to:</td></tr>
									<tr><td>&nbsp;'.$intest[impresa].'</td></tr>
									<tr><td>&nbsp;'.$intest[via].'</td></tr>
									<tr><td>&nbsp;'.$intest[cap].' - '.$intest[localita].' - '.$paese[country].'</td></tr>
								</table>
							</td></tr>
						</table>
					</td>
				</tr>
				<tr><td colspan="3" style="font-size:6px;">&nbsp;</td></tr>
				<tr>
					<td width="538px" colspan="3">
						<table border="1" cellspacing="0" cellpadding="0">
							<tr><td>
								<table border="0" cellspacing="0" cellpadding="0" style="background-color: #cccccc;">
									<tr>
										<td width="70px" style="line-height:6px;">&nbsp;Article</td>
										<td width="233px" style="line-height:6px;">&nbsp;Description</td>
										<td width="30px" style="line-height:6px;" align="center">Um</td>
										<td width="50px" style="line-height:6px;" align="right">Q.ty&nbsp;</td>
										<td width="60px" style="line-height:6px;" align="right">Price&nbsp;</td>
										<td width="35px" style="line-height:6px;" align="right">Disc&nbsp;</td>
										<td width="60px" style="line-height:6px;" align="right">Amount&nbsp;</td>
									</tr>
								</table>
							</td></tr>
						</table>
					</td>
				</tr>
				<tr><td colspan="3" style="font-size:6px;">&nbsp;</td></tr>
				<tr>
					<td width="538px" colspan="3">
						<table border="0" cellspacing="0" cellpadding="0">';

						$result=mysql_query("SELECT * FROM orders WHERE proforma='".$id."'");
						while ($data=mysql_fetch_array($result,MYSQL_ASSOC)){   
							$htmltable.='<tr>
								<td width="70px">&nbsp;'.$codsize[$data[diametro]].'D'.$data[colors].$codpack[$data[diametro]][$data[packaging]].'</td>
								<td width="233px">&nbsp;Pallina di Natale in vetro soffiato personalizzata</td>
								<td width="30px" align="center">Pz</td>
								<td width="50px" align="right">100&nbsp;</td>
								<td width="60px" align="right">1,90&nbsp;</td>
								<td width="35px" align="right">&nbsp;</td>
								<td width="60px" align="right">100.190,00&nbsp;</td>
							</tr>
							<tr>
								<td width="70px">&nbsp;</td><td width="468px" colspan="6">&nbsp;Diametro: '.$codsize[$data[diametro]].' mm,&nbsp;Cappuccio: Oro</td>
							</tr>
							<tr>
								<td width="70px">&nbsp;</td><td width="468px" colspan="6">&nbsp;Colore di sfondo: Opaco Rosso</td>
							</tr>
							<tr>
								<td width="70px">&nbsp;</td><td width="468px" colspan="6">&nbsp;Colori di stampa: '.$data[colors].' (nero, bianco, rosso, blue)</td>
							</tr>
							<tr>
								<td width="70px">&nbsp;</td><td width="468px" colspan="6">&nbsp;Confezione: Singola di carta</td>
							</tr>
							<tr><td colspan="7">&nbsp;</td></tr>';
						}
						$htmltable.='</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>

</table>';
                          

// output the HTML content
$pdf->writeHTML($htmltable, true, 0, true, 0);

// set style for barcode
//$pdf->SetFont('helvetica', '', 10);
//$style = array('border' => 2, 'padding' => 'auto','fgcolor' => array(0,0,0), 'bgcolor' => false,);

// insert IMAGE
// Image method signature:
// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
// $pdf->setJPEGQuality(75);

// Example of Image from data stream ('PHP rules')
//$imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');
// The '@' character is used to indicate that follows an image data stream and not an image file name
//$pdf->Image('@'.$imgdata);

$pdf->Image('images/logo.png', 10, 10, 80, '', '', '', '', false, 300);          


// QRCODE,H : QR-CODE Best error correction
//$pdf->SetXY(186, 10);
//$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,H', '', '', 18, 18, $style, 'N');

// Set PDF protection (RSA 40bit encryption)
// $pdf->SetProtection  ($permissions  = array('print'), '', 'af12345678');

// Close and output PDF document
// I: send the file inline to the browser.
// D: send to the browser and force a file download with the name given by name.
// F: save to a local file with the name given by name.
// S: return the document as a string.

$pdf->Output('proforma.pdf', 'I');
//$pdf->Output('attachment/proforma/file.pdf', 'F');

//mysql_close($db);

//}

?>
