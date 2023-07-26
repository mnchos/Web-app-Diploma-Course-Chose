<?php

$mysqli= new mysqli("localhost", "root", "", "diploma");// Right at the top of your script
session_start();
?>
<?php include("header.php");?>
<div class="container">
    <div >
        <table class="table table-striped">
            <thead>
            <tr>

                <th scope="col">Сообщение</th>
                <th scope="col">Автор </th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tr>
                <?php

                if (isset($_GET['id'])){
                    $ThreadID=$_GET['id'];
                $sql = "select message.text as текст,forumtheme.name as тема,users.user_login as имя, users.user_id as айди, message.id as сообщение from message,forumtheme,users
                where (message.user_id=users.user_id) and (message.topic_id=forumtheme.id) and (topic_id=$ThreadID)";
                if($result = $mysqli->query($sql)){
                    $rowsCount = $result->num_rows;
                    foreach($result as $row){
                        echo "<tr>";
                        echo "<td>" . $row["текст"] . "</td>";

                        echo "<td>" . $row["имя"] . "</td>";
                        if($_SESSION['usertype']==1)
                        {
                            echo "<td>";
                            echo "<form method='post' action='droppost.php'>";
                            echo "<input type=submit name='submit' value='удалить'> ";
                            echo "<input type=hidden value=$row[сообщение] name='messageid'>";
                            echo "<input type=hidden value=$ThreadID name='threadid'>";
                            echo "</form>";
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                    foreach($result as $row) {$name2=$row["тема"];
                        echo "<p><strong>Тема:$name2</strong></p>";break;
                    }
                    echo "</table>";
                    $result->free();
                } else{
                    echo "Ошибка: " . $mysqli->error;
                }}// количество полученных строк
                ?>
            </tr>
        </table>
    </div>
</div>
<?php if(!isset($_COOKIE['user_login'])){ ?>

<?php }
else {?>
<main class="form-signin">
    <form method="post" action="sendmessage.php">
        <div class="form-floating">
            <input type="text" name="text" class="form-control" >
            <label for="floatingInput">Напишите сообщение </label>
            <input type="hidden" value="<?php echo $ThreadID; ?>" name="threadid">
        </div>
        <input name="submit" class="w-100 btn btn-lg btn-primary" type="submit" value="Отправить">
    </form>
</main>
</div>
<?php } ?>
<?php include("footer.php");?>
</body>
</html>