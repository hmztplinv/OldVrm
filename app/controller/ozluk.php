<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (post('updateEmployee'))
{
    $personalupdate=[
        'registry'=>post('registry'),
        'name'=>post('name'),
        'surname'=>post('surname'),
        'nationality'=>post('nationality'),
        'identityNumber'=>post('identityNumber'),
        'sex'=>post('sex'),
        'birthDate'=>post('birthDate'),
        'bloodType'=>post('bloodType'),
        'maritalStatus'=>post('maritalStatus'),
        'dateOfMarriage'=>post('dateOfMarriage')=='' ? NULL: post('dateOfMarriage'),
        'numberOfKids'=>post('numberOfKids'),
        'drivingLicense'=>post('drivingLicense'),
        'startDate'=>post('startDate'),
        'endDate'=>post('endDate')=='' ? NULL: post('endDate'),
        'activePassive'=>post('activePassive'),
        'lastUpdateUser'=>session('user_email'),
        'reasonOfQuitting'=>post('reasonOfQuitting')
    ];
   // damp($personalupdate);


    $updateresult=personal::update_personel($personalupdate);
    header('location:'.site_url('personel'));
}
if(post('position')=="true"){
    personal::delete_general(post('delete'),post('id'));
}
if (post('registry')){
    $personal = personal::get_personal_info(post('registry'));
    $educations = personal::get_education_info(post('registry'));
    $langs = personal::get_lang_info(post('registry'));
    $certificates=personal::get_certificate_info(post('registry'));
    $departments = personal::get_department_info(post('registry'));
    $salarys = personal::get_salary_info(post('registry'));
    $familys = personal::get_family_info(post('registry'));
    $contacts = personal::get_contact_info(post('registry'));
    $exps = personal::get_exp_info(post('registry'));
    require view('ozluk');
}else{
    header('location:'.site_url('personel'));
}


