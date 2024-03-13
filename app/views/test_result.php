<?php require 'mainPage_statics/header.php'; ?>
    <div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

        <ol class="breadcrumb small pt-5">
            <li class="breadcrumb-item text-custom">Test</li>
            <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Anket Sonuçları</a></li>
        </ol>

        <div class="row pt-2">

            <div class="col-6 col-sm-3 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Teste Katılan Kullanıcı Sayısı</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">
                            <h4 class="text-end text-dark"></h4>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-3 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Doğru Cevaplanan Soru Sayısı</h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                            <h4 class="text-end text-dark"></h4>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-3 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Yanlış Cevaplanan Soru Sayısı</h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                            <h4 class="text-end text-dark"></h4>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-3 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Boş Bırakılan Soru Sayısı</h6>
                    </header>
                    <div class="card-body">
                        <p class="card-text">
                            <h4 class="text-end text-dark"></h4>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Row 1 -->

        <!-- Row 2 -->
        <div class="row pt-2">

            <div class="col-12 col-sm-3 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Katılımcı Bazında Dağılım</h6>
                    </header>
                    <div class="card-body">
                        <canvas id="katılımcıChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-3 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Cinsiyet Bazında Dağılım</h6>
                    </header>
                    <div class="card-body">
                        <canvas id="cinsiyetChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-3 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Doğru Yanlış Bazında Dağılım</h6>
                    </header>
                    <div class="card-body">
                        <canvas id="dogruyanlısChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-3 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Yaş Grubu Bazında Dağılım</h6>
                    </header>
                    <div class="card-body">
                        <canvas id="yasChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <!-- Row 2 -->

        <!-- Row 3 -->
        <div class="row pt-2">

            <div class="col-12 col-sm-12 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Cevaplar</h6>
                    </header>
                    <div class="card-body">

                        <table id="cevaplar" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom" width="5%"></th>
                                <th class="text-custom text-center">Soru 1</th>
                                <th class="text-custom">Soru 2</th>
                                <th class="text-custom">Soru 3</th>
                                <th class="text-custom">Soru 4</th>
                                <th class="text-custom">Soru 5</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td align="center">
                                        <form action="ozluk/" method="POST">
                                            <input type="hidden" id="reply" name="reply" value=">
                                            <button type="submit" class="btn btn-sm btn-outline-custom"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </form>
                                    </td>
                                    <td align="center"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- Row 3 -->

        <!-- Row 4 -->
        <div class="row pt-2">

            <div class="col-12 col-sm-12 mb-3">
                <div class="card h-100">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Teste Verilen Cevaplarınız</h6>
                    </header>
                    <div class="card-body">

                        <table id="verilencevaplar" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-custom" width="5%"></th>
                                <th class="text-custom text-center">Soru 1</th>
                                <th class="text-custom">Soru 2</th>
                                <th class="text-custom">Soru 3</th>
                                <th class="text-custom">Soru 4</th>
                                <th class="text-custom">Soru 5</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td align="center">
                                        <form action="ozluk/" method="POST">
                                            <input type="hidden" id="reply" name="reply" value="">
                                            <button type="submit" class="btn btn-sm btn-outline-custom"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </form>
                                    </td>
                                    <td align="center"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <!-- Row 4 -->

    </div>
<?php require 'mainPage_statics/footer.php'; ?>
<script>
    var ctx = document.getElementById("katılımcıChart");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php
                $query1=$db->prepare("SELECT department, COUNT(*) as count FROM hrEmployeeDepartment WHERE positionActivePassive = 'A' AND departmentStatus = 1 GROUP BY department ORDER BY count DESC");
                $query1->execute();
                while($query1r=$query1->fetch(PDO::FETCH_ASSOC)) {?>
                '<?php echo $query1r['department'] ?>',
                <?php } ?>],
            datasets: [{
                label: 'Departman',
                data: [
                    <?php
                    $query1=$db->prepare("SELECT department, COUNT(*) as count FROM hrEmployeeDepartment WHERE positionActivePassive = 'A' AND departmentStatus = 1 GROUP BY department ORDER BY count DESC");
                    $query1->execute();
                    while($query1r=$query1->fetch(PDO::FETCH_ASSOC)) {?>
                    <?php echo $query1r['count'] ?>,
                    <?php } ?>],
                backgroundColor: [
                    'rgba(107, 21, 182, 0.8)',
                    'rgba(255, 185, 35, 0.8)',
                    'rgba(255, 87, 86, 0.8)',
                    'rgba(114, 211, 220, 0.8)',
                    'rgba(123, 192, 67, 0.8)',
                    'rgba(77, 100, 141, 0.8)',
                    'rgba(170, 170, 170, 0.8)',
                    'rgba(223, 162, 144, 0.8)',
                    'rgba(255, 238, 173, 0.8)',
                    'rgba(133, 68, 66, 0.8)',
                    'rgba(249, 180, 45, 0.8)',
                    'rgba(253, 244, 152, 0.8)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
            },
        }
    });
</script>
<script>
    var ctx = document.getElementById("dogruyanlısChart");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php
                $query1=$db->prepare("SELECT positionTitle, COUNT(*) as count FROM hrEmployeeDepartment WHERE positionActivePassive = 'A' AND departmentStatus = 1 GROUP BY positionTitle ORDER BY count DESC");
                $query1->execute();
                while($query1r=$query1->fetch(PDO::FETCH_ASSOC)) {?>
                '<?php echo $query1r['positionTitle'] ?>',
                <?php } ?>],
            datasets: [{
                label: 'Doğru',
                data: [
                    <?php
                    $query1=$db->prepare("SELECT positionTitle, COUNT(*) as count FROM hrEmployeeDepartment WHERE positionActivePassive = 'A' AND departmentStatus = 1 GROUP BY positionTitle ORDER BY count DESC");
                    $query1->execute();
                    while($query1r=$query1->fetch(PDO::FETCH_ASSOC)) {?>
                    <?php echo $query1r['count'] ?>,
                    <?php } ?>],
                backgroundColor: [
                    'rgba(107, 21, 182, 0.8)',
                    'rgba(255, 185, 35, 0.8)',
                    'rgba(255, 87, 86, 0.8)',
                    'rgba(114, 211, 220, 0.8)',
                    'rgba(123, 192, 67, 0.8)',
                    'rgba(77, 100, 141, 0.8)',
                    'rgba(170, 170, 170, 0.8)',
                    'rgba(223, 162, 144, 0.8)',
                    'rgba(255, 238, 173, 0.8)',
                    'rgba(133, 68, 66, 0.8)',
                    'rgba(249, 180, 45, 0.8)',
                    'rgba(253, 244, 152, 0.8)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
            },
        }
    });
</script>
<script>
    var ctx = document.getElementById("yasChart");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php
                $query1=$db->prepare("SELECT (CASE WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<20 THEN '<20' WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<30 THEN '20-30' WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<40 THEN '30-40' WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<50 THEN '40-50' WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<60 THEN '50-60' ELSE '>60' END) AS ageGroup, COUNT(*) AS count FROM hrEmployee WHERE recordstatus = 1 AND activePassive = 'A' GROUP BY ageGroup ORDER BY count DESC");
                $query1->execute();
                while($query1r=$query1->fetch(PDO::FETCH_ASSOC)) {?>
                '<?php echo $query1r['ageGroup'] ?>',
                <?php } ?>],
            datasets: [{
                label: 'Unvan',
                data: [
                    <?php
                    $query1=$db->prepare("SELECT (CASE WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<20 THEN '<20' WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<30 THEN '20-30' WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<40 THEN '30-40' WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<50 THEN '40-50' WHEN timestampdiff(YEAR, birthDate, CURRENT_DATE)<60 THEN '50-60' ELSE '>60' END) AS ageGroup, COUNT(*) AS count FROM hrEmployee WHERE recordstatus = 1 AND activePassive = 'A' GROUP BY ageGroup ORDER BY count DESC");
                    $query1->execute();
                    while($query1r=$query1->fetch(PDO::FETCH_ASSOC)) {?>
                    <?php echo $query1r['count'] ?>,
                    <?php } ?>],
                backgroundColor: [
                    'rgba(107, 21, 182, 0.8)',
                    'rgba(255, 185, 35, 0.8)',
                    'rgba(255, 87, 86, 0.8)',
                    'rgba(114, 211, 220, 0.8)',
                    'rgba(123, 192, 67, 0.8)',
                    'rgba(77, 100, 141, 0.8)',
                    'rgba(170, 170, 170, 0.8)',
                    'rgba(223, 162, 144, 0.8)',
                    'rgba(255, 238, 173, 0.8)',
                    'rgba(133, 68, 66, 0.8)',
                    'rgba(249, 180, 45, 0.8)',
                    'rgba(253, 244, 152, 0.8)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
            },
        }
    });
</script>
<script>
    var ctx = document.getElementById("cinsiyetChart");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php
                $query1=$db->prepare("SELECT (CASE WHEN sex='K' THEN 'Kadın' WHEN sex='E' THEN 'Erkek' ELSE 'Hata' END) AS sex, COUNT(*) AS count FROM hrEmployee WHERE ActivePassive = 'A' AND RecordStatus = 1 GROUP BY sex ORDER BY count DESC");
                $query1->execute();
                while($query1r=$query1->fetch(PDO::FETCH_ASSOC)) {?>
                '<?php echo $query1r['sex'] ?>',
                <?php } ?>],
            datasets: [{
                label: 'Cinsiyet',
                data: [
                    <?php
                    $query1=$db->prepare("SELECT (CASE WHEN sex='K' THEN 'Kadın' WHEN sex='E' THEN 'Erkek' ELSE 'Hata' END) AS sex, COUNT(*) AS count FROM hrEmployee WHERE ActivePassive = 'A' AND RecordStatus = 1 GROUP BY sex ORDER BY count DESC");
                    $query1->execute();
                    while($query1r=$query1->fetch(PDO::FETCH_ASSOC)) {?>
                    <?php echo $query1r['count'] ?>,
                    <?php } ?>],
                backgroundColor: [
                    'rgba(107, 21, 182, 0.8)',
                    'rgba(255, 185, 35, 0.8)',
                    'rgba(255, 87, 86, 0.8)',
                    'rgba(114, 211, 220, 0.8)',
                    'rgba(123, 192, 67, 0.8)',
                    'rgba(77, 100, 141, 0.8)',
                    'rgba(170, 170, 170, 0.8)',
                    'rgba(223, 162, 144, 0.8)',
                    'rgba(255, 238, 173, 0.8)',
                    'rgba(133, 68, 66, 0.8)',
                    'rgba(249, 180, 45, 0.8)',
                    'rgba(253, 244, 152, 0.8)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
            },
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#cevaplar').DataTable( {
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            pageLength : 5,
            bLengthChange : false
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#verilencevaplar').DataTable( {
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: true
            },
            pageLength : 5,
            bLengthChange : false
        });
    });
</script>
