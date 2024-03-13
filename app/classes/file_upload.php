<?php


class file_upload
{
    public static function files_upload($complaintId,$images,$table_name,$route){
        global $db;
        $returned = "";


        $count = count($images['name']);
        $hash_name = [];

        for ($i = 0;$i<$count;$i++){
            $image_name = explode('.', $images['name'][$i]);
            $hash='';

            if ($images['type'][$i] ==  'image/png' ){
                $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.png';
            }elseif ($images['type'][$i] == 'image/jpeg'){
                $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.jpeg';
            }elseif($images['type'][$i] == 'image/webp') {
                $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.webp';
            }elseif($images['type'][$i] == 'video/mp4') {
                $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.mp4';
            }else{
                $message['err'] = "Hatalı bir dosya formatı seçtiniz.";
            }
            $hash_name[$i] = str_replace('/','a',$hash);

        }

        foreach ($hash_name as $hash){
            $sor = $db->prepare('INSERT INTO '. $table_name .' SET complaintID=:complaintID,fileName=:fileName');
            $result = $sor->execute([
                'complaintID' => $complaintId,
                'fileName' => $hash,
            ]);
        }
        $hash_name = json_encode($hash_name);
        if ($result){
            $lastID = $db->lastInsertId();
            $hash_name = json_decode($hash_name,true);

            for ($i=0;$i<$count;$i++){
                $returned .= move_uploaded_file($images['tmp_name'][$i],$route.$hash_name[$i]);
            }

            if (strstr($returned,"0") || $returned == ""){
                $message['err'] = "Dosya yüklenirken hata oluştu. Lütfen teknik desteğe başvurunuz.";
            }else{
                $message['suc'] = "Dosyalar başarıyla yüklendi.";
            }
        }else{
            $message['err'] = "Veritabanına bağlanırken bir hata oluştu. Lütfen teknik desteğe başvurunuz.";
        }

        return [
            'message' => $message,
            'id' => $lastID
        ];
    }






}
