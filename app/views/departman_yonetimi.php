<?php require 'mainPage_statics/header.php'; ?>
<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
        <ol class="breadcrumb small pt-5">
            <li class="breadcrumb-item text-custom">İnsan Kaynakları</li>
            <li class="breadcrumb-item text-custom"><a href="../" class="text-decoration-none text-custom">Departman Yönetimi</a></li>
        </ol>
        <!-- Row 1 -->
        <div class="row pt-2">
            <!-- Employee Info -->
            <div class="col-12 col-sm-12 mb-3">
                <form action="<?= site_url('departman_yonetimi')?>" method="POST">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Departman Ekle</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">
                        <div class="row">

                            <div class="col-12 col-sm-2 p-2">
                                <label class="form-label text-custom"><strong>Departman Adı</strong></label>
                                <input class="form-control small" required name="departmentName">
                            </div>

                        </div>
                        <div class="d-grid gap-2 d-md-flex float-end">
                            <button type="submit" name="add_department" value="1" class="btn btn-sm btn-custom mt-1">Oluştur</button>
                        </div>
                    </div>


                </div>
                </form>
            </div>
            <!-- Employee Info -->

        </div>
        <!-- Row 1 -->
    <!-- Row 2 -->
    <div class="row pt-2">
        <!-- Employee Info -->
        <div class="col-12 col-sm-12 mb-3">
            <form action="<?= site_url('departman_yonetimi')?>" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Unvan Ekle</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">
                        <div class="row">

                            <!--<div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Departman Adı</strong></label>
                                <select id="department" class="form-select small" required name="role_department">
                                    <option value="1">Departman Seçiniz</option>
                                    <?foreach ($depertman as $item):?>
                                        <option value="<?=$item['department']?>"><?=$item['department']?></option>
                                    <?endforeach;?>
                                </select>
                            </div>-->
                            <div class="col-12 col-sm-6 p-2">
                                <label class="form-label text-custom"><strong>Unvan</strong></label>
                                <input class="form-control small" required name="roleName">
                            </div>

                        </div>
                        <div class="d-grid gap-2 d-md-flex float-end">
                            <button type="submit" name="add_role" value="1" class="btn btn-sm btn-custom mt-1">Oluştur</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <!-- Row 2 -->
    <!--<div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Onay Bekleyen Departman Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="waitingdepartmentlist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center" width="5%">İşlem</th>
                            <th class="text-custom text-center">Departman Adı</th>
                            <th class="text-custom text-center">Oluşturan Kişi</th>
                            <th class="text-custom text-center">Oluşturma Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td align="center">
                                    <a onclick=" " style="cursor: pointer"><i class="text-success fa-solid fa-check-circle"></i></a>
                                    <a onclick=" " style="cursor: pointer"><i class="text-danger fa-solid fa-xmark-circle"></i></a>
                                </td>
                                <td align="center"> </td>
                                <td align="center"> </td>
                                <td align="center"> </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
        <!-- Row 2 -->
    <!-- Row 3 -->
    <!--<div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Onay Bekleyen Rol Listesi</h6>
                </header>
                <div class="card-body">
                    <table id="waitingrolelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center" width="5%">İşlem</th>
                            <th class="text-custom text-center">Departman Adı</th>
                            <th class="text-custom text-center">Role Adı</th>
                        </tr>
                        </thead>
                        <tbody>


                                <tr>
                                    <tr>
                                <td align="center">
                                    <form action="'.site_url("hrEmployee/department_approval").'" method="POST">
                                        <input type="hidden" id="registry" name="approval_role_id" value="'. Encrpyt::inProgressEncode($roles["id"]) .'">
                                        <button type="submit" class="btn btn-sm btn-outline-custom" formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </td>
                                    <td align="center"> </td>
                                    <td align="center"> </td>
                                </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>-->
    <!-- Row 3 -->
        <!--<div class="row pt-2">

            <div class="col-12 col-sm-12 mb-3">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Aktif Departmanlar</h6>
                    </header>

                    <div class="card-body">
                        <table id="activedepartmentlist" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom text-center" width="5%">İşlem</th>
                                <th class="text-custom text-center">Departman Adı</th>
                                <th class="text-custom text-center">Oluşturan Kişi</th>
                                <th class="text-custom text-center">Oluşturulma Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>


                                    <tr>
                                        <tr>
                                <td align="center">
                                    <form action="'.site_url("hrEmployee/department_settings").'" method="POST">
                                        <input type="hidden" id="registry" name="department_id" value=" ">
                                        <button type="submit" class="btn btn-sm btn-outline-custom" formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </td>
                                        <td align="center"> </td>
                                        <td align="center"> </td>
                                        <td align="center"> </td>
                                    </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>
        <!-- Row 3 -->
    <!-- Row 4 -->
    <!--<div class="row pt-2">

        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Aktif Roller</h6>
                </header>

                <div class="card-body">
                    <table id="activerolelist" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center" width="5%">İşlem</th>
                            <th class="text-custom text-center">Departman Adı</th>
                            <th class="text-custom text-center">Role Adı</th>
                            <th class="text-custom text-center">Oluşturan Kişi</th>
                            <th class="text-custom text-center">Oluşturulma Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>


                            <tr>
                                 <tr>
                                <td align="center">
                                    <form  >
                                        <input type="hidden" id="registry" name="approval_role_id" value="'. Encrpyt::inProgressEncode($role["id"]) .'">
                                        <button type="submit" class="btn btn-sm btn-outline-custom" formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </td>
                                <td align="center"> </td>
                                <td align="center"> </td>
                                <td align="center"> </td>
                                <td align="center"> </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
    <!-- Row 4 -->
</div>
<!-- Container -->

<?php require 'mainPage_statics/footer.php'; ?>

<script type="text/javascript">
    window.onload = () => {
        $('#onload').modal('show');
    }
</script>
<script>
    function response(result){

        if (result['suc']){
            swal("Başarılı",result['suc'],"success").then(function () {
                window.location.reload(false);
            });
        }else{
            swal("Başarısız",result['err'],"error").then(function () {
            });
        }
    }
</script>
<script>
    function approval(id,approval){
        $.post("<?= site_url('hrEmployee/department_manager') ?>",{
            id: id,
            approval: approval
        },function (result) {
            response(JSON.parse(result))
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('#waitingdepartmentlist').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            },
            pageLength: 10,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#waitingrolelist').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            },
            pageLength: 10,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#activedepartmentlist').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            },
            pageLength: 10,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#activerolelist').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            },
            pageLength: 10,
        });
    });
</script>
</body>
</html>
