<?php

namespace app\models;

use App\helpers\Connection;

class OrderPh
{
    public static function allOrder(){
        $query = Connection::make()->query('SELECT orders.id as order_id, user_id, status, date_start, date_end, users.name as name, pharmaceft.name as pharm, products_in_order.count as count FROM orders INNER JOIN users ON orders.user_id = users.id INNER JOIN products_in_order ON products_in_order.order_id = orders.id INNER JOIN pharmaceft ON orders.pharmaceft_id = pharmaceft.id  ORDER BY date_start DESC');
        return $query->fetchAll();
    }
    
    private static function getParameters($array){
        return implode(",", array_fill(0, count($array), "?"));
    }
    //фильтер по статусу
    public static function filter($status){
        //формируем параметр запроса
        $parameter = self::getParameters($status);

        $query = Connection::make()->prepare("SELECT orders.id as order_id, users.name as name, status, orders.date_start, orders.date_end. pharmaceft.name as pharm FROM orders INNER JOIN users ON orders.user_id = users.id INNER JOIN pharmaceft ON orders.pharmaceft_id = pharmaceft.id WHERE status in ($parameter) ORDER BY date_start DESC");

        $query->execute($status);

        return $query->fetchAll();
        // $query = Connection::make()->prepare('SELECT orders.*, users.id as user_id, statuses.id as status_id FROM orders INNER JOIN  users ON users.user_id = users.id INNER JOIN  statuses.status_id = statuses.id WHERE statuses.id = :status_id');
        // $query->execute(['status_id' => $status_id]);
        // return $query->fetchAll();
    }

    public static function editStatus($status, $pharm,  $id){
        var_dump($pharm . $id);
        $query = Connection::make()->prepare("UPDATE orders SET orders.status = :status, orders.pharmaceft_id = :ph WHERE orders.id = :id");
        $query->execute([
            "status" => $status,
            "ph" => $pharm,
            "id" => $id,
        ]);

    }
    public static function editData($id){
        $query = Connection::make()->prepare("UPDATE orders SET orders.date_end = :date WHERE orders.id = :id");
        $query->execute([
            "date" => date('Y-m-d H:i:s'),
            "id" => $id
        ]);

    }
    public static function allStatus(){
        $query = Connection::make()->query("SELECT DISTINCT status FROM orders");
        return $query->fetchAll();
    }
    public static function see($id){
        $query = Connection::make()->prepare("SELECT products_in_order.*, products.name as prodName, products.photo as photo, products.price as price FROM products_in_order INNER JOIN products ON product_id = products.id INNER JOIN orders ON order_id = orders.id WHERE order_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }
    // SELECT *, (SELECT name FROM products WHERE products.id = products_in_order.product_id) as name, (SELECT price FROM products WHERE products.id = products_in_order.product_id) as price FROM products_in_order WHERE order_id = 1;
    public static function seeee($id){
        $query = Connection::make()->prepare("SELECT *, (SELECT name FROM products WHERE products.id = products_in_order.product_id) as name, (SELECT price FROM products WHERE products.id = products_in_order.product_id) as price, products.photo as photo FROM products_in_order INNER JOIN orders ON order_id = orders.id INNER JOIN products ON product_id = products.id WHERE order_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

}