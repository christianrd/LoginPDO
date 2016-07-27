<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/26/2016
 * Time: 8:38 AM
 */

session_start();
if (isset($_SESSION['nombre']))
{
    ?> <h1>Bienvenido <?= $_SESSION['nombre'] ?>.</h1>
    <img src="<?= $_SESSION['avatar']?>" height="150" alt="avatar">
    <a href="core/logOut.php">Cerrar Session</a>
<?php
}
else
{
    header("Location: index.php");
}
