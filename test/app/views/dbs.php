<?php require 'mainPage_statics/header.php' ?>


<!-- Container -->
<div class="container-fluid bg-light pt-5 p-3 small animate__animated animate__fadeIn">

    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Hesap Yönetimi</li>
        <li class="breadcrumb-item text-custom"><a href="" class="text-decoration-none text-custom">DBS</a></li>
    </ol>

    <!-- Row 1 -->
    <div class="row pt-2">

        <div class="col-12 col-sm-12 mb-3">
            <form action="../../../execution/" method="POST">
                <div class="card h-100">

                    <header class="card-header d-md-flex align-items-center bg-custom2">
                        <h6 class="card-header-title text-light mt-1">Doğrudan Borçlandırma Sistemi</h6>
                    </header>

                    <div class="card-body">
                        <p class="card-text">


                        </p>
                    </div>

                    <div class="card-footer p-3">
                        <div class="d-grid gap-2 d-md-flex">

                        </div>

                    </div>
            </form>
        </div>
    </div>

</div>
<!-- Row 1  -->

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
