<?php

namespace App\models;

use App\helpers\Connection;

class User
{
    private static function connect($config = CONFIG_CONNECTION){
        return Connection::make($config);
    }

    public static function getUser($phone, $password){
        $query = Connection::make()->prepare("SELECT * FROM users WHERE users.phone = :phone");

        $query->execute([':phone' => $phone]);

        $user = $query->fetch();
        if ($user != null) {
            if (password_verify($password, $user->password)) {
                return $user;
            } else return null;
        }
    }

    public static function find($id){
        $query = Connection::make()->prepare("SELECT users.id, users.name, users.surname, users.firstname, users.date_birthday, users.phone, users.email, users.photo FROM users WHERE users.id = ?");

        $query->execute([$id]);

        return $query->fetch();
    }

    public static function getAll()
    {
        $query = Connection::make()->query("SELECT users.id, users.name, users.surname, users.firstname, users.date_birthday, users.phone, users.email, users.photo FROM users");
        return $query->fetchAll();
    }

    public static function redPhoto($id, $photo){
        $query = Connection::make()->prepare("UPDATE users SET photo = :photo WHERE users.id = :id");

        $query->execute(["photo" => $photo, "id" => $id]);

        // return $query->fetch();
    }

    public static function insert($data)
    {
        $create = Connection::make()->prepare("INSERT into users (name, surname, firstname, date_birthday, phone, photo, email, password) values (:name, :surname, :firstname, :date_birthday, :phone, :photo, :email, :password)");

       return $create->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "firstname" => $data["firstname"],
            "date_birthday" => $data["date_birthday"],
            "phone" => $data["number"],
            "email" => $data["email"],
            "photo" => $data["photo"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT),
        ]);
    }

    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM users WHERE id = ?");

        return $query->execute([$id]);
    }

    public static function findNumber($phone){
        $query = Connection::make()->prepare("SELECT users.id, users.name FROM users WHERE users.phone = ?");

        $query->execute([$phone]);
        $res = $query->fetchAll();

        return !empty($res);
        
    }

    // public static function getLogins(){
    //     $query = Connection::make()->query("SELECT users.login FROM users ");
    //     return $query->fetchAll();
    // }
    public static function findEmail($email)
    {
        $query = Connection::make()->prepare("SELECT users.id, users.name, users.phone, users.email FROM users WHERE users.email = ?");

        $query->execute([$email]);
        $res = $query->fetchAll();

        return !empty($res);
    }
    //здесь размещаем все методы для работы с таблицей users
}
