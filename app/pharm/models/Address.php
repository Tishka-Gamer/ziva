<?php

namespace App\models;

use App\helpers\Connection;

class Address
{
    public static function all(){
        $query = Connection::make()->query("SELECT id, name FROM addresses ");
        return $query->fetchAll();
    }
    public static function find($name){
        $query = Connection::make()->prepare("SELECT * FROM addresses WHERE addresses.name =:name");
        $query->execute(["name" => $name]);
        return $query->fetch() == null;
    }
    public static function add($name){
        $query = Connection::make()->prepare("INSERT INTO addresses (name) VALUES (:name)");
        $query->execute(["name" => $name]);
    }
    public static function del($id)
    {
        $query = Connection::make()->prepare("DELETE FROM addresses WHERE id = :id");
        $query->execute(["id" => $id]);
    }
    public static function reduct($id, $name){
        $query =  Connection::make()->prepare('UPDATE addresses SET name = :name WHERE id = :id');
        $query->execute([
        'name' => $name,
        'id' => $id]);
        // return Connection::make()->lastInsertId();
    }
    public static function search($id){
        $query = Connection::make()->prepare("SELECT * FROM addresses WHERE addresses.id =:id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }
    // public static function searchAd($name){
    //     $query = Connection::make()->prepare("SELECT * FROM admins WHERE admins.name = :name");
    //     $query->execute(["name" => $name]);
    //     return $query->fetch() == null;
    // }
    // public static function searchPh($name){
    //     $query = Connection::make()->prepare("SELECT * FROM pharmaceft WHERE pharmaceft.name = :name");
    //     $query->execute(["name" => $name]);
    //     return $query->fetch() == null;
    // }
    // public static function addPharmaceft($name, $password){
    //     $query = Connection::make()->prepare("INSERT INTO pharmaceft (name, password) VALUES (:name, :password)");
    //     $query->execute(["name" => $name, "password" => password_hash($password, PASSWORD_DEFAULT)]);
    //     return $query->fetch();
    // }
    
    // public static function delPharmaceft($id)
    // {
    //     $query = Connection::make()->prepare("DELETE FROM pharmaceft WHERE id = :id");
    //     $query->execute(["id" => $id]);
    // }
    // public static function allAdmin(){
    //     $query = Connection::make()->query("SELECT id, name FROM admins ");
    //     return $query->fetchAll();
    // }
    // public static function allPharmaceft(){
    //     $query = Connection::make()->query("SELECT id, name FROM pharmaceft");
    //     return $query->fetchAll();
    // }
}
?>