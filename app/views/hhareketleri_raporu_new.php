<?php require 'mainPage_statics/header.php'; ?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Banka Hesap Hareketleri Raporu</li>
    </ol>

    <div class="row">
        <div class="col-12 order-1 mb-4  col-md-12 col-lg-2 d-sm-block ">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 ml-4">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-custom">Temizle</button>
                                <button class="btn btn-sm btn-custom">Sorgula</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="form-label text-custom align-bottom mb-3"><strong>Raporlama Ayarları</strong></label>
                    </div>
                    <div class="row mt-3">
                        <label class="form-label text-custom"><strong>Başlangıç Tarihi</strong></label>
                        <div class="col-md-12 col-6">
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-md-12 col-6">
                            <input class="form-control small mt-1" name="" id="" type="time">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label class="form-label text-custom"><strong>Bitiş Tarihi</strong></label>
                        <div class="col-6 col-md-12">
                            <input class="form-control small" name="" id="" type="date">
                        </div>
                        <div class="col-6 col-md-12">
                            <input class="form-control small mt-1" name="" id="" type="time">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label class="form-label text-custom align-bottom mb-3"><strong>Firmalar</strong></label>
                        </div>
                        <div class="col-6">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-xs btn-custom"><small>Tümü</small></button>
                                <button type="button" class="btn btn-xs btn-custom"><small>Hiçbiri</small></button>
                            </div>
                        </div>
                        <select class="form-select" name="firmalar[]" id="firmalar" multiple="multiple">
                            <option value="">Ceratile</option>
                            <option value="">Demireks</option>
                            <option value="">Demireks Seramik</option>
                            <option value="">Evim</option>
                            <option value="">Fly Express</option>
                            <option value="">Gezinomi</option>
                            <option value="">Gezinomi Turizm</option>
                            <option value="">Hayal</option>
                            <option value="">Qua Concept</option>
                            <option value="">Qua Tradıng</option>
                            <option value="">Qua Yapı</option>
                        </select>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label class="form-label text-custom align-bottom mb-3"><strong>Banka</strong></label>
                        </div>
                        <div class="col-6">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-xs btn-custom"><small>Tümü</small></button>
                                <button type="button" class="btn btn-xs btn-custom"><small>Hiçbiri</small></button>
                            </div>
                        </div>
                        <select class="form-select" name="bankalar[]" id="bankalar" multiple="multiple">
                            <option value="">Akbank</option>
                            <option value="">Albaraka Türk</option>
                            <option value="">Alternatif Bank</option>
                            <option value="">Anadolu Bank</option>
                            <option value="">Denizbank</option>
                            <option value="">Fibabank</option>
                            <option value="">Finansbank</option>
                            <option value="">Garanti Bankası</option>
                            <option value="">Halk Bankası</option>
                            <option value="">İş Bankası</option>
                            <option value="">Kuveyt Türk</option>
                            <option value="">Şekerbank</option>
                            <option value="">Tanymsyz Banka</option>
                            <option value="">TEB Banka</option>
                            <option value="">Türkiye Finans</option>
                            <option value="">Vakıf Katılım</option>
                            <option value="">Vakıfbank</option>
                            <option value="">Yapı Kredi Bankası</option>
                            <option value="">Ziraat Bankası</option>
                            <option value="">Ziraat Katılım</option>
                        </select>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label class="form-label text-custom align-bottom mb-3 fw-bold">Hesap No</label>
                        </div>
                        <div class="col-6">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-xs btn-custom"><small>Tümü</small></button>
                                <button type="button" class="btn btn-xs btn-custom"><small>Hiçbiri</small></button>
                            </div>
                        </div>
                        <select class="form-select" name="hesapno[]" id="hesapno" multiple="multiple">
                            <option value="">...</option>
                            <option value="">...</option>
                            <option value="">...</option>
                            <option value="">...</option>
                            <option value="">...</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-12 order-2 col-lg-10">
            <div class="row">

                    <div class="panel panel-default">
                        <header class="card-header d-md-flex align-items-center bg-custom2">
                            <h6 class="card-header-title text-light mt-1">Hesap Hareketleri Raporu</h6>
                        </header>
                        <div class="panel-body">
                            <table class="table table-condensed table-responsive-sm" style="width: 100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Borç Tutar</th>
                                    <th>Alacak Tutar</th>
                                    <th>Fark Tutar (Net)</th>
                                    <th>Alacak Hareket Adedi</th>
                                    <th>Borç Hareket Adedi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                    <td class="fw-bold">
                                        <button class="btn btn-custom btn-xs">
                                            <i class="fa-regular fa-eye"></i>
                                        </button> DEMİREKS SERAMİK
                                    </td>
                                    <td>1.711.403,98<small>TRY</small></td>
                                    <td>2.804,118,95<small>TRY</small></td>
                                    <td>-1.092.714,90<small>TRY</small></td>
                                    <td>1</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td colspan="12" class="hiddenRow">
                                        <div class="accordian-body collapse" id="demo1">
                                            <table class="table">
                                                <tbody>
                                                <tr data-toggle="collapse" style="background-color: #bdc3c7"  class="accordion-toggle text-dark" data-target="#demo10">
                                                    <td style="width: 22%;">
                                                        <button class="btn btn-custom btn-xs">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </button>
                                                        <i class="fa-solid fa-arrow-trend-down"></i> Ziraat Bankası
                                                    </td>
                                                    <td>1.711.403,98<small>TRY</small></td>
                                                    <td>2.804,118,95<small>TRY</small></td>
                                                    <td>-1.092.714,90<small>TRY</small></td>
                                                    <td style="width: 18%;">1</td>
                                                    <td style="width: 17%;">2</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse" id="demo10">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td style="width: 22%;"><i class="fa-solid fa-arrow-trend-down"></i> 97341838-5001</td>
                                                                    <td>0,00<small>TRY</small></td>
                                                                    <td>1.719.937,73<small>TRY</small></td>
                                                                    <td>-1.719.937,73<small>TRY</small></td>
                                                                    <td style="width: 18%;">0</td>
                                                                    <td style="width: 17%;">1</td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 22%;"><i class="fa-solid fa-arrow-trend-down"></i> 97341838-5004</td>
                                                                    <td>1.711.403,98<small>TRY</small></td>
                                                                    <td>1.084.181,22<small>TRY</small></td>
                                                                    <td>627.222,77<small>TRY</small></td>
                                                                    <td style="width: 18%;">item 5</td>
                                                                    <td style="width: 17%;">Actions</td>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>



                                <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
                                    <td CLASS="fw-bold">
                                        <button class="btn btn-custom btn-xs">
                                            <i class="fa-regular fa-eye"></i>
                                        </button> EVİM
                                    </td>
                                    <td>1.250.015,13<small>TRY</small></td>
                                    <td>1.238.016,95<small>TRY</small></td>
                                    <td>11.998,18<small>TRY</small></td>
                                    <td>3</td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="hiddenRow">
                                        <div id="demo3" class="accordian-body collapse">
                                            <table class="table">
                                                <tbody>
                                                <tr data-toggle="collapse" style="background-color: #bdc3c7"  class="accordion-toggle text-dark" data-target="#demo11">
                                                    <td style="width: 22%;">
                                                        <button class="btn btn-custom btn-xs">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </button>
                                                        <i class="fa-solid fa-arrow-trend-down"></i>
                                                        Akbank
                                                    </td>
                                                    <td>1.711.403,98<small>TRY</small></td>
                                                    <td>2.804,118,95<small>TRY</small></td>
                                                    <td>-1.092.714,90<small>TRY</small></td>
                                                    <td style="width: 18%;">1</td>
                                                    <td style="width: 17%;">2</td>
                                                <tr>
                                                    <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse" id="demo11">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td style="width: 22%;"><i class="fa-solid fa-arrow-trend-down"></i> 97341838-5001</td>
                                                                    <td>0,00<small>TRY</small></td>
                                                                    <td>1.719.937,73<small>TRY</small></td>
                                                                    <td>-1.719.937,73<small>TRY</small></td>
                                                                    <td style="width: 18%;">0</td>
                                                                    <td style="width: 17%;">1</td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 22%;"> <i class="fa-solid fa-arrow-trend-down"></i>97341838-5004</td>
                                                                    <td>2</td>
                                                                    <td>3</td>
                                                                    <td>4</td>
                                                                    <td style="width: 18%;">iem 5</td>
                                                                    <td style="width: 17%;">Actions</td>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>

                                                </tr>
                                                <tr data-toggle="collapse" style="background-color: #bdc3c7"  class="accordion-toggle text-dark" data-target="#demo12">
                                                    <td style="width: 22%;">
                                                        <button class="btn btn-custom btn-xs">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </button>
                                                        <i class="fa-solid fa-arrow-trend-down"></i>
                                                        Finansbank
                                                    </td>
                                                    <td>1.711.403,98<small>TRY</small></td>
                                                    <td>2.804,118,95<small>TRY</small></td>
                                                    <td>-1.092.714,90<small>TRY</small></td>
                                                    <td style="width: 18%;">1</td>
                                                    <td style="width: 17%;">2</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse" id="demo12">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td style="width: 22%;"> <i class="fa-solid fa-arrow-trend-down"></i>97341838-5001</td>
                                                                    <td>0,00<small>TRY</small></td>
                                                                    <td>1.719.937,73<small>TRY</small></td>
                                                                    <td>-1.719.937,73<small>TRY</small></td>
                                                                    <td style="width: 18%;">0</td>
                                                                    <td style="width: 17%;">1</td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 22%;"><i class="fa-solid fa-arrow-trend-down"></i> 97341838-5004</td>
                                                                    <td>item 2</td>
                                                                    <td>item 3 </td>
                                                                    <td>item 4</td>
                                                                    <td style="width: 18%;">item 5</td>
                                                                    <td style="width: 17%;">Actions</td>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr data-toggle="collapse" style="background-color: #bdc3c7"  class="accordion-toggle text-dark" data-target="#demo13">
                                                    <td style="width: 22%;">
                                                        <button class="btn btn-custom btn-xs">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </button>
                                                        <i class="fa-solid fa-arrow-trend-down"></i>
                                                        Halkbank
                                                    </td>
                                                    <td>1.711.403,98<small>TRY</small></td>
                                                    <td>2.804,118,95<small>TRY</small></td>
                                                    <td>-1.092.714,90<small>TRY</small></td>
                                                    <td style="width: 18%;">1</td>
                                                    <td style="width: 17%;">2</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse" id="demo13">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td style="width: 22%;"><i class="fa-solid fa-arrow-trend-down"></i> 97341838-5001</td>
                                                                    <td>0,00<small>TRY</small></td>
                                                                    <td>1.719.937,73<small>TRY</small></td>
                                                                    <td>-1.719.937,73<small>TRY</small></td>
                                                                    <td style="width: 18%;">0</td>
                                                                    <td style="width: 17%;">1</td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 22%;"><i class="fa-solid fa-arrow-trend-down"></i> 97341838-5004</td>
                                                                    <td>324242 2</td>
                                                                    <td>32424 3 </td>
                                                                    <td>i3242tem 4</td>
                                                                    <td style="width: 18%;">it324em 5</td>
                                                                    <td style="width: 17%;">Actions</td>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr data-toggle="collapse" style="background-color: #bdc3c7"  class="accordion-toggle text-dark" data-target="#demo14">
                                                    <td style="width: 22%;">
                                                        <button class="btn btn-custom btn-xs">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </button>
                                                        <i class="fa-solid fa-arrow-trend-down"></i>
                                                        İş Bankası
                                                    </td>
                                                    <td>1.711.403,98<small>TRY</small></td>
                                                    <td>2.804,118,95<small>TRY</small></td>
                                                    <td>-1.092.714,90<small>TRY</small></td>
                                                    <td style="width: 18%;">1</td>
                                                    <td style="width: 17%;">2</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse" id="demo14">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td style="width: 22%;">
                                                                        <i class="fa-solid fa-arrow-trend-down"></i> 97341838-5001
                                                                    </td>
                                                                    <td>0,00<small>TRY</small></td>
                                                                    <td>1.719.937,73<small>TRY</small></td>
                                                                    <td>-1.719.937,73<small>TRY</small></td>
                                                                    <td style="width: 18%;">0</td>
                                                                    <td style="width: 17%;">1</td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="width: 22%;"><i class="fa-solid fa-arrow-trend-down"></i> 97341838-5004</td>
                                                                    <td>324242 2</td>
                                                                    <td>32424 3 </td>
                                                                    <td>i3242tem 4</td>
                                                                    <td style="width: 18%;">it324em 5</td>
                                                                    <td style="width: 17%;">Actions</td>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#firmalar').multiselect({
            maxHeight: 200,
            scrollY:true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#bankalar').multiselect({
            maxHeight: 200,
            scrollY:true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#hesapno').multiselect({
                maxHeight: 200,
                scrollY:true
            }
        );
    });
</script>
<script>
    $(document).ready(function() {
        $('#hesaphareket').DataTable( {
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            pageLength : 5,
            bLengthChange : false
        });
    })
</script>
<style>
    table.dataTable td {
        font-size: 11px;
    }
</style>
<?php require 'mainPage_statics/footer.php'; ?>






