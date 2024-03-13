<?php
class MailAuthorized
{
    public static function send_mail_to_authorized($complaintid) {
        $id = $complaintid;
        $complaint = complaint::get_complaint_by_id($id);
        $companyid=$complaint['companyId'];
        $TechnicalReports = complaint::get_reporting_reports($complaint['id'],1);
        $FactoryReports = complaint::get_reporting_reports($complaint['id'],2);
        $ResultReports = complaint::get_reporting_reports($complaint['id'],3);
        $mailinfo=complaint::get_mail_info($companyid);
        $mailinfo['password']=base64_decode($mailinfo['password']);//decoding password
        define('K_PATH_IMAGES', '/public/img/');

m
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
            $pdf->Cell(260, 19, "BİEN ŞİKAYET BİLDİRİM VE DEĞERLENDİRME RAPORU", 0, 1, 'C');
        }
        else if($companyid==8){
            $pdf->Cell(260, 19, "QUA ŞİKAYET BİLDİRİM VE DEĞERLENDİRME RAPORU", 0, 1, 'C');
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
   <th colspan="1" align="center"> </th>

 </tr>
 </table>
';
        $pdf->writeHTML($tbl2, true, false, false, false);



        //  $url = "SITE_URL/sendqrreport.php?complaint=.base64_encode($complaint[id]) : ''";


        $url = site_url("sendqrreport.php?complaint=.base64_encode($complaint[id]) : ''");
        $qr_code = "'https://chart.googleapis.com/chart?chs=40x40&cht=qr&chl='.$url";
        //$qr_code = (new QRCode)->render($url);

        $pdf->Image($qr_code, 240, 35, 17, '', 'PNG', '', 'T', false, 0, 'R', false, false, 0, false, false, false);

        $attachment = $pdf->Output(__DIR__.'../../../public/complaintDocs/file.pdf','F');
        //$attachment = $pdf->Output(public_url('complaintDocs/file.pdf'), 'F');

        //$pdf->Output('f.pdf','S');
        if($companyid==2){
            $mails =array('b.ertek@bienseramik.com.tr','m.kunt@bienseramik.com.tr','c.senotay@bienseramik.com.tr');
        }else if ($companyid==8){
            $mails = array('a.topal@qua.com.tr','h.topaz@qua.com.tr','c.guven@qua.com.tr','y.arıcan@qua.com.tr');
        }

        $features = [
            'host' => $mailinfo['host'],         //Hangi mail sağlayıcısı kullanılacak
            'username' => $mailinfo['username'],      //Hangi mail adresinden mail gidecek
            'password' => $mailinfo['password'],                 //Mail adresinin şifresi
            'smtpSecure' => $mailinfo['smtpSecure'],                  //Güvenlik protokolü tls,smtp,ssl vs.
            'port' => $mailinfo['port'],                          //Port güvenlik protokolüne göre belirlenir
            //user_email="m.akyokus@qtech.com.tr","c.senotay@bienseramik.com.tr ","b.ertek@bienseramik.com.tr ","m.kunt@bienseramik.com.tr","s.eren@bienseramik.com.tr ","m.kadayifcioglu@bienseramik.com.tr ","m.akmence@bienseramik.com.tr ","a.pehlivan@bienseramik.com.tr";
//	factory_useremail="s.eren@bienseramik.com.tr ","m.kadayifcioglu@bienseramik.com.tr ","m.akmence@bienseramik.com.tr ";
            'addAddress' => [
                $mails
            ],
            'mailSubject' => ($companyid==2 ? 'bien':'qua').'.mutlumusteri.org '.$complaint['id'].' Numaralı Şikayet Sonucu',      //Giden mailin konusu
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
                <img alt="VerimPortal" src="'.($companyid==2 ? public_url('img/bienlogo.png'):public_url('img/qualogo.png')).'" width="150px" align="middle"><br><br><br>
            </td>
        </tr>
        <tr><p>Şikayetiniz sonuçlanmıştır. Şikayet sonuç raporunuz ektedir.</p><p>Bizi tercih ettiğiniz için teşekkür ederiz. </p><p>Sistemimizi geliştirmek için 6 soruluk
            kısa anketimize katılmak için aşağıdaki butona tıklayabilirsiniz.</p><p>Sağlıklı günler dileriz.</p>
        </tr>
        <br><br>
 <tr><a style="background-color: #6b15b6;font-size: 18px;color: white;border: 1px solid transparent;border-radius: 15px; " href="'.site_url('anket').'?s='.base64_encode($complaint['id']).'">Ankete Katıl</a></tr>
 </table>

<br><br><br>

    <! Banner Row -->
    <table role="presentation" bgcolor="#EAF0F6" width="100%" style="margin-top: 50px;" >
        <tr>
            <td align="center" style="padding: 30px 30px;">
                <a href="https://'.($companyid==2 ? 'bien':'qua').'.mutlumusteri.org">'.($companyid==2 ? 'bien':'qua').'.mutlumusteri.org</a>
            </td>
        </tr>
    </table>

</div>
</body>
</html>',    //Giden mailin içeriği HTML formatında olmalıdır.
            'file' => chunk_split($attachment),
            'file_root' =>   public_url('complaintDocs/file.pdf')
        ];
        mail::send($features);

    }
}
