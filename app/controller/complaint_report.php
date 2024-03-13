<?php
if (get('complaint')) {

    $id = base64_decode(get('complaint'));
    $complaint = complaint::get_complaint_by_id($id);

    $companyid=$complaint['companyId'];
    if ($companyid==8){
       $cg= '<td colspan="1" align="center">Arge ve Teknoloji Direktörü</td>';
       $cg1='<td colspan="1" align="center">Canan Güven</td>';
    }
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

    if($companyid==2){
        $image_file = 'public/img/bienlogo.jpg';
    }
    else if($companyid==8){
        $image_file = 'public/img/qualogo.jpg';
    }
    $pdf->Image($image_file, 20, 18, 25, '', 'JPG', '', 'T', false, 60, 'L', false, false, 0, false, false, false);

    $pdf->SetFont('dejavusans', '', 9);
    $pdf->Cell(230, 18, "Döküman No: ".$complaint['id'], 0, 1, 'R');


    $pdf->SetFont('dejavusans', '', 10);
    if($companyid==2){
        $pdf->Cell(260, 19, "BİEN ŞİKAYET BİLDİRİM FORMU", 0, 1, 'C');
    }
    else if($companyid==8){
        $pdf->Cell(260, 19, "QUA ŞİKAYET BİLDİRİM FORMU", 0, 1, 'C');
    }


    $pdf->SetFont('dejavusans', '', 6);
    $tbl1 = '
<table border="1" nobr="true">
 <tr>
   <td colspan="1" align="center">Firma</td>
   <td colspan="1" align="center">'.($companyid==2 ? 'Bien Seramik':'Qua').'</td>
  </tr>
   <tr>
    <td colspan="1" align="center">Döküman Tipi</td>
    <td colspan="1" align="center"> '. complaint::get_document_name($complaint['document_type']).'</td>
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

    if ($complaint['companyId']==2){
        $prod=complaint::get_product_name($complaint['productType'],$complaint['productName'])['name'];
    }
    if ($complaint['companyId']==8){
        $prod=quamutlu::get_product_name($complaint['productName'])['productName'];
    }
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
  <th colspan="1" align="center">'.$prod .'</th>
  <th colspan="1" align="center">'.$prod.'</th>
  <th colspan="1" align="center">'.$complaint["productQuantity"]." m2".'</th>
  <th colspan="1" align="center">'.complaint::get_factory_name($complaint['factoryAuth']).'</th>
 </tr>

</table>
';
    $pdf->writeHTML($tbl, true, false, false, false, '');



    $pdf->Ln();


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
if (!empty($FactoryReports)) {
    $factoryText = "";
    foreach ($FactoryReports as $factoryReport) {
        $factoryText .= $factoryReport['message'] . "\n";
    }
    $pdf->Write(0, 'Fabrika Değerlendirme Yorumları:', '', 0, 'L', true, 0, false, false, 0);
    $pdf->setCellPaddings(0, 0, 0, 0);
    $pdf->setCellMargins(1, 1, 1, 1);
    $pdf->SetFillColor(220, 220, 220);
    $pdf->MultiCell(260, 10, $factoryText, 1, 'L', 1, 0, '', '', true);
    $pdf->Ln();

}
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
    <td colspan="1" align="center">Teknik Hizmetler '.($companyid==2 ? 'Şefi':'Formeni').'</td>
	<td colspan="1" align="center">'.($companyid==2 ? 'Kalite Güvence Ve Proses Kontrol Müdürü':'Proses Kalite Kontrol Şefi').' </td>
	<td colspan="1" align="center">Fabrikalar Direktörü</td>
    '.$cg.'
	</tr>
	<tr>
	<td colspan="1" align="center">'.($companyid==2 ? 'Cenk SENOTAY':'Aykut Topal').'</td>
	<td colspan="1" align="center">'.($companyid==2 ? 'Ahmet PEHLİVAN':'Hasan Hüseyin Topoz').'</td>
	<td colspan="1" align="center">'.($companyid==2 ? 'Yavuz Arıcan':'Yavuz Arıcan').'</td>
	 '.$cg1.'
	</tr>

    </table>
    ';
    $pdf->writeHTML($tbl4, true, false, false, false);
	    $pdf->SetFont('dejavusans', '', 6);


    if ( $complaint["technicalConfirm"] ==1) {
        if($companyid==2){
            $txt = "Bu belge Cenk SENOTAY  tarafından dijital ortamda onaylanmıştır.";
        }else if ($companyid==8){
            $txt = "Bu belge Aykut Topal  tarafından dijital ortamda onaylanmıştır.";
        }

        $pdf->MultiCell(80, 8, $txt, '', 'R', '', 2, 20, 160, true);

    }
    if ( $complaint["processConfirm"] ==1) {
        if($companyid==2){
            $txt1 = "Bu belge Ahmet PEHLİVAN tarafından  dijital ortamda onaylanmıştır.";
        }else if ($companyid==8){
            $txt = "Bu belge Hasan Hüseyin Topoz  tarafından dijital ortamda onaylanmıştır.";
        }
        $pdf->MultiCell(80, 8, $txt1, '', 'R', '', 2, 180, 160, true);

    }

    if ( $complaint["factoryConfirm"] ==1) {
        if($companyid==2){
            $txt2 = "Bu belge Yavuz ARICAN tarafından  dijital ortamda onaylanmıştır.";
        }else if ($companyid==8){
            $txt2 = "Bu belge Yavuz ARICAN tarafından  dijital ortamda onaylanmıştır.";
        }
        $pdf->MultiCell(80, 8, $txt2, '', 'R', '', 2, 200, 160, true);
    }


	 $pdf->Ln(2);
    $pdf->SetFont('dejavusans', '', 6);
    $tbl2 = '
<table border="0" cellpadding="0" cellspacing="0" nobr="false">
 <tr>
  <th colspan="1" align="center">Yayın tarihi:</th>
  <th colspan="1" align="center">Revizyon No : </th>
  <th colspan="1" align="center">Revizyon Tarih </th>
  <th colspan="1" align="center"> Döküman No: </th>
  </tr>
 <tr>
   <th colspan="1" align="center">'.$complaint['createdDate'].'</th>
   <th colspan="1" align="center">01 </th>
   <th colspan="1" align="center">'.$complaint['updatedDate'].'</th>
   <th colspan="1" align="center"> FMD-07.35</th>

 </tr>
 </table>
';
    $pdf->writeHTML($tbl2, true, false, false, false);




    //  $url = "SITE_URL/sendqrreport.php?complaint=.base64_encode($complaint[id]) : ''";


    $url = site_url("sendqrreport.php?complaint=.base64_encode($complaint[id]) : ''");
    $qr_code = "'https://chart.googleapis.com/chart?chs=40x40&cht=qr&chl='.$url";
    //$qr_code = (new QRCode)->render($url);

   $pdf->Image($qr_code, 240, 35, 17, '', 'PNG', '', 'T', false, 0, 'R', false, false, 0, false, false, false);
    if($companyid==2){
        $image_file1 = 'public/img/destek.png';
        $pdf->Image($image_file1, 220, 168, 18, '', 'PNG', '', 'T', false, 60, 'R', false, false, 0, false, false, false);
    }


    $pdf->Output();



}

?>
