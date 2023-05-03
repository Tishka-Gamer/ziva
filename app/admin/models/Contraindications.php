<?php

namespace App\models;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/models/Product.php";

use App\models\ProductAdm;
use App\helpers\Connection;

class Contraindications
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT id, name FROM contraindications");
        return $query->fetchAll();
    }
    // public static function addsdh()
    // {
    //     $query = Connection::make()->query("INSERT INTO contr (product_id, contr_id) VALUES ()");
    //     return $query->fetchAll();
    // }
    private static function getParam($array, $value)
    {
        return implode(',', array_fill(0, count($array), $value));
    }
    public static function add($data, $newName, $array, $conn = null)
    {

        $product_id = ProductAdm::addProduct($data, $newName);
        //передаем строке неизменную часть запроса
        $base = "INSERT INTO `contr`( `product_id`, `contr_id`) VALUES ";

        //формируем количество позиционных параметров в зависимости от кол-ва продуктов
        $params = self::getParam($array, "(?, ?) ");

        //создали текст запроса, соединили 2 части
        $queryText = $base . $params;

        $values = [];
        var_dump($array);
        //заполняем массив с значениями 
        foreach ($array as $item) {
            $values[] = $product_id;
            $values[] = $item;
        }
        $query = Connection::make()->prepare($queryText);

        $query->execute($values);
    }
    public static function ContProd($id)
    {
        $query = Connection::make()->prepare("SELECT product_id, contr_id FROM contr WHERE product_id = ? ");
        $query->execute([$id]);
        return $query->fetchAll();
    }
    public static function redContProd($id)
    {
        $query = Connection::make()->prepare("SELECT contr_id FROM contr WHERE product_id = ? ");
        $query->execute([$id]);
        return $query->fetchAll();
    }
    public static function red($array, $product_id)
    {
        self::del($product_id);
        //передаем строке неизменную часть запроса
        $base = "INSERT INTO `contr`( `product_id`, `contr_id`) VALUES ";

        //формируем количество позиционных параметров в зависимости от кол-ва продуктов
        $params = self::getParam($array, "(?, ?) ");

        //создали текст запроса, соединили 2 части
        $queryText = $base . $params;

        $values = [];
        //заполняем массив с значениями 
        foreach ($array as $item) {
            $values[] = $product_id;
            $values[] = $item;
        }
        $query = Connection::make()->prepare($queryText);

        $query->execute($values);
    }
    public static function del($product_id)
    {
        $query = Connection::make()->prepare("DELETE FROM contr WHERE product_id = ?");
        $query->execute([$product_id]);
    }
    public static function find($product_id, $id)
    {
        $query = Connection::make()->prepare("SELECT product_id, contr_id FROM contr WHERE product_id = ? AND contr_id = ?");
        $query->execute([$product_id, $id]);
        return $query->fetch() == null;
    }
}
