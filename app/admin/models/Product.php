<?php

namespace App\models;

use App\helpers\Connection;

class ProductAdm
{
    //получить все товары
    public static function all()
    {
        $query = Connection::make()->query('SELECT products.id, products.name, products.experation_age, products.price, products.photo, products.count, types_in_category.name as type, products.relese FROM products INNER JOIN types_in_category ON products.type_id = types_in_category.id WHERE products.count > 0 ORDER BY products.count DESC');
        return $query->fetchAll();
    }
    public static function findType($id){
        $query = Connection::make()->prepare('SELECT products.*, types_in_category.name as type FROM products INNER JOIN types_in_category ON products.type_id = types_in_category.id WHERE type_id = :id');
        $query->execute(['id'=>$id]);
        return $query->fetchAll();
    }
    public static function find($id)
    {
        $query = Connection::make()->prepare('SELECT products.*, types_in_category.name as type FROM products INNER JOIN types_in_category ON products.type_id = types_in_category.id WHERE products.id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch() == null;
    }
    public static function addProduct($data, $newName)
    {
        // var_dump($data);$name, $experation_age, $price, $photo, $count,  $description,  $type_id, $relese
        $conn =Connection::make();
        $query = $conn->prepare("INSERT INTO products (name, experation_age, price, photo, count, description, type_id, relese) VALUES (:name, :experation_age, :price, :photo, :count, :description, :type_id, :relese)");
        $query->execute(["name" => $data['name'], "experation_age" => $data['experation_age'], "price" => $data['price'], "photo" => $newName, "count" => $data['count'], "description" => $data['description'], "type_id" => $data['type_id'], "relese" => $data['relese']]);
        return $conn->lastInsertId();
    }

    public static function delProduct($product_id)
    {
        $query = Connection::make()->prepare("DELETE FROM products WHERE id = :product_id");
        $query->execute(["product_id" => $product_id]);
    }

    public static function filter($category_id)
    {
        $query = Connection::make()->prepare("SELECT *  FROM products WHERE category_id = :id");
        $query->execute(["id" => $category_id]);
        return $query->fetchAll();
    }

    public static function Reduct($id, $name, $experation_age, $price, $photo, $count,  $description,  $type_id, $relese)
    {
        $query = Connection::make()->prepare("UPDATE products SET name = :name, price = :price, count = :count, experation_age = :experation_age, relese = :relese, photo = :photo, type_id = :type_id, description = :description WHERE id = :id");
        $query->execute(["id" => $id, "name" => $name, "experation_age" => $experation_age, "price" => $price, "photo" => $photo, "count" => $count, "description" => $description, "type_id" => $type_id, "relese" => $relese]);
    }

    //ищем товар по id
    public static function search($id)
    {
        $query = Connection::make()->prepare('SELECT products.*, types_in_category.name as type FROM products INNER JOIN types_in_category ON products.type_id = types_in_category.id WHERE products.id = :id');
        $query->bindParam("id", $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }
    //получаем товары по указаным категориям
    public static function productsByManyCategories($type)
    {
        $param = self::getParam($type);
        $query = Connection::make()->prepare("SELECT products.id, products.name, products.experation_age, products.price, products.photo, products.count, types_in_category.name as type, products.relese FROM products INNER JOIN types_in_category ON products.type_id = types_in_category.id WHERE type_id in ($param)");
        $query->execute($type);
        return $query->fetchAll();
    }
    public static function allRelese(){
        $query = Connection::make()->query("SELECT DISTINCT relese FROM products");
        return $query->fetchAll();
    }
    public static function conts($product_id){
        $query = Connection::make()->prepare('SELECT contr.*, contraindications.name as contrName FROM contr INNER JOIN  contraindications ON contr.contr_id = contraindications.id WHERE product_id = ? ');
        $query->execute([$product_id]);
        return $query->fetchAll();
    }
    //получаем 5 последних товаров
    //     public static function five(){
    //         $query = Connection::make()->query('SELECT * FROM products WHERE products.count > 0 ORDER BY created_at DESC LIMIT 5');
    //         return $query->fetchAll();
    //     }

        //формируем строку с полиционными параметрами
        private static function getParam($array) {
            return implode(',',array_fill(0, count($array), '?'));
        }

    //     //получаем товары по указаным категориям
    //     public static function productsByManyCategories($categories){
    //         $param = self::getParam($categories);
    //         $query = Connection::make()->prepare("SELECT *  FROM products WHERE category_id in ($param)");
    //         $query->execute($categories);
    //         return $query->fetchAll();
    //     }
    //     //заложить изменение кол-ва товара на складе
    //     public static function updateCount($basket, $conn = null){
    //         $conn = $conn??Connection::make();
    //         $query = $conn->prepare("UPDATE products SET count=count-:count WHERE id = :product_id");
    //         foreach ($basket as $item){
    //             $query->bindValue("count", $item->count, \PDO::PARAM_INT);
    //             $query->bindValue("product_id", $item->product_id, \PDO::PARAM_INT);
    //             $query->execute();
    //         }
    //         // $query->execute(["product_id" => $product_id]);
    //     }
}
