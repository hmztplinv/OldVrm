<?php

class complaint
{
    public static function get_complaint($factoryId = "",$status="")
    {

        global $db;
        $url = "";
        //WHERE NOT status=0
        if ($factoryId != "" ){

            $url = " WHERE  factoryAuth=".$factoryId." AND authStatus=1";
        }
        if ($status != ""){
            if ($url != ""){

                $url .= " AND status!=0";
            }else{

                $url = "WHERE status!=0";
            }
        }

        $query = $db->prepare("SELECT * FROM complaint ". $url ." and category='Şikayet/Ürün' and companyId=:companyId and productType is not NULL and  createdDate > :year ORDER BY id DESC");
        $query->execute([
            'companyId'=>session('company_id'),
            'year'=>session('complaint_Year')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_suggestion_complaint($factoryId = "",$status="")
    {
        global $db;
        $url = "";
        //WHERE NOT status=0
        if ($factoryId != "" ){
            $url = " WHERE factoryAuth=".$factoryId." AND authStatus=1";
        }
        if ($status != ""){
            if ($url != ""){
                $url .= " AND status!=0";
            }else{
                $url = "WHERE status!=0";
            }
        }
        $query = $db->prepare("SELECT * FROM complaint ". $url ." and companyId=:companyId and  createdDate > :year and category='Öneri' ORDER BY id DESC");
        $query->execute(['companyId'=>session('company_id'),
            'year'=>session('complaint_Year')]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_supply_complaint($factoryId = "",$status="")
    {
        global $db;
        $url = "";
        //WHERE NOT status=0
        if ($factoryId != "" ){
            $url = " WHERE factoryAuth=".$factoryId." AND authStatus=1";
        }
        if ($status != ""){
            if ($url != ""){
                $url .= " AND status!=0";
            }else{
                $url = "WHERE status!=0";
            }
        }
        $query = $db->prepare("SELECT * FROM complaint ". $url ." and companyId=:companyId and category='Şikayet/Tedarik' and  createdDate > :year and productQuantity  is not null  ORDER BY id DESC");
        $query->execute([
            'companyId'=>session('company_id'),
            'year'=>session('complaint_Year')

        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_personel_complaint($factoryId = "",$status="")
    {
        global $db;
        $url = "";
        //WHERE NOT status=0
        if ($factoryId != "" ){
            $url = " WHERE factoryAuth=".$factoryId." AND authStatus=1";
        }
        if ($status != ""){
            if ($url != ""){
                $url .= " AND status!=0";
            }else{
                $url = "WHERE status!=0";
            }
        }
        $query = $db->prepare("SELECT * FROM complaint ". $url ." and companyId=:companyId and category='Şikayet/Personel' ORDER BY id DESC");
        $query->execute(['companyId'=>session('company_id')]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_pic_name($picid)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_file where id=:id");
        $query->execute([
            'id'=>$picid
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['fileName'];
    }
    public static function get_reppic_name($picid)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_report_files where id=:id");
        $query->execute([
            'id'=>$picid
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['fileName'];
    }
    public static function qua_get_accepted_complaint_count()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, COUNT(*) AS acceptedComplaintCount FROM complaint WHERE companyId=:companyId AND status=1 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function qua_get_total_complaint_count()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, COUNT(*) AS acceptedComplaintCount FROM complaint WHERE companyId=:companyId AND status!=0 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function qua_get_total_accepted_first_class()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, SUM(acceptedQuantity) AS acceptedComplaint FROM complaint WHERE productQuality=1 AND companyId=:companyId AND status!=0 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function qua_get_total_accepted_second_class()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, SUM(acceptedQuantity) AS acceptedComplaint FROM complaint WHERE productQuality=2 AND companyId=:companyId AND status!=0 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function qua_get_total_accepted_all_class()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, SUM(acceptedQuantity) AS acceptedQuantity FROM complaint WHERE companyId=:companyId AND status=1 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_total_accepted_domestic()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, COUNT(*) AS acceptedComplaintCount FROM complaint WHERE companyId=:companyId AND status=1 AND market=1 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_total_accepted_abroad()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, COUNT(*) AS acceptedComplaintCount FROM complaint WHERE companyId=:companyId AND status=1 AND market=2 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_total_foreigner_currency($currency)
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, SUM(billAmountUSD) AS usd, SUM(billAmount) AS try, SUM(billAmountEuro) AS euro FROM complaint WHERE currency=:currency and companyId=:companyId AND status=1 AND market=2 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id'),
            'currency'=>$currency
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_total_domestic_spent()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, SUM(billAmount) AS try FROM complaint WHERE currency=1 and companyId=:companyId AND status=1 AND market=1 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_total_local_currency()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, SUM(billAmount) AS try FROM complaint WHERE companyId=:companyId AND status=1 AND market=2 GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_total_payment()
    {
        global $db;
        $query = $db->prepare("SELECT YEAR(createdDate) AS yil, SUM(billAmount) AS try FROM complaint WHERE companyId=:companyId AND status=1  GROUP BY YEAR(createdDate);");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add_expert_reports($report)
    {
        global $db;
        $query = $db->prepare("INSERT INTO complaint_expert_reports SET user_id=:user_id,complaint_id=:complaint_id,message=:message,reportType=:report_type");
        $query->execute($report);
        return $db->lastInsertId();
    }
    public static function update_sealeravaible($id,$sealeravaible)
    {
        global $db;
        $query = $db->prepare("UPDATE complaint SET sealeravaible=:sealeravaible where id=:id");
        $query->execute([
            'id'=>$id,
            'sealeravaible'=>$sealeravaible
        ]);
    }
    public static function auth_mail_sent($complaintid)
    {
        global $db;
        $query = $db->prepare("update complaint set authmailsent=1 where id=:complaintId");
        $query->execute([
            'complaintId'=>$complaintid
        ]);
    }
    public static function complaint_owner_mail_sent($complaintid)
    {
        global $db;
        $query = $db->prepare("update complaint set complaintownermailsent=1 where id=:complaintId");
        $query->execute([
            'complaintId'=>$complaintid
        ]);
    }
    public static function complaintduration_exist($complaintid)
    {
        global $db;
        $query = $db->prepare("SELECT complaintDuration FROM `complaint` WHERE id=:complaintId");
        $query->execute([
            'complaintId'=>$complaintid
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function update_complaintduration($complaintid)
    {
        global $db;
        $query = $db->prepare("update complaint set complaintDuration=TIMESTAMPDIFF(day,createdDate,updatedDate) where id=:complaintId");
        $query->execute([
            'complaintId'=>$complaintid
        ]);
    }




    public static function get_expert_reports($complaint_type,$complaint_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_expert_reports WHERE complaint_id=:cid AND reportType=:rtype ORDER BY created_at DESC");
        $query->execute([
            'cid' => $complaint_id,
            'rtype' => $complaint_type
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get_report_files($report_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_report_files WHERE complaintID=:cid");
        $query->execute([
            'cid' => $report_id
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get_report_file_count($report_id)
    {
        global $db;
        $query = $db->prepare("SELECT COUNT(fileName) FROM complaint_report_files WHERE complaintID=:cid");
        $query->execute([
            'cid' => $report_id
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get_complaint_by_id($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaint WHERE id=:id");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_detailcomplaint_by_id($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_detail WHERE id=:id");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function detail_exist($complaintId)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_detail WHERE complaintID=:complaint");
        $query->execute([
            'complaint' => $complaintId
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function categoryCount()
    {
        global $db;
        $query = $db->prepare("SELECT category,count(category) as categoryCount FROM `complaint` where companyId=:companyId and status!=0 and createdDate > :year GROUP BY category");
        $query->execute([
            'companyId'=>session('company_id'),
            'year'=>session('complaint_Year')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get_product_name($productType, $productId)
    {
        global $db;
        $query = $db->prepare("SELECT tablename FROM complaintproducttype WHERE id=:id");
        $query->execute([
            'id' => intval($productType)
        ]);
        $tablename = $query->fetch(PDO::FETCH_ASSOC)['tablename'];

        $query = $db->prepare("SELECT * FROM " . $tablename . " WHERE id=:id");
        $query->execute([
            'id' => $productId
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public static function get_products_by_producttype($productType){
        global $db;
        $query = $db->prepare("SELECT tablename FROM complaintproducttype WHERE id=:id");
        $query->execute([
            'id' => intval($productType)
        ]);
        $tablename = $query->fetch(PDO::FETCH_ASSOC)['tablename'];

        $query = $db->prepare("SELECT * FROM " . $tablename);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_complaints_by_authfactoryid($id){
        global $db;
        $query = $db->prepare("SELECT * FROM `last_year_total_complaint_by_factory` where companyId=:companyId and factoryAuth=:id order by totalComplaint desc");
        $query->execute([
            'id' => $id,
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_complaints_sum_by_authfactoryid($id){
        global $db;
        $query = $db->prepare("SELECT SUM(complaintCount) as complaintCount,SUM(totalComplaint) as totalComplaint,SUM(acceptedComplaint) as acceptedComplaint,SUM(rejectedComplaint) as rejectedComplaint FROM `last_year_total_complaint_by_factory` where companyId=:companyId AND factoryAuth=:id");
        $query->execute([
            'id' => $id,
            'companyId'=>session('company_id')
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function set_technical_confirm($complaint_id,$confirm){
        global $db;
        $query = $db->prepare("UPDATE complaint SET technicalConfirm=:confirm WHERE id=:id");
        $result = $query->execute([
            'id' => $complaint_id,
            'confirm' => $confirm
        ]);
        if ($result){
            if ($confirm == 1){
                echo "Rapor belgesi başarıyla imzalanmıştır.";
            }else{
                echo "Rapor belgesinin imzası başarıyla silinmiştir.";
            }
        }
    }
    public static function set_process_confirm($complaint_id,$confirm){
        global $db;
        $query = $db->prepare("UPDATE complaint SET processConfirm=:confirm WHERE id=:id");
        $result = $query->execute([
            'id' => $complaint_id,
            'confirm' => $confirm
        ]);
        if ($result){
            if ($confirm == 1){
                echo "Rapor belgesi başarıyla imzalanmıştır.";
            }else{
                echo "Rapor belgesinin imzası başarıyla silinmiştir.";
            }
        }
    }
    public static function set_factory_confirm($complaint_id,$confirm){
        global $db;
        $query = $db->prepare("UPDATE complaint SET factoryConfirm=:confirm WHERE id=:id");
        $result = $query->execute([
            'id' => $complaint_id,
            'confirm' => $confirm
        ]);
        if ($result){
            if ($confirm == 1){
                echo "Rapor belgesi başarıyla imzalanmıştır.";
            }else{
                echo "Rapor belgesinin imzası başarıyla silinmiştir.";
            }
        }
    }
    public static function set_technology_confirm($complaint_id,$confirm){
        global $db;
        $query = $db->prepare("UPDATE complaint SET technologyConfirm=:confirm WHERE id=:id");
        $result = $query->execute([
            'id' => $complaint_id,
            'confirm' => $confirm
        ]);
        if ($result){
            if ($confirm == 1){
                echo "Rapor belgesi başarıyla imzalanmıştır.";
            }else{
                echo "Rapor belgesinin imzası başarıyla silinmiştir.";
            }
        }
    }
    public static function update_complaint_status($complaintid,$status){
        global $db;
        $query = $db->prepare("UPDATE complaint SET status=:status WHERE id=:id");
        $result = $query->execute([
            'id' => $complaintid,
            'status' => $status
        ]);
    }

    public static function get_categories_name($id)
    {
        global $db;
        $query = $db->prepare("SELECT complaintname FROM complaintcategories WHERE id=:id");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['complaintname'];
    }

    public static function get_product_type()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaintproducttype ORDER BY id ASC  ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_yearly_total_complaint_by_factory()
    {
        $bugun = $_SESSION['complaint_Year'] . '-01-01';

        global $db;
        $query = $db->prepare("SELECT 
        verim.complaint.market AS market, 
        verim.complaint.factoryAuth AS factoryAuth,
        verim.complaint_factories.factoryName AS factoryName, 
        verim.complaintcategories.complaintname AS complaintname,
        COUNT(verim.complaintcategories.complaintname) AS complaintCount, 
        SUM(verim.complaint.productQuantity) AS totalComplaint, 
        SUM(verim.complaint.acceptedQuantity) AS acceptedComplaint, 
        SUM(verim.complaint.productQuantity) - SUM(verim.complaint.acceptedQuantity) AS rejectedComplaint,
        verim.complaint.companyId AS companyId
    FROM 
        verim.complaint
    JOIN 
        verim.complaintcategories ON verim.complaint.complaintType = verim.complaintcategories.id
    JOIN 
        verim.complaint_factories ON verim.complaint.factoryAuth = verim.complaint_factories.factoryCode
    WHERE 
        CAST(verim.complaint.createdDate AS DATE) BETWEEN :bugun AND CURRENT_TIMESTAMP
        AND verim.complaint.status = 1 
        AND verim.complaint.category = 'Şikayet/Ürün' 
        AND verim.complaint.productQuantity IS NOT NULL
        AND verim.complaint.companyId = :companyId
    AND verim.complaint_factories.companyId= :companyId
    GROUP BY 
        verim.complaint_factories.factoryName, verim.complaintcategories.complaintname
    ORDER BY 
        totalComplaint DESC;
WHERE   companyId=:companyId");

        $query->execute([
            'bugun' => $bugun,
            'companyId' => session('company_id'),
        ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get_yearly_total_complaint_by_factory_new()
    {
        global $db;
        $query = $db->prepare("SELECT
	C.market,
    C.factoryAuth,
    CF.factoryName,
    CC.complaintname,
    SUM(C.productQuantity) AS totalComplaint,
    SUM(C.acceptedQuantity) AS acceptedComplaint,
    SUM(C.productQuantity) - SUM(C.acceptedQuantity) AS rejectedComplaint,
    COUNT(C.name) AS complaintCount,
    C.companyId
FROM
    complaint C
LEFT JOIN
    complaintcategories CC ON CC.id = C.complaintType
LEFT JOIN
    complaint_factories CF ON C.factoryAuth = CF.id
WHERE
    C.status != 0
    AND C.companyId = :companyId
    AND C.category = 'Şikayet/Ürün'
    AND C.productType IS NOT NULL
    AND C.createdDate > CURDATE() - INTERVAL 1 YEAR
GROUP BY
    CF.factoryName,
    CC.complaintname  
ORDER BY `complaintCount` DESC");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get_product_table($type_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaintproducttype WHERE id=:id");
        $query->execute([
            'id' => $type_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['tablename'];
    }
    public static function update_complaint($complaint,$detail){

        global $db;
        $query = $db->prepare("UPDATE complaint SET updatedDate=:updatedDate,email=:customerEmail,market=:market,phone=:customerPhone,name=:customerName,surname=:customerSurname,document_type=:document_type,otherdealer=:otherDealer,subdealer=:subDealer,address=:address,status=:activePassive,category=:complaintType,productType=:productType,
                                     sealer=:sealer,productSize=:productSize,productName=:productName,productColor=:productColor,complaintType=:complaintSubject,productQuality=:productQuality,
                                     productQuantity=:metraj,quantityType=:quantityType,acceptedQuantity=:acceptedQuantity,message=:productdesc,closingDate=:endDate,complatedType=:complatedType WHERE id=:id");
        $update = $query->execute($complaint);
        $updateDetail = true;

        if (isset($detail)){
            $query = $db->prepare("UPDATE complaint_detail SET productApply=:productApply,productBoxDetail=:productboxdetail,productionDate=:productiondate,
                                        productionCalibre=:productcalibre,productColorNumber=:productcolornumber,productShipmentDate=:productshipmentdate,
                                        productApplyQuestion=:productapplyques WHERE complaintID=:id");
            $updateDetail = $query->execute($detail);
        }
        if ($update && $updateDetail){
            return true;
        }
    }

    public static function update_bill($bill){
        global $db;
        $query = $db->prepare("UPDATE complaint SET currency=:currency,billAmount=:billAmount , billAmountUSD=:billAmountUSD, billAmountEuro=:billAmountEuro ,billAmountGBP=:billAmountGBP, billNumber=:billNumber, billDesc=:billDesc WHERE id=:id");

        $res=$query->execute($bill);
        if ($res!=NULL){
            return 1;
        }else{
            return 0;
        }
    }
    public static function complate_complaint($complaint){
        global $db;
        $query = $db->prepare("UPDATE complaint SET status=:status,closingDate=:closingDate WHERE id=:id");
        return $query->execute($complaint);


    }
    public static function reset_auth_persons_status($complaintid)
    {
        global $db;
        $query = $db->prepare("UPDATE authpersons SET status=0 WHERE complaintId=:id");
        return $query->execute([
            'id' => $complaintid
        ]);
    }
        public static function auth_persons_exist($complaintid,$id){
            global $db;
            $query = $db->prepare("SELECT * FROM authpersons where complaintId=:complaintid and authPersonId=:id ");
            $query->execute([
                'complaintid'=>$complaintid,
                'id'=>$id
            ]);
            return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function  update_auth_person_status($complaintid,$id)
    {
        global $db;
        $query = $db->prepare("UPDATE authpersons SET status=1 WHERE complaintId=:complaintid and authPersonId=:id");
        return $query->execute([
            'complaintid'=>$complaintid,
            'id'=>$id
        ]);
    }
    public static function set_authpersons($complaintid,$authperson)
    {
        global $db;
        $query = $db->prepare("INSERT INTO authpersons(complaintId,authPersonId,status) values(:complaintid,:authPersonId,1)");
        return $query->execute([
            'complaintid'=>$complaintid,
            'authPersonId'=>$authperson
        ]);
    }
    public static function get_status(){
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_status ORDER BY sort ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_status_name($status){
        global $db;
        $query = $db->prepare("SELECT status FROM complaint_status WHERE id=:id");
        $query->execute([
            'id' => $status
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['status'];
    }
    public static function get_mail_info($companyid){
        global $db;
        $query = $db->prepare("SELECT * FROM companies_mail where companyId=:companyId");
        $query->execute([
            'companyId' => $companyid
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function get_size_by_type()
    {
        global $db;
        $query = $db->prepare("SELECT sizes FROM complaintseramikproducts");
        $query->execute();
        $sizes = $query->fetchAll(PDO::FETCH_ASSOC);
        $tempArray = [];
        $sizeArray = [];
        foreach ($sizes as $size) {
            $tempArray[] = explode("cm", $size['sizes']);
        }
        foreach ($tempArray as $key => $values) {
            foreach ($values as $value) {
                if (!in_array($value, $sizeArray) && $value != "") {
                    $value = trim($value, ", ");
                    $sizeArray[] = $value;
                }
            }
        }
        $sizeArray = array_unique($sizeArray);
        $sizeArray = array_values($sizeArray);
        sort($sizeArray);
        return $sizeArray;
    }

    public static function get_color_by_name($id)
    {
        global $db;
        $query = $db->prepare("SELECT colors FROM complaintseramikproducts WHERE id=:id");
        $query->execute([
            'id' => $id
        ]);
        $colors = $query->fetch(PDO::FETCH_ASSOC)['colors'];
        $colorArray = explode(",", $colors);
        for ($i = 0; $i < count($colorArray); $i++) {
            $colorArray[$i] = ltrim($colorArray[$i], " ");
        }
        $colorArray = array_unique($colorArray);
        $colorArray = array_values($colorArray);
        return $colorArray;

    }

    public static function get_type($type_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaintproducttype WHERE id=:id");
        $query->execute([
            'id' => $type_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function get_products_by_type($type_id)
    {
        $type = self::get_type($type_id);
        global $db;
        $query = $db->prepare("SELECT name,id FROM " . $type['tablename'] . " group by name ORDER BY name ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get_complaint_type()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaintcategories  where id<21 ORDER BY complaintname ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_complaint_type_for_authorize()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaintcategories ORDER BY complaintname ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_complaint_type_by_id($id){
        global $db;
        $query = $db->prepare("SELECT complaintname FROM complaintcategories WHERE id=:id");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['complaintname'];
    }

    public static function get_reporting_reports($complaint_id,$report_type){

        global $db;
        $query = $db->prepare("SELECT * FROM complaint_expert_reports WHERE complaint_id=:complaint_id AND reporting=:reporting AND reportType=:reportType");
        $query->execute([
            'complaint_id' => $complaint_id,
            'reporting' => 1,
            'reportType' => $report_type
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function set_complaint($complaint)
    {
        global $db;
        $query = $db->prepare("INSERT INTO complaint SET province=:province,district=:district,name=:name,surname=:surname,phone=:phone,email=:email,
                                  category=:category,productType=:productType,sealer=:sealer,productSize=:productSize,productName=:productName,
                                  productColor=:productColor,complaintType=:complaintType,productQuality=:productQuality,productQuantity=:productQuantity,
                                  proposalSection=:proposalSection,personalEventDate=:personalEventDate,personalEventTime=:personalEventTime,message=:msg,address=:address,companyId=:companyId");
        $query->execute($complaint);
        return $db->lastInsertId();
    }
	   public static function set_complaint_admin($complaint)
    {
        global $db;
        $query = $db->prepare("INSERT INTO complaint SET province=:province,district=:district,name=:name,surname=:surname,phone=:phone,email=:email,
                                  category=:category,productType=:productType,sealer=:sealer,productSize=:productSize,productName=:productName,
                                  productColor=:productColor,complaintType=:complaintType,productQuality=:productQuality,productQuantity=:productQuantity,
                                  proposalSection=:proposalSection,personalEventDate=:personalEventDate,personalEventTime=:personalEventTime,message=:msg,address=:address,companyId=:companyId,created_by=:created_by");
        $query->execute($complaint);
        return $db->lastInsertId();
    }

    public static function get_authpersons_email($complaintid)
    {
        global $db;
        $query = $db->prepare("SELECT authorized_mail.authorizedMail,authpersons.status,authpersons.authPersonId FROM `authpersons` authpersons inner join authorized_mail authorized_mail on authorized_mail.id=authpersons.authPersonId where complaintId=:complaintid and status=1");
        $query->execute([
            'complaintid'=>$complaintid
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function set_detail($detail)
    {
        global $db;
        $query = $db->prepare("INSERT INTO complaint_detail SET complaintID=:complaintID,productApply=:productApply,applyDesc=:applyDesc,productBoxDetail=:productBoxDetail,productionDate=:productionDate,
                                 productionCalibre=:productionCalibre,productColorNumber=:productColorNumber,productShipmentDate=:productShipmentDate,productApplyQuestion=:productApplyQuestion");
        $query->execute($detail);
        return $db->lastInsertId();
    }
    public static function set_detail_with_default($compalintid)
    {
        global $db;
        $query = $db->prepare("INSERT INTO complaint_detail SET complaintID=:complaintID");
        $query->execute([
            'complaintID'=>$compalintid
        ]);
    }
    public static function get_pictures($complaint_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_file WHERE complaintID=:cid");
        $query->execute([
            'cid' => $complaint_id
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
}

    public static function complaint_details_exist($complaint_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_detail WHERE complaintID=:cid");
        $query->execute([
            'cid' => $complaint_id
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function set_reporting($reporting,$reportId){
        global $db;
        $query = $db->prepare("UPDATE complaint_expert_reports SET reporting=:reporting WHERE id=:id");
        return $query->execute([
            'reporting' => $reporting == 0 ? 1 : 0,
            'id' => $reportId
        ]);
    }
    public static function get_factories(){
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_factories WHERE companyId=:companyId and status=1");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_factory_name_by_user_id(){
        global $db;
        $query = $db->prepare("SELECT factoryName FROM complaint_factories complaint_factories inner join users users on complaint_factories.factoryCode=users.complaintFactory where users.id=:userId");
        $query->execute([
            'userId'=>session('user_id')
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_factory_name($factory_id){
        global $db;
        $query = $db->prepare("SELECT factoryName FROM complaint_factories where factoryCode=:fAuth");
        $query->execute([
            'fAuth' => $factory_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function update_factory_auth($factory){
        global $db;
        $query = $db->prepare("UPDATE complaint SET factoryAuth=:factory,authStatus=:status WHERE id=:id");
        return $query->execute($factory);

    }
    public static function cancel_auth($complaint_id){
        global $db;
        $query = $db->prepare("UPDATE complaint SET authStatus=0 WHERE id=:id");
        return $query->execute([
            'id' => $complaint_id
        ]);
    }

    public static function update_person_auth($auth_person, $id){
        global $db;
        $query = $db->prepare("UPDATE complaint SET auth_person=:person,personStatus=1 WHERE id=:id");
        return $query->execute([
            'person'=>$auth_person,
            'id'=>$id
            ]);
    }

    public static function cancel_person($complaint_id){
        global $db;
        $query = $db->prepare("UPDATE complaint SET personStatus=0 WHERE id=:id");
        return $query->execute([
            'id' => $complaint_id
        ]);
    }
    public static function get_document_type(){
        global $db;
        $query = $db->prepare("SELECT * FROM complaint_document_type");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_company_id_by_complaint_id($id){
        global $db;
        $query = $db->prepare("SELECT companyId FROM complaint WHERE id=:id");
        $query->execute([
            'id'=>$id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_documentName_by_id($id){
        global $db;
        $query = $db->prepare("SELECT documentNo FROM complaint_document_type where id=:id");
        $query->execute([
            'id'=>$id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_document_name($document_id){
        global $db;
        $query = $db->prepare("SELECT documentNo FROM complaint_document_type WHERE id=:id");
        $query->execute([
            'id' => $document_id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['documentNo'];
    }
    public static function get_accepted_quantity($factoryAuth = ""){
        global $db;
        if ($factoryAuth == "") {

            $query = $db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE companyId=:companyId and status!=0 and category='Şikayet/Ürün' and productQuantity is not NULL");
            $query->execute([
                'companyId'=>session('company_id')
            ]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        }else{
            $query = $db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE companyId=:companyId AND status!=0 AND factoryAuth=:factoryAuth AND authStatus=1 and category='Şikayet/Ürün and productQuantity is not NULL'");
            $query->execute([
                'factoryAuth' => $factoryAuth,
                'companyId'=>session('company_id')
            ]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        }
        return $result['kabul'];
    }
    public static function get_accepted_quantity_by_market($factoryAuth='',$market){
        global $db;

        if ($factoryAuth==''){
            $query = $db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE companyId=:companyId AND status!=0 and market=:market and category='Şikayet/Ürün' and productQuantity is not NULL");
            $query->execute([
                'market'=>$market,
                'companyId'=>session('company_id')
            ]);
        }
        else{
            $query = $db->prepare("SELECT SUM(acceptedQuantity) AS kabul FROM complaint WHERE companyId=:companyId AND status!=0 and factoryAuth=:factoryAuth and market=:market and category='Şikayet/Ürün' and productQuantity is not NULL");
            $query->execute([
                'market'=>$market,
                'factoryAuth' => $factoryAuth,
                'companyId'=>session('company_id')
            ]);
        }
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['kabul'];
    }
    public static function get_total_quantity_by_market($factoryAuth='',$market){
        global $db;
        if($factoryAuth==''){
            $query = $db->prepare("SELECT SUM(productQuantity) AS toplam FROM complaint WHERE companyId=:companyId AND status!=0 AND market=:market and authStatus=1 and category='Şikayet/Ürün' and productQuantity is not NULL");
            $query->execute([
                'market'=>$market,
                'companyId'=>session('company_id')
            ]);
        }
        else{
            $query = $db->prepare("SELECT SUM(productQuantity) AS toplam FROM complaint WHERE companyId=:companyId AND status!=0 AND factoryAuth=:factoryAuth AND market=:market and authStatus=1 and category='Şikayet/Ürün' and productQuantity is not NULL");
            $query->execute([
                'market'=>$market,
                'factoryAuth' => $factoryAuth,
                'companyId'=>session('company_id')
            ]);
        }
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['toplam'];
    }
    public static function get_total_quantity($factoryAuth = ""){
        global $db;
        if ($factoryAuth == "") {

            $query = $db->prepare("SELECT SUM(productQuantity) AS toplam FROM complaint WHERE companyId=:companyId AND  status!=0 and category='Şikayet/Ürün' and productQuantity is not NULL");
            $query->execute([
                'companyId'=>session('company_id')
            ]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        }else{
            $query = $db->prepare("SELECT SUM(productQuantity) AS toplam FROM complaint WHERE companyId=:companyId AND status!=0 AND factoryAuth=:factoryAuth AND authStatus=1 and category='Şikayet/Ürün' and productQuantity is not NULL");
            $query->execute([
                'factoryAuth' => $factoryAuth,
                'companyId'=>session('company_id')
            ]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        }
        return $result['toplam'];
    }
    public static function get_factory_name_by_factory_id($id){
        global $db;
        $query = $db->prepare('SELECT factoryName FROM complaint_factories where factoryCode=:factoryAuth');
        $query->execute([
            'factoryAuth'=>$id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['factoryName'];
    }

    public static function complaint_categories_with_quantity_for_auth($authid){
        global $db;
        $query = $db->prepare('SELECT complaintcategories.complaintname,COUNT(complaintcategories.complaintname) as complaintCount, ROUND(SUM(complaint.productQuantity),2) as complaintSum, ROUND(SUM(complaint.billAmount),2) as billSum , ROUND(SUM(complaint.billAmountUSD),2) as billSumUSD , ROUND(SUM(complaint.billAmountEuro),2) as billSumEuro   FROM `complaintcategories` complaintcategories inner join complaint complaint on complaintcategories.id=complaint.complaintType where complaint.companyId=:companyId AND complaint.status!=0 AND complaint.createdDate > :year and  complaint.factoryAuth=:factoryAuth and productQuantity is not NULL group by complaintcategories.complaintname');
        $query->execute([
            'factoryAuth'=>$authid,
            'companyId'=>session('company_id'),
            'year'=>session('complaint_Year')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function complaint_categories_with_quantity_for_admin(){
        global $db;
        $query = $db->prepare("SELECT complaintcategories.complaintname,COUNT(complaintcategories.complaintname) as complaintCount, ROUND(SUM(complaint.productQuantity),2) as complaintSum, ROUND(SUM(complaint.billAmount),2) as billSum, ROUND(SUM(complaint.billAmountUSD),2) as billSumUSD , ROUND(SUM(complaint.billAmountEuro),2) as billSumEuro   FROM `complaintcategories` complaintcategories inner join complaint complaint on complaintcategories.id=complaint.complaintType where complaint.companyId=:companyId AND complaint.createdDate > :year AND complaint.status!=0 and category='Şikayet/Ürün' and productQuantity is not NULL group by complaintcategories.complaintname");
        $query->execute([
            'companyId'=>session('company_id'),
            'year'=>session('complaint_Year')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function complaint_report(){
        global $db;
        $query = $db->prepare("SELECT round(avg(complaintDuration),2) AS avarageDuration,count(DATEDIFF(updatedDate,createdDate)) AS complaintDoneCount from `complaint` where companyId=:companyId AND market=1 AND status=1 and  createdDate > :year ");
        $query->execute([
            'companyId'=>session('company_id'),
            'year'=>session('complaint_Year')
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function survey_results($complaint){
        global $db;

        $query = $db->prepare("SELECT * FROM surveys WHERE complaintID=:cid");
        $query->execute([
                'cid' =>    $complaint
            ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function sum_survey($complaint){
        global $db;
        $query = $db->prepare("SELECT sum_survey FROM surveys WHERE companyId=:companyId AND complaintID=:cid");
        $query->execute([
            'cid' => $complaint,
            'companyId'=>session('company_id')
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function get_sum_surveys(){
        global $db;
        $query = $db->prepare("SELECT sum_survey FROM surveys where companyId=:companyId ");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_survey_count(){
        global $db;
        $query = $db->prepare("SELECT count(*) as total from surveys where companyId=:companyId and  created_at > :year ");
        $query->execute([
            'companyId'=>session('company_id'),
            'year'=>session('complaint_Year')
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function complaint_passive($complaint){
        global $db;
        $query = $db->prepare("UPDATE complaint SET status=:status WHERE id=:id");
        $query->execute([
            'status' => 0,
            'id' => $complaint
        ]);
    }
    public static function get_production_date($id){
        global $db;
        $query = $db->prepare("SELECT productionDate FROM complaint_detail WHERE complaintID=:cid");
        $query->execute([
            'cid' => $id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['productionDate'];
    }
    public static function get_producttypes($productType){
        global $db;
        $query = $db->prepare("SELECT producttype FROM complaintproducttype WHERE id=:cid");
        $query->execute([

            'cid'=> $productType
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['producttype'];

    }
    public static function get_colorcode($productColor){
        global $db;
        $query = $db->prepare("SELECT productColor FROM complaint WHERE id=:cid");
        $query->execute([
            'cid'=> $productColor
        ]);
        return $query->fetch(PDO::FETCH_ASSOC)['productColor'];

    }
    public static function get_user_name(){
        global $db;
        $query = $db->prepare("SELECT username FROM users ");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC)['username'];
    }
    public static function get_this_month_total_complaint()
    {
        $bugun = date("Y-m-d");
        $ayin_ilk_gunu = date("Y-m-01");
        global $db;
        $query = $db->prepare(" SELECT
    c.market AS market,
    c.factoryAuth AS factoryAuth,
    cf.factoryName AS factoryName,
    cc.complaintname AS complaintname,
    COUNT(cc.complaintname) AS complaintCount,
    SUM(c.productQuantity) AS totalComplaint,
    SUM(c.acceptedQuantity) AS acceptedComplaint,
    SUM(c.productQuantity) - SUM(c.acceptedQuantity) AS rejectedComplaint,
    c.companyId AS companyId
FROM
    verim.complaint c
JOIN
    verim.complaintcategories cc ON c.complaintType = cc.id
JOIN
    verim.complaint_factories cf ON c.factoryAuth = cf.factoryCode
WHERE
  verim.c.companyId=:companyId and 
  verim.cf.companyId=:companyId and
   c.createdDate BETWEEN '$ayin_ilk_gunu 00:00:00' AND '$bugun 23:59:59'
     AND c.status = 1 
  AND c.category = 'Şikayet/Ürün' 
  AND c.productQuantity IS NOT NULL 
GROUP BY cf.factoryName, cc.complaintname;
   ");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_last_month_total_complaint()
    {
        global $db;
        $query = $db->prepare(" SELECT c.market AS market, c.factoryAuth AS factoryAuth, cf.factoryName AS factoryName, cc.complaintname AS complaintname,
       COUNT(cc.complaintname) AS complaintCount, SUM(c.productQuantity) AS totalComplaint, 
       SUM(c.acceptedQuantity) AS acceptedComplaint, SUM(c.productQuantity) - SUM(c.acceptedQuantity) AS rejectedComplaint,
       c.companyId AS companyId
FROM verim.complaint c
JOIN verim.complaintcategories cc ON c.complaintType = cc.id
JOIN verim.complaint_factories cf ON c.factoryAuth = cf.factoryCode
WHERE
      verim.c.companyId=:companyId and
    c.createdDate > CURDATE() - INTERVAL 2 MONTH 
  AND c.createdDate < CURDATE() - INTERVAL 1 MONTH 
  AND c.status = 1 
  AND c.category = 'Şikayet/Ürün' 
  AND c.productQuantity IS NOT NULL
  
GROUP BY cf.factoryName, cc.complaintname;

  order by totalComplaint desc");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_persons(){
        global $db;
        $query = $db->prepare("SELECT * FROM authorized_mail WHERE companyId=:companyId");
        $query->execute([
            'companyId'=>session('company_id')
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_average_surveys(){
        global $db;
        $query = $db->prepare("SELECT AVG(sum_survey) as total FROM surveys WHERE companyId=:companyId and created_at > :year");
        $query->execute([
            'companyId'=>session('company_id'),
            'year'=>session('complaint_Year')
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }


}
