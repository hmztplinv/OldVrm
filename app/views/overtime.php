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
        <form action="<?= site_url('overtime') ?>" method="POST">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Fazla Mesai</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <div class="row">

                        <div class="col-12 col-sm-2 p-2">
                            <label class="form-label text-custom"><strong>Fazla Mesai Tarihi</strong></label>
                            <input class="form-control small" name="overtimedate" type="date">
                        </div>
                        <div class="col-12 col-sm-2 p-2">
                            <label class="form-label text-custom"><strong>Fazla Mesai Başlangıç Zamanı</strong></label>
                            <input class="form-control small" name="overtimestart" min="03:00" type="time">
                        </div>
                        <div class="col-12 col-sm-2 p-2">
                            <label class="form-label text-custom"><strong>Fazla Mesai Çıkış Zamanı</strong></label>
                            <input class="form-control small" name="overtime" min="03:00" type="time">
                        </div>
                        <div class="col-12 col-sm-6 p-2">
                            <label class="form-label text-custom"><strong>Onay Sorumlusu</strong></label>
                            <select class="form-select" name="approvalofficer">
                                <?php foreach ($officer as $office): ?>
                                    <?php if ($office['userid'] != session('user_id')): ?>
                                    <option value="<?= $office['userid'] ?>"><?= $office['name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 p-2">
                            <label class="form-label text-custom"><strong>Fazla Mesai Açıklaması</strong></label>
                            <textarea name="description" class="form-control small" id="" cols="30" rows="5"><?php echo $personal['birthDate']?></textarea>
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
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Başlangıç Saati</th>
                            <th class="text-custom text-center">Bitiş Saati</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Durum</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($acceptedOvertimes as $overtime): ?>
                            <tr>
                                <td align="center"><?= $overtime['date'] ?></td>
                                <td align="center"><?= $overtime['starttime'] ?></td>
                                <td align="center"><?= $overtime['finishtime'] ?></td>
                                <td align="center"><?= $overtime['status'] == 1 ? user::get_user_name($overtime['officer_id'])['name'] : '-' ?></td>
                                <td align="center"><?= $overtime['comment'] ?></td>
                                <td align="center"><?= Hr::get_status($overtime['status'])['overtimeStatusName'] ?></td>
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
                            <th class="text-custom text-center" width="5%">Sil</th>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Başlangıç Saati</th>
                            <th class="text-custom text-center">Bitiş Saati</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Durum</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($waitingOvertimes as $overtime): ?>
                            <tr>
                                <td align="center">
                                    <a onclick="rejection(<?= $overtime['id'] ?>)" style="cursor: pointer"><i class="text-danger fa-solid fa-xmark-circle"></i></a>
                                </td>
                                <td align="center"><?= $overtime['date'] ?></td>
                                <td align="center"><?= $overtime['starttime'] ?></td>
                                <td align="center"><?= $overtime['finishtime'] ?></td>
                                <td align="center"><?= $overtime['status'] == 1 ? user::get_user_name($overtime['officer_id'])['name'] : '-' ?></td>
                                <td align="center"><?= $overtime['comment'] ?></td>
                                <td align="center"><?= Hr::get_status($overtime['status'])['overtimeStatusName'] ?></td>
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
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Başlangıç Saati</th>
                            <th class="text-custom text-center">Bitiş Saati</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Durum</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rejectedOvertimes as $overtime): ?>
                            <tr>
                                <td align="center"><?= $overtime['date'] ?></td>
                                <td align="center"><?= $overtime['starttime'] ?></td>
                                <td align="center"><?= $overtime['finishtime'] ?></td>
                                <td align="center"><?= $overtime['status'] == 1 ? user::get_user_name($overtime['officer_id'])['name'] : '-' ?></td>
                                <td align="center"><?= $overtime['comment'] ?></td>
                                <td align="center"><?= Hr::get_status($overtime['status'])['overtimeStatusName'] ?></td>
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
<script>
    $(document).ready(function() {
        $('#acceptedovertimelist').DataTable( {
            order:false,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#rejectedovertimelist').DataTable( {
            order:false,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#waitingovertimelist').DataTable( {
            order:false,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            }
        });
    });
</script>
<script>

    <?php if (@$response['suc']): ?>
    swal("Başarılı","<?= $response['suc'] ?>","success").then(function () {
        window.location.href = "/overtime";
    });
    <?php endif; ?>
    <?php if (@$response['err']): ?>
    swal("Başarısız","<?= $response['err'] ?>","error").then(function () {
    });
    <?php endif; ?>
</script>
<script>
    function response(result){
        if (result['suc']){
            swal("Başarılı",result['suc'],"success").then(function () {
                window.location.href = "/overtime";
            });
        }else{
            swal("Başarısız",result['err'],"error").then(function () {
            });
        }
    }
</script>
<script>

    function rejection(id){
        $.post("<?= site_url('overtime') ?>",{
           id:id
        },function (result) {
            response(JSON.parse(result))
        });
    }

</script>