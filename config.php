<?php
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "freshr",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
define("SITE",[
    "name" => "FRESHR",
    "desc"  => "Uma visão de prosperidade para sua carreira",
    "domain" => "freshr.com",
    "locale" => "pt-br",
    "root" => "http://localhost/CodigoAberto/FRESHRv2/"
]);

define("MAIL",[
    "host" => "",
    "port" => "",
    "user" => "",
    "passwd" => "",
    "from_name" => "Willian Ferreira",
    "from_email" => "willian1948@hotmail.com"
]);

define("URL_BASE","http://localhost/CodigoAberto/FRESHRv2/");
?>