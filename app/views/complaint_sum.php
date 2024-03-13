<?php require 'mainPage_statics/header.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div style="margin-top: 10%" class="container bg-light pt-5 p-3" >
    <div class="row">
        <div class="col-12 col-md-12">
            <h1>Bu Ayın Şikayet Özeti</h1>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ŞİKAYET KONULARI</th>
                    <th scope="col">ŞİKAYET ADETİ</th>
                    <th scope="col">GELEN ŞİKAYET m²</th>
                    <th scope="col">KABUL m²</th>
                    <th scope="col">RET m²</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i=0;$i<count($this_month_total_complaint);$i++):?>
                    <tr>
                        <th scope="row"><?=$i+1?></th>
                        <td><?=$this_month_total_complaint[$i]['complaintname']?></td>
                        <td><?=$this_month_total_complaint[$i]['complaintCount']?></td>
                        <td><?=$this_month_total_complaint[$i]['totalComplaint']?></td>
                        <td><?=$this_month_total_complaint[$i]['acceptedComplaint']?></td>
                        <td><?=$this_month_total_complaint[$i]['rejectedComplaint']?></td>
                    </tr>
                <?php
                endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="margin-top: 10%" class="container" >
    <div class="row">
        <div class="col-12 col-md-12">
            <h1>Geçen Ayın Şikayet Özeti</h1>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ŞİKAYET KONULARI</th>
                    <th scope="col">ŞİKAYET ADETİ</th>
                    <th scope="col">GELEN ŞİKAYET m²</th>
                    <th scope="col">KABUL m²</th>
                    <th scope="col">RET m²</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i=0;$i<count($last_month_total_complaint);$i++):?>

                    <tr>
                        <th scope="row"><?=$i+1?></th>
                        <td><?=$last_month_total_complaint[$i]['complaintname']?></td>
                        <td><?=$last_month_total_complaint[$i]['complaintCount']?></td>
                        <td><?=$last_month_total_complaint[$i]['totalComplaint']?></td>
                        <td><?=$last_month_total_complaint[$i]['acceptedComplaint']?></td>
                        <td><?=$last_month_total_complaint[$i]['rejectedComplaint']?></td>
                    </tr>
                <?php
                endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'mainPage_statics/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


