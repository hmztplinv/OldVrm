<?php require 'mainPage_statics/header.php'; ?>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Profil</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Fazla Mesai</a></li>
    </ol>

    <div class="row pt-2">

        <!-- Photo -->

        <!-- Employee Info -->
        <div class="col-12 col-sm-12 mb-3">
            <form action="<?= site_url('hrEmployee/overtime') ?>" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Fazla Mesai</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">
                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Fazla Mesai Başlangıç Tarihi</strong></label>
                                <input required class="form-control small" name="overtimestartdate" type="date">
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Fazla Mesai Bitiş Tarihi</strong></label>
                                <input required class="form-control small" name="overtimeenddate" type="date">
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Fazla Mesai Başlangıç Zamanı</strong></label>
                                <input required class="form-control small" name="overtimestart" min="03:00" type="time">
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Fazla Mesai Çıkış Zamanı</strong></label>
                                <input required  class="form-control small" name="overtimeend" min="03:00" type="time">
                            </div>
                            <div class="col-12 col-sm-4 p-2">
                                <label class="form-label text-custom"><strong>Onay Sorumlusu</strong></label>
                                <select  class="form-select" name="approvalofficer">
                                    <?php foreach ($officers as $officer): ?>
                                        <?php if ($officer['userId'] != Encrpyt::inProgressDecode(session('user_id'))): ?>
                                            <option value="<?= Encrpyt::inProgressEncode($officer['userId']) ?>"><?= $officer['name']." ".$officer['surname'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 p-2">
                                <label class="form-label text-custom"><strong>Fazla Mesai Açıklaması</strong></label>
                                <textarea required name="description" class="form-control small" id="" cols="30" rows="5"></textarea>
                            </div>

                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="createovertime" value="1" class="btn btn-sm btn-custom mt-1">Onaya Gönder</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- Employee Info -->
    </div>
    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Onaylanan Fazla Mesai Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="acceptedovertimelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Başlangıç Tarihi</th>
                            <th class="text-custom text-center">Bitiş Tarihi</th>
                            <th class="text-custom text-center">Başlangıç Saati</th>
                            <th class="text-custom text-center">Bitiş Saati</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Durum</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($approved_overtimes as $overtime): ?>
                            <tr>
                                <td align="center"><?= $overtime['startdate'] ?></td>
                                <td align="center"><?= $overtime['enddate'] ?></td>
                                <td align="center"><?= $overtime['starttime'] ?></td>
                                <td align="center"><?= $overtime['finishtime'] ?></td>
                                <td align="center"><?= User::get_user_name($overtime['officer_id'])['name'] ?></td>
                                <td align="center"><?= $overtime['comment'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('overtimeStatusCode','overtimeStatusName',1)['overtimeStatusName'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Onay Bekleyen Fazla Mesai Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="waitingovertimelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Başlangıç Tarihi</th>
                            <th class="text-custom text-center">Bitiş Tarihi</th>
                            <th class="text-custom text-center">Başlangıç Saati</th>
                            <th class="text-custom text-center">Bitiş Saati</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Durum</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($waiting_overtimes as $overtime): ?>
                            <tr>
                                <td align="center"><?= $overtime['startdate'] ?></td>
                                <td align="center"><?= $overtime['enddate'] ?></td>
                                <td align="center"><?= $overtime['starttime'] ?></td>
                                <td align="center"><?= $overtime['finishtime'] ?></td>
                                <td align="center"><?= User::get_user_name($overtime['officer_id'])['name'] ?></td>
                                <td align="center"><?= $overtime['comment'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('overtimeStatusCode','overtimeStatusName',3)['overtimeStatusName'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Reddedilen Fazla Mesai Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="rejectedovertimelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Başlangıç Tarihi</th>
                            <th class="text-custom text-center">Bitiş Tarihi</th>
                            <th class="text-custom text-center">Başlangıç Saati</th>
                            <th class="text-custom text-center">Bitiş Saati</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Durum</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rejected_overtimes as $overtime): ?>
                            <tr>
                                <td align="center"><?= $overtime['startdate'] ?></td>
                                <td align="center"><?= $overtime['enddate'] ?></td>
                                <td align="center"><?= $overtime['starttime'] ?></td>
                                <td align="center"><?= $overtime['finishtime'] ?></td>
                                <td align="center"><?= User::get_user_name($overtime['officer_id'])['name'] ?></td>
                                <td align="center"><?= $overtime['comment'] ?></td>
                                <td align="center"><?= Parameters::specific_parameter('overtimeStatusCode','overtimeStatusName',2)['overtimeStatusName'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

</div>

<?php require 'mainPage_statics/footer.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/rg-1.0.0/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/rg-1.0.0/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            scrollX: '200px',
            scrollCollapse: true,
            paging: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
