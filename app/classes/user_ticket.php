<?php

class user_ticket
{
    public static function insert_user_ticket(){
        global $db;
        $query = $db->prepare("INSERT INTO  user_ticket_info(userId,pageId,session_Id,session_Token) VALUES(:userId,1,:sessionId,:sessionToken)");
        $result= $query->execute([
            'userId'=>session('user_id'),
            'sessionId'=>session('SessionId'),
            'sessionToken'=>session('SessionToken')
        ]);
        $id=$db->lastInsertId('user_ticket_info');
        $_SESSION['pageid']=$db->lastInsertId('user_ticket_info');
        return $id;
    }
    public static function update_user_ticket_reservation(){
        global $db;
        $query = $db->prepare("UPDATE user_ticket_info SET pageId=2 WHERE userId=:userId and id=:id ");
        $result= $query->execute([
            'userId'=>session('user_id'),
            'id'=>session('pageid')

        ]);

        return $result;
    }
    public static function update_user_ticket_payment($first_name,$lastname){
        global $db;
        $query = $db->prepare("UPDATE user_ticket_info SET pageId=3,Passengername=:username,Passengersurname=:surname,session_Id=:sessionId,session_Token=:sessionToken,shoppingid=:shoppingId WHERE userId=:userId and id=:id ");
        $result= $query->execute([
            'userId'=>session('user_id'),
            'id'=>session('pageid'),
            'username'=>$first_name,
            'surname'=>$lastname,
            'sessionId'=>session('SessionId'),
            'sessionToken'=>session('SessionToken'),
             'shoppingId'=>session('shoppingId')
        ]);

        return $result;
    }
    public static function update_user_ticket_billign(){
        global $db;
        $query = $db->prepare("UPDATE user_ticket_info SET pageId=4,arrival=:ArrivalAirportName,departure=:DepartureAirportName,pnrNo=:pnr,arrivalDate=:ArrivalDate,departureDate=:DepartureDate,FlightNumber=:FlightNumber,paxCount=:paxcount,ArrivalTime=:ArrivalTime,DepartureTime=:DepartureTime,price=:price,Currency=:Currency,TicketNo=:TicketNo,shoppingid=:shoppingId WHERE userId=:userId and id=:id ");
        $result= $query->execute([
            'userId'=>session('user_id'),
            'id'=>session('pageid'),
            'ArrivalAirportName'=>session('ArrivalAirportName'),
            'DepartureAirportName'=>session('DepartureAirportName'),
            'pnr'=>session('pnr'),
            'ArrivalDate'=>session('ArrivalDate'),
            'DepartureDate'=>session('DepartureDate'),
            'FlightNumber'=>session('FlightNumber'),
            'paxcount'=>session('paxcount'),
            'ArrivalTime'=>session('ArrivalTime'),
            'DepartureTime'=>session('DepartureTime'),
            'price'=>session('price'),
            'Currency'=>session('Currency'),
            'TicketNo'=>session('TicketNo'),
            'shoppingId'=>session('shoppingId')


        ]);
        return $result;
    }
    public static function get_user_ticket(){
        global $db;
        $query = $db->prepare("SELECT * FROM user_ticket_info WHERE userId=:userId and pageId=4 ");
        $query->execute([
            'userId'=>session('user_id'),
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_user_ticket_detail($shoppingid){
        global $db;
        $query = $db->prepare("SELECT * FROM user_ticket_info WHERE userId=:userId  and shoppingid=:shoppingid ");
        $query->execute([
            'userId'=>session('user_id'),
            'shoppingid'=>$shoppingid
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}