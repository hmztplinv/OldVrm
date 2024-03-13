<script src="<?= public_url('js/bootstrap.bundle.min.js') ?>"></script>


<script src="<?= public_url('js/jquery-3.5.1.js') ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?= public_url('css/bootstrap-multiselect.css') ?>" type="text/css">
<script type="text/javascript" src="<?= public_url('js/bootstrap-multiselect.js') ?>"></script>
<script src="<?= public_url('js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= public_url('js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= public_url('js/jszip.min.js') ?>"></script>
<script src="<?= public_url('js/pdfmake.min.js') ?>"></script>
<script src="<?= public_url('js/vfs_fonts.js') ?>"></script>
<script src="<?= public_url('js/buttons.html5.min.js') ?>"></script>
<script src="<?= public_url('js/buttons.print.min.js') ?>"></script>
<script src="<?= public_url('js/chart.min.js') ?>"></script>
<script src="<?= public_url('js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= public_url('js/filtered.js') ?>"></script>


<?php
if ($_SERVER['REQUEST_URI'] == '/hesap_bakiyeleri'):
?>




<?php endif; ?>

<script>
    window.addEventListener('load', fg_load)

    function fg_load() {
        document.getElementById('loading').style.display = 'none';
    }

</script>