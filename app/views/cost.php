<?php require 'mainPage_statics/header.php'; ?>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Profil</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Masraf</a></li>
    </ol>

    <div class="row pt-2">

        <!-- Photo -->

        <!-- Employee Info -->
        <div class="col-12 col-sm-12 mb-3">
            <form action="<?= site_url('cost') ?>" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Masraf</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">
                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Masraf Tarihi</strong></label>
                                <input class="form-control small" name="costDate" type="date">
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Masraf Türü</strong></label>
                                <select required class="form-select" name="costType" id="">
                                    <option value="">Seçiniz</option>
                                    <?php foreach ($costTypes as $costType): ?>
                                        <option value="<?= $costType['costTypeId'] ?>"><?= $costType['costTypeName'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Masraf Tutarı</strong></label>
                                <input class="form-control small" name="cost" type="number">
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
                                <label class="form-label text-custom"><strong>Masraf Açıklaması</strong></label>
                                <textarea class="form-control" name="costDescription" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" name="createcost" value="1" class="btn btn-sm btn-custom mt-1">Onaya Gönder</button>
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
                    <h6 class="card-header-title text-light mt-1">Onaylanan Masraf Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="acceptedcostlist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Masraf Türü</th>
                            <th class="text-custom text-center">Masraf Tutarı</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Oluşturulma Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($acceptedCosts as $cost): ?>
                            <tr>
                                <td align="center"><?= $cost['date'] ?></td>
                                <td align="center"><?= Parameters::get_cost_type($cost['costType']) ?></td>
                                <td align="center"><?= $cost['amount'] ?></td>
                                <td align="center"><?= user::get_user_name($cost['officer_id'])['name'] ?></td>
                                <td align="center"><?= $cost['description'] ?></td>
                                <td align="center"><?= Hr::get_status($cost['status'])['overtimeStatusName'] ?></td>
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
                    <table id="waitingcostlist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Masraf Türü</th>
                            <th class="text-custom text-center">Masraf Tutarı</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Oluşturulma Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($waitingCosts as $cost): ?>
                            <tr>
                                <td align="center"><?= $cost['date'] ?></td>
                                <td align="center"><?= Parameters::get_cost_type($cost['cost_type']) ?></td>
                                <td align="center"><?= $cost['amount'] ?></td>
                                <td align="center"><?= user::get_user_name($cost['officer_id'])['name'] ?></td>
                                <td align="center"><?= $cost['description'] ?></td>
                                <td align="center"><?= $cost['created_at'] ?></td>
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
                    <table id="rejectedcostlist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Masraf Türü</th>
                            <th class="text-custom text-center">Masraf Tutarı</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Oluşturulma Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($rejectedCosts as $cost): ?>
                            <tr>
                                <td align="center"><?= $cost['date'] ?></td>
                                <td align="center"><?= Parameters::get_cost_type($cost['cost_type']) ?></td>
                                <td align="center"><?= $cost['amount'] ?></td>
                                <td align="center"><?= user::get_user_name($cost['officer_id'])['name'] ?></td>
                                <td align="center"><?= $cost['description'] ?></td>
                                <td align="center"><?= $cost['created_at'] ?></td>
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
        $('#acceptedcostlist').DataTable( {
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
        $('#rejectedcostlist').DataTable( {
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
        $('#waitingcostlist').DataTable( {
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
        window.location.href = "/cost";
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
                window.location.href = "/cost";
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