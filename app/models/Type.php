<?php 

namespace App\models;

use App\helpers\Connection;

class Type{
    
    public static function all(){
        //получаем все категории
        $query = Connection::make()->query("SELECT types_in_category.*, categorys.name AS category FROM types_in_category INNER JOIN categorys ON types_in_category.category_id = categorys.id");
        return $query->fetchAll();
    } 
    public static function filter($category){
        $query = Connection::make()->prepare("SELECT types_in_category.*, categorys.name AS category FROM types_in_category INNER JOIN categorys ON types_in_category.category_id = categorys.id WHERE category_id = ?");
        $query->execute([$category]);
        return $query->fetchAll();
    }
}
