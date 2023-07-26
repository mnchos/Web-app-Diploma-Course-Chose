<?php
$mysqli = new mysqli("localhost", "root", "", "diploma");
session_start();
if (isset($SESSION['userid']))
{
    $userid = $_SESSION['userid'];
}
elseif (isset($_COOKIE['token']) &&isset($_COOKIE['user_login']))
{
    $token = $_COOKIE['token'];
    ConnectDB();
    $res = $mysqli->query("SELECT * FROM users WHERE token = '$token'");
    if ($res->num_rows == 1) {
        $user = $res->fetch_object();
        echo "Аутентификация из куки";
        LogIn($user->user_id);
        header("Location: index.php");
    }
}
else if (isset($_POST['submit']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    ConnectDB();
    $res = $mysqli->query("SELECT * FROM users WHERE user_login = '$login'");
    if ($res->num_rows == 1)
    {
        $user = $res->fetch_object();
        $pwdhash = sha1($password . $user->token);
        if ($pwdhash == $user->user_password)
        {
            echo "аутентификация из формы";
            LogIn($user->user_id);
            header("Location: index.php");
        }
        else
            include "header.php";
            echo '<div class="text-center" >';
            echo $err[] = "Такого пользователя не существует ";
            echo '</div>';
            include "footer.php";
    }
}
function ConnectDB()
{
    global $mysqli;
    $mysqli = new mysqli("localhost", "root", "", "diploma");
    echo "база подключена";
}
function LogIn($userid)
{
    global $mysqli;
    $_SESSION['userid'] = $userid;
    $res = $mysqli->query("SELECT * FROM users WHERE user_id = '$userid'");
    if ($res->num_rows == 1)
    {
        $user = $res->fetch_object();
        $login  = $user-> user_login;
        $token =  $user-> token;
        $usertype=$user-> Usertype;
    }
    setcookie('token', $token, time() + 3600 * 24 * 30);
    $_SESSION['usertype'] = $usertype;
    setcookie('user_login', $login, time() + 3600 * 24 * 30);
    $res = $mysqli->query("UPDATE users SET token ='$token' WHERE user_id = $userid");
}
?>