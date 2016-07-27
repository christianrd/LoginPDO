<?php

/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/26/2016
 * Time: 7:45 AM
 */
class PDOConnect
{
    private $pdo;
    private static $instance;

    const HOST = "localhost";
    const DATABASE = "appweb_login";
    const USER = "root";
    const PASSWORD = "";

    private function __construct()
    {
        try
        {
            $this->pdo = new PDO("mysql:host=".self::HOST.";dbname=".self::DATABASE, self::USER, self::PASSWORD);
            $this->pdo->exec("SET CHARACTER SET utf8");
        }
        catch (PDOException $e)
        {
            print "Error: ".$e->getMessage();
            die;
        }
    }

    public static function singleton()
    {
        if (!isset(self::$instance))
        {
            $myClass = __CLASS__;
            self::$instance = new $myClass;
        }
        return  self::$instance;
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    public function __clone()
    {
        trigger_error("El clonamiento no esta permitido.", E_USER_ERROR);
    }
}