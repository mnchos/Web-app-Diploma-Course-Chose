<?php

$mysqli= new mysqli("localhost", "root", "", "diploma");
session_start();
?>
<?php include("header.php");?>
<div class="container">
    <div >

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
             <?php
                    $mysqli= new mysqli("localhost", "root", "", "diploma");
                    $ts=$_SESSION["userid"];
                    $chek = "SELECT user_id FROM usertags WHERE (user_id='$ts')";
                    if ($result = $mysqli->query($chek)) {
                        $rowsCount = $result->num_rows;
                        if ($rowsCount > 0) {
                            echo "<a style='background-color:white;color: black ' href='tagtest.php' class='btn btn-sm btn-outline-secondary'>Сменить тему</a>";
                        }
                        else {
                            echo "<a style='background-color:white;color: black ' href='tagtest.php' class='btn btn-sm btn-outline-secondary'>Выбор темы</a>";

                        }
                    }
                        ?>

            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Понравившиеся посты:</th>
               <?php
                    $mysqli= new mysqli("localhost", "root", "", "diploma");
                    $ts=$_SESSION["userid"];
                    $chek = "SELECT user_id FROM usertags WHERE (user_id='$ts')";
                    if ($result = $mysqli->query($chek)) {
                        $rowsCount = $result->num_rows;
                        if ($rowsCount > 0) {
                            $sql = "SELECT tags.name as название FROM tags,users,usertags WHERE users.user_id='$ts' and usertags.user_id=users.user_id and usertags.tags_id=tags.id";
                            if ($result = $mysqli->query($sql)) {
                                $rowsCount = $result->num_rows;
                                foreach ($result as $row) {
                                    echo  "<th scope='col'>Выбранная тема :";
                                    echo $row["название"];
                                    echo "</th>";
                                }
                            }
                            }
                            else
                            {
                                echo  "<th scope='col'>Выберите интересующую тему</th>";
                            }
                        }

                    ?>
            </tr>
            </thead>
            <tr>
                <?php
                $userid=$_SESSION['userid'];
                $sql = "select article.name as Название,article.url as url from likedpost,users,article
where likedpost.post_id=article.id and likedpost.user_id=users.user_id and users.user_id='$userid'";
                if($result = $mysqli->query($sql)){
                    $rowsCount = $result->num_rows;
                    echo "<p></p>";
                    foreach($result as $row){
                        $entry=$row["url"];
                        echo "<tr>";
                        echo "<td><a  ' href=\"$entry\">" . $row["Название"] . "</a></td>";
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
    </div>
</div>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>