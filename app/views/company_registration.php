<?php require 'mainPage_statics/header.php'; ?>

<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Admin Panel</li>
        <li class="breadcrumb-item text-custom">
            <a href="#" class="text-decoration-none text-custom">Firma Kayıt</a>
        </li>
    </ol>

    <div class="row">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">

                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Firma Kayıt</h6>
                </header>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label text-custom mb-0"><strong>Tenant İd</strong></label>
                            <input type="text" name="tenant" class="form-control" id="tenant" value="" placeholder="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label text-custom mb-0"><strong>Vkn</strong></label>
                            <input type="text" name="Vkn" class="form-control" id="Vkn" value="" placeholder="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label text-custom mb-0"><strong>Firma Adı</strong></label>
                            <input type="company" class="form-control" id="company" value="" placeholder="Şifre">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <button type="submit" value="" name="save" id="save" class="btn btn-sm btn-custom">Kaydet</button>
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
                    <table id="companyregistration" class="display nowrap" style="width:100% ">
                        <thead style="font-size: 10px">
                        <tr>
                            <th class="text-custom" width="4%"></th>
                            <th class="text-custom text-center">Tenant İd</th>
                            <th class="text-custom text-center" width="2%">Vkn</th>
                            <th class="text-custom text-center">Firma Adı</th>
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
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
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
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
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
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
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
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
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
                        </tr>

                        <tr>
                            <td align="center">
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="btn btn-sm btn-outline-custom" href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td align="center"></td>
                            <td align="center" width="2%"></td>
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
    var complaintTable = $('#companyregistration').DataTable( {
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
