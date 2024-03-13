<?php require 'mainPage_statics/header.php'; ?>


    <div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
        <ol class="breadcrumb small pt-5">
            <li class="breadcrumb-item text-custom">Test</li>
            <li class="breadcrumb-item text-custom">
                <a href="#" class="text-decoration-none text-custom">Test Yönetimi</a>
            </li>
        </ol>

        <div class="row animate__animated animate__fadeIn">
            <div class="col-12 col-md-12 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Test Yönetimi</h6>
                    </header>
                    <div class="card-body">
                        <table id="testmanagement" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Test İsmi</th>
                                <th>a</th>
                                <th>b</th>
                                <th>c</th>
                                <th>d</th>
                                <th>e</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Test 1</td>
                                <td>sdfs</td>
                                <td>sdsdf</td>
                                <td>asda</td>
                                <td>asda</td>
                                <td>asda</td>
                                <td><button class="btn btn-sm btn-custom">Yetkilendir</button></td>
                            </tr>
                            <tr>
                                <td>Test 2</td>
                                <td>asda</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>sadad</td>
                                <td><button class="btn btn-sm btn-custom">Yetkilendir</button></td>
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
    $(document).ready(function() {
        $('#testmanagement').DataTable( {
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            pageLength : 5,
            bLengthChange : false
        });

        $('#testmanagement tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected');
        });
    })
</script>
