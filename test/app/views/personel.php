<?php require 'mainPage_statics/header.php' ?>

<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">İnsan Kaynakları</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">Personel</a></li>
    </ol>

    <!-- Row 1 -->
    <div class="row pt-2">

        <div class="col-6 col-sm-3 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Toplam Personel</h6>
                </header>

                <div class="card-body">
                    <p class="card-text">
                    <h4 class="text-end text-dark"><?= $personal_count['count'] ?>
                    </h4>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-3 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Ortalama Kıdem</h6>
                </header>
                <div class="card-body">
                    <p class="card-text">
                    <h4 class="text-end text-dark"><?= round($avg_priorty['avg'],2) ?>
                    </h4>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-3 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Yıl İçinde Katılan</h6>
                </header>
                <div class="card-body">
                    <p class="card-text">
                    <h4 class="text-end text-dark"><?= $new_personal['count'] ?>
                    </h4>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-3 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Yıl İçinde Ayrılan</h6>
                </header>
                <?php
                $query1=$db->prepare("SELECT COUNT(*) AS count FROM `hrEmployee` WHERE YEAR(endDate) = YEAR(CURDATE()) AND recordStatus = 1");
                $query1->execute();
                $query1r=$query1->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="card-body">
                    <p class="card-text">
                    <h4 class="text-end text-dark"><?php echo $query1r['count'] ?>
                    </h4>
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
                    <h6 class="card-header-title text-light mt-1">Departman Bazında Dağılım</h6>
                </header>
                <div class="card-body">
                    <canvas id="departmanChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-3 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Unvan Bazında Dağılım</h6>
                </header>
                <div class="card-body">
                    <canvas id="unvanChart"></canvas>
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
                    <h6 class="card-header-title text-light mt-1">Aktif Personel Listesi</h6>
                </header>
                <div class="card-body">

                    <table id="aktifpersonellistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom text-center">Sicil No</th>
                            <th class="text-custom">Adı</th>
                            <th class="text-custom">Soyadı</th>
                            <th class="text-custom">Departman</th>
                            <th class="text-custom">Unvan</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($active_personals as $active_personal): ?>

                            <tr>
                                <td align="center">
                                    <form action="ozluk/" method="POST">
                                        <input type="hidden" id="registry" name="registry" value="<?php echo $active_personal['registry'] ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-custom"formmethod="post"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </td>
                                <td align="center"><?php echo $active_personal['registry'] ?></td>
                                <td><?php echo $active_personal['name'] ?></td>
                                <td><?php echo $active_personal['surname'] ?></td>
                                <td><?php echo $active_personal['department'] ?></td>
                                <td><?php echo $active_personal['positionTitle'] ?></td>
                            </tr>
                        <?php endforeach; ?>
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
                    <h6 class="card-header-title text-light mt-1">Ayrılan Personel Listesi</h6>
                </header>
                <div class="card-body">

                    <table id="pasifpersonellistesi" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom" width="5%"></th>
                            <th class="text-custom text-center">Sicil No</th>
                            <th class="text-custom">Adı</th>
                            <th class="text-custom">Soyadı</th>
                            <th class="text-custom">Departman</th>
                            <th class="text-custom">Unvan</th>
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
    <!-- Row 4 -->

</div>
<!-- Container -->


<?php require 'mainPage_statics/footer.php'; ?>

<script>
    var ctx = document.getElementById("departmanChart");
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
    var ctx = document.getElementById("unvanChart");
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
                label: 'Unvan',
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
        $('#aktifpersonellistesi').DataTable( {
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
        $('#pasifpersonellistesi').DataTable( {
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

</body>
</html>