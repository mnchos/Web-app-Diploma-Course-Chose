<?php
session_start();
$mysqli= new mysqli("localhost", "root", "", "diploma");
$ts=$_SESSION["userid"];
    if(isset($_POST["list"])) {
        $chek = "SELECT user_id FROM usertags WHERE (user_id='$ts')";
        if ($result = $mysqli->query($chek)) {
            $rowsCount = $result->num_rows;
            if ($rowsCount > 0) {
                $course = $_POST["list"];
                $stmt = $mysqli->prepare('UPDATE usertags SET tags_id=? where user_id=? ');
                $stmt->bind_param('ii', $course,$ts);
                $stmt->execute();
            } else {
                $course = $_POST["list"];
                $stmt = $mysqli->prepare('INSERT INTO usertags(tags_id,user_id) VALUES (?,?)');
                $stmt->bind_param('ii', $course, $ts);
                $stmt->execute();
            }
        }
    }
header("Location:userpage.php");
