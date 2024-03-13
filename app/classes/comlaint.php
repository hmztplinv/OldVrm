<?php

class complaint
{
public static function get_complaint(){
    global $db;
    $query = $db->prepare("SELECT * FROM complaint");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
}
