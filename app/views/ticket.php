<?php require 'mainPage_statics/header.php'; ?>
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Gezinomi</li>
        <li class="breadcrumb-item text-custom"><a href="../" class="text-decoration-none text-custom">Bilet Bilgilerim</a></li>
    </ol>
    <!-- Kullanıcı bilgileri -->
    <div class="row pt-2">

        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Bilet Listele</h6>
                </header>

                <div class="card-body">
                    <table id="bilet" class="display" style="width:100%">
                        <thead>
                        <tr>

                            <th class="text-custom text-center"><i class="fa-solid fa-user-plus"></i> Bilet Alınma Tarihi</th>
                            <th class="text-custom text-center"><i class="fa-solid fa-user-plus"></i> Yolcu Sayısı</th>
                            <th class="text-custom text-center"><i class="fa-solid fa-location-dot"></i> Nereden</th>
                            <th class="text-custom text-center"><i class="fa-solid fa-location-dot"></i> Nereye</th>
                            <th class="text-custom text-center"><i class="fa-solid fa-calendar-days"></i> Gidiş Kalkış Tarihi</th>

                            <th class="text-custom text-center"><i class="fa-solid fa-circle-info"></i> Detay</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="<?= site_url('ticket_detail') ?>" method="get">
                            <?php foreach ($get_ticket as $item): ?>
                                <tr>

                                    <td align="center"><?=$item['insert_date']?></td>
                                    <td align="center"><?=$item['paxCount']?></td>
                                    <td align="center"><?=$item['departure']?></td>
                                    <td align="center"><?=$item['arrival']?></td>
                                    <td align="center"><?=$item['departureDate']?> <?=$item['DepartureTime']?></td>
                                    <td align="center">
                                        <a class="text-custom" href="<?= site_url('ticket_detail') ?>?shoppingid=<?=base64_encode($item['shoppingid'])?>">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </form>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <?php require 'mainPage_statics/footer.php'; ?>
    <script>
        $(document).ready(function() {
            $('#bilet').DataTable( {
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