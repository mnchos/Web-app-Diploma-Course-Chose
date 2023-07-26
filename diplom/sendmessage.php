<?php
session_start();
$mysqli= new mysqli("localhost", "root", "", "diploma");
if(isset($_POST['submit']))
{
    $ts=$_SESSION['userid'];
    $ThreadId=$_POST['threadid'];
    $name = $_POST['text'];
    $stmt = $mysqli->prepare('INSERT INTO message(topic_id,user_id,text) VALUES (?,?,?)');
    $stmt->bind_param('iis',$ThreadId,$ts,$name);
    $stmt->execute();
    header("Location: thread.php?id=".$ThreadId);
}
?>

