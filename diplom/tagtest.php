
<?php session_start();
include("header.php");?>
<?php

$mysqli= new mysqli("localhost", "root", "", "diploma");?>
<div class="container">
    <form method="post" action="tagsconnection.php">
    <div class="list-group list-group-checkable">
        <?php
        $sql = "SELECT * FROM tags";
        if($result = $mysqli->query($sql)){
            $rowsCount = $result->num_rows;
            foreach($result as $row){
                $link=$row["id"];
                $name=$row["name"];
                echo "<input class='list-group-item-check' type='radio' name='list' id='$link' value='$link'>";
                echo "<label class='list-group-item py-3' for='$link'>";
                echo $name;
                echo "</label>";
            }
            echo "</table>";
            $result->free();
        } else{
            echo "Ошибка: " . $mysqli->error;
        }// количество полученных строк
        ?>

    </div>
        <br>
        <input name="submit" class="w-100 btn btn-lg btn-primary" type="submit" value="Выбрать">
    </form>
</div>
<?php include("footer.php");?>
