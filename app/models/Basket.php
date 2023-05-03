<?php

namespace app\models;

use App\helpers\Connection;
use App\models\Product;

class Basket
{
    //получить все товары в корзине пользователя
    public static function all($user_id)
    {
        $query = Connection::make()->prepare("SELECT baskets.*, products.name as product_name, products.price as price, products.photo as photo, baskets.count * products.price as price_position FROM baskets INNER JOIN products ON product_id = products.id WHERE user_id = ?");
        $query->execute([$user_id]);
        return $query->fetchAll();
    }
    //ищем товар в корзине
    public static function find($product_id, $user_id)
    {
        //найдем товар в корзине пользователя
        $query = Connection::make()->prepare("SELECT baskets.*, products.price as product_price, baskets.count * products.price as price_position, products.count as product_count FROM baskets INNER JOIN products ON product_id = products.id WHERE product_id = :product_id AND user_id = :user_id");
        $query->execute(["product_id" => $product_id, "user_id" => $user_id]);
        return $query->fetch();
    }
    public static function findPrd($user_id)
    {
        //найдем товар в корзине пользователя
        $query = Connection::make()->prepare("SELECT baskets.*, products.price as product_price, baskets.count * products.price as price_position, products.count as product_count FROM baskets INNER JOIN products ON product_id = products.id WHERE user_id = :user_id");
        $query->execute(["user_id" => $user_id]);
        return $query->fetchAll();
    }

    //добавление товара в корзину
    public static function add($product_id, $user_id)
    {
        $productInBasket = self::find($product_id, $user_id);
        //ищем аналогичный товар на складе
        $product = Product::find($product_id);
        //если товара нет в корзине то мы его добавили в количестве равному единице, если кол не больше того что имеется на складе, то увелечиваем на 1
        if (!$productInBasket) {
            $query = Connection::make()->prepare("INSERT INTO baskets (user_id, product_id, count) VALUES (:user_id, :product_id, 1)");
            $query->execute(["user_id" => $user_id, "product_id" => $product_id]);
        } else {
            if ($productInBasket->count < $product->count) {
                $query = Connection::make()->prepare("UPDATE baskets SET count=count+1 WHERE product_id = :product_id AND user_id = :user_id");
                $query->execute(["product_id" => $product_id, "user_id" => $user_id]);
            }
        }
        return self::find($product_id, $user_id);
    }
    
    public static function minus($product_id, $user_id)
    {
        $productsBasket = self::find($product_id, $user_id);
        if ($productsBasket->count > 1) {
            $query = Connection::make()->prepare("UPDATE baskets SET count=count-1 WHERE product_id = :product_id AND user_id = :user_id");
            $query->execute(["user_id" => $user_id, "product_id" => $product_id]);
        }
        return self::find($product_id, $user_id);
    }
    public static function del($product_id, $user_id)
    {
        $query = Connection::make()->prepare("DELETE FROM baskets WHERE product_id = :product_id AND user_id = :user_id");
        $query->execute(["user_id" => $user_id, "product_id" => $product_id]);
        return "delete";
    }
    //удаление корзины пользователя
    public static function clear($user_id)
    {
        $query = Connection::make()->prepare("DELETE FROM baskets WHERE user_id = :user_id");
        $query->execute(["user_id" => $user_id]);
    }

    //стоимость корзины пользователя
    public static function allSum($user_id)
    {
        $query = Connection::make()->prepare("SELECT SUM(products.price * baskets.count) as sum FROM baskets INNER JOIN products ON product_id = products.id WHERE user_id = :user_id ");

        $query->execute([
            "user_id" => $user_id,
        ]);

        return $query->fetch(\PDO::FETCH_COLUMN);
    }
    
    //количество товаров корзины пользователя
    public static function allCount($user_id)
    {
        $query = Connection::make()->prepare("SELECT SUM(baskets.count) as count FROM baskets WHERE user_id = :user_id");

        $query->execute([
            "user_id" => $user_id,
        ]);

        return $query->fetch(\PDO::FETCH_COLUMN);
    }
    public static function allDelete($user_id, $conn = null){
        $conn = $conn ?? Connection::make();
        $query = $conn->prepare("DELETE FROM baskets WHERE user_id = ?");
        $query->execute([$user_id]);
        return "deleteAll";
    }

}
