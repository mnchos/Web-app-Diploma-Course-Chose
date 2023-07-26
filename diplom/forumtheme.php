<?php
$mysqli= new mysqli("localhost", "root", "", "diploma");// Right at the top of your script
session_start();?>
<?php include("header.php");?>
<div class="container">
    <div >

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Автор</th>
                <th  scope="col">Дата</th>
                <th  scope="col"> </th>
            </tr>
            </thead>
            <tr>
                <?php

                $sql = "SELECT forumtheme.name as имя,users.user_login as ТС,forumtheme.id as Номер, forumtheme.date as Дата FROM forumtheme,users
                where forumtheme.topicstarter=users.user_id";
                if($result = $mysqli->query($sql)){
                $rowsCount = $result->num_rows;
                echo "<p>Получено объектов: $rowsCount</p>";
                    foreach($result as $row){$entry=$row["Номер"];$threadname=$row["имя"];
                        echo "<tr>";
                        echo "<td><a href=\"thread.php?id=$entry\">$threadname</a></td> ";
                        echo "<td>" . $row["ТС"] . "</td>";
                        echo "<td>" . $row["Дата"] . "</td>";
                        if($_SESSION['usertype']==1)
                        {
                            echo "<td>";
                            echo "<form method='post' action='dropthread.php'>";
                            echo "<input type=submit name='submit' value='удалить'> ";
                            echo "<input type=hidden value=$row[Номер] name='messageid'>";
                            echo "</form>";
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    $result->free();
                } else{
                    echo "Ошибка: " . $mysqli->error;
                }// количество полученных строк
                ?>
            </tr>
        </table>
        <?php if(!isset($_COOKIE['user_login'])){ ?>

        <?php }
        else {?>
            <main class="form-signin">
                <form method="post" action="addthread.php">
                    <div class="form-floating">
                        <input type="text" name="text" class="form-control" >
                        <label for="floatingInput">Напишите название новой темы </label>
                    </div>
                    <input name="submit" class="w-100 btn btn-lg btn-primary" type="submit" value="Создать">

                </form>
            </main>
        <?php } ?>

    </div>
    </div>

    </div>
</div>
<?php include("footer.php");?>
</body>
</html>