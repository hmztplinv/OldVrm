<?php require 'mainPage_statics/header.php'; ?>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">



    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Hesap</li>
        <li class="breadcrumb-item text-custom"><a href="../" class="text-decoration-none text-custom">Hesap Bilgilerim</a></li>
    </ol>


    <!-- Kullanıcı bilgileri -->
    <div class="row pt-2">

        <!-- Photo -->
        <div class="col-12 col-sm-2 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Fotoğraf</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">

                        <img class="img-fluid img-thumbnail" src="https://verimportal.com/public/avatars/empty.jpg" alt="Personel">
                    </p>
                </div>

            </div>
        </div>
        <!-- Photo -->

        <!-- Employee Info -->
        <div class="col-12 col-sm-10 mb-3">
            <form action="../../execution/" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Bilgilerim</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text"></p>
                        <div class="row">

                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Ad</strong></label>
                                <input class="form-control small" name="registry" value="<?= explode(' ',session('user_name'))[0]." ".explode(' ',session('user_name'))[1] ?>">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Soyad</strong></label>
                                <input class="form-control small" name="name" value="<?= explode(' ',session('user_name'))[2] ?>">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Bölüm</strong></label>
                                <input class="form-control small" name="surname" value="">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Ünvan</strong></label>
                                <input class="form-control small" name="surname" value="">
                            </div>

                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Doğum Tarihi</strong></label>
                                <input class="form-control small" name="dateOfMarriage" type="date" value="">
                            </div>
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
                    <h6 class="card-header-title text-light mt-1">Fazla Mesai Listesi</h6>
                </header>

                <div class="card-body">
                    <div class="col-12 col-sm-3 mb-3 pl-0">
                        <a href="<?= site_url('overtime') ?>"  class="btn btn-sm btn-custom mt-1">Yeni Ekle</a>
                    </div>
                    <table id="fazlamesai" class="display" style="width:100%">
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

                        <?php foreach ($overtimes as $overtime): ?>

                            <tr>
                                <td align="center"><?= $overtime['date'] ?></td>
                                <td align="center"><?= $overtime['starttime'] ?></td>
                                <td align="center"><?= $overtime['finishtime'] ?></td>
                                <td align="center"><?= $overtime['comment'] ?></td>
                                <td align="center"><?= user::get_user_name($overtime['officer_id'])['name'] ?></td>
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
                    <h6 class="card-header-title text-light mt-1">İzin Talepleri</h6>
                </header>

                <div class="card-body">
                    <div class="col-12 col-sm-3 mb-3 pl-0">
                        <button type="submit" name="updateEmployee" class="btn btn-sm btn-custom mt-1">Yeni Ekle</button>
                    </div>
                    <table id="izin" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom text-center">Başlangıç Tarihi</th>
                            <th class="text-custom text-center">Bitiş Tarihi</th>
                            <th class="text-custom text-center">İzin Türü</th>
                            <th class="text-custom text-center">İzin Süresi</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Durum</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($passive_personals as $passive_personal): ?>

                            <tr>
                                <td align="center">
                                    <form action="ozluk/" method="POST">
                                        <input type="hidden" id="registry" name="registry" value="<?php echo $passive_personal['registry'] ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </td>
                                <td align="center"><?php echo $passive_personal['registry'] ?></td>
                                <td><?php echo $passive_personal['name'] ?></td>
                                <td><?php echo $passive_personal['surname'] ?></td>
                                <td><?php echo $passive_personal['department'] ?></td>
                                <td><?php echo $passive_personal['positionTitle'] ?></td>
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
                    <h6 class="card-header-title text-light mt-1">Masraf Talepleri</h6>
                </header>
                <div class="card-body">
                    <div class="col-12 col-sm-3 mb-3 pl-0">
                        <a href="<?= site_url('cost') ?>"  class="btn btn-sm btn-custom mt-1">Yeni Ekle</a>
                    </div>
                    <table id="masraf" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Masraf Türü</th>
                            <th class="text-custom text-center">Masraf Tutarı</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Oluşturulma Tarihi</th>
                            <th class="text-custom text-center">Durumu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($costs as $cost): ?>
                            <tr>
                                <td align="center"><?= $cost['date'] ?></td>
                                <td align="center"><?= Parameters::get_cost_type($cost['cost_type']) ?></td>
                                <td align="center"><?= $cost['amount'] ?></td>
                                <td align="center"><?= user::get_user_name($cost['officer_id'])['name'] ?></td>
                                <td align="center"><?= $cost['description'] ?></td>
                                <td align="center"><?= $cost['created_at'] ?></td>
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
                    <h6 class="card-header-title text-light mt-1">Destek Kayıdı Talepleri</h6>
                </header>
                <div class="card-body">
                    <div class="col-12 col-sm-3 mb-3 pl-0">
                        <a href="<?= site_url('help_desk') ?>"  class="btn btn-sm btn-custom mt-1">Yeni Ekle</a>
                    </div>
                    <table id="helpdesk" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Tarih</th>
                            <th class="text-custom text-center">Masraf Türü</th>
                            <th class="text-custom text-center">Masraf Tutarı</th>
                            <th class="text-custom text-center">Onaycı</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Oluşturulma Tarihi</th>
                            <th class="text-custom text-center">Durumu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($costs as $cost): ?>
                            <tr>
                                <td align="center"><?= $cost['date'] ?></td>
                                <td align="center"><?= Parameters::get_cost_type($cost['cost_type']) ?></td>
                                <td align="center"><?= $cost['amount'] ?></td>
                                <td align="center"><?= user::get_user_name($cost['officer_id'])['name'] ?></td>
                                <td align="center"><?= $cost['description'] ?></td>
                                <td align="center"><?= $cost['created_at'] ?></td>
                                <td align="center"><?= Hr::get_status($cost['status'])['overtimeStatusName'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
<?php require 'mainPage_statics/footer.php'; ?>
    <script>
        $(document).ready(function() {
            $('#fazlamesai').DataTable( {
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
            $('#izin').DataTable( {
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
            $('#masraf').DataTable( {
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
            $('#helpdesk').DataTable( {
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