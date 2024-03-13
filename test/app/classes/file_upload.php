<?php


class file_upload
{
    public static function files_upload($images,$table_name){
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
            }else{
                $message['err'] = "Hatalı bir dosya formatı seçtiniz.";
            }
            $hash_name[$i] = str_replace('/','a',$hash);

        }
        $hash_name = json_encode($hash_name);

        $sor = $db->prepare('INSERT INTO '. $table_name .' SET file_name =:file_name');
        $result = $sor->execute([
            'file_name' => $hash_name
        ]);
        if ($result){
            $lastID = $db->lastInsertId();
            $hash_name = json_decode($hash_name,true);

            for ($i=0;$i<$count;$i++){
                $returned .= move_uploaded_file($images['tmp_name'][$i],picture_path($hash_name[$i],$table_name));
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
