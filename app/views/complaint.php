    <?php require 'mainPage_statics/header.php'; ?>
    
    <style>
        .categories {
            width: 100%;
        }
    
        .chartheaders {
            height: 20%;
        }
        .row{
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
    
    </style>1
    <!-- Container -->
    <div class="container-fluid bg-light pt-5 p-3 small animate__amnimated animate__fadeIn">
    
        <ol class="breadcrumb small pt-5">
            <li class="breadcrumb-item text-custom">Şikayet</li>
            <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Şikayet Yönetimi</a>
            </li>
        </ol>
        <form id="myForm">
            <select id="mySelect" name="year" class=" selectpicker" data-live-search=true title="Yıl"
                    >
                <option value="2024"<?php if ($_SESSION['complaint_Year']=='2024-01-01 00:00:00') {echo 'selected';} ?>>2024</option>
                <option value="2023" <?php if ($_SESSION['complaint_Year']=='2023-01-01 00:00:00') {echo 'selected';} ?>>2023</option>
    
            </select>
            <input type="submit" style="display: none;"> <!-- Görünmeyen bir submit düğmesi ekleyin -->
        </form>
    
    </div>
    <?php if (user::getComplaintAuth()['complaintFactory'] == 0): ?>
    
        <div class="row pt-2">
            <div class="col-6 col-sm-3 mb-3">
                <?php if (session('company_id') == 2): ?>
                    <div class="card h-100">
                        <header style="display: block!important;"
                                class="card-header d-md-flex align-items-center bg-custom2 chartheaders">
                            <div class="row">
                                <h6 class="card-header-title text-light">Metraj-Fabrika Bazında Dağılım</h6>
                            </div>
                            <div class="row p-0">
                                <div class="col-7 col-sm-7">
                                    <select class="form-select small" name="factory" id="factory">
                                        <option disabled selected value=""> Fabrika Seçin</option>
                                        <?php foreach ($factories as $factory): ?>
                                            <option
                                                    value="<?= $factory['factoryCode'] ?>"><?= $factory['factoryName'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-5 col-sm-5">
                                    <select class="form-select small" name="market" id="market">
                                        <option disabled selected value=""> Market</option>
                                        <option value="1">Yurt İçi</option>
                                        <option value="2">Yurt Dışı</option>
                                    </select>
                                </div>
                            </div>
                        </header>
                        <div class="card-body">
                            <canvas id="totalChart"></canvas>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (session('company_id') == 8): ?>
                    <div class="card h-100">
                        <header style="display: block!important;"
                                class="card-header d-md-flex align-items-center bg-custom2 chartheaders">
                            <div class="row">
                                <h6 class="card-header-title text-light">Para Birimi</h6>
                            </div>
                            <div class="row p-0">
                                <div class="col-7 col-sm-7">
                                    <select class="form-select small" name="billoptions" id="billoptions">
                                        <option selected value="TRY">TRY</option>
                                        <option value="USD">USD</option>
                                        <option value="EURO">EURO</option>
                                        <option value="GBP">GBP</option>
                                    </select>
                                </div>
                            </div>
                        </header>
                        <div class="card-body">
                            <canvas id="billChart"></canvas>
                            <canvas style="display: none" id="billChartUsd"></canvas>
                            <canvas style="display: none" id="billChartEuro"></canvas>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-6  col-sm-3  mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2 chartheaders">
                        <h6 class="card-header-title text-light mt-1">Şikayet Durumu Bazında Dağılım</h6>
                    </header>
                    <div class="card-body">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-3 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2 chartheaders">
                        <h6 class="card-header-title text-light mt-1">Kategori Bazında Dağılım</h6>
                    </header>
                    <div class="card-body">
                        <canvas id="urunChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-3 mb-4">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2 chartheaders">
                        <h6 class="card-header-title text-light mt-1">Şikayet Bazında Dağılım</h6>
                    </header>
                    <div class="card-body">
                        <canvas id="complaintTypeChart"></canvas>
                    </div>
                </div>
                <!--chart-->
            </div>
        </div>
    
        <div class="row pt-2">
    
            <div class="col-12 col-sm-6 mb-4">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Bu Ayın Şikayet Özeti</h6>
                    </header>
                    <div class="card-body">
                        <div class="col-lg-5 mb-3"">
                            <select title="Fabrika Seçiniz" class="selectpicker w-100" name=""
                                    id="factoryNameSearchingThisMonth">
                                <option value="">Tümü</option>
                                <?php foreach ($factories as $factory): ?>
                                    <option
                                            value="<?= $factory['factoryCode'] ?>"><?= $factory['factoryName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table id="monthcomplaint" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom" width="5%"></th>
                                <th class="text-custom" width="15%">Fabrika Adı</th>
                                <th class="text-custom" width="15%">Şikayet Konuları</th>
                                <th class="text-custom text-center">Şikayet Adeti</th>
                                <th class="text-custom text-center">Gelen Şikayet(m2)</th>
                                <th class="text-custom text-center">Kabul(m2)</th>
                                <th class="text-custom text-center">Red (m2)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < count($this_month_total_complaint); $i++): ?>
                                <tr>
                                    <th scope="row"><?= $i + 1 ?></th>
                                    <td><?= $this_month_total_complaint[$i]['factoryName'] ?>
                                        <span
                                                hidden><?= $this_month_total_complaint[$i]['factoryAuth'] ?></span>
                                    </td>
                                    <td><?= $this_month_total_complaint[$i]['complaintname'] ?></td>
                                    <td><?= $this_month_total_complaint[$i]['complaintCount'] ?></td>
                                    <td><?= number_format((float)$this_month_total_complaint[$i]['totalComplaint'], 2, '.', '') ?></td>
                                    <td><?= number_format((float)$this_month_total_complaint[$i]['acceptedComplaint'], 2, '.', '') ?></td>
                                    <td><?= number_format((float)$this_month_total_complaint[$i]['rejectedComplaint'], 2, '.', '') ?></td>
    
                                </tr>
                            <?php
                            endfor; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3" style="text-align:right"><strong>Genel Toplam:</strong></td>
                                <td><span value="" id="_thismonthcomplaintcount"></td>
                                <td><span value="" id="_thismonthcomplaintsum"></td>
                                <td><span value="" id="_thismonthcomplaintaccepted"></td>
                                <td><span value="" id="_thismonthcomplaintrejected"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
    
            <div class="col-12 col-sm-6 mb-4">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Geçen Ayın Şikayet Özeti</h6>
                    </header>
                    <div class="card-body pt-3">
                        <div class="col-lg-5 mb-3">
                            <select title="Fabrika Seçiniz" class="selectpicker w-100" name=""
                                    id="factoryNameSearchingLastMonth">
                                <option value="">Tümü</option>
                                <?php foreach ($factories as $factory): ?>
                                    <option
                                            value="<?= $factory['factoryCode'] ?>"><?= $factory['factoryName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table id="thismonthcomplaint" class="display " style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom" width="5%"></th>
                                <th class="text-custom" width="15%">Fabrika Adı</th>
                                <th class="text-custom" width="15%">Şikayet Konuları</th>
                                <th class="text-custom text-center">Şikayet Adeti</th>
                                <th class="text-custom text-center">Gelen Şikayet(m2)</th>
                                <th class="text-custom text-center">Kabul(m2)</th>
                                <th class="text-custom text-center">Red (m2)</th>
    
                            </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < count($last_month_total_complaint); $i++): ?>
    
                                <tr>
                                    <th scope="row"><?= $i + 1 ?></th>
                                    <td><?= $last_month_total_complaint[$i]['factoryName'] ?>
                                        <span
                                                hidden><?= $last_month_total_complaint[$i]['factoryAuth'] ?></span>
                                    </td>
                                    <td><?= $last_month_total_complaint[$i]['complaintname'] ?></td>
                                    <td><?= $last_month_total_complaint[$i]['complaintCount'] ?></td>
                                    <td><?= number_format((float)$last_month_total_complaint[$i]['totalComplaint'], 2, '.', '') ?></td>
                                    <td><?= number_format((float)$last_month_total_complaint[$i]['acceptedComplaint'], 2, '.', '') ?></td>
                                    <td><?= number_format((float)$last_month_total_complaint[$i]['rejectedComplaint'], 2, '.', '') ?></td>
                                </tr>
                            <?php
                            endfor; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3" style="text-align:right"><strong>Genel Toplam:</strong></td>
                                <td><span value="" id="_lastmonthcomplaintcount"></td>
                                <td><span value="" id="_lastmonthcomplaintsum"></td>
                                <td><span value="" id="_lastmonthcomplaintaccepted"></td>
                                <td><span value="" id="_lastmonthcomplaintrejected"></td>
                            </tr>
                            </tfoot>
                        </table>
    
                    </div>
                </div>
            </div>
    
        </div>
    
    
    <?php endif; ?>
    
    <div class="row pt-2">
        <?php if ($auth == 0): ?>
    
            <div class="col-<?php if ($auth == 0) echo '12'; else ''; ?> col-sm-6 mb-6">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">1 Yıllık Şikayet Özeti</h6>
                    </header>
                    <div id="tableallfactories" class="card-body">
                        <h3> Tüm Fabrikalar</h3>
                        <div class="row">
                            <div class="col-lg-5 mb-1 mb-lg-0">
                                <select title="Fabrika Seçiniz" class="selectpicker w-100" name=""
                                        id="factoryNameSearching">
                                    <?php foreach ($factories as $factory): ?>
                                        <option
                                                value="<?= $factory['factoryCode'] ?>"><?= $factory['factoryName'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-5 mb-1 mb-lg-0">
                                <select title="Market Seçiniz" class="selectpicker w-100" name="" id="marketSearching">
                                    <option value="Yurt İçi">Yurt İçi</option>
                                    <option value="Yurt Dışı">Yurt Dışı</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" name="" onclick="resetCompalintSumTable()" value=""
                                        class="btn btn-sm btn-custom mt-2 mb-2 w-100">Tümü
                                </button>
                            </div>
                        </div>
                        <table id="complaintSum">
                            <thead>
                            <tr>
                                <th class="text-custom" width="3%"></th>
                                <th class="text-custom" width="15%">Fabrika Adı</th>
                                <th class="text-custom" width="15%">Şikayet Konuları</th>
                                <th class="text-custom" width="10%">Şikayet Adeti</th>
                                <th class="text-custom" width="10%">Gelen Şikayet(m2)</th>
                                <th class="text-custom" width="10%">Kabul(m2)</th>
                                <th class="text-custom" width="10%">Red (m2)</th>
                                <th class="text-custom" width="10%">Market</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $index = 0;
                            for ($i = 0; $i < count($yearlycomplaintbyfactory); $i++):?>
                                <tr>
                                    <td><?= $index++ ?></td>
                                    <td><?= $yearlycomplaintbyfactory[$i]['factoryName'] ?> <span
                                                hidden><?= $yearlycomplaintbyfactory[$i]['factoryAuth'] ?></span></td>
                                    <td><?= $yearlycomplaintbyfactory[$i]['complaintname'] ?></td>
                                    <td><?= $yearlycomplaintbyfactory[$i]['complaintCount'] ?></td>
                                    <td><?= number_format((float)$yearlycomplaintbyfactory[$i]['totalComplaint'], 2, '.', '') ?></td>
                                    <td><?= number_format((float)$yearlycomplaintbyfactory[$i]['acceptedComplaint'], 2, '.', '') ?></td>
                                    <td><?= number_format((float)$yearlycomplaintbyfactory[$i]['rejectedComplaint'], 2, '.', '') ?></td>
                                    <td><?php if ($yearlycomplaintbyfactory[$i]['market'] == 1) echo 'Yurt İçi'; else echo 'Yurt Dışı'; ?></td>
                                </tr>
                            <?php endfor; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3" style="text-align:right"><strong>Genel Toplam:</strong></td>
                                <td><span value="" id="_complaintcount"></td>
                                <td><span value="" id="_complaintsum"></td>
                                <td><span value="" id="_complaintaccepted"></td>
                                <td><span value="" id="_complaintrejected"></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
    
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($auth != 0): ?>
            <div class="col-12 col-sm-9 mb-6">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">1 Yıllık Şikayet Özeti</h6>
                    </header>
                    <h2 class="ml-3 mt-3"><?= complaint::get_factory_name_by_user_id()['factoryName'] ?></h2>
                    <table id="tableSingleFactory" class="display " style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom" width="3%"></th>
                            <th class="text-custom" width="15%">Şikayet Konuları</th>
                            <th class="text-custom" width="10%">Şikayet Adeti</th>
                            <th class="text-custom" width="10%">Gelen Şikayet(m2)</th>
                            <th class="text-custom" width="10%">Kabul(m2)</th>
                            <th class="text-custom" width="10%">Red (m2)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $singlefactory = complaint::get_complaints_by_authfactoryid($auth);
                        for ($i = 0; $i < count($singlefactory); $i++): ?>
    
                            <tr>
                                <th scope="row"><?= $i + 1 ?></th>
                                <td><?= $singlefactory[$i]['complaintname'] ?></td>
                                <td><?= $singlefactory[$i]['complaintCount'] ?></td>
                                <td><?= number_format((float)$singlefactory[$i]['totalComplaint'], 2, '.', '') ?></td>
                                <td><?= number_format((float)$singlefactory[$i]['acceptedComplaint'], 2, '.', '') ?></td>
                                <td><?= number_format((float)$singlefactory[$i]['rejectedComplaint'], 2, '.', '') ?></td>
                            </tr>
                        <?php endfor; ?>
                        </tbody>
                        <?php $singlefactorysum = complaint::get_complaints_sum_by_authfactoryid($auth); ?>
                        <tfoot>
                        <tr>
                            <th colspan="2" style="text-align: right">Genel Toplam :</th>
                            <td><?= $singlefactorysum['complaintCount'] ?></td>
                            <td><?= number_format((float)$singlefactorysum['totalComplaint'], 2, '.', '') ?></td>
                            <td><?= number_format((float)$singlefactorysum['acceptedComplaint'], 2, '.', '') ?></td>
                            <td><?= number_format((float)$singlefactorysum['rejectedComplaint'], 2, '.', '') ?></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($auth == 0): ?>
            <div class="col-12 col-sm-6 mb-6">
                <div class="card h-100">
    
                    <header class="card-header d-md-flex align-items-center bg-custom2">
    
                        <div class="col-9 col-sm-9">
                            <h6 class="card-header-title text-light mt-1">Anket Bazında Dağılım</h6>
                        </div>
    
                        <div class="col-3 col-sm-3 ml-1">
                            <select class="form-select small" name="marketSearchingForSurvey"
                                    id="marketSearchingForSurvey">
                                <option value="0">Tümü</option>
                                <option value="1">Yurt İçi</option>
                                <option value="2">Yurt Dışı</option>
                            </select>
                        </div>
    
                    </header>
    
                    <div class="card-body">
                        <canvas id="surveyChart"></canvas>
                        <canvas id="surveyChartAbroad"></canvas>
                        <canvas id="surveyChartDomestic"></canvas>
                        <div class="row mt-5">
    
                            <label class="form-label text-custom col-6"><strong>Memnuniyet
                                    Oranı</strong></label>
                            <label class="form-label text-custom col-6"><strong>Anket Sayısı</strong></label>
                            <div class="col-6">
                                <input disabled class="form-control small"
                                       value="<?php echo '%' . (number_format((float)$get_average_surveys['total'] / 30 * 100, 2, '.', '')) ?>">
                            </div>
                            <div class="col-6">
                                <input disabled class="form-control small"
                                       value="<?php echo $surveycount['total'] ?>">
                            </div>
                            <label class="form-label text-custom col-6 mt-2"><strong>Sonuçlandırılan Şikayet
                                    Sayısı</strong></label>
                            <label class="form-label text-custom col-6 mt-2"><strong>Ortalama Şikayet Sonuçlandırma
                                    Süresi Sayısı</strong></label>
                            <div class="col-6">
                                <input disabled class="form-control small"
                                       value="<?= $complaintreport['complaintDoneCount'] ?>">
                            </div>
                            <div class="col-6">
                                <input disabled class="form-control small"
                                       value="<?= $complaintreport['avarageDuration'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        <?php endif; ?>
    
        <?php if ($auth != 0): ?>
            <div class="card col-12 col-sm-3 mb-6">
                <div class="h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Şikayet Bazında Dağılım</h6>
                    </header>
                    <div class="card-body">
                        <canvas id="complaintTypeChartByFactory"></canvas>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($auth == 0 && session('company_id') == 8): ?>
            <div class="row pt-2 animate__animated animate__fadeIn" id="welcomeDiv" style="" class="answer_list">
                <div class="col-12 col-sm-12 mb-3">
                    <div class="card h-100">
                        <header class="card-header d-md-flex align-items-center bg-custom2">
                            <h6 class="card-header-title text-light mt-1">Genel Rapor</h6>
                        </header>
                        <div class="card-body">
                            <div id="complaintDiv">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 mb-1">
                                        <select class="w-100 selectpicker" data-live-search=true title="Yıl Seçiniz"
                                                id="yearSearch">
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-4 mb-1">
                                        <button onclick="resetTotalReport()" class="btn btn-sm btn-custom mt-2 w-100">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                                <table id="totalReport" class="display" style="width:100%; ">
                                    <thead style="font-size: 14px">
                                    <tr>
                                        <th class="text-custom">Yıl</th>
                                        <th class="text-custom">Toplam Şikayet Sayısı</th>
                                        <th class="text-custom">Kabul Edilen Şikayet</th>
                                        <th class="text-custom">Kabul Edilen Şikayet 1. Kalite m2</th>
                                        <th class="text-custom">Kabul Edilen Şikayet Endüstriyel m2</th>
                                        <th class="text-custom">Şikayet Konu Toplamı m2</th>
                                        <th class="text-custom">Toplam Üretilen 1.Kalite m2</th>
                                        <th class="text-custom">Toplam Üretilen m2</th>
                                        <th class="text-custom">1. Kalite Şikayet / 1.Kalite Üretim %</th>
                                        <th class="text-custom">Toplam Şikayet/Toplam Üretim %</th>
                                        <th class="text-custom">İhracat Alınan Şikayetler</th>
                                        <th class="text-custom">İç Piyasa Alınan Şikayetler</th>
                                        <th class="text-custom">İhracat Ödenen Tutar €</th>
                                        <th class="text-custom">İhracat Ödenen Tutar $</th>
                                        <th class="text-custom">İhracat Ödenen Tutar ₺ Karşılığı</th>
                                        <th class="text-custom">İç Piyasa Ödenen Tutar ₺</th>
                                        <th class="text-custom">Toplam Ödenen Tutar ₺</th>
                                    </tr>
                                    </thead>
                                    <tbody style="font-size: 12px;font-weight: bold;">
                                    <tr>
                                        <td>2016-2017</td>
                                        <td>34</td>
                                        <td>26</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>9.009,0</td>
                                        <td>5.457.954,0</td>
                                        <td>0</td>
                                        <td>0,17%</td>
                                        <td>0</td>
                                        <td>65%</td>
                                        <td>35%</td>
                                        <td>65.713,5</td>
                                        <td>0</td>
                                        <td>296.729,4</td>
                                        <td>0</td>
                                        <td>296.729,4</td>
                                    </tr>
                                    <tr>
                                        <td>2018</td>
                                        <td>99</td>
                                        <td>53</td>
                                        <td>45.130,0</td>
                                        <td>9.382,0</td>
                                        <td>54.511,0</td>
                                        <td>6.797.893,0</td>
                                        <td>8.930.892,2</td>
                                        <td>0,66%</td>
                                        <td>0,61%</td>
                                        <td>43%</td>
                                        <td>57%</td>
                                        <td>65.993,1</td>
                                        <td>15,805,5</td>
                                        <td>486.985,4</td>
                                        <td>115.594,8</td>
                                        <td>602.580,1</td>
                                    </tr>
                                    <tr>
                                        <td>2019</td>
                                        <td>84</td>
                                        <td>51</td>
                                        <td>17.942,2</td>
                                        <td>1.451,5</td>
                                        <td>33.650,7</td>
                                        <td>5.868.165,0</td>
                                        <td>8.007.960,0</td>
                                        <td>0,31%</td>
                                        <td>0,42%</td>
                                        <td>62%</td>
                                        <td>38%</td>
                                        <td>25.760,8</td>
                                        <td>14.032,1</td>
                                        <td>255.224,9</td>
                                        <td>38.473,7</td>
                                        <td>293.698,6</td>
                                    </tr>
                                    <tr>
                                        <td>2020</td>
                                        <td>88</td>
                                        <td>53</td>
                                        <td>24.328,4</td>
                                        <td>0</td>
                                        <td>24.328,4</td>
                                        <td>8.368.052,8</td>
                                        <td>10.621.162,8</td>
                                        <td>0,29%</td>
                                        <td>0,23%</td>
                                        <td>22%</td>
                                        <td>78%</td>
                                        <td>6.073,1</td>
                                        <td>15.292,9</td>
                                        <td>167.562,3</td>
                                        <td>161.844,7</td>
                                        <td>329.406,9</td>
                                    </tr>
                                    <tr>
                                        <td>2021</td>
                                        <td>83</td>
                                        <td>54</td>
                                        <td>12.224,4</td>
                                        <td>0</td>
                                        <td>12.224,4</td>
                                        <td>8.962.426,2</td>
                                        <td>11.047.175,8</td>
                                        <td>0,14%</td>
                                        <td>0,11%</td>
                                        <td>22%</td>
                                        <td>162%</td>
                                        <td>5.876,9</td>
                                        <td>11.574,8</td>
                                        <td>244.838,5</td>
                                        <td>16.975,6</td>
                                        <td>261.814,1</td>
                                    </tr>
                                    <tr>
                                        <td>2022</td>
                                        <td>74</td>
                                        <td>65</td>
                                        <td>9.624,6</td>
                                        <td>0</td>
                                        <td>9.624,6</td>
                                        <td>17.701.145,3</td>
                                        <td>22.339.941,0</td>
                                        <td>0,05%</td>
                                        <td>0,04%</td>
                                        <td>9%</td>
                                        <td>101%</td>
                                        <td>20.791,3</td>
                                        <td>0</td>
                                        <td>415.992,1</td>
                                        <td>209.436,9</td>
                                        <td>625.429,0</td>
                                    </tr>
                                    <?php foreach ($totalreport as $key => $item): ?>
                                        <tr>
                                            <td><?= $key ?></td>
                                            <td><?= $item['totalComplaintCount'] ?></td>
                                            <td><?= $item['acceptedComplaintCount'] ?></td>
                                            <td><?= number_format($item['firstClassAcceptedComplaint'], 2, ',', '.') ?></td>
                                            <td><?= number_format($item['secondClassAcceptedComplaint'], 2, ',', '.') ?></td>
                                            <td><?= number_format($item['allClassAcceptedComplaint'], 2, ',', '.') ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?= ($item['domesticComplaintCount'] + $item['abroadComplaintCount']) == 0 ?: number_format(($item['abroadComplaintCount'] / ($item['domesticComplaintCount'] + $item['abroadComplaintCount'])) * 100, 2) ?>
                                                %
                                            </td>
                                            <td><?= ($item['domesticComplaintCount'] + $item['abroadComplaintCount']) == 0 ? 0 : number_format(($item['domesticComplaintCount'] / ($item['domesticComplaintCount'] + $item['abroadComplaintCount'])) * 100, 2) ?>
                                                %
                                            </td>
                                            <td><?= number_format($item['abroadSpentUSD'], 2, ',', '.') ?></td>
                                            <td><?= number_format($item['abroadSpentEURO'], 2, ',', '.') ?></td>
                                            <td><?= number_format($item['abroadSpentTRY'], 2, ',', '.') ?></td>
                                            <td><?= number_format($item['domesticSpentTRY'], 2, ',', '.') ?></td>
                                            <td><?= number_format($item['totalSpentTRY'], 2, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td>Genel Toplam</td>
                                        <td><?php $total = 462 + $totalreportResult['totalComplaintCount']; ?><?= $total ?></td>
                                        <td><?php $total = 302 + $totalreportResult['acceptedComplaintCount']; ?><?= $total ?></td>
                                        <td><?= number_format(109249.5 + $totalreportResult['firstClassAcceptedComplaint'], 2, ',', '.') ?></td>
                                        <td><?= number_format(10833.5 + $totalreportResult['secondClassAcceptedComplaint'], 2, ',', '.') ?></td>
                                        <td><?= number_format(143348.0 + $totalreportResult['allClassAcceptedComplaint'], 2, ',', '.') ?></td>
                                        <td><?php $total = 53155636.2 ?><?= $total ?></td>
                                        <td><?php $total = 60947131.9 ?><?= $total ?></td>
                                        <td><?php $total = 0.21 ?><?= $total ?></td>
                                        <td><?php $total = 0.24 ?><?= $total ?></td>
                                        <td><?= ($totalreportResult['domesticComplaintCount'] + $totalreportResult['abroadComplaintCount']) == 0 ? 0 : number_format(($totalreportResult['abroadComplaintCount'] / ($totalreportResult['domesticComplaintCount'] + $totalreportResult['abroadComplaintCount'])) * 100, 2) ?>
                                            %
                                        </td>
                                        <td><?= ($totalreportResult['domesticComplaintCount'] + $totalreportResult['abroadComplaintCount']) == 0 ? 0 : number_format(($totalreportResult['domesticComplaintCount'] / ($totalreportResult['domesticComplaintCount'] + $totalreportResult['abroadComplaintCount'])) * 100, 2) ?>
                                            %
                                        </td>
                                        <td><?= number_format(191208.7 + $totalreportResult['abroadSpentUSD'], 2, ',', '.') ?></td>
                                        <td><?= number_format(56705.2 + $totalreportResult['abroadSpentEURO'], 2, ',', '.') ?></td>
                                        <td><?= number_format(1867332.5 + $totalreportResult['abroadSpentTRY'], 2, ',', '.') ?></td>
                                        <td><?= number_format(542325.6 + $totalreportResult['domesticSpentTRY'], 2, ',', '.') ?></td>
                                        <td><?= number_format(2409658.1 + $totalreportResult['totalSpentTRY'], 2, ',', '.') ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        <?php endif; ?>
    </div>
    <!-- Row 2 -->
    <div class="row pt-2 animate__animated animate__fadeIn" id="welcomeDiv" style="" class="answer_list">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Şikayet Yönetimi</h6>
                    <div class="ml-auto"><?php if (session('company_id')==2):?>  <a href="<?=site_url('complaint_add')?>">
                        <button type="button" class="btn btn-light">Şikayet Oluştur</button></a><?php endif; ?>
                    </div>
                </header>
                <div class="row mt-1 ml-1 mr-1">
                    <div class="col-sm-3 col-sm-3">
                        <button id="product" class="btn btn-sm btn-custom mt-2 categories">Şikayet Ürün</button>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <button id="supply" class="btn btn-sm btn-custom mt-2 categories">Şikayet Tedarik</button>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <button id="personel" class="btn btn-sm btn-custom mt-2 categories">Şikayet Personel</button>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <button id="suggestion" class="btn btn-sm btn-custom mt-2 categories">Öneri Memnuniyet</button>
                    </div>
                </div>
    
                <div class="card-body">
                    <div id="complaintDiv">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select class="w-100 selectpicker" data-live-search=true title="Şikayet ID"
                                        id="idSearchForComplaint">
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select class="w-100 selectpicker" title="Şikayet Türü" multiple data-live-search=true
                                        id="typeSearch">
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select class="w-100 selectpicker" title="Ebat" multiple data-live-search=true
                                        id="sizeSearch">
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select id="nameSearch" class="w-100 selectpicker" title="Ürün Adı" multiple
                                        data-live-search=true
                                >
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select title="Ürün Kalitesi" data-live-search=true class="selectpicker w-100"
                                        id="qualitySearch">
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select title="Bayi Adı" multiple data-live-search=true
                                        class="selectpicker w-100" id="sealerSearch">
                                </select>
                            </div>
    
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select title="Doküman Tipi" multiple data-live-search=true
                                        class="selectpicker w-100" id="documentTypeSearch">
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select title="Durumu" multiple data-live-search=true class="selectpicker w-100"
                                        id="statusSearch">
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select title="Pazar" data-live-search=true class="selectpicker w-100"
                                        id="marketSearch">
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select title="Fabrika Seçiniz" class="selectpicker w-100" name=""
                                        id="factorySearch">
                                    <?php foreach ($factories as $factory): ?>
                                        <option
                                                value="<?= $factory['factoryCode'] ?>"><?= $factory['factoryName'] ?></option>
                                    <?php endforeach; ?>
                                    <option
                                            value="Fabrika Yetkisi Yok">Fabrika Yetkisi Yok
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <select title="Oluşturan" data-live-search=true class="selectpicker w-100"
                                        id="createdSearch">
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-4 mb-1">
                                <button onclick="resetComplaintTable()" class="btn btn-sm btn-custom mt-2 w-100">
                                    Reset
                                </button>
    
                            </div>
                        </div>
                        <table id="complaintTable" class="display" style="width:100%; ">
                            <thead style="font-size: 9px">
                            <tr>
                                <th class="text-custom"></th>
                                <th class="text-custom">Şikayet Numarası</th>
                                <th class="text-custom">Oluşturan</th>
                                <th class="text-custom">Durumu</th>
                                <th class="text-custom">Bayi Adı</th>
                                <th class="text-custom">Ad</th>
                                <th class="text-custom">Soyad</th>
                                <th class="text-custom">Doküman Tipi</th>
                                <th class="text-custom">Şikayet Tarihi</th>
                                <th class="text-custom">Şikayet Türü</th>
                                <th class="text-custom">Ebat</th>
                                <th class="text-custom">Ürün Adı</th>
                                <th class="text-custom">Kalite</th>
                                <th class="text-custom">Pazar</th>
                                <th class="text-custom">Anket Bilgisi</th>
                                <th class="text-custom">Gelen Metraj</th>
                                <th class="text-custom">Kabul Edilen Metraj</th>
                                <th class="text-custom">Reddedilen Metraj</th>
                                <th class="text-custom">Fatura Numarası</th>
                                <th class="text-custom">Phone</th>
                                <th class="text-custom">Şikayet Süresi</th>
                                <th class="text-custom"><?= session('company_id') == 2 ? 'Cenk Şenotay' : 'Aykut Topal' ?></th>
                                <th class="text-custom"><?= session('company_id') == 2 ? 'Ahmet Pehlivan' : 'Hasan Hüseyin Topoz' ?></th>
                                <th class="text-custom"><?= session('company_id') == 2 ? 'Yavuz Arıcan' : 'Yavuz Arıcan' ?></th>
                                <th class="text-custom">Yetkili Bilgilendirme</th>
                                <th class="text-custom">Müşteri Bilgilendirme</th>
                                <th class="text-custom">Yetikili Fabriba</th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 8px;font-weight: bold;height: 300px">
    
                            <?php foreach ($complaints as $complaint): ?>
    
                                <tr>
                                    <td style="width:0.0001%; height:1%;">
                                        <a style="margin:0;padding:0;" target="_blank"
                                           class="btn btn-sm btn-outline-custom"
                                           href="<?= site_url('detail_complaint?id=' . base64_encode($complaint['id'])) ?>"><i
                                                    class="fa-solid fa-magnifying-glass"></i></a>
                                    </td>
                                    <td style="width:0.0001%; height:1%;"><?= $complaint['id'] ?></td>
                                    <td style="width:0.0001%; height:1%;"><?= $complaint['created_by'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= complaint::get_status_name($complaint['status']) ?></td>
                                    <td style="width:0.05%; height:1%;"><?php if (!empty($complaint['otherdealer'])) echo $complaint['otherdealer']; else echo $complaint['sealer'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= $complaint['name'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= $complaint['surname'] ?></td>
                                    <td style="width:0.02%; height:1%;"><?= @complaint::get_document_name($complaint['document_type']) ?></td>
                                    <td style="width:0.01%; height:1%;"><?= $complaint['createdDate'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= complaint::get_categories_name($complaint['complaintType']) ?></td>
                                    <td style="width:0.005%; height:1%;"><?= $complaint['productSize'] ?></td>
                                    <td style="width:0.03%; height:1%;"><?php if ($complaint['companyId']==2) {echo complaint::get_product_name($complaint['productType'], $complaint['productName'])['name']; } if ($complaint['companyId']==8) {echo quamutlu::get_product_name($complaint['productName'])['productName']; }  ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['productQuality'] == 1 ? "1. Kalite" : "Endüstriyel" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['market'] == 1 ? "Yurtiçi" : "Yurt Dışı" ?></td>
                                    <td style="width:0.01%; height:1%;"><?php if (survey::survey_exist($complaint['id'])) {
                                            echo 'Anket Dolduruldu';
                                        } else {
                                            echo 'Anket Doldurulmadı';
                                        } ?></td>
                                    <td style="width:0.001%; height:1%;"><?= number_format((float)$complaint['productQuantity'], 2, '.', '') ?></td>
                                    <td style="width:0.001%; height:1%;"><?php if ($complaint['acceptedQuantity']) {
                                            echo $complaint['acceptedQuantity'];
                                        } else {
                                            echo '0';
                                        } ?></td>
                                    <td style="width:0.001%; height:1%;"><?= intval($complaint['productQuantity']) - intval($complaint['acceptedQuantity']) ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['billNumber'] ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['phone'] ?></td>
                                    <?php $duration = round((strtotime(date('Y-m-d h:i:s', time())) - strtotime($complaint['createdDate'])) / 3600 / 24); ?>
                                    <td style="color:<?php
                                    if ($duration < 2) {
                                        echo 'Green';
                                    } else if ($duration < 6) {
                                        echo 'Yellow';
                                    } else if ($duration < 9) {
                                        echo 'Blue';
                                    } else if ($duration > 8) {
                                        echo 'Red';
                                    }
                                    ?> ; width:0.001%; height:1%;"><?php
                                        echo $duration;
                                        ?> </td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['technicalConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['processConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['factoryConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['authmailsent'] == 1 ? "Gönderildi" : "Gönderilmedi" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['complaintownermailsent'] == 1 ? "Gönderildi" : "Gönderilmedi" ?></td>
                                    <td style="width:0.01%; height:1%;"><?= $complaint['factoryAuth'] == NULL ? 'Fabrika Yetkisi Yok' : complaint::get_factory_name_by_factory_id($complaint['factoryAuth']) ?>
                                        <span
                                                hidden><?= $complaint['factoryAuth'] ?></span></td>
    
    
                                </tr>
                            <?php
                            endforeach; ?>
                            </tbody>
                        </table>
                    </div>
    
                    <div id="supplyDiv">
                        <div class="row">
                            <div class="col-12 col-lg-2">
                                <select data-live-search=true title="Şikayet ID" class="selectpicker" name=""
                                        id="idSearchForSupply">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2">
                                <select title="Şikayet Türü" multiple data-live-search=true class="selectpicker" name=""
                                        id="typeSearchForSupply">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2">
                                <select title="Ebat" multiple data-live-search=true class="selectpicker" name=""
                                        id="sizeSearchForSupply">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2">
                                <select id="nameSearchForSupply" title="Ürün Adı" multiple data-live-search=true name=""
                                        class="selectpicker">
    
                                </select>
                            </div>
                            <div class="col-12 col-lg-2 ">
                                <select title="Bayi Adı" multiple data-live-search=true class="selectpicker" name=""
                                        id="sealerSearchForSupply">
    
                                </select>
                            </div>
                            <div class="col-12 col-lg-2">
                                <select title="Durumu" multiple data-live-search=true class="selectpicker" name=""
                                        id="statusSearchForSupply">
                                </select>
                            </div>
    
                        </div>
                        <div class="row">
    
                            <div class="col-12 col-lg-2 mt-3 mb-2">
                                <select title="Pazar" data-live-search=true class="selectpicker" name=""
                                        id="marketSearchForSupply">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2 mt-3 mb-2">
                                <button onclick="resetSupplyTable()" class="btn btn-sm btn-custom mt-2">
                                    Reset
                                </button>
    
                            </div>
                        </div>
                        <table id="supplyTable" class="  display  " style="width:100%; ">
                            <thead style="font-size: 9px">
                            <tr>
                                <th class="text-custom"></th>
                                <th class="text-custom">Şikayet Kategorisi</th>
                                <th class="text-custom">Şikayet Numarası</th>
                                <th class="text-custom">Oluşturan</th>
                                <th class="text-custom">Durumu</th>
                                <th class="text-custom">Bayi Adı</th>
                                <th class="text-custom">Ad</th>
                                <th class="text-custom">Soyad</th>
                                <th class="text-custom">Şikayet Tarihi</th>
                                <th class="text-custom">Şikayet Türü</th>
                                <th class="text-custom">Ebat</th>
                                <th class="text-custom">Ürün Adı</th>
                                <th class="text-custom">Kalite</th>
                                <th class="text-custom">Pazar</th>
                                <th class="text-custom">Anket Bilgisi</th>
                                <th class="text-custom">Ulaşmayan Metraj</th>
                                <th class="text-custom">Phone</th>
                                <th class="text-custom">Adres</th>
                                <th class="text-custom">Şikayet Süresi</th>
                                <th class="text-custom">Cenk Şenotay</th>
                                <th class="text-custom">Ahmet Pehlivan</th>
                                <th class="text-custom">Yavuz Arıcan</th>
                                <th class="text-custom">Yetkili Bilgilendirme</th>
                                <th class="text-custom">Müşteri Bilgilendirme</th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 8px;font-weight: bold;height: 300px">
    
                            <?php foreach ($supplycomplaint as $complaint): ?>
    
                                <tr>
                                    <td style="width:0.0001%; height:1%;">
                                        <a style="margin:0;padding:0;" target="_blank"
                                           class="btn btn-sm btn-outline-custom"
                                           href="<?= site_url('detail_complaint?id=' . base64_encode($complaint['id'])) ?>"><i
                                                    class="fa-solid fa-magnifying-glass"></i></a>
                                    </td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['category'] ?></td>
                                    <td style="width:0.0001%; height:1%;"><?= $complaint['id'] ?></td>
                                    <td style="width:0.0001%; height:1%;"><?= $complaint['created_by'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= complaint::get_status_name($complaint['status']) ?></td>
                                    <td style="width:0.05%; height:1%;"><?php if (!empty($complaint['otherdealer'])) echo $complaint['otherdealer']; else echo $complaint['sealer'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= $complaint['name'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= $complaint['surname'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= $complaint['createdDate'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= complaint::get_categories_name($complaint['complaintType']) ?></td>
                                    <td style="width:0.005%; height:1%;"><?= $complaint['productSize'] ?></td>
                                    <td style="width:0.03%; height:1%;"><?= complaint::get_product_name($complaint['productType'], $complaint['productName'])['name'] ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['productQuality'] == 1 ? "1. Kalite" : "Endüstriyel" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['market'] == 1 ? "Yurtiçi" : "Yurt Dışı" ?></td>
                                    <td style="width:0.01%; height:1%;"><?php if (survey::survey_exist($complaint['id'])) {
                                            echo 'Anket Dolduruldu';
                                        } else {
                                            echo 'Anket Doldurulmadı';
                                        } ?></td>
                                    <td style="width:0.001%; height:1%;"><?= number_format((float)$complaint['productQuantity'], 2, '.', '') ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['phone'] ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['address'] ?></td>
                                    <?php $duration = round((strtotime(date('Y-m-d h:i:s', time())) - strtotime($complaint['createdDate'])) / 3600 / 24); ?>
                                    <td style="color:<?php
                                    if ($duration < 2) {
                                        echo 'Green';
                                    } else if ($duration < 6) {
                                        echo 'Yellow';
                                    } else if ($duration < 9) {
                                        echo 'Blue';
                                    } else if ($duration > 8) {
                                        echo 'Red';
                                    }
                                    ?> ; width:0.001%; height:1%;"><?php
                                        echo $duration;
                                        ?> </td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['technicalConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['processConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['factoryConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['authmailsent'] == 1 ? "Gönderildi" : "Gönderilmedi" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['complaintownermailsent'] == 1 ? "Gönderildi" : "Gönderilmedi" ?></td>
    
                                </tr>
                            <?php
                            endforeach; ?>
                            </tbody>
                        </table>
                    </div>
    
                    <div id="personelDiv">
                        <div class="row mb-1">
                            <div class="col-12 col-lg-2">
                                <select data-live-search=true title="Şikayet ID" class="selectpicker"
                                        id="idSearchForPersonel">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2 ">
                                <select title="Bayi Adı" multiple data-live-search=true class="selectpicker"
                                        id="sealerSearchForPersonel">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2">
                                <select title="Durumu" multiple data-live-search=true class="selectpicker"
                                        id="statusSearchForPersonel">
                                </select>
                            </div>
                            <div class="col-12 col-lg-1 ">
                                <label class="form-label text-custom mt-2 float-right"><strong style="font-size: 1.2em">Olay
                                        Tarihi:</strong></label>
                            </div>
                            <div class="col-12 col-lg-2 ">
                                <input id="eventSearchForPersonel" name="eventSearchForPersonel" type="date"
                                       class="dateselector  form-control">
                            </div>
    
                            <div class="col-12 col-lg-3">
                                <button onclick="resetPersonelTable()" class="btn btn-sm btn-custom mt-2">
                                    Reset
                                </button>
                            </div>
                        </div>
    
                        <table id="personelTable" class="display" style="width:100%; ">
                            <thead style="font-size: 9px">
                            <tr>
                                <th class="text-custom"></th>
                                <th class="text-custom">Şikayet Numarası</th>
                                <th class="text-custom">Oluşturan</th>
                                <th class="text-custom">Durumu</th>
                                <th class="text-custom">Bayi Adı</th>
                                <th class="text-custom">Ad</th>
                                <th class="text-custom">Soyad</th>
                                <th class="text-custom">Şikayet Tarihi</th>
                                <th class="text-custom">Anket Bilgisi</th>
                                <th class="text-custom">Phone</th>
                                <th class="text-custom">Şikayet Süresi</th>
                                <th class="text-custom">Olay Tarihi</th>
                                <th class="text-custom">Olay Saati</th>
                                <th class="text-custom">Cenk Şenotay</th>
                                <th class="text-custom">Ahmet Pehlivan</th>
                                <th class="text-custom">Yavuz Arıcan</th>
                                <th class="text-custom">Yetkili Bilgilendirme</th>
                                <th class="text-custom">Müşteri Bilgilendirme</th>
    
                            </tr>
                            </thead>
                            <tbody style="font-size: 8px;font-weight: bold;height: 300px">
    
                            <?php foreach ($personelcomplaint as $complaint): ?>
    
                                <tr>
                                    <td style=" height:1%;">
                                        <a style="margin:0;padding:0;" target="_blank"
                                           class="btn btn-sm btn-outline-custom"
                                           href="<?= site_url('detail_complaint?id=' . $complaint['id']) ?>">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </td>
                                    <td style="height:1%;"><?= $complaint['id'] ?></td>
                                    <td style="width:0.0001%; height:1%;"><?= $complaint['created_by'] ?></td>
                                    <td style="height:1%;"><?= complaint::get_status_name($complaint['status']) ?></td>
                                    <td style="height:1%;"><?php if (!empty($complaint['otherdealer'])) echo $complaint['otherdealer']; else echo $complaint['sealer'] ?></td>
                                    <td style="height:1%;"><?= $complaint['name'] ?></td>
                                    <td style="height:1%;"><?= $complaint['surname'] ?></td>
                                    <td style="height:1%;"><?= $complaint['createdDate'] ?></td>
                                    <td style="height:1%;">
                                        <?php if (survey::survey_exist($complaint['id'])) {
                                            echo 'Anket Dolduruldu';
                                        } else {
                                            echo 'Anket Doldurulmadı';
                                        } ?>
                                    </td>
                                    <td style="height:1%;"><?= $complaint['phone'] ?></td>
                                    <td style="color:<?php $duration = round((strtotime(date('Y-m-d h:i:s', time())) - strtotime($complaint['createdDate'])) / 3600 / 24);
                                    if ($duration < 2) {
                                        echo 'Green';
                                    } else if ($duration < 6) {
                                        echo 'Yellow';
                                    } else if ($duration < 9) {
                                        echo 'Blue';
                                    } else if ($duration > 8) {
                                        echo 'Red';
                                    }
                                    ?> ;  height:1%;">
                                        <?php
                                        echo $duration;
                                        ?>
                                    </td>
                                    <td style=" height:1%;"><?= $complaint['personalEventDate'] ?></td>
                                    <td style=" height:1%;"><?= $complaint['personalEventTime'] ?></td>
                                    <td style=" height:1%;"><?= $complaint['technicalConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style=" height:1%;"><?= $complaint['processConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style=" height:1%;"><?= $complaint['factoryConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style=" height:1%;"><?= $complaint['authmailsent'] == 1 ? "Gönderildi" : "Gönderilmedi" ?></td>
                                    <td style=" height:1%;"><?= $complaint['complaintownermailsent'] == 1 ? "Gönderildi" : "Gönderilmedi" ?></td>
                                </tr>
                            <?php
                            endforeach; ?>
                            </tbody>
                        </table>
                    </div>
    
                    <div id="suggestionDiv">
                        <div class="row">
                            <div class="col-12 col-lg-2">
                                <select data-live-search=true title="Şikayet ID" class="selectpicker" name=""
                                        id="idSearchForSuggestion">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2">
                                <select title="Bayi Adı" multiple data-live-search=true class="selectpicker" name=""
                                        id="sealerSearchForSuggestion">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2">
                                <select title="Durumu" multiple data-live-search=true class="selectpicker" name=""
                                        id="statusSearchForSuggestion">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2">
                                <select title="Oluşturan" multiple data-live-search=true class="selectpicker" name=""
                                        id="createdSearchForSuggestion">
                                </select>
                            </div>
                            <div class="col-12 col-lg-2 mb-1">
                                <button onclick="resetSuggestionTable()" class="btn btn-sm btn-custom mt-2">
                                    Reset
                                </button>
                            </div>
                        </div>
    
                        <table id="suggestionTable" class="  display  " style="width:100%; ">
                            <thead style="font-size: 9px">
                            <tr>
                                <th class="text-custom"></th>
                                <th class="text-custom">Şikayet Numarası</th>
                                <th class="text-custom">Oluşturan</th>
                                <th class="text-custom">Durumu</th>
                                <th class="text-custom">Ad</th>
                                <th class="text-custom">Soyad</th>
                                <th class="text-custom">Öneri/İstek Tarihi</th>
                                <th class="text-custom">Ürün Adı</th>
                                <th class="text-custom">Anket Bilgisi</th>
                                <th class="text-custom">Phone</th>
                                <th class="text-custom">Şikayet Süresi</th>
                                <th class="text-custom">Cenk Şenotay</th>
                                <th class="text-custom">Ahmet Pehlivan</th>
                                <th class="text-custom">Yavuz Arıcan</th>
                                <th class="text-custom">Yetkili Bilgilendirme</th>
                                <th class="text-custom">Müşteri Bilgilendirme</th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 8px;font-weight: bold;height: 300px">
    
                            <?php foreach ($suggestioncomplaint as $complaint): ?>
                                <tr>
                                    <td style="width:0.0001%; height:1%;">
                                        <a style="margin:0;padding:0;" target="_blank"
                                           class="btn btn-sm btn-outline-custom"
                                           href="<?= site_url('detail_complaint?id=' . base64_encode($complaint['id'])) ?>"><i
                                                    class="fa-solid fa-magnifying-glass"></i></a>
                                    </td>
                                    <td style="width:0.0001%; height:1%;"><?= $complaint['id'] ?></td>
                                    <td style="width:0.0001%; height:1%;"><?= $complaint['created_by'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= complaint::get_status_name($complaint['status']) ?></td>
                                    <td style="width:0.01%; height:1%;"><?= $complaint['name'] ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['surname'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?= $complaint['createdDate'] ?></td>
                                    <td style="width:0.01%; height:1%;"><?php
                                        if ($complaint['productType'] == 1) echo "Seramik Karo";
                                        else if ($complaint['productType'] == 2) echo "Seramik Sağlık Gereçleri";
                                        else if ($complaint['productType'] == 3) echo "Armatürler";
                                        else if ($complaint['productType'] == 4) echo "Klozet Kapak";
                                        else if ($complaint['productType'] == 5) echo "Gömme Rezervuarları";
                                        ?>
                                    </td>
                                    <td style="width:0.01%; height:1%;"><?php if (survey::survey_exist($complaint['id'])) {
                                            echo 'Anket Dolduruldu';
                                        } else {
                                            echo 'Anket Doldurulmadı';
                                        } ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['phone'] ?></td>
                                    <?php $duration = round((strtotime(date('Y-m-d h:i:s', time())) - strtotime($complaint['createdDate'])) / 3600 / 24); ?>
                                    <td style="color:<?php
                                    if ($duration < 2) {
                                        echo 'Green';
                                    } else if ($duration < 6) {
                                        echo 'Yellow';
                                    } else if ($duration < 9) {
                                        echo 'Blue';
                                    } else if ($duration > 8) {
                                        echo 'Red';
                                    }
                                    ?> ; width:0.001%; height:1%;"><?php
                                        echo $duration;
                                        ?> </td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['technicalConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['processConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['factoryConfirm'] == 1 ? "Onaylı" : "Onaysız" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['authmailsent'] == 1 ? "Gönderildi" : "Gönderilmedi" ?></td>
                                    <td style="width:0.001%; height:1%;"><?= $complaint['complaintownermailsent'] == 1 ? "Gönderildi" : "Gönderilmedi" ?></td>
                                </tr>
                            <?php
                            endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row 2 -->
    
    </div>
    <!-- Container -->
    <div style="height: 50px">
    <?php if (count(user::get_auth_companies()) > 1): ?>
        <form action="<?= site_url('complaint') ?>" method="post">
            <div style="position: fixed;top: 2%;right: 7%;z-index: 5000">
                <a id="vkn_click" style="cursor: pointer"><img
                            style="border: #6b15b6;border-style: solid ;border-width:2px ;border-radius: 10px;width: 50px;height: 50px"
                            src="https://dev.verimportal.com/public/img/loader.gif" alt=""></a>
            </div>
            <div id="window" style="height: 175px;display: none;color: white; font-size: 1.2em" class="vkn_window">
                <div class=""
                ">Kullanıcı Seçiniz
            </div>
            <label for="selectedCompanyId1"><input <?= session('company_id') == 2 ? ' checked ' : '' ?> type="radio"
                                                                                                        value="2"
                                                                                                        name="selectedCompanyId"
                                                                                                        id="selectedCompanyId1">
                Bien Mutlu Müşteri</label>
            <label for="selectedCompanyId2"><input <?= session('company_id') == 8 ? ' checked ' : '' ?> type="radio"
                                                                                                        value="8"
                                                                                                        name="selectedCompanyId"
                                                                                                        id="selectedCompanyId2">
                Qua Mutlu Müşteri</label>
            <div class="paddingtop d-grid gap-12">
                <button type="submit" name="chooseCompany" value="1" class="btn btn-sm btn-custom mt-1 ">
                    <bold>Getir</bold>
                </button>
            </div>
    
            </div>
        </form>
    <?php endif; ?>
    </div>
    <?php require 'mainPage_statics/footer.php'; ?>
    <script>
    
        document.getElementById("vkn_click").onclick = function () {
            if (document.getElementById("window").style.display == 'none') {
                document.getElementById("window").style.display = "";
            } else {
                document.getElementById("window").style.display = "none";
            }
        }
    </script>
    <script>
        $('#billoptions').on('change', function () {
            var selectedValue = $(this).val();
            $('#billChart, #billChartUsd, #billChartEuro').hide();
    
            if (selectedValue === 'TRY') {
                $('#billChart').show();
            } else if (selectedValue === 'USD') {
                $('#billChartUsd').show();
            } else if (selectedValue === 'EURO') {
                $('#billChartEuro').show();
            }
        });
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.13.1/api/sum().js"></script>
    
    <script>
        $(document).ready(function () {
            $('#suggestionDiv').hide();
            $('#personelDiv').hide();
            $('#supplyDiv').hide();
            $("#surveyChartDomestic").hide();
            $("#surveyChartAbroad").hide();
    
            const curdate = new Date();
            $("#eventSearchForPersonel").val(moment(curdate).format('YYYY-MM-DD'));
    
    
            resetCompalintSumTable();
            resetComplaintTable();
            resetTotalReport();
        });
    </script>
    
    
    <!--searhing function-->
    <script>
    
        function standartsinglesearch(id, index, table) {
            document.getElementById(id).onchange = function () {
                table.columns(index).search(document.getElementById(id).value).draw();
            }
        }
    
        function matchingsinglesearch(id, index, table) {
            document.getElementById(id).onchange = function () {
                table.columns(index).search("^" + document.getElementById(id).value + '$', true).draw();
            }
        }
    
        function standartmultiplesearch(id, index, table) {
            document.getElementById(id).onchange = function () {
                var selected = [];
                for (var option of document.getElementById(id).options) {
                    if (option.selected) {
                        selected.push(option.value);
                    }
                }
                selected = selected.join("|");
                table.columns(index).search(selected, true, false).draw();
            }
        }
    </script>
    <!--serhing function end-->
    
    
    <script>
        function setsearchvalues(id, index, table) {
            var values = table
                .column(index, {search: 'applied'})
                .data()
                .toArray();
            //insert to array currently values done
    
            //clear select opitons
            var itemSelectorOption = $('#' + id + ' option');
    
            itemSelectorOption.remove();
    
            $("#" + id).selectpicker('refresh');
    
    
            //clear done
    
            //unique current values
            function unique(arr) {
                var i,
                    len = arr.length,
                    out = [],
                    obj = {};
                for (i = 0; i < len; i++) {
                    obj[arr[i]] = 0;
                }
                for (i in obj) {
                    out.push(i);
                }
                return out;
            }
    
            var values = unique(values);
            //unique done
    
            //insert values to select options
            $.each(values, function (key, value) {
                $('#' + id).append($('<option>', {value: value}).text(value));
            });
        }
    
        function clearsearhing(table) {
            var tabledef = $('#' + table).DataTable();
            var count = $('#' + table + ' > thead > tr:first > th').length;
            for (let i = 0; i < count; i++) {
                tabledef.column(i).search("").draw();
            }
        }
    </script>
    
    
    <script>
        $('#product').click(function () {
            resetComplaintTable();
            $('#suggestionDiv').hide();
            $('#personelDiv').hide();
            $('#supplyDiv').hide();
            $('#complaintDiv').show();
            complaintTable.order([1, 'desc']).draw();
        });
    
        $('#supply').click(function () {
            resetSupplyTable();
            $('#suggestionDiv').hide();
            $('#personelDiv').hide();
            $('#supplyDiv').show();
            $('#complaintDiv').hide();
            supplyTable.order([2, 'desc']).draw();
        });
    
        $('#personel').click(function () {
            resetPersonelTable();
            $('#suggestionDiv').hide();
            $('#personelDiv').show();
            $('#supplyDiv').hide();
            $('#complaintDiv').hide();
            personelTable.order([1, 'desc']).draw();
        });
    
        $('#suggestion').click(function () {
            resetSuggestionTable();
            $('#suggestionDiv').show();
            $('#personelDiv').hide();
            $('#supplyDiv').hide();
            $('#complaintDiv').hide();
            suggestionTable.order([1, 'desc']).draw();
        });
    </script>
    
    <script>
        var complaintTable = $('#complaintTable').DataTable({
            select: {
                style: 'multi'
            },
            stateSave: true,
            scrollCollapse: true,
            paging: false,
            scrollX: 50,
            scrollX: true,
            scrollY: 50,
            scrollY: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    
        var suggestionTable = $('#suggestionTable').DataTable({
            select: {
                style: 'multi'
            },
            stateSave: true,
            scrollX: '200px',
            scrollCollapse: true,
            paging: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
        var supplyTable = $('#supplyTable').DataTable({
            select: {
                style: 'multi'
            },
            stateSave: true,
            scrollX: '200px',
            scrollCollapse: true,
            paging: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
        var personelTable = $('#personelTable').DataTable({
            select: {
                style: 'multi'
            },
            stateSave: true,
            scrollX: '200px',
            scrollCollapse: true,
            paging: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    
        var complaintSum = $('#complaintSum').DataTable({
            scrollY: '400px',
            scrollCollapse: true,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            paging: false,
            bLengthChange: false,
            drawCallback: function () {
                var api = this.api();
                $("#_complaintcount").text(
                    api.column(3, {page: 'current'}).data().sum()
                );
                $("#_complaintsum").text(
                    parseFloat(api.column(4, {page: 'current'}).data().sum()).toFixed(2)
                );
                $("#_complaintaccepted").text(
                    parseFloat(api.column(5, {page: 'current'}).data().sum()).toFixed(2)
                );
                $("#_complaintrejected").text(
                    parseFloat(api.column(6, {page: 'current'}).data().sum()).toFixed(2)
                );
            }
    
        });
        var totalReport = $('#totalReport').DataTable({
            scrollY: '200px',
            scrollCollapse: true,
            dom: 'Bfrtip',
            searching: false,
            paging: false,
            scrollY: false,
            scrollX: true,
            info: false,
            buttons: [
                'excel',
    
            ],
            responsive: {
                details: false
            },
            pageLength: 10,
            bLengthChange: false
        });
    
        function resetTotalReport() {
            $('#totalReport').dataTable().fnFilter('');
            $("#yearSearch").val([]);
            totalReport.columns(0).search("").draw();
            setsearchvalues('yearSearch', 0, totalReport);
            matchingsinglesearch('yearSearch', 0, totalReport);
    
            $('.selectpicker').selectpicker('refresh');c
        }
    
    
    </script>
    
    <script>
        $('.selectpicker').attr("data-size", 8);//define size of dropdown
    </script>
    <script>
        function resetComplaintTable() {
            $('#complaintTable').dataTable().fnFilter('');
            $("#idSearchForComplaint").val([]);
            complaintTable.columns(1).search("").draw();
            $("#typeSearch").val([]);
            complaintTable.columns(2).search("").draw();
            $("#createdSearch").val([]);
            complaintTable.columns(9).search("").draw();
            $("#sizeSearch").val([]);
            complaintTable.columns(10).search("").draw();
            $("#nameSearch").val([]);
            complaintTable.columns(11).search("").draw();
            $("#qualitySearch").val([]);
            complaintTable.columns(12).search("").draw();
            $("#sealerSearch").val([]);
            complaintTable.columns(4).search("").draw();
            $("#documentTypeSearch").val([]);
            complaintTable.columns(7).search("").draw();
            $("#statusSearch").val([]);
            complaintTable.columns(3).search("").draw();
            $("#marketSearch").val([]);
            complaintTable.columns(13).search("").draw();
            $("#factorySearch").val([]);
            complaintTable.columns(26).search("").draw();
            setsearchvalues('idSearchForComplaint', 1, complaintTable);
            matchingsinglesearch('idSearchForComplaint', 1, complaintTable);
         setsearchvalues('createdSearch', 2, complaintTable);
            matchingsinglesearch('createdSearch', 2, complaintTable);
            setsearchvalues('typeSearch', 9, complaintTable);
            standartmultiplesearch('typeSearch', 9, complaintTable);
            setsearchvalues('sizeSearch', 10, complaintTable);
            standartmultiplesearch('sizeSearch', 10, complaintTable);
            setsearchvalues('nameSearch', 11, complaintTable);
            standartmultiplesearch('nameSearch', 11, complaintTable);
            setsearchvalues('qualitySearch', 12, complaintTable);
            standartsinglesearch('qualitySearch', 12, complaintTable);
            setsearchvalues('sealerSearch', 4, complaintTable);
            standartmultiplesearch('sealerSearch', 4, complaintTable);
            setsearchvalues('documentTypeSearch', 7, complaintTable);
            standartmultiplesearch('documentTypeSearch', 7, complaintTable);
            setsearchvalues('statusSearch', 3, complaintTable);
            standartmultiplesearch('statusSearch', 3, complaintTable);
            setsearchvalues('marketSearch', 13, complaintTable);
            standartsinglesearch('marketSearch', 13, complaintTable);
            standartsinglesearch('factorySearch', 26, complaintTable);
            $('.selectpicker').selectpicker('refresh');
        }
    </script>
    <script>
    
    
        function resetSupplyTable() {
            $('#supplyTable').dataTable().fnFilter('');
            $("#idSearchForSupply").val([]);
            supplyTable.columns(2).search("").draw();
            $("#typeSearchForSupply").val([]);
            supplyTable.columns(9).search("").draw();
            $("#nameSearchForSupply").val([]);
            supplyTable.columns(11).search("").draw();
            $("#sizeSearchForSupply").val([]);
            supplyTable.columns(10).search("").draw();
            $("#sealerSearchForSupply").val([]);
            supplyTable.columns(5).search("").draw();
            $("#statusSearchForSupply").val([]);
            supplyTable.columns(4).search("").draw();
            $("#marketSearchForSupply").val([]);
            supplyTable.columns(13).search("").draw();
            setsearchvalues('idSearchForSupply', 2, supplyTable);
            standartsinglesearch('idSearchForSupply', 2, supplyTable);
            setsearchvalues('nameSearchForSupply', 11, supplyTable);
            standartmultiplesearch('nameSearchForSupply', 11, supplyTable);
            setsearchvalues('typeSearchForSupply', 9, supplyTable);
            standartmultiplesearch('typeSearchForSupply', 9, supplyTable);
            setsearchvalues('sizeSearchForSupply', 10, supplyTable);
            standartmultiplesearch('sizeSearchForSupply', 10, supplyTable);
            setsearchvalues('sealerSearchForSupply', 4, supplyTable);
            standartmultiplesearch('sealerSearchForSupply', 4, supplyTable);
            setsearchvalues('sealerSearchForSupply', 5, supplyTable);
            standartmultiplesearch('sealerSearchForSupply', 5, supplyTable);
            setsearchvalues('statusSearchForSupply', 4, supplyTable);
            standartmultiplesearch('statusSearchForSupply', 4, supplyTable);
            setsearchvalues('marketSearchForSupply', 13, supplyTable);
            standartsinglesearch('marketSearchForSupply', 13, supplyTable);
            $('.selectpicker').selectpicker('refresh');
        }
    
        function resetPersonelTable() {
            $('#personelTable').dataTable().fnFilter('');
            personelTable.columns(1).search("").draw();
            $("#idSearchForPersonel").val([]);
            personelTable.columns(4).search("").draw();
            $("#sealerSearchForPersonel").val([]);
            personelTable.columns(3).search("").draw();
            $("#statusSearchForPersonel").val([]);
            const curdate = new Date();
            $("#eventSearchForPersonel").val(moment(curdate).format('YYYY-MM-DD'));
            personelTable.columns(11).search("").draw();
            setsearchvalues('idSearchForPersonel', 1, personelTable);
            standartsinglesearch('idSearchForPersonel', 1, personelTable);
            setsearchvalues('sealerSearchForPersonel', 4, personelTable);
            standartmultiplesearch('sealerSearchForPersonel', 4, personelTable);
            setsearchvalues('statusSearchForPersonel', 3, personelTable);
            standartmultiplesearch('statusSearchForPersonel', 3, personelTable);
            $('.selectpicker').selectpicker('refresh');
        }
    
        $("#eventSearchForPersonel").change(function () {
            var eventSearchForPersonel = moment($("#eventSearchForPersonel").val()).format('YYYY-MM-DD');
            personelTable.columns(11).search(eventSearchForPersonel).draw();
        });
    
        function resetSuggestionTable() {
            $('#suggestionTable').dataTable().fnFilter('');
            $("#idSearchForSuggestion").val([]);
            suggestionTable.columns(1).search("").draw();
            $("#sealerSearchForSuggestion").val([]);
    
            suggestionTable.columns(5).search("").draw();
            $("#statusSearchForSuggestion").val([]);
            suggestionTable.columns(4).search("").draw();
            setsearchvalues('idSearchForSuggestion', 1, suggestionTable);
            standartsinglesearch('idSearchForSuggestion', 1, suggestionTable);
              setsearchvalues('createdSearchForSuggestion', 2, suggestionTable);
            standartsinglesearch('createdSearchForSuggestion', 2, suggestionTable);
            setsearchvalues('sealerSearchForSuggestion', 5, suggestionTable);
            standartsinglesearch('sealerSearchForSuggestion', 5, suggestionTable);
            setsearchvalues('statusSearchForSuggestion', 4, suggestionTable);
            standartsinglesearch('statusSearchForSuggestion', 4, suggestionTable);
            $('.selectpicker').selectpicker('refresh');
        }
    
        function resetCompalintSumTable() {
            $('#complaintSum').dataTable().fnFilter('');
            $("#factoryNameSearching").val([]).trigger('change');
            $("#marketSearching").val([]).trigger('change');
            complaintSum.columns(1).search("").draw();
            complaintSum.columns(7).search("").draw();
            standartsinglesearch("marketSearching", 7, complaintSum);
            standartsinglesearch("factoryNameSearching", 1, complaintSum);
            //$('.selectpicker').selectpicker('refresh');
        }
    </script>
    
    <script>
        $("#marketSearchingForSurvey").change(function () {
            if ($(this).val() == "0") {
                $("#surveyChart").show();
                $("#surveyChartAbroad").hide();
                $("#surveyChartDomestic").hide();
            } else if ($(this).val() == "1") {
                $("#surveyChart").hide();
                $("#surveyChartAbroad").hide();
                $("#surveyChartDomestic").show();
            } else if ($(this).val() == "2") {
                $("#surveyChart").hide();
                $("#surveyChartAbroad").show();
                $("#surveyChartDomestic").hide();
            }
        });
    </script>
    
    <script>
        var ctx = document.getElementById("statusChart");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Tamamlandı',
                    'Müşteri Arandı',
                    '',
                    'Numune Sonucu Bekleniyor',
                    'Rapor Hazırlanıyor',
                    'İşlem Yapılmadı',
                    '',
                    'Yerinde inceleme bekleniyor',
                    'Fatura Bekleniyor',
                    'Rapor onayı bekliyor'
                ],
                datasets: [{
                    label: 'Status',
                    data: [
                        <?php
                        for ($i = 1;$i <= 10;$i++):
                        $query1 = $db->prepare("SELECT COUNT(status) FROM complaint WHERE productType is not NULL AND companyId=:companyId and createdDate > :year and status=" . $i);
                        $query1->execute([
                            'companyId' => session('company_id'),
                            'year'=>session('complaint_Year')
                        ]);
                        $query1r = $query1->fetch(PDO::FETCH_ASSOC);?>
                        <?php print_r($query1r['COUNT(status)']) ?>,
                        <?php endfor; ?>
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                width: 400,
                height: 400,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    
    <script>
        var ctx = document.getElementById("complaintTypeChart");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                    echo "'" . $complaintcategory['complaintCount'] . ' adet ' . $complaintcategory['complaintname'] . "', ";
                }
                    ?>
                ],
                datasets: [{
                    data: [
                        <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                        echo "'" . $complaintcategory['complaintSum'] . "', ";
                    }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                width: 400,
                height: 400,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    
    <script>
        var ctx = document.getElementById("billChart");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                    echo "'" . ($complaintcategory['complaintCount']) . ' adet ' . $complaintcategory['complaintname'] . "', ";
                }
                    ?>
                ],
                datasets: [{
                    data: [
                        <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                        echo "'" . ($complaintcategory['billSum']) . "', ";
                    }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                width: 400,
                height: 400,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
        var ctx = document.getElementById("billChartUsd");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                    echo "'" . $complaintcategory['complaintCount'] . ' adet ' . $complaintcategory['complaintname'] . "', ";
                }
                    ?>
                ],
                datasets: [{
                    data: [
                        <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                        echo "'" . ($complaintcategory['billSumUSD']) . "', ";
                    }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                width: 400,
                height: 400,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
        var ctx = document.getElementById("billChartEuro");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                    echo "'" . $complaintcategory['complaintCount'] . ' adet ' . $complaintcategory['complaintname'] . "', ";
                }
                    ?>
                ],
                datasets: [{
                    data: [
                        <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                        echo "'" . ($complaintcategory['billSumEuro']) . "', ";
                    }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                width: 400,
                height: 400,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    
    <script>
        var ctx = document.getElementById("complaintTypeChartByFactory");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                    echo "'" . $complaintcategory['complaintCount'] . ' adet ' . $complaintcategory['complaintname'] . "', ";
                }
                    ?>
                ],
                datasets: [{
                    data: [
                        <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                        echo "'" . $complaintcategory['complaintSum'] . "', ";
                    }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                width: 400,
                height: 400,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    <script>
        var ctx = document.getElementById("complaintTypeChartByFactory");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                    echo "'" . $complaintcategory['complaintCount'] . ' adet ' . $complaintcategory['complaintname'] . "', ";
                }
                    ?>
                ],
                datasets: [{
                    data: [
                        <?php foreach ($complaintcategoriesforchart as $complaintcategory) {
                        echo "'" . $complaintcategory['complaintSum'] . "', ";
                    }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                width: 400,
                height: 400,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    
    
    <script>
        var ctx = document.getElementById("bayiChart");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [<?php
                    $query1 = $db->prepare("SELECT sealer FROM complaint");
                    $query1->execute();?>
                    <?php while ($result = $query1->fetch(PDO::FETCH_ASSOC)):
                    echo "'" . $result['sealer'] . "'";
                    ?>,
                    <?php endwhile; ?>
                    <?php  ?>],
                datasets: [{
                    label: 'Unvan',
                    data: [
                        <?php
                        for ($i = 1;$i <= 6;$i++):
                        $query1 = $db->prepare("SELECT COUNT(sealer) FROM complaint");
                        $query1->execute();
                        $query1r = $query1->fetch(PDO::FETCH_ASSOC);?>
                        <?php print_r($query1r['COUNT(sealer)']) ?>,
                        <?php endfor; ?>
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    
    <script>
        var ctx = document.getElementById("urunChart");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
    
                    <?php foreach ($categorycounts as $categorycount) {
                    echo "'" . $categorycount['category'] . "', ";
                }
                    ?>
    
                ],
                datasets: [{
                    label: 'Unvan',
                    data: [
                        <?php foreach ($categorycounts as $categorycount) {
                        echo "'" . $categorycount['categoryCount'] . "', ";
                    }
                        ?>
    
                    ],
                    backgroundColor: [
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    
    
    <script>
    
        var ctx = document.getElementById("totalChart");
        var quantityChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Kabul Edilen Metraj Bilgisi',
                    'Red Edilen Metraj Bilgisi'
                ],
                datasets: [{
                    label: 'Total',
                    data: [
                        <?= $accepted . "," . $total - $accepted ?>
    
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                width: 400,
                height: 400,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    
        document.getElementById("factory").onchange = function () {
            $.post("<?= site_url('complaint') ?>", {
                factoryAuth: document.getElementById("factory").value,
            }, function (result) {
                const data = result.split(",");
                quantityChart.data.datasets.forEach((dataset) => {
                    dataset.data.pop();
                    dataset.data.pop();
                });
                quantityChart.data.datasets.forEach((dataset) => {
                    dataset.data.push(data[0]);
                    dataset.data.push(data[1]);
                });
                quantityChart.update();
            })
        }
    </script>
    
    <script>
        document.getElementById("market").onchange = function () {
            var x = document.getElementById("market").value
            $.post("<?= site_url('complaint') ?>", {
                factoryId: document.getElementById("factory").value,
                market: document.getElementById("market").value,
            }, function (result) {
                const data = result.split(",");
                quantityChart.data.datasets.forEach((dataset) => {
                    dataset.data.pop();
                    dataset.data.pop();
                });
                quantityChart.data.datasets.forEach((dataset) => {
                    dataset.data.push(data[0]);
                    dataset.data.push(data[1]);
                });
                quantityChart.update();
            })
        }
    </script>
    
    
    <script>
        var lastMonthComplaint = $('#thismonthcomplaint').DataTable({
            scrollY: '400px',
            scrollCollapse: true,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            paging: false,
            bLengthChange: false,
            drawCallback: function () {
                var api = this.api();
                $("#_lastmonthcomplaintcount").text(
                    api.column(3, {page: 'current'}).data().sum()
                );
                $("#_lastmonthcomplaintsum").text(
                    parseFloat(api.column(4, {page: 'current'}).data().sum()).toFixed(2)
                );
                $("#_lastmonthcomplaintaccepted").text(
                    parseFloat(api.column(5, {page: 'current'}).data().sum()).toFixed(2)
                );
                $("#_lastmonthcomplaintrejected").text(
                    parseFloat(api.column(6, {page: 'current'}).data().sum()).toFixed(2)
                );
            }
        });
    
    
    </script>
    
    <script>
        $('#tableSingleFactory').DataTable({
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            pageLength: 12,
            bLengthChange: false
        });
    </script>
    
    
    <script>
        var thisMonthComplaint = $('#monthcomplaint').DataTable({
            scrollY: '400px',
            scrollCollapse: true,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            paging: false,
            bLengthChange: false,
            drawCallback: function () {
                var api = this.api();
                $("#_thismonthcomplaintcount").text(
                    api.column(3, {page: 'current'}).data().sum()
                );
                $("#_thismonthcomplaintsum").text(
                    parseFloat(api.column(4, {page: 'current'}).data().sum()).toFixed(2)
                );
                $("#_thismonthcomplaintaccepted").text(
                    parseFloat(api.column(5, {page: 'current'}).data().sum()).toFixed(2)
                );
                $("#_thismonthcomplaintrejected").text(
                    parseFloat(api.column(6, {page: 'current'}).data().sum()).toFixed(2)
                );
            }
        });
    </script>
    
    <script>
        $( document ).ready(function() {
            standartsinglesearch('factoryNameSearchingThisMonth', 1, thisMonthComplaint);
            standartsinglesearch('factoryNameSearchingLastMonth', 1, lastMonthComplaint);
        });
    
    </script>
    
    
    <style>
        table.dataTable td {
            font-size: 1em;
        }
    </style>
    
    
    <script>
        var ctx = document.getElementById("surveyChart");
        var myChart = new Chart(ctx, {
            type: "bar",
    
            data: {
                labels: [
                    '5-10 Puan',
                    '10-15 Puan',
                    '15-20 Puan',
                    '20-25 Puan',
                    '25-30 Puan'
                ],
                datasets: [{
                    data: [5, 10, 15, 20, 25, 30
    
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1,
                    data: [
                        <?php
                        $surveyquery = array('companyId=' . session('company_id') . ' and sum_survey>=5 and sum_survey<=10', 'companyId=' . session('company_id') . ' and sum_survey>=11 and sum_survey<=15', 'companyId=' . session('company_id') . ' and sum_survey>=16 and sum_survey<=20', 'companyId=' . session('company_id') . ' and sum_survey>=21 and sum_survey<=25', 'companyId=' . session('company_id') . ' and sum_survey>=26 and     sum_survey<=30');
    
                        for ($i = 0;$i <= 4;$i++):
                        $query1 = $db->prepare("SELECT COUNT(sum_survey) as total FROM surveys where created_at> :year and " . $surveyquery[$i]);
                        $query1->execute([  'year'=>session('complaint_Year')]);
                        $query1r = $query1->fetch(PDO::FETCH_ASSOC);?>
                        <?php print_r($query1r['total']) ?>,
                        <?php endfor; ?>
                    ]
                }]
            },
            options: {
                responsive: true,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    
    <script>
        var ctx = document.getElementById("surveyChartAbroad");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    '5-10 Puan',
                    '10-15 Puan',
                    '15-20 Puan',
                    '20-25 Puan',
                    '25-30 Puan'
                ],
                datasets: [{
                    data: [5, 10, 15, 20, 25, 30
    
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1,
                    data: [
                        <?php
                        $surveyquery = array('sum_survey>=5 and sum_survey<=10 and market=2', 'sum_survey>=11 and sum_survey<=15 and market=2', 'sum_survey>=16 and sum_survey<=20 and market=2', 'sum_survey>=21 and sum_survey<=25 and market=2', 'sum_survey>=26 and sum_survey<=30 and market=2');
    
                        for ($i = 0;$i <= 4;$i++):
                        $query1 = $db->prepare("SELECT COUNT(sum_survey) as total FROM surveys inner join complaint on surveys.complaintID=complaint.id where created_at> :year and " . $surveyquery[$i]);
                        $query1->execute([  'year'=>session('complaint_Year')]);
                        $query1r = $query1->fetch(PDO::FETCH_ASSOC);?>
                        <?php print_r($query1r['total']) ?>,
                        <?php endfor; ?>
                    ]
                }]
            },
            options: {
                responsive: true,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    
    <script>
        var ctx = document.getElementById("surveyChartDomestic");
        var myChart = new Chart(ctx, {
            type: "bar",
    
            data: {
                labels: [
                    '5-10 Puan',
                    '10-15 Puan',
                    '15-20 Puan',
                    '20-25 Puan',
                    '25-30 Puan'
                ],
                datasets: [{
                    data: [5, 10, 15, 20, 25, 30
    
                    ],
                    backgroundColor: [
                        'rgba(107, 21, 182, 0.8)',
                        'rgba(255, 185, 35, 0.8)',
                        'rgba(255, 87, 86, 0.8)',
                        'rgba(114, 211, 220, 0.8)',
                        'rgba(123, 192, 67, 0.8)',
                        'rgba(77, 100, 141, 0.8)',
                        'rgba(170, 170, 170, 0.8)',
                        'rgba(223, 162, 144, 0.8)',
                        'rgba(255, 238, 173, 0.8)',
                        'rgba(133, 68, 66, 0.8)',
                        'rgba(249, 180, 45, 0.8)',
                        'rgba(253, 244, 152, 0.8)',
                    ],
                    borderWidth: 1,
                    data: [
                        <?php
                        $surveyquery = array('sum_survey>=5 and sum_survey<=10 and market=1', 'sum_survey>=11 and sum_survey<=15 and market=1', 'sum_survey>=16 and sum_survey<=20 and market=1', 'sum_survey>=21 and sum_survey<=25 and market=1', 'sum_survey>=26 and sum_survey<=30 and market=1');
    
                        for ($i = 0;$i <= 4;$i++):
                        $query1 = $db->prepare("SELECT COUNT(sum_survey) as total FROM surveys inner join complaint on surveys.complaintID=complaint.id where created_at> :year and " . $surveyquery[$i]);
                        $query1->execute([  'year'=>session('complaint_Year')]);
                        $query1r = $query1->fetch(PDO::FETCH_ASSOC);?>
                        <?php print_r($query1r['total']) ?>,
                        <?php endfor; ?>
                    ]
                }]
            },
            options: {
                responsive: true,
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
            }
        });
    </script>
    
    
    <script>
        // Seçim değişikliği olayını dinle
        document.getElementById('mySelect').addEventListener('change', function () {
            // Formu manuel olarak gönder
            document.getElementById('myForm').submit();
        });
    
        // Form submit olayını dinle (isteğe bağlı)
        document.getElementById('myForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var selectedOption = document.getElementById('mySelect').value;
            console.log('Selected Option:', selectedOption);
            // İstediğiniz işlemi burada gerçekleştirin
        });
    </script>