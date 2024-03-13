<?php require 'mainPage_statics/header.php';?>
<div class="modal fade" id="modalRelatedContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent">

            <div class="modal-header bg-custom2 text-light p-2">
                <p class="h6 mb-0 mt-1">Ekle</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                <div class="row p-3">
                    <div class="col-12 col-sm-12">
                        <form action="<?= site_url('gezinomi_admin') ?>" method="post" enctype="multipart/form-data" >
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold text-custom mb-0">Başlık</label>
                                <input required type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label fw-bold text-custom mb-0">Detaylı Bilgi</label>
                                <input required type="text" class="form-control" id="details" name="info">
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label fw-bold text-custom mb-0">Link</label>
                                <input required type="text" class="form-control" id="details" name="href">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold text-custom mb-0">Açıklama</label>
                                <textarea required name="description" id="description" class="form-control" cols="30" rows="3" ></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label fw-bold text-custom mb-0">Fotoğraf ekle</label>
                                <input required class="form-control btn-custom bg-custom" id="files"  type="file" name="upload">
                            </div>
                            <button type="submit" class="btn btn-custom p-2"  value="1" name="add">
                                Kaydet
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Gezinomi</li>
        <li class="breadcrumb-item text-custom"><a href="../" class="text-decoration-none text-custom">Admin Panel</a></li>
    </ol>


    <div class="row pt-2">

        <div class="col-12 col-sm-12 mb-3">
            <div class="card h-100">
                <header class="card-header d-md-flex align-items-center bg-custom2">
                    <h6 class="card-header-title text-light mt-1">Bilgiler</h6>
                </header>
                <div class="form-group mt-5 ml-3">
                    <button
                        type="submit"
                        data-toggle="modal" data-target="#modalRelatedContent" class="btn btn-custom p-2 ms-2 edit"
                    >
                        <i class="fa-solid fa-plus"></i>
                        Ekle
                    </button>
                </div>
                <div class="card-body">
                    <table id="bilgiler" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-custom text-center">Başlık</th>
                            <th class="text-custom text-center">Detaylı Bilgi</th>
                            <th class="text-custom text-center">Açıklama</th>
                            <th class="text-custom text-center">Link</th>
                            <th class="text-custom text-center">
                                İşlemler
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($gezinomi as $item): ?>
                            <tr class="text-center">
                                <td><?=$item['htext']?></td>
                                <td><?=$item['mtext']?></td>
                                <td><?=$item['smtext']?></td>
                                <td><?=$item['href']?></td>

                                <form action="gezinomi_admin" method="post">
                                    <td>
                                        <button class="btn btn-custom btn-sm ms-2 delete" onclick="return confirm('Silmek istediğinize emin misiniz?')" type="submit" value="<?=$item['id']?>" name="delete"><i class="fa-solid fa-trash-can-arrow-up"></i> Sil</button>
                                    </td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'mainPage_statics/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?= @returned($message); ?>
<script>
    window.addEventListener('load', fg_load)

    function fg_load() {
        document.getElementById('loading').style.display = 'none';
    }

</script>








<script>

    $('#bilgiler').DataTable( {
        order:false,
        responsive: {
            details: false
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#bilgiler').DataTable()

        $('table tbody').on('click', '.delete', function () {
            table.row( $(this).parents('tr') ).remove().draw();
        });

        $('table tbody').on('click', '.edit', function () {
            var data = table.row( $(this).parents('tr') ).data();
            // modal pencerenin içindeki alanları doldurun
        });
    });

</script>


