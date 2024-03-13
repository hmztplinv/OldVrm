<?php
if(post('submit')){

    $_POST['companyid']=complaint::get_company_id_by_complaint_id(post('complaint'))['companyId'];
    $survey=[
      "q1"=>post('q1'),
      "q2"=>post('q2'),
      "q3"=>post('q3'),
      "q4"=>post('q4'),
      "q5"=>post('q5'),
      "q6"=>post('q6'),
      "q7"=>post('q7'),
      "complaintID"=>post('complaint'),
        "companyId"=>Survey::get_companyid_by_complaint_id(post('complaint'))
    ];
    Survey::saveSurvey($_POST);
    $message = "Yanıtınız kayıt edilmiştir. Değerlendirmeniz için teşekkür ederiz.";
    header("Location:https://bien.mutlumusteri.org");
}
if (get("s")){
    if (Survey::surveyComplaintControl(base64_decode(get('s')))){
        if (Survey::surveyActiveControl(base64_decode(get('s')))){
            require view("anket");
        }else{
            $message = "Böyle bir link bulunmamaktadır. Yönlendiriliyorsunuz";
            header("Location:https://bien.mutlumusteri.org");
        }
    }else{
        $message = "Bu link daha önceden kullanıldı. Yönlendiriliyorsunuz.";
        header("Location:https://bien.mutlumusteri.org");
    }

}



