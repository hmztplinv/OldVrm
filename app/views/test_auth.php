<?php require 'mainPage_statics/header.php'; ?>

<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
        <ol class="breadcrumb small pt-5">
            <li class="breadcrumb-item text-custom">Test</li>
            <li class="breadcrumb-item text-custom">
                <a href="#" class="text-decoration-none text-custom">Test Yetkilendirme</a>
            </li>
        </ol>

    <div class="row animate__animated animate__fadeIn">
        <div class="col-12 col-md-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Test Yetkilendirme</h6>
                </header>
                <div class="card-body">
                    <table id="test" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Hata Mesajı</th>
                                <th>Departman</th>
                                <th>Ünvan</th>
                                <th>Aktif Test Sayısı</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Merve</td>
                                <td>Önalan</td>
                                <td>sdsdf</td>
                                <td>asda</td>
                                <td>asda</td>
                                <td>asda</td>
                            </tr>
                            <tr>
                                <td>sada</td>
                                <td>asda</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>sadad</td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="btn btn-sm btn-custom mt-2">Yetkilendir</button>
                </div>
            </div>
        </div>

    </div>
</div>







<?php require 'mainPage_statics/footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#test').DataTable( {
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            pageLength : 5,
            bLengthChange : false
        });

        $('#test tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected');
        });
    })
</script>