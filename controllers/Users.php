<?php

/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/26/2016
 * Time: 8:33 AM
 */

require_once ("../models/Users.php");

$users = Users::singletonUsers();

if(isset($_POST) && $_POST['action'] == "login")
{
    $user = $_POST['nick'];
    $password = md5($_POST['password']);

    $usuario = $users->loginUsers($user, $password);

    if ($usuario == TRUE)
    {
        header("Location: ../home.php");
    }
    else
    {
        header("Location: ../index.php");
    }
}else if (isset($_POST) && $_POST['action'] == 'register')
{
    $user = $_POST['name'];
    $passwd = md5($_POST['password']);
    $avatar = $_POST['avatar'];

    $registrar = $users->registerUser($user, $passwd, $avatar);

    if ($registrar == true) {
        header("Location: ../index.php");
    } else {
        print "Error";
    }

}