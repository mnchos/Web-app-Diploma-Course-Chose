<?php
$mysqli= new mysqli("localhost", "root", "", "diploma");
if(isset($_POST['submit']))
{   $query = mysqli_query($mysqli, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($mysqli, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {   include "header.php";
        echo '<div class="text-center" >';
       echo $err[] = "Пользователь с таким логином уже существует в базе данных";
        echo '</div>';
       include "footer.php";
    }
    else{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $rnd = sprintf('%08x%08x%08x%08x',rand(),rand(),rand(),rand());
    $pwdhash = sha1($password. $rnd);
    echo "Рнд: $rnd,Логин:$login,Пароль: $password,Новый пароль: $pwdhash<br/>";
    $stmt = $mysqli->prepare('INSERT INTO users(user_login, user_password, token) VALUES (?,?,?)');
    $stmt->bind_param('sss',$login,$pwdhash,$rnd);
    $stmt->execute();
        header("Location: loginpage.php");
    }
}
?>