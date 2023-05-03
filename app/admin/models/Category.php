<?php 

namespace App\models;

use App\helpers\Connection;

class CategoryAdm{
    
    public static function all(){
        //получаем все категории
        $query = Connection::make()->query("SELECT id, name FROM categorys");
        return $query->fetchAll();
    }

    public static function find($name){
        $query = Connection::make()->prepare('SELECT name FROM categorys WHERE name = :name');
        $query->execute(['name'=>$name]);
        return $query->fetch() == null;
    }

    public static function addCategory($name){
        if(self::find($name))
        {
            $query = Connection::make()->prepare("INSERT INTO categorys (name) VALUES (:name)");

            $query->execute(["name" => $name]);

            return Connection::make()->lastInsertId();
           
        }
        else{
            return "error";
        }
    }

    public static function DelCategory($category_id){
        $query = Connection::make()->prepare("DELETE FROM categorys WHERE id = :category_id");
        $query->execute(["category_id" => $category_id]);
        return "delete";
    }

    public static function sort($category_id){
        $query = Connection::make()->prepare("SELECT products.id, products.name, price, count, release_year, color, image, countries.name as country, categories.name as category, created_at, updated_at FROM products INNER JOIN countries ON products.country_id = countries.id INNER JOIN categories ON products.category_id = categories.id WHERE products.category_id = :id");

        $query->execute(['id' => $category_id]);

        return $query->fetchAll();
    }

    public static function reduct($id, $name){
        $query =  Connection::make()->prepare('UPDATE categorys SET name = :name WHERE id = :id');
        $query->execute([
        'name' => $name,
        'id' => $id]);
        return Connection::make()->lastInsertId();
    }
    public static function findId($id){
        $query = Connection::make()->prepare('SELECT * FROM categorys WHERE id = :id');
        $query->execute(['id'=>$id]);
        return $query->fetch();
    }
    
}