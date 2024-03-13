<?php

class quaplant
{
    public static function get_cities(){
        global $db;
        $query = $db->prepare("SELECT * FROM quaplant ORDER BY sort DESC,plantname ASC");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function get_sizes(){
        global $db;
        $query = $db->prepare("SELECT DISTINCT size FROM quaproducts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}