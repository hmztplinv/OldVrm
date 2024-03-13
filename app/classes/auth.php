<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//ini_set("display_errors", 0);

class auth
{
    public static function authorization($companyId = "")
    {
        global $db;
        $query = $db->prepare("SELECT * FROM auth WHERE userid=:id");
        $query->execute([
            'id' => session('user_id')
        ]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $auth = [];
        $auth['count'] = count($results);


        foreach ($results as $result) {
            $auth['accountSub']['accountCurrency'] += $result['accountCurrency'];
            $auth['accountSub']['accountTX'] += $result['accountTX'];
            $auth['accountSub']['accountTransfer'] += $result['accountTransfer'];
            $auth['accountSub']['accountPos'] += $result['accountPos'];
            $auth['accountSub']['accountDbs'] += $result['accountDbs'];
            $auth['creditSub']['creditRetail'] += $result['creditRetail'];
            $auth['creditSub']['creditSCF'] += $result['creditSCF'];
            $auth['creditSub']['myCredit'] += $result['myCredit'];
            $auth['salesSub']['salesOpportunities'] += $result['salesOpportunities'];
            $auth['salesSub']['customerCartons'] += $result['customerCartons'];
            $auth['hrSub']['hrEmployeeManagement'] += $result['hrEmployeeManagement'];
            $auth['hrSub']['hrEmployeeShift'] += $result['hrEmployeeShift'];
            $auth['hrSub']['hrEmployeePermission'] += $result['hrEmployeePermission'];
            $auth['hrSub']['hrEmployeePerformance'] += $result['hrEmployeePerformance'];
            $auth['hrSub']['hrEmployeeAcademia'] += $result['hrEmployeeAcademia'];
            $auth['hrSub']['hrEmployeeRecruitment'] += $result['hrEmployeeRecruitment'];
            $auth['administrativeSub']['administrativeBuy'] += $result['administrativeBuy'];
            $auth['administrativeSub']['administrativeCost'] += $result['administrativeCost'];
            $auth['administrativeSub']['administrativeTrip'] += $result['administrativeTrip'];
            $auth['administrativeSub']['administrativeInventory'] += $result['administrativeInventory'];
            $auth['itSub']['ITHelpDesk'] += $result['ITHelpDesk'];
            $auth['itSub']['ITProjectMan'] += $result['ITProjectMan'];
            $auth['itSub']['ITWorkMan'] += $result['ITWorkMan'];
            $auth['complaintSub']['complaint'] += $result['complaintManagement'];
            $auth['travelSub']['gezinomiIndex'] += $result['travelManagement'];
            $auth['travelSub']['ticketSelection'] += $result['travelManagement'];
            $auth['travelSub']['reservation'] += $result['travelManagement'];
            $auth['travelSub']['ozet_bilgiler'] += $result['travelManagement'];
            $auth['travelSub']['ticketPaying'] += $result['travelManagement'];
            $auth['travelSub']['gezinomi_otel_index'] += $result['travelManagement'];
            $auth['travelSub']['otel_ticket_selection'] += $result['travelManagement'];
            $auth['travelSub']['gezinomi_otel_detay'] += $result['travelManagement'];
            $auth['travelSub']['otel_reservation'] += $result['travelManagement'];
            $auth['travelSub']['otel_ticket_paying'] += $result['travelManagement'];
            $auth['travelSub']['rent_a_car_index'] += $result['travelManagement'];
            $auth['travelSub']['car_ticket_selection'] += $result['travelManagement'];
            $auth['travelSub']['rent_a_car_detay'] += $result['travelManagement'];
            $auth['travelSub']['rent_acar_reservation'] += $result['travelManagement'];
            $auth['travelSub']['rent_acar_paying'] += $result['travelManagement'];
            $auth['profileSub']['profile'] += $result['profile'];

            if ($result['accountCurrency'] + $result['accountTX'] + $result['accountTransfer'] + $result['accountPos'] + $result['accountDbs'] == 0) {
                $auth['account'][] = 0;
            } else {
                $auth['account'][] = 1;
            }
            if ($result['creditRetail'] + $result['creditSCF'] + $result['myCredit'] == 0) {
                $auth['credit'][] = 0;
            } else {
                $auth['credit'][] = 1;
            }
            if ($result['customerCartons'] + $result['salesOpportunities'] == 0) {
                $auth['sales'][] = 0;
            } else {
                $auth['sales'][] = 1;
            }
            if ($result['hrEmployeeManagement'] + $result['hrEmployeePermission'] + $result['hrEmployeeShift'] + $result['hrEmployeePerformance'] + $result['hrEmployeeAcademia'] + $result['hrEmployeeRecruitment'] == 0) {
                $auth['hr'][] = 0;
            } else {
                $auth['hr'][] = 1;
            }
            if ($result['administrativeBuy'] + $result['administrativeCost'] + $result['administrativeTrip'] + $result['administrativeInventory'] == 0) {
                $auth['administrative'][] = 0;
            } else {
                $auth['administrative'][] = 1;
            }
            if ($result['ITHelpDesk'] + $result['ITProjectMan'] + $result['ITWorkMan'] == 0) {
                $auth['it'][] = 0;
            } else {
                $auth['it'][] = 1;
            }
            if ($result['gezinomiIndex'] + $result['ticketSelection'] + $result['reservation'] + $result['ozet_bilgiler'] + $result['ticketPaying'] + $result['gezinomi_otel_index']  + $result['otel_ticket_selection'] + $result['gezinomi_otel_detay'] + $result['otel_reservation'] + $result['otel_ticket_paying'] + $result['rent_a_car_index'] + $result['car_ticket_selection']+ $result['rent_a_car_detay']  + $result['rent_acar_reservation']  + $result['rent_acar_paying']  == 0) {
                $auth['travel'][] = 0;
            } else {
                $auth['travel'][] = 1;
            }
            if ($result['complaintManagement'] == 0) {
                $auth['complaint'][] = 0;
            } else {
                $auth['complaint'][] = 1;
            }
            if ($result['profile'] == 0) {
                $auth['profile'][] = 0;
            } else {
                $auth['profile'][] = 1;
            }
        }

//damp($auth);
        return $auth;
    }

    public static function get_auth($user_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM auth WHERE userid=:userid");
        $query->execute([
            'userid' => $user_id
        ]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function get_auth_company($company_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM auth WHERE userid=:userid AND companyid=:companyid");
        $query->execute([
            'userid' => session('user_id'),
            'companyid' => $company_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}
