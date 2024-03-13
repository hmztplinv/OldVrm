<?php require 'mainPage_statics/header.php'; ?>
    <div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Profil</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Satın Alma Geçmişi</a></li>
    </ol>

    <div class="row pt-2">
        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Satın Alınan Geçmiş Biletlerim</h6>
                </header>
                <div class="card-body">
                    <table id="waitingcostlist" class="display" style="width:100%">
                        <thead>
                        <tr>

                            <th class="text-custom text-center"></th>
                            <th class="text-custom text-center"></th>
                            <th class="text-custom text-center">Kalkış Tarihi</th>
                            <th class="text-custom text-center">Varış Tarihi</th>
                            <th class="text-custom text-center">Tutar</th>
                            <th class="text-custom text-center">Para Birimi</th>
                            <th class="text-custom text-center">Banka</th>
                            <th class="text-custom text-center">Durumu</th>
                            <th class="text-custom text-center">Yazdır</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td align="center">Sa</td>
                                <td align="center">Sa</td>
                                <td align="center">Sa</td>
                                <td align="center">Sa</td>
                                <td align="center">Sa</td>
                                <td align="center">Sa</td>
                                <td align="center">Sa</td>
                                <td align="center">Sa</td>
                                <td align="center">Sa</td>

                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
<?php require 'mainPage_statics/footer.php'; ?>
        <script>
            $(document).ready(function() {
                $('#waitingcostlist').DataTable( {
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
