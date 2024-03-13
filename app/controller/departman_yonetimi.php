<?php
if(post('add_department')) {
    $companyid = session('company_id');
    $departman = post('departmentName');
    personal::insert_departman($companyid, $departman);
    header('location:'.site_url('departman_yonetimi'));
}
//$depertman=personal::get_depertman();
if(post('add_role')){
    //$departman = post('role_department');
    $title = post('roleName');
    $companyid = session('company_id');
    personal::insert_departman_title($title,$companyid);
    header('location:'.site_url('departman_yonetimi'));
}
require view('departman_yonetimi');