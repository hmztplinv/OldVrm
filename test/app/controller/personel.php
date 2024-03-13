<?php


$personal_count = personal::get_personel_count();
$avg_priorty = personal::get_avg_priorty();
$new_personal = personal::get_new();
$active_personals = personal::get_active_personal();
$passive_personals = personal::get_passive_personal();


if (post('department')){
    $department = personal::department([
        'positionAP' => post('positionAP'),
        'departmentS' => post('departmentS')
    ]);
    damp($department);
}
if (post('department_count')){
    $department = personal::department([
        'positionAP' => post('positionAP'),
        'departmentS' => post('departmentS')
    ]);
    echo $department['count'];
}

require view('personel');