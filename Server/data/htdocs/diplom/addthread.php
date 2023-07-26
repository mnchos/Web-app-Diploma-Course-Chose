<?php
session_start();
$mysqli= new mysqli("localhost", "root", "", "diploma");
if(isset($_POST['submit']))
{
    $ts=$_SESSION['userid'];
    $name = $_POST['text'];
    echo $name;
    $stmt = $mysqli->prepare('INSERT INTO forumtheme(name,topicstarter) VALUES (?,?)');
    $stmt->bind_param('si',$name,$ts);
    $stmt->execute();
    header("Location:forumtheme.php");
}
?>

