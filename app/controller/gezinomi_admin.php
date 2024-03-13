<?php
if (!session('user_id')){
    header("Location:" .site_url('login'));
}
if (session('auth')['travelSub']['gezinomiIndex'] != 0) {
    $gezinomi=gezinomi::get_gezinomi_admin();
    if (post('add')){

        $item=[
            'href'=>post('href'),
            'title'=>post('title'),
            'info'=>post('info'),
            'description'=>post('description'),
        ];
        $id = gezinomi::insert_gezinmoi_admin($item);

        if (!empty($id)){
            if ($_FILES['upload']['name'][0] != "") {
                $message = gezinomi::files_upload($_FILES['upload'], 'gezinomi_admin' ,  "public/img/gezinomi_admin/",$id);
            }
        }

    }
    if (post('delete')){
        $item=[post('delete')];
        gezinomi::update_gezinomi_admin_status($item);

        header("Location:" .site_url('gezinomi_admin'));
    }
    require view('gezinomi_admin');
}
