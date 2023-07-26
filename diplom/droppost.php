<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "diploma");
if(isset($_POST['submit'])) {
    $message = $_POST['messageid'];
    $ThreadId=$_POST['threadid'];
    $sql = "DELETE FROM message WHERE message.id = $message";
    $stmt = $mysqli->prepare('DELETE FROM message WHERE id = ?');
    $stmt->bind_param('i', $message);
    $stmt->execute();
    header("Location: thread.php?id=".$ThreadId);
}