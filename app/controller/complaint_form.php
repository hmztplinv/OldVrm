<?php

if (get('complaint')) {

    $id = base64_decode(get('complaint'));
    $complaint = complaint::get_complaint_by_id($id);
    $companyid=$complaint['companyId'];
    // damp($complaint);
    $TechnicalReports = complaint::get_reporting_reports($complaint['id'],1);
    $get_production_factory=complaint::get_factory_name($complaint['factoryAuth'])['factoryName'];
    // $get_producttype_name=complaint::get_producttype_name();
    $get_status_name=complaint::get_status_name($complaint['status']);
    $get_user_name=session('user_name');
    $complaint['market'] == "1" ? $complaint['market']="Yurtiçi" : $complaint['market']="Yurtdışı";
    $get_products=complaint::get_producttypes($complaint['productType']);
    $get_productiondate=complaint::get_production_date($id);
    $get_colorcode=complaint::get_colorcode($id);
    $document=Document::report_or_form_exist($id,1);
    if(!empty($document)){
        Document::update_form($id);
    }
    else{
        Document::set_form($id);
    }
    $document=Document::report_or_form_exist($id,1);


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

    $pdf->SetFont('dejavusans', '', 10);
    if($companyid==2){
        $pdf->Cell(260, 19, "BİEN ŞİKAYET BİLDİRİM FORMU", 0, 1, 'L');
    }
    else if($companyid==8){
        $pdf->Cell(260, 19, "QUA ŞİKAYET BİLDİRİM FORMU", 0, 1, 'L');
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
    <td colspan="1" align="center"> Müşteri Adı</td>
	<td colspan="1" align="center">'. $complaint['name']. " " . $complaint['surname'].'</td>
  </tr>
  <tr>
    <td colspan="1" align="center">Müşteri Telefon  </td>
	<td colspan="1" align="center">'.$complaint['phone'].'</td>
  </tr>
  <tr>
    <td colspan="1" align="center">Müşteri Adres  </td>
	<td colspan="1" align="center">'.$complaint['address'].'</td>
  </tr>

   <tr>
     <td colspan="1" align="center">Döküman No</td>
	 <td colspan="1" align="center">'.$complaint['id'].'</td>
   </tr>
   <tr>
    <td colspan="1" align="center"> Tip</td>
	<td colspan="1" align="center">'.$complaint['category'].'</td>
  </tr>
  <tr>
    <td colspan="1" align="center"> Problem Tanımlayan</td>
	<td colspan="1" align="center">'.($companyid==2 ? 'Cenk ŞENOTAY':'Aykut TOPAL').'</td>
  </tr>
 <tr>
    <td colspan="1" align="center"> Satıcı Bayi</td>
	<td colspan="1" align="center">'.$complaint['sealer'].'</td>
  </tr>
  <tr>
   <td colspan="1" align="center"> Problem Tarihi</td>
    <td colspan="1" align="center">'.$complaint['createdDate'].'</td>
  </tr>
   <tr>
   <td colspan="1" align="center"> Pazar</td>
    <td colspan="1" align="center">'.$complaint['market'].'</td>
  </tr>
 <tr>
    <td colspan="1" align="center">Üretim Yeri </td>
	<td colspan="1" align="center">'.$get_production_factory.'</td>
  </tr>
   <tr>
    <td colspan="1" align="center">Ürün Grupları </td>
	<td colspan="1" align="center">'.$get_products.'</td>
  </tr>

   <tr>
    <td colspan="1" align="center"> Şikayet Detayı</td>
    <td colspan="1" align="center">'. complaint::get_complaint_type_by_id($complaint['complaintType']).'</td>
  </tr>

  <tr>
    <td colspan="1" align="center">Durumu </td>
	<td colspan="1" align="center">'.complaint::get_status_name($complaint['status']).'</td>
  </tr>



</table>
';
    $pdf->writeHTML($tbl1, true, false, false, false);
    $pdf->SetFont('dejavusans', '', 6);

    $tbl = '
<table border="1" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="1" align="center">Ürün Adı</th>
  <th colspan="1" align="center">Ürün Açıklaması</th>
  <th colspan="1" align="center">Şikayet Miktar </th>
  <th colspan="1" align="center">Kabul Miktar </th>
  <th colspan="1" align="center">Red Miktar </th>
  <th colspan="1" align="center">Birim</th>
  <th colspan="1" align="center">Ebat </th>
  <th colspan="1" align="center">Renk Kod </th>
  <th colspan="1" align="center">Üretim Tarihi</th>
 </tr>
  <tr>
  <th colspan="1" align="center">'.complaint::get_product_name($complaint['productType'],$complaint['productName'])["name"].'</th>
  <th colspan="1" align="center">'.complaint::get_product_name($complaint['productType'],$complaint['productName'])["name"].'</th>
  <th colspan="1" align="center">'.$complaint['productQuantity'].'</th>
  <th colspan="1" align="center">'.$complaint['acceptedQuantity'].'</th>
  <th colspan="1" align="center">'.$complaint['acceptedQuantity'].'</th>
  <th colspan="1" align="center">'.$complaint["productQuantity"].'</th>
  <th colspan="1" align="center">'.$complaint["productSize"].'</th>
  <th colspan="1" align="center">'.complaint::get_product_name($complaint['productType'],$complaint['productName'])['name'].'</th>
  <th colspan="1" align="center">'.complaint::get_production_date($id).'</th>
 </tr>

</table>
';
    $pdf->writeHTML($tbl, true, false, false, false, '');

    $pdf->SetFont('dejavusans', '', 7);
    $pdf->setCellPaddings(0, 0, 0, 0);
    $pdf->setCellMargins(1, 1, 1, 1);
    $pdf->SetFillColor(220, 220, 220);
    $pdf->Write(0, 'Şikayet Açıklaması:', '', 0, 'L', true, 0, false, false, 0);
    $pdf->SetFont('dejavusans', '', 7);
    $pdf->setCellPaddings(0, 0, 0, 0);
    $pdf->setCellMargins(1, 1, 1, 1);
    $pdf->SetFillColor(220, 220, 220);

    $pdf->MultiCell(265, 10, $complaint["message"] , 1, 'L', 1, 0, '', '', true);
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

    $pdf->Ln(3);

    $pdf->SetFont('dejavusans', 'B', 7);
    $tbl4 = '
    <table border="0" cellpadding="2" cellspacing="2" nobr="true">
    <tr>
    <td colspan="1" align="center">Teknik Hizmetler '.($companyid==2 ? 'Şefi':'Formeni').'</td>
	<td colspan="1" align="center">Kalite Güvence Ve Proses Kontrol Müdürü</td>
	<td colspan="1" align="center">Fabrikalar Direktörü</td>
	</tr>
	<tr>
	<td colspan="1" align="center">'.($companyid==2 ? 'Cenk SENOTAY':'Aykut Topal').'</td>
	<td colspan="1" align="center">'.($companyid==2 ? 'Ahmet PEHLİVAN':'Hasan Hüseyin Topoz').'</td>
	<td colspan="1" align="center">'.($companyid==2 ? 'Yavuz Arıcan':'Yavuz Arıcan').'</td>
	</tr>

    </table>
    ';
    $pdf->writeHTML($tbl4, true, false, false, false);
    $pdf->Ln(5);
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


    $pdf->Ln(15);



    $pdf->SetFont('dejavusans', '', 6);
    $tbl2 = '
<table border="0" cellpadding="0" cellspacing="0" nobr="false">
 <tr>
  <th colspan="1" align="center">Yayın tarihi: '.$document['createdAt'].'</th>
  <th colspan="1" align="center">Revizyon No : '.$document['revise'].'</th>
  <th colspan="1" align="center">Revizyon Tarih: '.$document['updatedAt'].'</th>
  <th colspan="1" align="center"> Döküman No: FMD-10.33</th>
 </tr>
 </table>
';
    $pdf->writeHTML($tbl2, true, false, false, false);

    $pdf->Output();



}

?>
