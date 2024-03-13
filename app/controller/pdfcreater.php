<?php
require('fpdf/fpdf.php');



$this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$this->SetFont('DejaVu','',20);
//header
global $title;
$this->SetTitle("BİEN ŞİKAYET BİLDİRİM VE DEĞERLENDİRME RAPORU");
$this->Image(public_url('img/bienlogo.png'),50,10,100);
$this->SetLeftMargin(40);
$this->SetAutoPageBreak(false);
//content
$this->Cell(130,80,'MÜŞTERİ VE ŞİKAYET TEMEL BAŞLIKLARI');
$this->SetLeftMargin(10);
$this->Ln();
$this->SetFont('DejaVu','',10);



$this->SetFont('Arial','',14);
$this->Cell(50,7,"Firma:AKKAYA İNŞAAT-NURETTİN KAYA",0,1);
$this->Cell(50,7,"Müşteri No:112",0,1);
$this->Cell(50,7,"Müşteri Adı:Ahmet Can",0,1);
$this->Cell(50,7,"Doküman No: 00002771",0,1);
$this->Cell(50,7,"Döküman Tipi: K2D",0,1);
$this->Cell(50,7,"Tip/Açıklama: BIEN ŞİKAYET ",0,1);
$this->Cell(50,7,"Problem Tarihi: 22.08.2022 ",0,1);
$this->Cell(50,7,"Şikayet Konusu: Ebat Farkı",0,1);
$this->Cell(50,7,"Şikayet Detayı: Ebat Farkı ",0,1);
$this->Cell(50,7,"Üretim Tarihi:  01.01.1975",0,1);




class PDF extends FPDF {

    function createTable($header, $data) {

        $this -> SetFont('Arial', 'B', 12);
        foreach($header as $h) {
            $this -> Cell(60, 7, $h, 1);
        }
        $this -> Ln();
        $this -> SetFont('Arial', '', 12);
        foreach($data as $row) {
            foreach($row as $col) {
                $this -> Cell(60, 7, $col, 1);
            }
            $this -> Ln();
        }
    }
}

$pdf = new PDF();
$pdf -> AddPage();
//Table Header
$header = ["Malzeme Açıklama", "Miktar", "Birim","Telefon","Adres Bilgisi","Renk "," Ebat","Üretim Tarihi"];
//Table Rows
$data = [
    ["30 x 60 ARCH A.GRI 1.", "3500", "M2","05302642132","Adres Bilgisi","L10","z","07.10.2022"]
];
$pdf -> createTable($header, $data);
$pdf -> Output();
?>
