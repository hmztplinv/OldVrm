<?php require 'mainPage_statics/header.php'; ?>
<style>
    #calendar{
        margin-top: 10px;
        padding: 5px;
    }
    .fc-dayGridMonth-button{
    }
    th{
        color: #6B15B6!important;
        font-weight: bolder;
    }
    .fc .fc-day-today {
        background-color: #D6A2E8 !important;
        opacity: .65;
    }
    .fc .fc-button{
        background: #6B15B6 !important;
        opacity: .65;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active{
        color: white!important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
        color: white!important;
    }
    #rejectedcostlist_filter input {
        border-radius: 15px;
    }
    #example_filter input {
        border-radius: 15px;
    }
    #rejectedcostlist_filter label{
        color: #6B15B6!important;
    }
    #example_filter label{
        color: #6B15B6!important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: white;
        color: #ffffff!important;
        border-radius: 4px;
        border: 0px solid white;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button       {
        background: #6B15B6!important;
        color: white!important;
    }
    #rejectedcostlist tbody tr:hover {
        background-color: #6B15B6!important;
        color: white;
    }
    #example tbody tr:hover {
        background-color: #6B15B6!important;
        color: white;
    }
    button.dt-button, div.dt-button, a.dt-button, input.dt-button {
        border-radius: 10px;
        color: white;
        background-color: #6B15B6!important;
    }
    div.dt-buttons{
        position: absolute !important;
        bottom: 0px !important;
        right: 0px !important;
    }
    div.dataTables_paginate{
        float: left !important;
    }
    button.dt-button:hover:not(.disabled), div.dt-button:hover:not(.disabled), a.dt-button:hover:not(.disabled), input.dt-button:hover:not(.disabled) {
        border: 1px solid #666;
        background-color: #ffffff!important;
        color: #6B15B6!important;
    }
</style>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">İK</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Puantaj</a></li>
    </ol>

<div class="row pt-2" style="">

    <div class="col-12 col-sm-12 mb-3">
        <div class="card h-100">
            <header class="card-header d-md-flex align-items-center bg-custom2">
                <h6 class="card-header-title text-light mt-1">Aylık Puantaj Cetveli</h6>
            </header>
            <div class="container-fluid" style="">
                <div class="row ">
                    <div class="col-12 col-md-2">
                        <img class="mt-3" style="width: 200px;height: 120px" src="data:image/png;base64,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" alt="..." class=" ">
                    </div>
                    <div class="col-12 mt-3 col-md-8 text-center" >
                        <b style="font-size: 23px ";>AYLIK PUANTAJ CETVELİ</b>
                        <div class="w-100 mt-3 text-center">
                            <p class="col-select mr-2">(A)Ücretsiz İzin </p>
                            <p class="col-select border-green mr-2">(S)Raporlu </p>
                            <p class="col-select border-blue mr-2">(OFF)Hafta Tatili </p>
                            <p class="col-select border-darkblue mr-2">(KÇÖ)Kısa Çalışma Ödemesi </p>
                            <p class="col-select border-brown mr-2">(V)Yıllık İzin </p>
                            <p class="col-select border-darkgreen mr-2">(R)Resmi Tatil </p>
                            <p class="col-select border-darkorange mr-2">(P)Ücretli İzin </p    >
                            <p class="col-select border-darkcyan mr-2">(O)Devamsız </p>
                        </div>
                    </div>
                    <div class="col-12 mt-5 col-md-2 text-md-right d-flex" STYLE="font-size: 22px">
                        <div class="col-6">    <select class="form-select" aria-label="Default select example">

                                <option value="1">Ocak</option>
                                <option value="2">Şubat</option>
                                <option value="3">Mart</option>
                                <option value="4">Nisan</option>
                                <option value="5">Mayıs</option>
                                <option value="6">Haziran</option>
                                <option value="7">Temmuz</option>
                                <option value="8">Ağustos</option>
                                <option value="9">Eylül</option>
                                <option value="10">Ekim</option>
                                <option value="11">Kasım</option>
                                <option value="12">Aralık</option>
                            </select>
                        </div>
                        <div class="col-6">  <select class="form-select" aria-label="Default select example">

                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                            </select>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
<div>
    <div class="p-3" style="background-color: white">
        <table id="example" class="display excel  table-bordered" style="width:100%;font-size: 14px"  >
            <thead style="color: #6b15b6;background-color:white;font-size: 17px">
            <tr>
                <th  ></th>
                <th  >Sicil No</th>
                <th  >Depart</th>
                <th  >Adı Soyadı</th>
                <th>Tc No</th>
                <th  >1</th>
                <th >2</th>
                <th>3</th>
                <th >4</th>
                <th >5</th>
                <th >6</th>
                <th >7</th>
                <th >8</th>
                <th >9</th>
                <th >10</th>
                <th >11</th>
                <th >12</th>
                <th >13</th>
                <th >14</th>
                <th >15</th>
                <th >16</th>
                <th >17</th>
                <th>18</th>
                <th >19</th>
                <th >20</th>
                <th >21</th>
                <th >22</th>
                <th >23</th>
                <th>25</th>
                <th >26</th>
                <th >27</th>
                <th >28</th>
                <th>29</th>
                <th >30</th>
                <th>31</th>
                <th  >İMZA</th>
                <th  >YOL</th>


            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td> 1</td>
                <td>Ofis</td>
                <td>Yasin</td>
                <td>11111111111</td>
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
                <td></td>
                <td>Toplam {}</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td style="width: 1%"> 1</td>
                <td>Ofis</td>
                <td>Yasin  </td>
                <td>11111111111</td>
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
                <td></td>
                <td>Toplam {}</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td style="width: 1%"> 1</td>
                <td>Ofis</td>
                <td>Yasin  </td>
                <td>11111111111</td>
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
                <td></td>
                <td>Toplam {}</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td> 1</td>
                <td>Ofis</td>
                <td>Yasin</td>
                <td>11111111111</td>
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
                <td></td>
                <td>Toplam {}</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td style="width: 1%"> 1</td>
                <td>Ofis</td>
                <td>Yasin  </td>
                <td>11111111111</td>
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
                <td></td>
                <td>Toplam {}</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td style="width: 1%"> 1</td>
                <td>Ofis</td>
                <td>Yasin  </td>
                <td>11111111111</td>
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
                <td></td>
                <td>Toplam {}</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td> 1</td>
                <td>Ofis</td>
                <td>Yasin</td>
                <td>11111111111</td>
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
                <td></td>
                <td>Toplam {}</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td style="width: 1%"> 1</td>
                <td>Ofis</td>
                <td>Yasin  </td>
                <td>11111111111</td>
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
                <td></td>
                <td>Toplam {}</td>
            </tr>
            <tr>
                <td>
                    <form action="score_card_detail" method="POST">
                        <input type="hidden" id="registry" name="registry" value=" ">
                        <button href="score_card_detail.php" type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </td>
                <td style="width: 1%"> 1</td>
                <td>Ofis</td>
                <td>Yasin  </td>
                <td>11111111111</td>
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
                <td></td>
                <td>Toplam {}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">
                        <div class="d-flex align-items-center">
                            <img
                                    src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                    alt=""
                                    style="width: 45px; height: 45px"
                                    class="rounded-circle"
                            />
                            <div class="ms-3">
                                <p class="fw-bold text-white mb-1">John Doe</p>
                                <p class="text-white mb-0">0000000</p>
                            </div>
                        </div>
                    </h6>
                </header>
                <div id="calendar"></div>
                <div class="mt-3">
                    <table class="hover row-border" style="width:100%" id="puantaj">
                        <thead>
                        <tr>
                            <th class="text-center">Sicil No</th>
                            <th class="text-center">Departman</th>
                            <th class="text-center">TC No</th>
                            <th class="text-center">Giriş Saati</th>
                            <th class="text-center">Çıkış Saati</th>
                            <th class="text-center">Tarih Göster</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr>
                            <td>0000000</td>
                            <td>Web İçerik Uzmanı</td>
                            <td>12345678901</td>
                            <td>12.00</td>
                            <td>13.00</td>
                            <td>
                                <button  class="btn opencalendar">
                                                    <span class="fa-stack fa-1x">
                                                        <i class="fa-solid fa-circle fa-stack-1x"></i>
                                                        <i class="fa-solid fa-calendar-days fa-stack-1x fa-inverse" style="color:#ffffff!important; background-color: #6B15B6!important; border-radius: 50%;"></i>
                                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>0000000</td>
                            <td>Web İçerik Uzmanı</td>
                            <td>12345678901</td>
                            <td>13.00</td>
                            <td>14.00</td>
                            <td>
                                <button class="btn opencalendar">
                                                    <span class="fa-stack fa-1x">
                                                        <i class="fa-solid fa-circle fa-stack-1x"></i>
                                                        <i class="fa-solid fa-calendar-days fa-stack-1x fa-inverse" style="color:#ffffff!important; background-color: #6B15B6!important; border-radius: 50%;"></i>
                                                    </span>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>0000000</td>
                            <td>Web İçerik Uzmanı</td>
                            <td>12345678901</td>
                            <td>14.00</td>
                            <td>15.00</td>
                            <td>
                                <button class="btn opencalendar">
                                                    <span class="fa-stack fa-1x">
                                                        <i class="fa-solid fa-circle fa-stack-1x"></i>
                                                        <i class="fa-solid fa-calendar-days fa-stack-1x fa-inverse open" style="color:#ffffff!important; background-color: #6B15B6!important; border-radius: 50%;"></i>
                                                    </span>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

<?php require 'mainPage_statics/footer.php'; ?>


<script>
        $(".opencalendar").click(function(){
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 500,
                headerToolbar: {
                    left: 'today prevYear,prev,next,nextYear',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',// user can switch between the two
                    month:    'Ay',
                    week:     'Hafta',
                    day:      'Gün'
                },
                locale: 'tr'
            });
            $.post("<?= site_url('fullcalendar_ajax_post') ?>", {
                id: '1',
                }, function (response){
                var newEvents=JSON.parse(response);
                calendar.addEventSource(newEvents);
                calendar.render();
            })
        });
</script>

<script>
    $(document).ready(function() {
        $('#puantaj').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    customize: function ( doc ) {
                        doc.content.splice( 1, 0, {
                            margin: [ 20, 20, 30, 40 ],
                            alignment: 'center',
                            text: 'Puantaj'
                        } );
                    },
                    exportOptions: {
                        columns: [ 0, 1, 3, 4 ]
                    }},

                'excel','copy', 'print'
            ],
            responsive: {
                details: false
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            scrollX: '200px',
            scrollCollapse: true,
            paging: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
<script src='fullcalendar/core/index.global.js'></script>
<script src='fullcalendar/core/locales-all.global.js'></script>
