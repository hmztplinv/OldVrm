<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$id=base64_decode(get('id'));
$sizes = bienmutlu::get_sizes();
$quasize=quamutlu::get_sizes();
$quaproducts=quamutlu::get_all_products();
if(post('billSend')){
    $rates=balance::get_rate();
    $complaintid=post('complaint_id');
    if(post('currency')=='TRY'){
        $currency=1;
        $try=post('billAmount');
        $usd=$try/$rates['usd'];
        $euro=$try/$rates['euro'];
    }else if(post('currency')=='EURO'){
        $currency=3;
        $euro=post('billAmount');
        $try=$euro*$rates['euro'];
        $usd=$try/$rates['usd'];

    }
    else if(post('currency')=='GBP'){
        $currency=4;
        $gbp=post('billAmount');
        $try=$gbp*$rates['gbp'];
        $usd=$try/$rates['usd'];

    }else if(post('currency')=='USD'){
        $currency=2;
        $usd=post('billAmount');
        $try=$usd*$rates['usd'];
        $euro=$try/$rates['euro'];
    }
    $billSend = [
        'billAmount'=>$try,
        'billAmountUSD'=>$usd,
        'billAmountEuro'=>$euro,
        'billAmountGBP'=>$gbp,
        'billNumber' => post('billNumber'),
        'billDesc' => post('billDesc'),
        'id'=>$complaintid,
        'currency'=>$currency
    ];
    $res=complaint::update_bill($billSend);
    header("Location: " . site_url('detail_complaint?id=' . base64_encode($complaintid)));
}
if($id==''){
    header("location:".site_url("complaint"));
}
if (post('auth_factory')) {
    $auth_factory = [
        'factory' => post('factory'),
        'status' => 1,
        'id' => post('complaint_id')
    ];
    complaint::update_factory_auth($auth_factory);
    header("Location: " . site_url('detail_complaint?id=' . base64_encode(post('complaint_id'))));
}

if(get('status')){
    complaint::update_complaint_status($id,get('status'));
    $url='www.verimportal.com/anket?s='.base64_encode($id);
    $reporturlforcomplaintowner='www.verimportal.com/complaint_report?complaint='.base64_encode($id);
    $message="Şikayetiniz Sonuçlandırılmıştır. Şikayet sonuçlandırma raporu linki: ".$reporturlforcomplaintowner." .Sistemimizi geliştirmek için 6 soruluk kısa anketimize katılmak için aşağıdaki butona tıklayabilirsiniz.Sağlıklı günler dileriz. ".$url;
    if(get('status')==1){
        if(!empty(complaint::complaintduration_exist($id))){
            complaint::update_complaintduration($id);
        }
        if(session('company_id')==2){
            sms::send_sms($message,sms::convert_number(get('phone')));
            sms::create_sms_log_complaint_sent_by_complaintid(get('phone'),$id);
        }
        MailAuthorized::send_mail_to_authorized($id);// mailyollar, yetkilendirmesi yapıldı
    }
    header("Location: " . site_url('detail_complaint?id=' . base64_encode($id)));
}

if(post('deletecomplaint')){
    complaint::complaint_passive(post('complaint_id'));
    header("location:".site_url("complaint"));
}


if (post('cancel_auth')) {
    if (complaint::cancel_auth(post('complaint_id'))) {
        header("Location: " . site_url('detail_complaint?id=' . base64_encode(post('complaint_id'))));
    }
}

if (post('setReport')) {
    $result = complaint::set_reporting(post('reporting'), post('reportId'));
}

if (post('complateComplaint')) {
    $complateComplaint = [
        'status' => 1,
        'closingDate' => date('Y-m-d H:i:s'),
        'id' => post('complaint_id')
    ];
    $result = complaint::complate_complaint($complateComplaint);
    if ($result) {
        header("Location: " . site_url('complaint'));
    }
}
if (isset($_POST['setTechnicalConfirm'])) {
    complaint::set_technical_confirm(post('complaint_id'), post('setTechnicalConfirm'));
    exit();
}
if (isset($_POST['setFactoryConfirm'])) {
    complaint::set_factory_confirm(post('complaint_id'), post('setFactoryConfirm'));
    exit();
}
if (isset($_POST['setProcessConfirm'])) {
    complaint::set_process_confirm(post('complaint_id'), post('setProcessConfirm'));
    exit();
}
if (isset($_POST['settechnologyConfirm'])) {
    complaint::set_technology_confirm(post('complaint_id'), post('settechnologyConfirm'));
    exit();
}
if (post('closeComplaint')) {
    $closeComplaint = [
        'status' => 7,
        'id' => post('complaint_id')
    ];
    $result = complaint::complate_complaint($closeComplaint);
    if ($result) {
        header("Location: " . site_url('complaint'));
    }
}
if (post('updateComplaint')) {
    $updateComplaint = [
        'endDate' => post('endDate') == "" ? "0000-00-00 00:00:00" : post('endDate'),
        'activePassive' => post('activePassive'),
        'complaintType' => post('complaintType'),
        'productType' => post('productType'),
        'sealer' => post('sealerupdate'),
        'productSize' => post('productSize') != "" ? post('productSize') : "",
        'productName' => post('productName'),
        'productColor' => post('productColor'),
        'complaintSubject' => post('complaintSubject'),
        'productQuality' => post('productQuality'),
        'metraj' => floatval(post('metraj')),
        'productdesc' => post('productdesc'),
        'id' => post('complaint_id'),
        'document_type' => post('documentType'),
        'quantityType' => post('metrajType'),
        'address' => post('address'),
        'acceptedQuantity' => doubleval(post('acceptedQuantity')),
        'complatedType' => post('complatedType'),
        'otherDealer'=>post('otherdealer'),
        'subDealer'=>post('subdealer'),
        'customerName'=>post('customername'),
        'customerSurname'=>post('customersurname'),
        'customerPhone'=>post('customer_phone'),
        'customerEmail'=>post('customer_email'),
        'market'=>post('market'),
        'updatedDate'=>date('Y-m-d H:i:s')
    ];
    $updateDetail = [
        'productApply' => post('productApply'),
        'productboxdetail' => post('productboxdetail'),
        'productiondate' => post('productiondate'),
        'productcalibre' => post('productcalibre'),
        'productcolornumber' => post('productcolornumber'),
        'productshipmentdate' => post('productshipmentdate'),
        'productapplyques' => post('productapplyques'),
        'id' => post('complaint_id')
    ];
    $complaint = complaint::get_complaint_by_id($updateComplaint['id']);
    if($updateComplaint['document_type']!=NULL&&$complaint['document_type']!=$updateComplaint['document_type']){
        $factorymails=complaint::get_documentName_by_id($updateComplaint['document_type']);
        $factorymails=$factorymails['documentNo'];
        if(str_contains($factorymails,'K3')){
           $factoryauthmails=['m.akmence@bienseramik.com.tr','a.pehlivan@bienseramik.com.tr'];
        }
        elseif(str_contains($factorymails,'K2')){
            $factoryauthmails=['m.kadayifcioglu@bienseramik.com.tr','a.pehlivan@bienseramik.com.tr'];
        }
        elseif(str_contains($factorymails,'K4')){
            $factoryauthmails=['s.eren@bienseramik.com.tr','a.pehlivan@bienseramik.com.tr'];

        }
        elseif(str_contains($factorymails,'K5')){
            $factoryauthmails=['h.topoz@qua.com.tr','a.topal@qua.com.tr','c.guven@qua.com.tr'];
        }
        MailFactory::send_mail_to_factories($factoryauthmails,$updateComplaint['id']);//mailyollar
    }

    $result = complaint::update_complaint($updateComplaint, $updateDetail);
    $url='www.verimportal.com/anket?s='.base64_encode($complaint['id']);
    $reporturlforcomplaintowner='www.verimportal.com/complaint_report?complaint='.base64_encode($complaint['id']);
    $message="Şikayetiniz Sonuçlandırılmıştır. Şikayet sonuçlandırma raporu linki: ".$reporturlforcomplaintowner." .Sistemimizi geliştirmek için 6 soruluk kısa anketimize katılmak için aşağıdaki butona tıklayabilirsiniz.Sağlıklı günler dileriz. ".$url;
    if($updateComplaint['activePassive']==1){
        if(!empty(complaint::complaintduration_exist($updateComplaint['id']))){
            complaint::update_complaintduration($updateComplaint['id']);
        }

        if(session('company_id')==2) {
            sms::send_sms($message, sms::convert_number($complaint['phone']));
            sms::create_sms_log_complaint_sent_by_complaintid($complaint['phone'], $updateComplaint['id']);
        }
        MailAuthorized::send_mail_to_authorized($updateComplaint['id']);//mailyollar çalışıyor
    }
    header("Location:".site_url('detail_complaint')."?id=".base64_encode(post('complaint_id')));
    die();
}
if (get('id')){
    $id=base64_decode(get('id'));
    $complaint = complaint::get_complaint_by_id($id);

    $companyid=$complaint['companyId'];
    $isdetailexist=complaint::complaint_details_exist($id);
    if(empty($isdetailexist)){
        complaint::set_detail_with_default($complaint['id']);
    }
    $complaint_detail=complaint::get_detailcomplaint_by_id($id);
    $productType = complaint::get_product_type();
    $sealers = bienmutlu::get_cities();
    if($complaint['productType']!=NULL){
        $productName = complaint::get_product_name($complaint['productType'], $complaint['productName']);
        $productsName = complaint::get_products_by_producttype($complaint['productType']);
    }
    $complaintTypes = complaint::get_complaint_type_for_authorize();
    $detail = complaint::detail_exist($complaint['id']);
    $files = complaint::get_pictures($id);
    $technicalReports = complaint::get_expert_reports(1, $id);

    $factoryReports = complaint::get_expert_reports(2, $id);
    $resultReports = complaint::get_expert_reports(3, $id);
    $auth = user::getComplaintAuth()['complaintFactory'];
    $factories = complaint::get_factories();

    $status = complaint::get_status();
    $confirmed = user::get_complaint_is_confirm();
    $document_types = complaint::get_document_type();
    $auth_person = complaint::get_persons();
    $survey_results = complaint::survey_results($complaint['id']);
    $sum_survey = complaint::sum_survey($id);
    if (!empty($sum_survey)) {
        $sum_progress = $sum_survey['sum_survey'] / 30 * 100;
    }
    $surveyComplaintControl = Survey::surveyComplaintControl($complaint['id']);
    //$reporting =complaint::get_reporting($complaint_expert_reports['complaint_id']);
    $auth_persons=complaint::get_authpersons_email($id);
}
if (post('add_report')){
    $report = [
        'user_id' => session('user_id'),
        'complaint_id' => post('complaint_id'),
        'message' => post('expert_report'),
        'report_type' => post('complaint_type')
    ];
    $report_id = complaint::add_expert_reports($report);
    if ($_FILES['upload']['name'][0] != "") {
        $fileResponse = file_upload::files_upload($report_id, $_FILES['upload'], "complaint_report_files", "public/public/img/");
    }
    header("Location:" . site_url('detail_complaint?id=' . base64_encode(post('complaint_id'))));
}

if (post('auth_person')) {
    $result = complaint::update_person_auth(post('person'), post('complaint_id'));
    if ($result) {
        header("Location: " . site_url('detail_complaint?id=' . base64_encode(post('complaint_id'))));
    }
}

if (post('cancel_person')) {
    if (complaint::cancel_person(post('complaint_id'))) {
        header("Location: " . site_url('detail_complaint?id=' . base64_encode(post('complaint_id'))));
    }
}


if(post('auth_persons')){
    $complaintid=post('complaint_id');
    $persons=post('persons');
    foreach($persons as $person){
        complaint::set_authpersons($complaintid,$person);
    }
    header("Location: " . site_url('detail_complaint?id=' . base64_encode($complaintid)));
}

if(post('update_persons')){
    $complaintid=post('complaint_id');
    complaint::reset_auth_persons_status($complaintid);
    $persons=post('persons');
    //damp($persons);
    foreach($persons as $person){
        $exist=complaint::auth_persons_exist($complaintid,$person);
        //damp($exist);
        if($exist){
            complaint::update_auth_person_status($complaintid,$person);
        }
        else{
            complaint::set_authpersons($complaintid,$person);
        }
    }
    header("Location: " . site_url('detail_complaint?id=' . base64_encode($complaintid)));
}

if(post('productname')) {
    $complaintid=post('complaint_id');
    $productname = [
        'productname' => post('productname')
    ];
    header("Location: " . site_url('detail_complaint?id='.base64_encode($complaintid)));
}
if(post('sealer')){
    $sealer=post('sealeravaible');
    $complaintid=post('complaintid');
    complaint::update_sealeravaible($complaintid,$sealer);
    $complaintid=base64_encode($complaintid);
    header("location:https://verimportal.com/sendcomplaintdocument?complaint=".$complaintid);
}
require view('detail_complaint');
