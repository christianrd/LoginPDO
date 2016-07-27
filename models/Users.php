<?php

/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/26/2016
 * Time: 8:06 AM
 */

require_once ("../core/PDOConnect.php");

session_start();
class Users
{
    private static $instance;
    private $db;

    /**
     * Users constructor.
     */
    private function __construct()
    {
        $this->db = PDOConnect::singleton();
    }

    /**
     * @return mixed si no se cumple la condicional
     */
    public static function singletonUsers()
    {
        if (!isset(self::$instance))
        {
            $myClass = __CLASS__;
            self::$instance = new $myClass;
        }
        return self::$instance;
    }

    public function loginUsers($user, $password)
    {
        try
        {
            $query = "SELECT * FROM users WHERE nombre = ? AND password = ?";
            $sql = $this->db->prepare($query);
            $sql->bindParam(1, $user);
            $sql->bindParam(2, $password);
            $sql->execute();
            $this->db = null;

            if ($sql->rowCount() == 1)
            {
                $fila = $sql->fetch();
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['avatar'] = $fila['photo'];
                return TRUE;
            }
        }
        catch (PDOException $e)
        {
            print "Error: ".$e->getMessage();
        }
    }

    public function registerUser($user, $password, $avatar = "")
    {
        try
        {
            $sql = "INSERT INTO `users` (`nombre`, `password`, `photo`) VALUES (?,?,?)";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $user);
            $query->bindParam(2, $password);
            $query->bindParam(3, $avatar);
            $query->execute();
            $this->db = null;
            return true;
        }
        catch (PDOException $e)
        {
            print "Error: ".$e->getMessage();
        }
    }


    public function __clone()
    {
       trigger_error('La clonacion de este objeto no es permitido', E_USER_ERROR);
    }
}