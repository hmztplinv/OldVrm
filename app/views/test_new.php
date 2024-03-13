<?php require 'mainPage_statics/header.php'; ?>
<div class="container-lg bg-light pt-5 p-3 small animate__animated animate__fadeIn">
    <ol class="breadcrumb small pt-5">
        <li class="breadcrumb-item text-custom">Test</li>
        <li class="breadcrumb-item text-custom">
            <a href="#" class="text-decoration-none text-custom">Yeni Ekle</a>
        </li>
    </ol>

    <div class="row" id="order">
        <div class="col-md-12" >
            <div class="card mt-4">
                <form class="p-3">
                    <label class="form-label text-custom mb-0"><strong>Testin Adı :</strong></label>
                    <input class="form-control small mb-2" type="text" id="testname" name="testname">

                    <label class="form-label text-custom mb-0"><strong>Soru :</strong></label>
                    <textarea class="form-control textarea mb-2" id="textarea" name="textarea" rows="3"></textarea>

                    <label class="form-label text-custom mb-0"><strong>Cevap :</strong></label>
                    <input class="form-control text small mb-2" type="text" id="question" name="question">

                    <input id="true" name="true" type="checkbox">
                    <label class="form-label text-custom"><strong>Doğru Cevap</strong></label>
                </form>
            </div>
        </div>
    </div>

    <div class="row" id="secretDiv" style="display: none;">
        <div class="col-md-12" >
            <div class="card mt-4">
                <form class="p-3">
                    <label class="form-label text-custom mb-0"><strong>Soru :</strong></label>
                    <textarea class="form-control textarea mb-2" id="textarea0" name="textarea" rows="3"></textarea>

                    <label class="form-label text-custom mb-0"><strong>Cevap :</strong></label>
                    <input class="form-control text small mb-2" type="text" id="question0" name="question">

                    <input id="true0" name="true" class="checkbox" type="checkbox">
                    <label class="form-label text-custom mb-2"><strong>Doğru Cevap</strong></label>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-md-12">
                <a type="" id="add" class="btn btn-sm btn-custom text-white">Soru Ekle</a>
                <a type="submit" name="" id="" class="btn btn-sm btn-custom text-white">Testi Kabul Et</a>
        </div>
    </div>
</div>

<?php require 'mainPage_statics/footer.php'; ?>
<script>
    var temp=1;
    document.getElementById("add").onclick = function () {

        var secretOrder = $("#secretDiv").html();
        $("#order").append(secretOrder);
        temp+=1;
        document.getElementById("textarea0").setAttribute("id","textarea"+temp);
        $('#textarea'+(temp));
        document.getElementById("question0").setAttribute("id","question"+temp);
        $('#question'+(temp));
        document.getElementById("true0").setAttribute("id","true"+temp);
        $('#true'+(temp));
    }
</script>