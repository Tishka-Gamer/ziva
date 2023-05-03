<?php 

namespace App\models;

use App\helpers\Connection;

class TypeAdm{
    
    public static function all(){
        //получаем все категории
        $query = Connection::make()->query("SELECT types_in_category.id as typeId, types_in_category.name as typeName, categorys.name as category, image FROM types_in_category INNER JOIN categorys ON types_in_category.category_id = categorys.id");
        return $query->fetchAll();
    } 
    public static function filter($category){
        $query = Connection::make()->prepare("SELECT types_in_category.*, categorys.name AS category FROM types_in_category INNER JOIN categorys ON types_in_category.category_id = categorys.id WHERE category_id = ?");
        $query->execute([$category]);
        return $query->fetchAll();
    }
    private static function getParameters($array){
        return implode(",", array_fill(0, count($array), "?"));
    }
    public static function loadCategory($category){
        //формируем параметр запроса
        $parameter = self::getParameters($category);

        $query = Connection::make()->prepare("SELECT types_in_category.id as typeId, types_in_category.name as typeName, categorys.name as category, image FROM types_in_category INNER JOIN categorys ON types_in_category.category_id = categorys.id WHERE category_id in ($parameter)");

        $query->execute($category);

        return $query->fetchAll();
    }
    public static function find($id){
        $query = Connection::make()->prepare("SELECT * FROM types_in_category WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }
    public static function add($data, $newName){
        $query = Connection::make()->prepare("INSERT INTO types_in_category (name, category_id, image) VALUES (:name, :category_id, :image)");
        $query->execute(["name" => $data['name'], "category_id" => $data['category_id'], "image" => $newName]);
    }

}
