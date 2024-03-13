<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
class bienmutlu
{
    public static function Erp_Stock(){


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://212.175.89.13/Erp/Stock',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'username: caniasuserapi',
                'password: Z~pvK0Se'
            )
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);

    }
    public static function get_bien_products(){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://212.175.89.13/Erp/BienProduct',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'username: caniasuserapi',
                'password: Z~pvK0Se'
            )
        ));
        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);

        $types = [];
        foreach ($response as $res){
            if (!in_array($res->mattype,$types)){
                $types[] = $res->mattype;
            }
        }

        global $db;

        foreach ($response as $res){
            if ($res->mattype == "Seramik Ürünleri"){
                $query = $db->prepare("INSERT INTO complaintseramikproducts SET productCode=:code,name=:name,sizes=:sizes,colors=:colors");
                $query->execute([
                    'code' => $res->material,
                    'name' => $res->materialName,
                    'sizes' => $res->size,
                    'colors' => str_replace('/',',',$res->color)
                ]);
            }
            if ($res->mattype == "Seramik Sağlık Gereçleri"){
                $query = $db->prepare("INSERT INTO complaintssgproducts SET productCode=:code,name=:name");
                $query->execute([
                    'code' => $res->material,
                    'name' => $res->materialName
                ]);
            }
            if ($res->mattype == "Armatur"){
                $query = $db->prepare("INSERT INTO complaintarmaturproducts SET productCode=:code,name=:name,color=:color");
                $query->execute([
                    'code' => $res->material,
                    'name' => $res->materialName,
                    'color' => str_replace('/',',',$res->color)
                ]);
            }
            if ($res->mattype == "Gomme Rezervuar"){
                $query = $db->prepare("INSERT INTO complaintrezervuarproducts SET productcode=:code,name=:name");
                $query->execute([
                    'code' => $res->material,
                    'name' => $res->materialName
                ]);
            }
            if ($res->mattype == "Klozet Kapak"){
                $query = $db->prepare("INSERT INTO complaintdusproducts SET productcode=:code,name=:name");
                $query->execute([
                    'code' => $res->material,
                    'name' => $res->materialName
                ]);
            }

        }
    }
    public static function get_bien_plant(){
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt_array($curl,[
            CURLOPT_URL => 'https://212.175.89.13/Erp/GetBienContact',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'username: caniasuserapi',
                'password: Z~pvK0Se'
            )
        ]);
        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);
        global $db;

        foreach ($response as $res){
            $query = $db->prepare("INSERT INTO bienplant SET plantName=:plantName,plantCity=:plantCity,plantProvince=:plantProvince");
            $query->execute([
                'plantName' => $res->name,
                'plantCity' => $res->city,
                'plantProvince' => $res->district
            ]);
        }

    }
    public static function set_products(){
        global $db;
        $drop = $db->prepare("TRUNCATE TABLE bienproducts");
        $drop->execute();
        $products = self::Erp_Stock();
       // damp($products);
        $add = [];
        $addProduct = [];
        foreach ($products as $product){

            if ($product->companyCode  == "01"){
                $add['productName'][] = $product->productName;
                $add['genus'][] = $product->genus;
                $add['size'][] = $product->size;
                $add['series'][] = $product->series;
                $add['quality'][] = $product->quality;
            }
        }
            for ($i=0;$i<count($add['productName']);$i++){
                $query = $db->prepare("INSERT INTO bienproducts SET productName=:productName,genus=:genus,size=:size,series=:series,quality=:quality");
                $query->execute([
                    'productName' => $add['productName'][$i],
                    'genus' => $add['genus'][$i],
                    'size' => $add['size'][$i],
                    'series' => $add['series'][$i],
                    'quality' => $add['quality'][$i]
                ]);
            }
    }
    public static function get_plants(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.bienseramik.com.tr/satis-noktalari',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        preg_match('/<select (.*?)<\/select>/s',$response,$matches);
        $cities = strstr($matches[1],'option',false);
        preg_match_all('/<option value="(.*?)"/',$cities,$cities);
        //damp($cities[1]);
        foreach ($cities[1] as $city){
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://www.bienseramik.com.tr/satis-noktalari/'.$city,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);
		 
            curl_close($curl);
           // damp($response);
            preg_match_all('/<tr>(.*?)<\/tr>/s',$response,$match);
            for($i=0;$i<count($match[1]);$i++){
                preg_match_all('/<td>(.*?)<\/td>/s',$match[1][$i],$plantName);
                self::set_plants([
                    'plantName' => $plantName[1][0],
                    'plantCity' => explode('/',$plantName[1][1])[count(explode('/',$plantName[1][1]))-1],
                    'plantProvince' => explode('/',$plantName[1][1])[count(explode('/',$plantName[1][1]))-2],
                    'plantAdress' => $plantName[1][1]
                ]);
            }
        }
    }
    public static function set_plants($plant){
        global $db;
        $query = $db->prepare("INSERT INTO bienplant SET plantName=:plantName,plantCity=:plantCity,plantProvince=:plantProvince,plantAdress=:plantAdress");
        $query->execute($plant);

    }
    public static function get_genuses(){
        global $db;
        $query = $db->prepare("SELECT DISTINCT genus FROM bienproducts ");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function get_cities(){
        global $db;
        $query = $db->prepare("SELECT * FROM bienplant ORDER BY sort DESC,plantname ASC");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function get_sizes(){
        global $db;
        $query = $db->prepare("SELECT DISTINCT size FROM bienproducts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_products($size){
        global $db;
        $query = $db->prepare("SELECT * FROM complaintseramikproducts WHERE sizes LIKE '%" . $size . "%'");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}