<?php 
namespace App\models;

use App\helpers\Connection;

class Product {
    //получить все товары
    public static function all(){
        $query = Connection::make()->query('SELECT products.*, types_in_category.name as type FROM products INNER JOIN  types_in_category ON products.type_id = types_in_category.id WHERE products.count > 0 ORDER BY created_at DESC');
        return $query->fetchAll();
    }
    // ищем товар по id
    public static function find($id){
        $query = Connection::make()->prepare('SELECT products.*, types_in_category.name as type FROM products INNER JOIN types_in_category ON products.type_id = types_in_category.id WHERE products.id = :id');
        $query->execute(['id'=>$id]);
        return $query->fetch();
    }
    public static function findType($id){
        $query = Connection::make()->prepare('SELECT products.*, types_in_category.name as type FROM products INNER JOIN types_in_category ON products.type_id = types_in_category.id WHERE type_id = :id');
        $query->execute(['id'=>$id]);
        return $query->fetchAll();
    }
    public static function findTypes($id){
        $query = Connection::make()->prepare('SELECT id, name FROM types_in_category WHERE id = :id');
        $query->execute(['id'=>$id]);
        return $query->fetch();
    }
    //получаем 5 последних товаров
    // public static function five(){
    //     $query = Connection::make()->query('SELECT * FROM products WHERE products.count > 0 ORDER BY created_at DESC LIMIT 5');
    //     return $query->fetchAll();
    // }
    public static function top(){
        $query = Connection::make()->query('SELECT SUM(products_in_order.count), products_in_order.product_id, products.name as name, products.photo as photo FROM products_in_order INNER JOIN products ON products_in_order.product_id = products.id GROUP BY products_in_order.product_id LIMIT 3');
        return $query->fetchAll();
    }

    //формируем строку с полиционными параметрами
    private static function getParam($array) {
        return implode(',',array_fill(0, count($array), '?'));
    }

    //получаем товары по указаным категориям
    public static function productsByManyCategories($categories){
        $param = self::getParam($categories);
        $query = Connection::make()->prepare("SELECT *  FROM products WHERE category_id in ($param)");
        $query->execute($categories);
        return $query->fetchAll();
    }
    //заложить изменение кол-ва товара на складе
    public static function updateCount($basket, $conn = null){
        $conn = $conn??Connection::make();
        $query = $conn->prepare("UPDATE products SET count=count-:count WHERE id = :product_id");
        foreach ($basket as $item){
            $query->bindValue("count", $item->count, \PDO::PARAM_INT);
            $query->bindValue("product_id", $item->product_id, \PDO::PARAM_INT);
            $query->execute();
        }
        // $query->execute(["product_id" => $product_id]);
    }
    //поиск противопоказаний
    public static function conts($product_id){
        $query = Connection::make()->prepare('SELECT contr.*, contraindications.name as contrName FROM contr INNER JOIN  contraindications ON contr.contr_id = contraindications.id WHERE product_id = ? ');
        $query->execute([$product_id]);
        return $query->fetchAll();
    }
    public static function findrel(){
        $query = Connection::make()->query('SELECT products.* FROM products WHERE relese = "по рецепту" ');
        // $query->execute(["по рецепту"]);
        return $query->fetchAll();
    }
    public static function search($name){
        $query = Connection::make()->prepare('SELECT products.*, types_in_category.name as type FROM products INNER JOIN  types_in_category ON products.type_id = types_in_category.id WHERE products.count > 0 AND products.name LIKE ?');
        $query->execute(["%" . $name . "%"]);
        return $query->fetchAll();
    }
}
// SELECT products_in_order.*, products.name as name, products.photo as photo FROM products_in_order INNER JOIN products ON products_in_order.product_id = products.id ORDER BY products_in_order.count DESC LIMIT 3
