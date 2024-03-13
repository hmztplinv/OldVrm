<?php

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
}

