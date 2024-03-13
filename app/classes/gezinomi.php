<?php

class Gezinomi
{
    public static function insert_ticket_flight($psngr)
    {
        global $db;
        $query = $db->prepare("INSERT INTO ticket_flight_info(user_id,shopping_id,airline_name,cabin_type,directind,isconnected,flight_number,duration_min,dep_airportname,arr_airportname,dep_date,dep_time,arr_date,arr_time)  VALUES(:user_id,:shopping_id,:OperatingAirlineName,:CabinType,:DirectionInd,:IsConnected,:FlightNumber,:JourneyDurationInMinute,:DepartureAirportName,:ArrivalAirportName,:DepartureDate,:DepartureTime,:ArrivalDate,:ArrivalTime)");
        $result=  $query->execute($psngr);
        if ($result!=NULL){
            return 1;

        }
        else{
            return 0;
        }

    }
    public static function insert_ticket_description($item)
    {
        global $db;
        $query = $db->prepare("INSERT INTO ticket_description(user_id,shopping_id,fare_name,cabin,pax_count,total_fare,currency,pnr,directind,base_fare,total_tax,total_service_fee)  VALUES(:user_id,:shopping_id,:FareName,:Cabin,:PaxCount,:TotalFare,:Currency,:pnr,:DirectionInd,:BaseFare,:TotalTax,:TotalServiceFee)");
        $result=$query->execute($item);
        if ($result!=NULL){
            return 1;

        }
        else{
            return 0;
        }
    }

    public static function insert_ticket_passenger_detail($item)
    {
        global $db;
        $query = $db->prepare("INSERT INTO ticket_passenger_detail(user_id,shopping_id,paxreferenceid,first_name,last_name,type,email)  VALUES(:user_id,:shopping_id,:PaxReferanceId,:first_name,:LastName,:PaxType,:email)");
        $result=$query->execute($item);
        if ($result!=NULL){
            return 1;

        }
        else{
            return 0;
        }
    }
    public static function insert_ticket_passenger($item)
    {
        global $db;
        $query = $db->prepare("INSERT INTO ticket_passenger(user_id,pax_reference_id,shopping_id,total_fare,ticket_number,currency)  VALUES(:user_id,:PaxReferanceId,:shopping_id,:TotalFare,:TicketNumber,:Currency)");
        $result=$query->execute($item);
        if ($result!=NULL){
            return 1;

        }
        else{
            return 0;
        }
    }
    public static function get_ticket_info($shoppingid,$direction){
        global $db;
        $query = $db->prepare("SELECT * FROM `ticket_flight_info` INNER JOIN `ticket_description` ON `ticket_flight_info`.`shopping_id` = `ticket_description`.`shopping_id` WHERE ticket_description.directind=:direction and ticket_flight_info.directind=:direction and  `ticket_description`.`shopping_id` =:shoppingId AND `ticket_description`.`user_id` =:userId;");
        $result= $query->execute([
            'userId'=>session('user_id'),
            'shoppingId'=>$shoppingid,
            'direction'=>$direction
        ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_ticket_passanger_info($shoppingid){
        global $db;
        $query = $db->prepare("SELECT * FROM ticket_passenger_detail INNER JOIN ticket_passenger ticket_passenger ON ticket_passenger_detail.paxreferenceid=ticket_passenger.pax_reference_id  WHERE ticket_passenger_detail.shopping_id =:shoppingId AND ticket_passenger_detail.user_id =:userId;");
        $result= $query->execute([
            'userId'=>session('user_id'),
            'shoppingId'=>$shoppingid
        ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_mail_ticket_info(){
        global $db;
        $query = $db->prepare("SELECT * FROM `ticket_flight_info` INNER JOIN `ticket_description` ON `ticket_flight_info`.`shopping_id` = `ticket_description`.`shopping_id` WHERE  `ticket_description`.`shopping_id` =:shoppingId AND `ticket_description`.`user_id` =:userId");
        $result= $query->execute([
            'userId'=>session('user_id'),
            'shoppingId'=>session('shoppingId'),

        ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get_gezinomi_admin(){
        global $db;
        $query = $db->prepare("SELECT * FROM gezinomi_admin WHERE status=1 ORDER BY id DESC");
        $result= $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update_gezinomi_admin_status($item){
        global $db;
        $query = $db->prepare("UPDATE gezinomi_admin SET status=0 WHERE id=:id ");
        $result= $query->execute(array('id' => $item[0]));
        return $result;
    }
    public static function insert_gezinmoi_admin($item)
    {
        global $db;
        $query = $db->prepare("INSERT INTO gezinomi_admin(htext,mtext,smtext,edit_name,href ) values(:title,:info,:description,:userId,:href) ");

        $result = $query->execute([
            'title' => $item['title'],
            'info' => $item['info'],
            'href' => $item['href'],
            'description' => $item['description'],
            'userId' => session('user_id')
        ]);

        if ($result!=NULL){
            return $db->lastInsertId();

        }
        else{
            return 0;
        }
    }
    public static function files_upload($images,$table_name,$route,$id){
        global $db;
        $returned = "";
        $hash_name = [];
        $image_name = explode('.', $images['name']);

        $hash='';

        if ($images['type'] ==  'image/png' ){
            $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.png';
        }elseif ($images['type'] == 'image/jpeg'){
            $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.jpeg';
        }elseif($images['type'] == 'image/webp') {
            $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.webp';
        }elseif($images['type'] == 'video/mp4') {
            $hash = password_hash($image_name[0],PASSWORD_DEFAULT) . '.mp4';
        }else{
            $message['err'] = "Hatalı bir dosya formatı seçtiniz.";
        }

        $hash_name = str_replace('/','a',$hash);




        $sor = $db->prepare("UPDATE ".$table_name." SET image=:image WHERE id=:id");
        $result = $sor->execute([
            'image' => $hash,
            'id' => $id
        ]);


        $hash_name = json_encode($hash_name);
        if ($result){
            $hash_name = json_decode($hash_name,true);


            $returned = move_uploaded_file($images['tmp_name'],$route.$hash_name);


            if (empty($returned)){
                $message['err'] = "Dosya yüklenirken hata oluştu. Lütfen teknik desteğe başvurunuz.";
            }else{
                $message['suc'] = "Dosyalar başarıyla yüklendi.";
            }
        }else{
            $message['err'] = "Veritabanına bağlanırken bir hata oluştu. Lütfen teknik desteğe başvurunuz.";
        }

        return $message;
    }
    public static function update_gezinomi_mail_status($shopid){
        global $db;
        $query = $db->prepare("UPDATE user_ticket_info SET is_mail_send=1 WHERE 	shoppingid=:shoppingid ");
        $result= $query->execute($shopid);
        return $result;
    }


}
