<?php 
const CONFIG_CONNECTION = [
    "host"=>"localhost",
    "dbname"=>"cs16437_ziva",
    "login"=> "cs16437_ziva",
    "password"=>'1234',
    "options"=>[
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
    ]
];