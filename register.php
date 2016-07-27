<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/26/2016
 * Time: 8:54 AM
 */
session_start();
if (isset($_SESSION['nombre']))
{
    header("Location: home.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style type="text/css">
        body{
            background: #d1e0e5;
        }
        .content{
            margin: 0 auto;
            width: 500px;
            height: 300px;
            margin-top: 9%;
            background: #000;
            color: #fff;
            border: 6px solid #dc2d29;
        }
        label{
            display: block;
        }
        .caja_login{
            margin: 30px 0px 0px 70px;
        }
        .caja_login input[type=text],input[type=password]{
            width: 280px;
            padding: 8px 6px;
            border-radius: 8px;
        }
        .caja_login input[type=submit]{
            padding: 5px 60px;
            text-align: center;
            border-radius: 4px;
            color: #fff;
            background: #dc2d29;
            border: 1px solid #fff;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="caja_login">
        <h2>Register con PDO y php</h2>
        <form class="form" action="controllers/Users.php" method="post">
            <input type="hidden" name="action" value="register">

            <label>Nick</label>
            <input type="text" name="name" required="true" placeholder="Introduce tu nick" />

            <label>Password</label>
            <input type="password" name="password" required="true" placeholder="Introduce tu password" /><br><br>
            <input type="hidden" role="uploadcare-uploader"
                   data-crop=""
                   data-images-shrink="200x200"
                   name="avatar"
                   data-images-only="true" /><br>

            <input type="submit" value="Register" />

        </form>
    </div>
</div>
<script>
    UPLOADCARE_LOCALE = "es";
    UPLOADCARE_TABS = "file url facebook gdrive dropbox instagram evernote flickr skydrive";
    UPLOADCARE_PUBLIC_KEY = "a96259d7bae89fbde674";
</script>
<script charset="utf-8" src="//ucarecdn.com/widget/2.9.0/uploadcare/uploadcare.full.min.js"></script>
</body>
</html>
