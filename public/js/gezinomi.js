$(document).ready(function() {
    let totalValue = 0;

    /* Yolcu Tipi Button Start */

    $('#buttonpassangertype').click(function (e) {
        if ($("#travellertype").attr('class').split(" ")[7] == "active") {
            $("#travellertype").removeClass("d-flex").addClass("d-none");
            $("#travellertype").removeClass("active");
        } else {
            $("#travellertype").removeClass("d-none").addClass("d-flex");
            $("#travellertype").addClass("active");

        }
    });
    $(document).on("click", function(event) {
        if($("#travellertype").attr('class').split(" ")[7] == "active"){
            if ($(event.target).attr('class').split(" ")[0] != 'travellertype') {
                $("#travellertype").removeClass("d-flex").addClass("d-none");
                $("#travellertype").removeClass("active");
            }
        }
    });
    $('.traveller-number').click(function (e) {
        $type=$(this).attr('class').split(" ")[3];
        $contanir = "."+$type + "-container";
        $text = "#t-" + $type;
        $post = ".p_" + $type;
        $number=parseInt($($contanir+">.value").html());
        const valueSpans = document.querySelectorAll('span.value');
        let totalValue = 0;
        let select ;
        for (let i = 0; i < valueSpans.length; i++) {
            const value = parseFloat(valueSpans[i].textContent);
            if(value>0){
                select = i;
            }
            totalValue += value;
        }
        const $el = $(".type_container");
        let className = $el[select].className;
        $className = "."+className.split(" ")[5];
        if($(this).attr('class').split(" ")[4]=="plus"){
            $($className+'>.minus').addClass("traveller-display");
            if(totalValue<7){
                $number=$number+1;
                if(totalValue==6){
                    $('.type_container>.plus').removeClass("traveller-display");
                }
                $($contanir+'>.minus').addClass("traveller-display");
            }
        }
        if($(this).attr('class').split(" ")[4]=="minus"){
            if (totalValue > 1) {
                if(totalValue==7){
                    $('.type_container>.plus').addClass("traveller-display");
                }
                if($number>0){
                    $number = $number-1 ;
                }
                if($number==0){
                    $($contanir+'>.minus').removeClass("traveller-display");
                }
                if(totalValue==2){
                    $('.minus').removeClass("traveller-display");
                }
            }
        }
        $($contanir+">.value").html($number);
        $($text).html($number);
        $($post).val($number);

    });
    /* Yolcu Tipi Button Finish */
    /* Rezarvasyon Yolcu Ekleme Start */
    $('.ekle').click(function(e) {
        $clone=$(".people:first").clone();
        $clone.find("input:text").val("").end();
        $clone.find("input[name=day]").val("1").end();
        $clone.find("input[name=month]").val("1").end();
        $clone.find("input[name=year]").val("2000").end();
        $clone.find("input:checkbox").prop("checked", false);
        $clone.find("input:radio").prop("checked", false);
        $clone.appendTo(".people-all");
    });
    /* Rezarvasyon Yolcu Ekleme Finish */
    /* Card Seçimi Start */
    $('.card-click').click(function(e) {
        $(".card-body>.row").removeClass("d-flex").addClass("d-none");
        $(".card-body>."+$(this).attr('class').split(" ")[4]).removeClass("d-none").addClass("d-flex");
        $(".card-header>.card-click").removeClass("card-active");
        $(".card-header>."+$(this).attr('class').split(" ")[4]).addClass("card-active");
    });
    /* Card Seçimi Finish */
    /* Sayfa Yönlendirmeleri Start */
    $('.ticket').click(function(e) {
        if($(this).attr('class').split(" ")[0]=="car"){
            location.href='/car_ticket_selection';
        }else if($(this).attr('class').split(" ")[0]=="hotel"){
            location.href='/otel_ticket_selection';
        }else{
            location.href='/ticket_selection';
        }
    });
    $('.reservasion').click(function(e) {
        if($(this).attr('class').split(" ")[0]=="car"){
            location.href='/rent_acar_reservation';
        }else if($(this).attr('class').split(" ")[0]=="hotel"){
            location.href='/otel_reservation';
        }else{
            location.href='/reservation';
        }
    });
    $('.payss').click(function(e) {
        if($(this).attr('class').split(" ")[0]=="car"){
            location.href='/rent_acar_paying';
        }else if($(this).attr('class').split(" ")[0]=="hotel"){
            location.href='/otel_ticket_paying';
        }else{
            location.href='/ticket_paying';
        }
    });
    $('.detail').click(function(e) {
        location.href='/gezinomi_otel_detay';
    });

    /* Sayfa Yönlendirmeleri Finish */
});
