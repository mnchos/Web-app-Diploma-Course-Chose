<?php
$mysqli= new mysqli("localhost", "root", "", "diploma");// Right at the top of your script
?>
<?php include("header.php");?>
<div class="container">
    <div >
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Тип</th>
            </tr>
            </thead>
            <tr>
                <?php
                $sql = "SELECT article.name as имя,article.url,articletype.name FROM article,articletype
                    where article.type_Id=articletype.id";
                if($result = $mysqli->query($sql)){
                $rowsCount = $result->num_rows;

                    foreach($result as $row){$entry=$row["url"];
                        echo "<tr>";
                        echo "<td><a  ' href=\"$entry\">" . $row["имя"] . "</a></td>";
                        echo "<td>" . $row["name"] . "</td>";
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