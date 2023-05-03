<?php

namespace app\models;

use App\helpers\Connection;
use App\models\Basket;
use App\models\Product;
use PDOException;

class Order
{
    public static function create($user_id, $addres){
        //получаем корзинут пользователя
        $basket = Basket::all($user_id);

        //устанавливаем подключение
        $conn = Connection::make();

        //транзакция
        try{
            //начинаем транзакцию
            $conn->beginTransaction();

            //1. Добавляем новый заказ
            $order_id = self::addOrder($user_id, $addres, $conn);

            //2. добавляем продукты в заказ
            self::addProductsInOrder($basket, $order_id, $conn);

            //3. корректируем кол-во продуктов на складе
            Product::updateCount($basket, $conn);

            //4. очищаем корзину пользователя
            Basket::allDelete($user_id);
            
            //5. принимаем транзакцию
            $conn->commit();
            
        }catch(\PDOException $error){
            //откатываем транзакцию
            $conn->rollBack();
            echo("Ошибка " . $error->getMessage()); 
        }
    }
    public static function addOrder($user_id, $addres, $conn){
        $query = $conn->prepare("INSERT INTO orders (date_start, status, user_id, address) VALUES (:date_start, :status, :user_id, :address)");
        $query->execute(['user_id' => $user_id, "status" => "принят", 'date_start'=>date('Y-m-d H:i:s'), "address" => $addres]);
        return $conn->lastInsertId();
    }
    // public static function addOrderInProducts($order_id, $product_id, $count){
    //     $query = Connection::make()->prepare("INSERT INTO orders (order_id, product_id, count) VALUES (:order_id, :product_id, :count)");
    //     $query->execute(["order_id" => $order_id, "product_id"=> $product_id, "count"=>$count]);
    // }

    private static function getParam($array, $value)
    {
        return implode(',', array_fill(0, count($array), $value));
    }
    public static function addProductsInOrder($basket, $order_id, $conn = null){
       
        //передаем строке неизменную часть запроса
        $base = "INSERT INTO products_in_order (count, product_id, order_id) VALUES ";

        //формируем количество позиционных параметров в зависимости от кол-ва продуктов
        $params = self::getParam($basket, "(?, ?, ?)");

        //создали текст запроса, соединили 2 части
        $queryText = $base . $params;

        $values = [];

        //заполняем массив с значениями 
        foreach ($basket as $item) {
            $values[] = $item->count;
            $values[] = $item->product_id;
            $values[] = $order_id;
        }

        $query = $conn->prepare($queryText);
        
        $query->execute($values);
    }
    public static function findUser($user_id, $product_id){
        $query = Connection::make()->prepare('SELECT * FROM orders INNER JOIN products_in_order ON orders.id = products_in_order.order_id WHERE user_id = :user_id AND product_id = :product_id');
        $query->execute(['user_id' => $user_id, 'product_id' => $product_id]);
        $res = $query->fetch();
        return !empty($res);
    }
    public static function findInUser($user_id){
        self::need();
        $query = Connection::make()->prepare('SELECT products_in_order.*, orders.user_id as user_id, SUM(products_in_order.count) as prodCount, orders.status, orders.address, orders.date_start FROM products_in_order INNER JOIN orders ON products_in_order.order_id = orders.id WHERE user_id = ? GROUP BY products_in_order.order_id');
        $query->execute([$user_id]);
        return $query->fetchAll();
    }
    public static function need(){
        $query = Connection::make()->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");
    }
    // SELECT @@sql_mode;
    public static function seeee($id){
        $query = Connection::make()->prepare("SELECT *, (SELECT name FROM products WHERE products.id = products_in_order.product_id) as name, (SELECT price FROM products WHERE products.id = products_in_order.product_id) as price, products.photo as photo FROM products_in_order INNER JOIN orders ON order_id = orders.id INNER JOIN products ON product_id = products.id WHERE order_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }
    public static function allPrice($id){
        $query = Connection::make()->prepare(" SELECT SUM(products_in_order.count * products.price) as price FROM products_in_order INNER JOIN products ON product_id = products.id WHERE order_id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }
    public static function allCount($id){
        $query = Connection::make()->prepare("SELECT SUM(products_in_order.count) as count FROM products_in_order WHERE order_id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

}