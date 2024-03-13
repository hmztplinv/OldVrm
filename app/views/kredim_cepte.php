<?php require 'mainPage_statics/header.php'; ?>


<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Kredi İşlemleri</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">KredimCepte</a></li>
    </ol>

    <!-- Row 1 -->
    <div class="row pt-2">

        <div class="col-md-12 col-sm-12 mb-3">
            <form action="../../../execution/" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1"><img class="img-fluid" src="<?= public_url('img/kredimcepte.png') ?>" width="250"  alt="KredimCepte"></h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">

                        <div class="row">

                            <div class="col-md-6 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Kredi Tutarı</strong></label>
                                <input class="form-control small" name="startDate" type="number">
                            </div>

                            <div class="col-md-6 col-sm-1 p-2">
                                <label class="form-label text-custom"><strong>Vade</strong></label>
                                <select class="form-select small" name="bank">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <option value="">1 ay</option>
                                    <option value="">2 ay</option>
                                    <option value="">3 ay</option>
                                    <option value="">4 ay</option>
                                    <option value="">5 ay</option>
                                    <option value="">6 ay</option>
                                    <option value="">7 ay</option>
                                    <option value="">8 ay</option>
                                    <option value="">9 ay</option>
                                    <option value="">10 ay</option>
                                    <option value="">11 ay</option>
                                    <option value="">12 ay</option>
                                    <option value="">13 ay</option>
                                    <option value="">14 ay</option>
                                    <option value="">15 ay</option>
                                    <option value="">16 ay</option>
                                    <option value="">17 ay</option>
                                    <option value="">18 ay</option>
                                    <option value="">19 ay</option>
                                    <option value="">20 ay</option>
                                    <option value="">21 ay</option>
                                    <option value="">22 ay</option>
                                    <option value="">23 ay</option>
                                    <option value="">24 ay</option>
                                </select>
                            </div>

                        </div>
                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" name="answer" value="Show Div" onclick="showDiv()" class="btn btn-sm btn-custom mt-1">Hesapla</button>

                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
<!-- Row 1  -->


<!-- Row 2 -->
<div class="row pt-2 animate__animated animate__fadeIn" id="welcomeDiv"  style="display:none;" class="answer_list">

    <div class="row">

        <div class="col-sm-12 col-sm-2">
            <div class="card h-100">
                <div class="card-body">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1"><img class="img-fluid" src="<?= public_url('img/isbankw.png') ?>" alt="Banka"></h6>
                    </header>
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item"><b>Faiz</b>: %1,95</li>
                        <li class="list-group-item"><b>Aylık Taksit</b>: 1.942,37 TL</li>
                        <li class="list-group-item"><b>Toplam Ödeme</b>: 23.408,44 TL</li>
                    </ul>
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-sm btn-custom mt-1">Başvur</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-sm-2">
            <div class="card h-100">
                <div class="card-body">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1"><img class="img-fluid" src="<?= public_url('img/garantiw.png') ?>" alt="Banka"></h6>
                    </header>
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item"><b>Faiz</b>: %2,23</li>
                        <li class="list-group-item"><b>Aylık Taksit</b>: 1.983,84 TL</li>
                        <li class="list-group-item"><b>Toplam Ödeme</b>: 23.906,08 TL</li>
                    </ul>
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-sm btn-custom mt-1">Başvur</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-sm-2">
            <div class="card h-100">
                <div class="card-body">
                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1"><img class="img-fluid" src="<?= public_url('img/akbankw.png') ?>" alt="Banka"></h6>
                    </header>
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item"><b>Faiz</b>: %2,64</li>
                        <li class="list-group-item"><b>Aylık Taksit</b>: 2.045,39 TL</li>
                        <li class="list-group-item"><b>Toplam Ödeme</b>: 24.644,68 TL</li>
                    </ul>
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-sm btn-custom mt-1">Başvur</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- Row 2 -->

</div>
<!-- Container -->


<?php require 'mainPage_statics/footer.php'; ?>


<script>
    $(document).ready(function() {
        $('#hesaphareketilistesi').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'copy', 'print'
            ],
            responsive: {
                details: false
            },
            pageLength : 5
        });
    })
</script>

<script>
    function showDiv() {
        document.getElementById('welcomeDiv').style.display = "block";
    }
</script>

</body>
</html>
