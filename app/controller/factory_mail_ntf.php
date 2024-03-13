<?php
if (get('complaint')) {

    $id = base64_decode(get('complaint'));
    $complaint = complaint::get_complaint_by_id($id);
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

    $image_file = 'public/img/bienlogo.jpg';
    $pdf->Image($image_file, 20, 18, 25, '', 'JPG', '', 'T', false, 60, 'L', false, false, 0, false, false, false);

    $pdf->SetFont('dejavusans', '', 10);
    $pdf->Cell(260, 19, "BİEN ŞİKAYET BİLDİRİM FORMU", 0, 1, 'L');

    $pdf->SetFont('dejavusans', '', 6);
    $tbl1 = '
<table border="1" nobr="true">
 <tr>
   <td colspan="1" align="center">Firma</td>
   <td colspan="1" align="center">Bien Seramik</td>
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
	<td colspan="1" align="center">'.complaint::get_user_name().'</td>
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
    <td colspan="1" align="center">Teknik Hizmetler '.($complaint['companyId']==2 ? 'Şefi':'Formeni').'</td>
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


    if ( $complaint["technicalConfirm"] ==1) {
        $txt = "Bu belge Cenk SENOTAY tarafından  dijital ortamda onaylanmıştır.";

        $pdf->MultiCell(80, 8, $txt, '', 'R', '', 2, 20, 150, true);

    }
    if ( $complaint["processConfirm"] ==1) {
        $txt1 = "Bu belge Ahmet PEHLİVAN dijital ortamda tarafından onaylanmıştır.";
        $pdf->MultiCell(80, 8, $txt1, '', 'R', '', 2, 110, 150, true);

    }

    if ( $complaint["factoryConfirm"] ==1) {
        $txt2 = "Bu belge Yavuz ARICAN  dijital ortamda tarafından onaylanmıştır.";
        $pdf->MultiCell(80, 8, $txt2, '', 'R', '', 2, 200, 150, true);
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



   $attachment = $pdf->Output(__DIR__.'../../../public/complaintDocs/file.pdf','F');

        $features = [
        'host' => 'smtp.office365.com',         //Hangi mail sağlayıcısı kullanılacak
        'username' => "info@qtech.com.tr",      //Hangi mail adresinden mail gidecek
        'password' => "Qof93592",                 //Mail adresinin şifresi
        'smtpSecure' => 'tls',                  //Güvenlik protokolü tls,smtp,ssl vs.
        'port' => 587,                          //Port güvenlik protokolüne göre belirlenir
        //user_email="m.akyokus@qtech.com.tr","c.senotay@bienseramik.com.tr ","b.ertek@bienseramik.com.tr ","m.kunt@bienseramik.com.tr","s.eren@bienseramik.com.tr ","m.kadayifcioglu@bienseramik.com.tr ","m.akmence@bienseramik.com.tr ","a.pehlivan@bienseramik.com.tr";
//	factory_useremail="s.eren@bienseramik.com.tr ","m.kadayifcioglu@bienseramik.com.tr ","m.akmence@bienseramik.com.tr ";
'addAddress' => [
     'g.sekercisoy@qtech.com.tr'
        ],
        'mailSubject' => "bien.mutlumusteri.org Yeni Şikayet",      //Giden mailin konusu
        'mailContent' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">

<head>
    <link rel="stylesheet" type="text/css" hs-webfonts="true" href="https://fonts.googleapis.com/css?family=Lato|Lato:i,b,bi">
    <meta property="og:title" content="Email">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        a{
            text-decoration: none;
            color: inherit;
            font-weight: bold;
            color: #253342;
        }
        h2{
            font-size: 20px;
            font-weight: 800;
        }

        p {
            font-size: 12px;
        }

        td {
            vertical-align: top;
        }

        #email {
            margin: auto;
            width: 100%;
            background-color: white;
        }
    </style>

</head>

<body bgcolor="#F5F8FA" style="width: 100%; margin: auto 0; padding:0; font-family:Lato, sans-serif; font-size:18px; color:#33475B; word-break:break-word">

<div id="email">

    <! Banner -->
    <table role="presentation" width="100%" style="text-align: center">
        <tr>
            <td bgcolor="#ffffff" align="center" style="color: white;"><br><br>
                <img alt="VerimPortal" src="'.public_url('img/bienlogo.png').'" width="150px" align="middle"><br><br><br>
            </td>
        </tr>
        <tr><h1>Yeni şikayet eklenmiştir.</h1><h2>Sağlıklı günler dileriz.</h2>
        </tr>
        <br><br>
 </table>

<br><br><br>

    <! Banner Row -->
    <table role="presentation" bgcolor="#EAF0F6" width="100%" style="margin-top: 50px;" >
        <tr>
            <td align="center" style="padding: 30px 30px;">
                <a href="https://bien.mutlumusteri.org">bien.mutlumusteri.org</a>
            </td>
        </tr>
    </table>

</div>
</body>
</html>',
        'file' => chunk_split($attachment),
        'file_root' =>   public_url('complaintDocs/file.pdf')
    ];
    mail::send($features);
}
header("Location: " . site_url('detail_complaint?id=' . $complaint['id']));

?>
