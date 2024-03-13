<?php

class bienplant
{
    public static function complaint_factory(){
        global $db;
        $query = $db->prepare("SELECT plantName ,COUNT(plantName) FROM bienplant GROUP BY plantName HAVING COUNT(plantName) > 1");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}