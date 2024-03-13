<?php
//include library


//make TCPDF object
$pdf = new TCPDF('P','mm','A4');

//remove default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//add page
$pdf->AddPage();


//add content (student list)
//title
$pdf->SetFont('dejavusans', '', 10);
$pdf->Cell(190,10,"BİEN ŞİKAYET BİLDİRİM VE DEĞERLENDİRME RAPORU",0,1,'C');



$pdf->Cell(30,5,"Firma",0);
$pdf->Cell(160,5,":  01",0);
$pdf->Ln();

$pdf->SetFont('dejavusans','',10);
$pdf->Cell(30,5,"Döküman Tipi",0);
$pdf->Cell(160,5,":  K2D",0);
$pdf->Ln();

$pdf->SetFont('dejavusans','',10);
$pdf->Cell(30,5,"Şikayet Konusu",0);
$pdf->Cell(160,5," : Ebat Farkı",0);
$pdf->Ln();

$pdf->SetFont('dejavusans','',10);
$pdf->Cell(30,5,"Şikayet Detayı",0);
$pdf->Cell(160,5," : Ebat Farkı",0);
$pdf->Ln();

$pdf->SetFont('dejavusans','',10);
$pdf->Cell(30,5,"Müşteri No",0);
$pdf->Cell(160,5," : MT000007",0);
$pdf->Ln();

$pdf->SetFont('dejavusans','',10);
$pdf->Cell(30,5," Tip/Açıklama",0);
$pdf->Cell(160,5," :BIEN ŞİKAYET",0);
$pdf->Ln();

$pdf->SetFont('dejavusans','',10);
$pdf->Cell(30,5,"Müşteri Adı",0);
$pdf->Cell(160,5," : Tema Tesisat Mlz. Tic. Koll. Şti",0);
$pdf->Ln();

$pdf->SetFont('dejavusans','',10);
$pdf->Cell(30,5,"Problem Tarihi",0);
$pdf->Cell(160,5," : 22.08.2021  17:40:21",0);
$pdf->Ln();


$pdf->SetFont('dejavusans','',10);
$pdf->Cell(30,5,"Döküman No",0);
$pdf->Cell(160,5,":  00002771",0);
$pdf->Ln();


$columns = 8;

/**
 * Set the tag styles
 */
//$pdf->initialize([20, 30, 50]);

$header = array(
    ['TEXT' => 'Malzeme Açıklama'],
    ['TEXT' => 'Miktar'],
    ['TEXT' => 'Birim'],
	['TEXT' => 'Telefon'],
    ['TEXT' => 'Adres Bilgisi'],
	['TEXT' => 'Renk'],
	['TEXT' => 'Ebat'],
	['TEXT' => 'Üretim Tarihi']
);

//add the header row
//$pdf->addHeader($header);



$pdf->Ln(2);


$pdf->Output();