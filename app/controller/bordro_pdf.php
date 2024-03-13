<?php

$pdf = new TCPDF('P', 'mm', 'A4');

$pdf->AddPage('P', 'A4');

$pdf->SetFont('dejavusans', 'B', 8);
$pdf->SetTextColor(76,0,19);
$pdf->Cell(50, 30, "ÜCRET PUSULASI HARİTASI", 0, 3, 'L');

$pdf->SetFont('dejavusans', '', 6);
$pdf->SetTextColor(0,0,0);


$tbl ='<table>
  <tr>
    <td>
    <table border="1" nobr="true" >
     <tr>
       <td colspan="1" align="center"><b>Firma</b></td>
       <td colspan="1" align="center">06-Qua Trading</td>
     </tr>
     <tr>
       <td colspan="1" align="center"><b>Tesis</b></td>
       <td colspan="1" align="center">Efeler Aydın</td>
     </tr>
     <tr>
      <td colspan="1" align="center"><b>Ticari Sicil No</b></td>
      <td colspan="1" align="center">66992</td>
     </tr>
     <tr>
       <td colspan="1" align="center"><b>Mersis No</b>	</td>
       <td colspan="1" align="center"></td>
     </tr>
     <tr>
      <td colspan="1" align="center"><b>Tesis</b></td>
      <td colspan="1" align="center">01-Qua Trading</td>
     </tr>
     <tr>
       <td colspan="1" align="center"><b>İşyeri SGK No </b><br />	</td>
       <td colspan="1" align="center">119259 <br /></td>
     </tr>
  </table>
 </td>
    <td>
      <table border="1" nobr="true" >
       <tr>
         <td colspan="1" align="center"><b>Adı Soyadı</b></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>SSS/TC Kimlik No</b></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Giriş/Kıdem Tarihi</b></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Bölümü</b></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Görevi</b></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Ücreti</b></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Bordro</b></td>
         <td colspan="1" align="center"></td>
        </tr>
     </table>
      </td>
  </tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, 'R');
$pdf->Ln(2);


$pdf->SetFont('dejavusans', '', 6);


$tbl2 ='<table>
  <tr>
    <td>
    <table border="1" nobr="true" >
     <tr>
       <td colspan="1" align="center" style="color: darkblue"><b>NORMAL ÇALIŞMA</b></td>
       <td colspan="1" align="center" style="color: darkblue"><b>GÜN</b></td>
       <td colspan="1" align="center" style="color: darkblue"><b>SAAT</b></td>
       <td colspan="1" align="center" style="color: darkblue"><b>TUTAR</b></td>
     </tr>
     <tr>
       <td colspan="1" align="center">Hasta Vizite</td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>

     </tr>
     <tr>
      <td colspan="1" align="center">Hafta Sonu</td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>     </tr>
     <tr>
       <td colspan="1" align="center"><b>Normal Çalışma Toplamı</b>  <br /></td>
       <td colspan="1" align="center"> <br /></td>
       <td colspan="1" align="center"> <br /></td>
       <td colspan="1" align="center"> <br /></td>
      </tr>

  </table>
 </td>
    <td>
      <table border="1" nobr="true" >
       <tr>
         <td colspan="1" align="center" style="color: darkblue"><b>FAZLA ÇALIŞMA</b></td>
         <td colspan="1" align="center"style="color: darkblue"><b>SAAT</b></td>
        </tr>
        <tr>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Fazla Çalışma Toplamı</b></td>
         <td colspan="1" align="center"></td>
        </tr>

     </table>
      </td>
  </tr>
</table>';

$pdf->writeHTML($tbl2, true, false, false, false, 'R');
$pdf->Ln(2);




$pdf->SetFont('dejavusans', '', 6);


$tbl3 ='<table>
  <tr>
    <td>
    <table border="1" nobr="true" >
     <tr>
       <td colspan="1" align="center" style="color: darkblue"><b>EK KAZANÇLAR</b></td>
       <td colspan="1" align="center" style="color: darkblue"><b>NET</b></td>
       <td colspan="1" align="center" style="color: darkblue"><b>BRÜT</b></td>
     </tr>
     <tr>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
     </tr>
     <tr>
      <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
       </tr>
     <tr>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
      </tr>
      <tr>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
      </tr>
      <tr>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
      </tr>
      <tr>
       <td colspan="1" align="center"><b>Ek Kazançlar Toplamı</b></td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
      </tr>

  </table>
 </td>
    <td>
      <table border="1" nobr="true" >
       <tr>
         <td colspan="1" align="center" style="color: darkblue"><b>ÖZEL KESİNTİLER</b></td>
         <td colspan="1" align="center" style="color: darkblue"><b>TUTAR</b></td>
        </tr>
        <tr>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Özel Kesintiler Toplamı</b>	</td>
         <td colspan="1" align="center"></td>
        </tr>

     </table>
      </td>
  </tr>
</table>';

$pdf->writeHTML($tbl3, true, false, false, false, 'R');
$pdf->Ln();

$pdf->SetFont('dejavusans', '', 6);


$tbl9='<table>
  <tr>
    <td>
    <table border="1" nobr="true" >
     <tr>
       <td colspan="1" align="center" style="color: darkblue"><b>SOSYAL SİGORTALAR</b></td>
       <td colspan="1" align="center" style="color: darkblue"></td>
     </tr>
     <tr>
       <td colspan="1" align="center">Prime Tabi Tutulan Brüt Kazanç</td>
       <td colspan="1" align="center"></td>
     </tr>
     <tr>
      <td colspan="1" align="center">Önceki Dönemden Gelen Brüt Kazanç</td>
       <td colspan="1" align="center"></td>
       </tr>
     <tr>
       <td colspan="1" align="center">Bir Sonraki Döneme Aktarılan Brüt Kazanç	</td>
       <td colspan="1" align="center"></td>
      </tr>
      <tr>
       <td colspan="1" align="center"><b>Sigorta Günü ve Matrahı</b></td>
       <td colspan="1" align="center"></td>
      </tr>
      </table>
   <table border="1" nobr="true" align="left" >
     <tr>
       <td colspan="1" align="center" style="color: darkblue"><b>SİGORTA PRİMLERİ</b> <br /></td>
       <td colspan="1" align="center" style="color: darkblue"><b>İŞÇİ</b> <br /></td>
       <td colspan="1" align="center"style="color: darkblue"><b>İŞVEREN</b> <br /></td>
     </tr>
     <tr>
       <td colspan="1" align="center">SGK Primi	</td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
     </tr>
     <tr>
      <td colspan="1" align="center">İşsizlik Sigorta Primi	</td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
       </tr>
     <tr>
       <td colspan="1" align="center">Devlet Payı(-)</td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
      </tr>
      <tr>
       <td colspan="1" align="center"><b>Sigorta Primleri Toplamı</b></td>
       <td colspan="1" align="center"></td>
       <td colspan="1" align="center"></td>
      </tr>


  </table>
      </td>

    <td>
      <table border="1" nobr="true" >
       <tr>
         <td colspan="1" align="center" style="color: darkblue"><b>VERGİLER</b></td>
         <td colspan="1" align="center" style="color: darkblue"><b>ORAN </b></td>
         <td colspan="1" align="center" style="color: darkblue"><b>MATRAH </b></td>
         <td colspan="1" align="center" style="color: darkblue"><b>TUTAR </b></td>
        </tr>
        <tr>
         <td colspan="1" align="center">1.Dilim	</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">2.Dilim	</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">3.Dilim	</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">4.Dilim	</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">5.Dilim	</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">Gelir Vergisi</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">İstisna Sonrası Gelir Vergisi</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">Damga Vergisi</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Vergiler Toplamı</b></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Sigorta Primleri Toplamı</b></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Yasal Kesintiler Toplamı</b></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>

     </table>
   </td>
  </tr>
</table>';

$pdf->writeHTML($tbl9, true, false, false, false, 'R');

$pdf->Ln();

$tbl5 ='<table>
  <tr>
  <td>
  <table border="1" nobr="true" >
       <tr>
         <td colspan="1" align="center" style="color: darkblue"><b>GELİR VERGİSİ İNDİRİMLERİ</b> </td>
         <td colspan="1" align="center" style="color: darkblue"><b>TUTAR</b></td>

        </tr>
        <tr>
         <td colspan="1" align="center">Şahıs Sigorta İndirimi	</td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">Hayat Sigortası İndirimi</td>
         <td colspan="1" align="center"></td>

        </tr>
        <tr>
         <td colspan="1" align="center">Engelli İndirimi</td>
         <td colspan="1" align="center"></td>

        </tr>
        <tr>
         <td colspan="1" align="center">Aile Engellilik İndirimi</td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">Diğer İndirimler</td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center"><b>Gelir Vergisi İndirimleri Toplamı</b></td>
         <td colspan="1" align="center"></td>
        </tr>

     </table>
</td>
    <td>
      <table border="1" nobr="true" >
       <tr>
         <td colspan="1" align="center" style="color: darkblue"><b>TOPLAM GELİR VERGİSİ</b></td>
         <td colspan="1" align="center" style="color: darkblue"><b>MATRAH</b></td>
         <td colspan="1" align="center" style="color: darkblue"><b>VERGİ</b></td>

        </tr>
        <tr>
         <td colspan="1" align="center">Önceki Toplam Gelir Vergisi	</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">Bordro Gelir Vergisi</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>

        </tr>
        <tr>
         <td colspan="1" align="center">Toplam Gelir Vergisi</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>

        </tr>


     </table>
      </td>
  </tr>
</table>';

$pdf->writeHTML($tbl5, true, false, false, false, 'R');
$pdf->Ln();

$tbl6 ='<table>
  <tr>

    <td>
      <table border="1" nobr="true" >
       <tr>
         <td colspan="1" align="center" ><b>Devir Matrahından İade Edilen</b></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>

        </tr>
        <tr>
         <td colspan="1" align="center"><b>TÜM KAZANÇLAR</b></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>

        </tr>
        <tr>
         <td colspan="1" align="center"><b>GENEL TOPLAM</b></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>

        </tr>


     </table>
      </td>
  </tr>
</table>';

$pdf->writeHTML($tbl6, true, false, false, false, 'R');


$tbl8 ='<table>
  <tr>

    <td>
      <table border="1" nobr="true" >

        <tr>
         <td colspan="1" align="center">ASGARİ ÜCRET İSTİSNA TUTARI</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>

        </tr>
        <tr>
         <td colspan="1" align="center" style="color: darkblue"><b>NET ÜCRET</b></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center">YUVARLAMA</td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>
        <tr>
         <td colspan="1" align="center" style="color: darkred"><b>NET ÖDENEN</b></td>
         <td colspan="1" align="center"></td>
         <td colspan="1" align="center"></td>
        </tr>

     </table>
      </td>
  </tr>
</table>';

$pdf->writeHTML($tbl8, true, false, false, false, 'R');
$pdf->Ln();

$tbl7 ='<table>
  <tr>
    <td>
    <table border="1" align="center">
     <tr nobr="true">
      <td  colspan="3"> Aralık-2022 dönemine ait adıma tahakkuk eden yukarıda yazılı gelirlere
      karşılık gelen net tutarın tamamını aldım.<br/>
      Ödeme Tarihi:<br/>
      İmza:<br/>
      Tarih:<br/></td>

      </tr>
     </table>
      </td>
  </tr>
</table>';

$pdf->writeHTML($tbl7, true, false, false, false, 'R');


$image_file = 'public/images/qrcode.png';
$pdf->Image($image_file, 20, 210, 16, '', 'PNG', '', 'L', false, 60, 'L', false, false, 0, false, false, false);


$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('helvetica', '', 6);

$txt4 = "Vergi No:632040621 \n QUA TRANDING TICARET A.S.\n 2023-01-11 11:41:27 \n 5070 Sayılı Elektronik İmza Kanuna Uygun Damgalannmıştır.";

$pdf->MultiCell(50, 22, $txt4, 1, 'R', 1, 2, 35, 210, true);


$image_file1 = 'public/images/qrcode.png';
$pdf->Image($image_file1, 100, 210, 16, '', 'PNG', '', 'C', false, 60,  'R',false, false, 0, false, false, false);


$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('helvetica', '', 6);

$txt4 = "Vergi No:632040621 \n QUA TRANDING TICARET A.S.\n 2023-01-11 11:41:27 \n 5070 Sayılı Elektronik İmza Kanuna Uygun Damgalannmıştır.";

$pdf->MultiCell(60, 22, $txt4, 1, 'R', 1, 2, 115, 210, true);


$image_file2 = 'public/images/icons8.png';
$pdf->Image($image_file2, 10, 235, 6, '', 'PNG', '', 'C', false, 60,  'L',false, false, 0, false, false, false);


$image_file3 = 'public/images/icons8.png';
$pdf->Image($image_file3, 90, 235, 6, '', 'PNG', '', 'C', false, 60,  'R',false, false, 0, false, false, false);
$pdf->Ln(13);

$tbl10 ='<table>
  <tr>

    <td>
      <table border="0" nobr="true" >
       <tr>
         <td >1111111111 Tc Kimlik numaralı Bahar Kaçtım</td>
         <td >1111111111 Tc Kimlik numaralı Bahar Kaçtım</td>

        </tr>
        </table>
      </td>
  </tr>
</table>';

$pdf->writeHTML($tbl10, true, false, false, false, 'C');

$pdf->Output();


?>


