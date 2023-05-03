<?php

namespace app\models;

use App\helpers\Connection;

class Things
{
    public static function addresses()
    {
        $query = Connection::make()->query("SELECT * FROM addresses");
        return $query->fetchAll();
    }
}