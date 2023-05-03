<?php

namespace App\models;

use App\helpers\Connection;

class Admin
{
    public static function findAdmin($name, $password){
        $query = Connection::make()->prepare("SELECT * FROM admins WHERE admins.name =:name");
        $query->execute(["name" => $name]);
        $user = $query->fetch() ;
        if(password_verify($password, $user->password)){
            return $user;
        } else return null;   
    }
    public static function addAdmin($name, $password){
        $query = Connection::make()->prepare("INSERT INTO admins (name, password) VALUES (:name, :password)");
        $query->execute(["name" => $name, "password" =>password_hash($password, PASSWORD_DEFAULT)]);
        return $query->fetch();
    }
    public static function searchAd($name){
        $query = Connection::make()->prepare("SELECT * FROM admins WHERE admins.name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch() == null;
    }
    public static function searchPh($name){
        $query = Connection::make()->prepare("SELECT * FROM pharmaceft WHERE pharmaceft.name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch() == null;
    }
    public static function addPharmaceft($name, $password){
        $query = Connection::make()->prepare("INSERT INTO pharmaceft (name, password) VALUES (:name, :password)");
        $query->execute(["name" => $name, "password" => password_hash($password, PASSWORD_DEFAULT)]);
        return $query->fetch();
    }
    public static function delAdmin($id)
    {
        $query = Connection::make()->prepare("DELETE FROM admins WHERE id = :id");
        $query->execute(["id" => $id]);
    }
    public static function delPharmaceft($id)
    {
        $query = Connection::make()->prepare("DELETE FROM pharmaceft WHERE id = :id");
        $query->execute(["id" => $id]);
    }
    public static function allAdmin(){
        $query = Connection::make()->query("SELECT id, name FROM admins ");
        return $query->fetchAll();
    }
    public static function allPharmaceft(){
        $query = Connection::make()->query("SELECT id, name FROM pharmaceft");
        return $query->fetchAll();
    }
}
?>