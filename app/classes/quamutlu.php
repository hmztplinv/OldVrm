<?php

class quamutlu
{
    public static function get_sizes(){
        global $db;
        $query = $db->prepare("SELECT DISTINCT size FROM quaproducts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_all_products(){
        global $db;
        $query = $db->prepare("SELECT * FROM quaproducts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get_longsizes(){
        global $db;
        $query = $db->prepare("SELECT DISTINCT longsize FROM quaproducts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
   public static function get_size_by_type()
    {
        global $db;
        $query = $db->prepare("SELECT   longsize FROM quaproducts");
        $query->execute();
        $sizes = $query->fetchAll(PDO::FETCH_ASSOC);
        $tempArray = [];
        $sizeArray = [];

        foreach ($sizes as $size) {
            $tempArray[] = explode("cm", $size['longsize']);
        }

        foreach ($tempArray as $key => $values) {
            foreach ($values as $value) {
                if (!in_array($value, $sizeArray) && $value != "") {
                    $value = trim($value, ", ");
                    $sizeArray[] = $value;
                }
            }
        }

        // Öncelikli boyutları belirt
        $prioritySizes = ['60 X 120', '60 X 120 X 0,7', '60 X 60 X 0,7', '60 X 90 X 2', '60 X 120 X 2'];

        // Öncelikli boyutlar ve diğer boyutları ayır
        $prioritySizesArray = array_intersect($sizeArray, $prioritySizes);
        $otherSizesArray = array_diff($sizeArray, $prioritySizes);

        // Sıralı listeyi oluştur
        $sortedSizeArray = array_merge($prioritySizesArray, $otherSizesArray);

        return $sortedSizeArray;
    }
    public static function get_products($size){

        global $db;
        $query = $db->prepare("SELECT * FROM quaproducts WHERE longsize LIKE '%" . $size . "%'");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function get_product_name($productId)
    {

        global $db;
        $query = $db->prepare("SELECT * FROM quaproducts WHERE id = :productId");
        $query->bindParam(':productId', $productId, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}