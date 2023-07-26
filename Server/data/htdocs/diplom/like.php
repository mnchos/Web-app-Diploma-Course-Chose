<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "diploma");
if(isset($_POST['submit'])) {

    $article = $_POST['articleid'];
    $ts = $_SESSION['userid'];
    $sql = "SELECT article.id as Айди FROM article WHERE url='$article'";
    if ($result = $mysqli->query($sql)) {
        $rowsCount = $result->num_rows;
        foreach ($result as $row) {
            echo "<td>" . $row["Айди"] . "</td>";
            $articleid = $row["Айди"];
            break;
        }
        echo $articleid;
    }
    $chek="SELECT user_id,post_id FROM likedpost WHERE (user_id='$ts') and (post_id='$articleid')";
    if ($result = $mysqli->query($chek)) {
        $rowsCount = $result->num_rows;
        if($rowsCount>0)
         {
        include "header.php";
        echo '<div class="text-center" >';
        echo $err[] = "Статья уже есть в списке";
        echo '</div>';
        include "footer.php";
            }
        else{
            $sql = "SELECT article.id as Айди FROM article WHERE url='$article'";
            if ($result = $mysqli->query($sql)) {
                $rowsCount = $result->num_rows;
                foreach ($result as $row) {
                    echo "<td>" . $row["Айди"] . "</td>";
                    $articleid = $row["Айди"];
                    break;
                }
                echo $articleid;
            }

            $stmt = $mysqli->prepare('INSERT INTO likedpost(post_id, user_id) VALUES (?,?)  ');
            $stmt->bind_param('ii', $articleid, $ts);
            $stmt->execute();
            header("Location: $article");
        }
        }
    }

?>