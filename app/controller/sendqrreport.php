<?php
if (get('complaint')) {
    $id = base64_decode(get('complaint'));
    $complaint = complaint::get_complaint_by_id($id);
    $TechnicalReports = complaint::get_reporting_reports($complaint['id'],1);
    $FactoryReports = complaint::get_reporting_reports($complaint['id'],2);
    $ResultReports = complaint::get_reporting_reports($complaint['id'],3);

    define('K_PATH_IMAGES', '/public/img/');


    //$pdf = new TCPDF('P', 'mm', 'A4');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    $pdf->AddPage('L', 'A4');

    $image_file = 'public/img/bienlogo.jpg';
    $pdf->Image($image_file, 20, 18, 25, '', 'JPG', '', 'T', false, 60, 'L', false, false, 0, false, false, false);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Cell(230, 18, "Döküman No: ".$complaint['id'], 0, 1, 'R');

    $pdf->SetFont('dejavusans', '', 10);
    $pdf->Cell(260, 19, "BİEN ŞİKAYET BİLDİRİM VE DEĞERLENDİRME RAPORU", 0, 1, 'C');



    $pdf->SetFont('dejavusans', '', 6);
    $tbl1 = '
<table border="1" nobr="true">
 <tr>
   <td colspan="1" align="center">Firma</td>
   <td colspan="1" align="center">Bien Seramik</td>
  </tr>
  <tr>
   <td colspan="1" align="center">Döküman Tipi</td>
   <td colspan="1" align="center"> K2D</td>
  </tr>

  <tr>
    <td colspan="1" align="center"> Şikayet Detayı</td>
    <td colspan="1" align="center">'. complaint::get_complaint_type_by_id($complaint['complaintType']).'</td>
  </tr>
  <tr>
    <td colspan="1" align="center"> Tip</td>
	<td colspan="1" align="center">'.$complaint['category'].'</td>
  </tr>
    <tr>
    <td colspan="1" align="center"> Satıcı Bayi</td>
	<td colspan="1" align="center">'.$complaint['sealer'].'</td>
  </tr>
  <tr>
    <td colspan="1" align="center"> Müşteri Adı</td>
	<td colspan="1" align="center">'. $complaint['name']. " " . $complaint['surname'].'</td>
  </tr>
  <tr>
    <td colspan="1" align="center">Müşteri Telefon  </td>
	<td colspan="1" align="center">'.$complaint['phone'].'</td>
  </tr>
  <tr>
    <td colspan="1" align="center">Müşteri E-mail </td>
	<td colspan="1" align="center">'.$complaint['email'].'</td>
  </tr>
  <tr>
   <td colspan="1" align="center"> Problem Tarihi</td>
    <td colspan="1" align="center">'.$complaint['createdDate'].'</td>
  </tr>


</table>
';


    $pdf->writeHTML($tbl1, true, false, false, false);

    $pdf->SetFont('dejavusans', '', 6);

    $tbl = '
<table border="1" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
 <th colspan="1" align="center"> Ebat</th>
  <th colspan="1" align="center">Ürün Adı</th>
  <th colspan="1" align="center">Renk </th>
  <th colspan="1" align="center">Metraj</th>
  <th colspan="1" align="center">Üretici Fabrika</th>

 </tr>
  <tr>
  <th colspan="1" align="center">'.$complaint["productSize"].'</th>
  <th colspan="1" align="center">'.complaint::get_product_name($complaint['productType'],$complaint['productName'])['name'].'</th>
  <th colspan="1" align="center">'.complaint::get_product_name($complaint['productType'],$complaint['productName'])['name'].'</th>
  <th colspan="1" align="center">'.$complaint["productQuantity"]." m2".'</th>
  <th colspan="1" align="center">'.complaint::get_factory_name($complaint['factoryAuth']).'</th>
 </tr>

</table>
';
    $pdf->writeHTML($tbl, true, false, false, false, '');

    $technicalText = "";

    foreach ($TechnicalReports as $technicalReport){


        $technicalText .= $technicalReport['message']."\n";
    }
    $pdf->SetFont('dejavusans', '', 7);
    $pdf->setCellPaddings(0, 0, 0, 0);
    $pdf->setCellMargins(1, 1, 1, 1);
    $pdf->SetFillColor(220, 220, 220);
    $pdf->Write(0, 'Teknik Değerlendirme Yorumları:', '', 0, 'L', true, 0, false, false, 0);
    $pdf->SetFont('dejavusans', '', 7);
    $pdf->setCellPaddings(0, 0, 0, 0);
    $pdf->setCellMargins(1, 1, 1, 1);
    $pdf->SetFillColor(220, 220, 220);
    $pdf->MultiCell(265, 10, $technicalText , 1, 'L', 1, 0, '', '', true);
    $pdf->Ln();



    $pdf->Write(0, 'Sonuç Değerlendirme Yorumları:', '', 0, 'L', true, 0, false, false, 0);
    $pdf->SetFont('dejavusans', '', 7);
    $pdf->setCellPaddings(1, 1, 1, 1);
    $pdf->setCellMargins(1, 1, 1, 1);
    $pdf->SetFillColor(220, 220, 220);
    $resultText = "";
    foreach ($ResultReports as $resultReport){
        $resultText .= $resultReport['message']."\n";
    }
    $pdf->MultiCell(265, 10, $resultText , 1, 'L', 1, 0, '', '', true);
    $pdf->Ln();





    $pdf->Ln(3);

    $pdf->SetFont('dejavusans', 'B', 7);
    $tbl4 = '
    <table border="0" cellpadding="2" cellspacing="2" nobr="true">
    <tr>
    <td colspan="1" align="center">Teknik Hizmetler '.($complaint['companyId']==2 ? 'Şefi':'Hizmetler Formeni').'</td>
	<td colspan="1" align="center">Kalite Güvence Ve Proses Kontrol Müdürü</td>
	<td colspan="1" align="center">Fabrikalar Direktörü</td>
	</tr>
	<tr>
	<td colspan="1" align="center">Cenk SENOTAY</td>
	<td colspan="1" align="center">Ahmet PEHLİVAN</td>
	<td colspan="1" align="center">Yavuz ARICAN </td>
	</tr>

    </table>
    ';
    $pdf->writeHTML($tbl4, true, false, false, false);
    $pdf->Ln(5);
    $pdf->SetFont('dejavusans', '', 6);
    $tbl3 = '
  <table border="0" cellpadding="4" cellspacing="4" nobr="true">
   <tr>
     <th colspan="1" align="center">Bu belge elektronik ortamda imzalanmıştır.</th>
   </tr>
 </table>
';
    $pdf->writeHTML($tbl3, true, false, false, false);


    $pdf->Ln();
    $pdf->SetFont('dejavusans', '', 6);
    $tbl2 = '
<table border="0" cellpadding="0" cellspacing="0" nobr="false">
 <tr>
  <th colspan="1" align="center">Yayın tarihi: 13.05.2013</th>
  <th colspan="1" align="center">Revizyon No :</th>
  <th colspan="1" align="center">Revizyon Tarih </th>
  <th colspan="1" align="center"> Döküman No: FMD-07.35</th>
 </tr>
 </table>
';
    $pdf->writeHTML($tbl2, true, false, false, false);

    $pdf->Output();






}

?>
