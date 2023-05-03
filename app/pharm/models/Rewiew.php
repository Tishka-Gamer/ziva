<?php 

namespace App\models;

use App\helpers\Connection;

class RewiewAdm{

    public static function all(){
        //получаем все отзывы у товара
        $query = Connection::make()->query("SELECT reviews.*, products.name AS product, users.name AS user FROM reviews INNER JOIN products ON reviews.product_id = products.id INNER JOIN users ON reviews.user_id = users.id");
        return $query->fetchAll();
    } 
    public static function del($id)
    {
        $query = Connection::make()->prepare("DELETE FROM reviews WHERE id = :id");
        $query->execute(["id" => $id]);
    }
    public static function reduct($id, $text){
        $query =  Connection::make()->prepare('UPDATE reviews SET text = :text WHERE id = :id');
        $query->execute([
        'text' => $text,
        'id' => $id]);
        // return Connection::make()->lastInsertId();
    }
    public static function find($id){
        //получаем все отзывы у товара
        $query = Connection::make()->prepare("SELECT id, text FROM reviews WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    } 
    // public static function rewProd($product_id){
    //     //получаем все отзывы у товара
    //     $query = Connection::make()->prepare("SELECT reviews.*, products.name AS product, users.name AS user, users.photo AS avatar FROM reviews INNER JOIN products ON reviews.product_id = products.id INNER JOIN users ON reviews.user_id = users.id WHERE product_id = ?");
    //     $query->execute([$product_id]);
    //     return $query->fetchAll();
    // } 
    // public static function findRewUser($user_id, $product_id){
    //     //получаем все отзывы у товара
    //     $query = Connection::make()->prepare("SELECT reviews.*, products.name AS product, users.name AS user, users.photo AS avatar FROM reviews INNER JOIN products ON reviews.product_id = products.id INNER JOIN users ON reviews.user_id = users.id WHERE product_id = :product_id AND user_id = :user_id");
    //     $query->execute(["user_id" => $user_id, "product_id" => $product_id]);
    //     $res = $query->fetch();
    //     return !empty($res);
    // } 
    // public static function add($text, $user_id, $product_id){
    //     //получаем все отзывы у товара
    //     $query = Connection::make()->prepare("INSERT INTO reviews (text, user_id, product_id) VALUES (:text, :user_id, :product_id)");
    //     $query->execute(["text" => $text, "user_id" => $user_id, "product_id" => $product_id]);
    //     return $query->fetch();
        
    // } 
    // public static function rewProdNotUser($user_id, $product_id){
    //     //получаем все отзывы у товара
    //     $query = Connection::make()->prepare("SELECT reviews.*, products.name AS product, users.name AS user, users.photo AS avatar FROM reviews INNER JOIN products ON reviews.product_id = products.id INNER JOIN users ON reviews.user_id = users.id WHERE product_id = :product_id AND user_id != :user_id");
    //     $query->execute(["user_id" => $user_id, "product_id" => $product_id]);
    //     return $query->fetchAll();
    // } 
    // public static function rewUser($user_id, $product_id){
    //     //получаем все отзывы у товара
    //     $query = Connection::make()->prepare("SELECT reviews.*, products.name AS product, users.name AS user, users.photo AS avatar FROM reviews INNER JOIN products ON reviews.product_id = products.id INNER JOIN users ON reviews.user_id = users.id WHERE product_id = :product_id AND user_id = :user_id");
    //     $query->execute(["user_id" => $user_id, "product_id" => $product_id]);
    //     return $query->fetchAll();
    // } 
    // public static function filter($category){
    //     $query = Connection::make()->prepare("SELECT types_in_category.*, categorys.name AS category FROM types_in_category INNER JOIN categorys ON types_in_category.category_id = categorys.id WHERE category_id = ?");
    //     $query->execute([$category]);
    //     return $query->fetchAll();
    // }
}