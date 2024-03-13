<?php require 'mainPage_statics/header.php'; ?>
<style>
    table.table-bordered > tbody > tr > td{
        border:1px solid lightgrey ;
    }
</style>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">İK</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">İzinler</a></li>
    </ol>
</div>
<div  class="row pt-2 "  style=";margin-left: 20px;margin-right: 20px" >

    <div class="col-12 col-sm-12 mb-3">
        <div class="card h-100">
            <header class="card-header d-md-flex align-items-center bg-custom2">
                <h6 class="card-header-title text-light mt-1">İzinler</h6>
            </header>

            <div class="card-body">
                <div class="row">
                    <div class=" col-12 col-lg-12">
        <table id="example" class="display table-bordered   "style="width:100%;border-color:white; white-space: nowrap;"  >
            <thead style="background-color: transparent ;color:  #6b15b6;border: 1px solid grey  "  >
            <tr>
                <th>Detay</th>
                <th>Adı Soyadı</th>
                <th>Başlangıç</th>
                <th>Bitiş</th>
                <th>Gün Sayısı</th>
                <th>İzin Kodu</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
                <th>14</th>
                <th>15</th>
                <th>16</th>
                <th>17</th>
                <th>18</th>
                <th>19</th>
                <th>20</th>
                <th>21</th>
                <th>22</th>
                <th>23</th>
                <th>25</th>
                <th>26</th>
                <th>27</th>
                <th>28</th>
                <th>29</th>
                <th>30</th>
                <th>31</th>
                <th>Sicil No</th>
                <th>Görünen Ad</th>
                <th>Tesis</th>
                <th>Bölüm Kodu</th>
                <th>Görev</th>
                <th>Giriş Tarihi</th>
                <th>Ayrılma Tarihi</th>
                <th>İzin Tipi</th>
                <th>Onay Durumu</th>
                <th>İzin Durumu</th>
                <th>Başlangıç Tarihi</th>
                <th>Başlangıç Saati</th>
                <th>Bitiş Tarihi</th>
                <th>Bitiş Saati</th>
                <th>Mesai Kaydet</th>
                <th>Açıklama</th>
                <th>İzin Sebebi</th>
                <th>Kullanılan Gün</th>



            </tr>
            </thead>
            <tbody style="text-align: center">
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td  >171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td>V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center  text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;text-align: center;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td  >171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td>V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center  text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;text-align: center;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td  >171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td>V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center  text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;text-align: center;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td  >171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td>V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center  text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;text-align: center;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td  >V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center   text-white" style="background-color: #FF602C ;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td  >171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td>Lütfi Gürses</td>
                <td> 17</td>
                <td>27</td>
                <td>11</td>
                <td>V</td>
                <td>09:08 17:50</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center  text-white" style="background-color: #FF602C;opacity: 0.7">A</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td onclick="window.setTimeout(function(){location.href = 'hourly_permission';}, 1000);" class="text-center text-white" style="background-color: darkorange;text-align: center;opacity: 0.7">P</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color: #6ab04c;color: white;text-align: center;opacity: 0.7">R</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td style="background-color:   #1e5486;color: white;opacity: 0.7">KÇÖ</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>GÇ YOK</td>
                <td>171</td>
                <td>Lütfi Gürses</td>
                <td>Gezinomi İstanbul Şaşkınbakkal</td>
                <td>ACENTE MÜDÜRLÜĞÜ</td>
                <td>ACENTELER MÜDÜRÜ</td>
                <td></td>
                <td></td>
                <td>Yıllık İzin</td>
                <td>Onaylandı</td>
                <td>Planlandı</td>
                <td>17.10.2022</td>
                <td>09:00</td>
                <td>27.10.2022</td>
                <td>18:00</td>
                <td>Mesai Kaydet</td>
                <td></td>
                <td></td>
                <td>21</td>
            </tr>
            </tbody>
        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'mainPage_statics/footer.php'; ?>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            scrollX: '200px',
            scrollCollapse: true,
            paging: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

        });
    });
</script>
