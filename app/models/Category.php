<?php 

namespace App\models;

use App\helpers\Connection;

class Category{
    
    public static function all(){
        //получаем все категории
        $query = Connection::make()->query("SELECT id, name FROM categorys");
        return $query->fetchAll();
    } 
    
}
