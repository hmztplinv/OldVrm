<?php require 'mainPage_statics/header.php'; ?>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Admin Panel</li>
        <li class="breadcrumb-item text-custom">
            <a href="registration.html" class="text-decoration-none text-custom">Üye Kayıt</a>
        </li>
    </ol>

    <div class="row">
        <div class="col-12 col-sm-6 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Üye Kayıt</h6>
                </header>




                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label text-custom mb-0"><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label text-custom mb-0"><strong>Company</strong></label>
                            <select class="form-control" name="company" id="company">
                                <option value="1">...</option>
                                <option value="0">...</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label text-custom"><strong>Şifre</strong></label>
                            <input type="password" class="form-control" id="password" placeholder="Şifre">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label text-custom"><strong>Ad</strong></label>
                            <input class="form-control" type="text" name="productiondate" placeholder="Ad">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label text-custom"><strong>Soyad</strong></label>
                            <input class="form-control" type="text" name="productiondate" placeholder="Soyad">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label text-custom"><strong>Telefon Numarası</strong></label>
                            <input class="form-control" type="text" name="productcalibre" autocomplete="off" data-mask="(999) 999-9999" maxlength="14">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div style="margin-bottom: 15px;padding: 0" class="col-md-6">
                                <label class="form-label text-custom"><strong>Status</strong></label>
                                <input id="status" type="checkbox">

                                <label class="form-label text-custom ml-5"><strong>Admin</strong></label>
                                <input id="admin" type="checkbox">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <button type="submit" name="save" id="save" class="btn btn-sm btn-custom">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Yetkilendirme</h6>
                </header>

                <div class="card-body" style="align-items: center;">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label text-custom"><strong>Hesap</strong></label>
                            <input id="account" name="account" type="checkbox">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-custom"><strong>Şikayet</strong></label>
                            <input id="complaint" type="checkbox" name="complaint">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="form-label text-custom ml-2"><strong>Bakiye</strong></label>
                            <input id="balance" name="balance" type="checkbox">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-custom ml-2"><strong>Şikayet Yetkilendirme</strong></label>
                            <input id="complaintauthorization" name="complaintauthorization" type="checkbox">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="form-label text-custom ml-2"><strong>Hareket</strong></label>
                            <input id="movement" name="movement" type="checkbox">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="form-label text-custom ml-2"><strong>Ödeme</strong></label>
                            <input id="pay" name="pay" type="checkbox">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="form-label text-custom ml-2"><strong>POS</strong></label>
                            <input id="POS" name="POS" type="checkbox">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="form-label text-custom ml-2"><strong>DBS</strong></label>
                            <input id="DBS" name="DBS" type="checkbox">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="form-label text-custom"><strong>Kredi</strong></label>
                            <input id="credit" name="credit" type="checkbox">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div  class="row pt-2 animate__animated animate__fadeIn" id="welcomeDiv"  style="" class="answer_list">

        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Üyeler</h6>
                </header>

                <div class="card-body">
                    <table id="registration" class="display nowrap" style="width:100% ">
                        <thead style="font-size: 10px">
                        <tr>
                            <th class="text-custom" width="4%"></th>
                            <th class="text-custom text-center">Email</th>
                            <th class="text-custom text-center" width="2%">Company</th>
                            <th class="text-custom text-center">Şifre</th>
                            <th class="text-custom text-center">Ad</th>
                            <th class="text-custom text-center">Soyad</th>
                            <th class="text-custom text-center">Telefon Numarası</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 9px;font-weight: bold" id="changing">
                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
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
    var complaintTable = $('#registration').DataTable( {
        stateSave: true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'copy', 'print'
        ],
        responsive: {
            details: false
        },
        pageLength : 20,

    });

    $(document).ready(function () {
        reset();
    });


</script>
