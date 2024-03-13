<?php
// Takvim verilerini oluşturun
if(post('id')){
    $data = array(
        array(
            'title' => 'Giriş Saati',
            'start' => '2023-03-21T08:30:00',
            'extendedProps' => array(
                'status' => 'done'
            ),
            'backgroundColor' => 'green',
            'borderColor' => 'green'
        ),
        array(
            'title' => 'Çıkış Saati',
            'start' => '2023-03-21T17:30',
            'backgroundColor' => '#ee5253',
            'borderColor' => '#ee5253'
        ),
        array(
            'title' => 'Ücretsiz İzin',
            'start' => '2023-03-24',
            'end' => '2023-03-27',
            'backgroundColor' => '#fbc531',
            'borderColor' => '#fbc531'
        ),
        array(
            'title' => 'Ücretli İzin',
            'start' => '2023-04-27',
            'end' => '2023-04-29',
            'backgroundColor' => '#4b7bec',
            'borderColor' => '#4b7bec'
        )
    );

// Takvim verilerini JSON formatında döndürün
    damp(json_encode($data));
}



