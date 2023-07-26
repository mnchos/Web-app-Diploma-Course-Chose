<?php
error_reporting(0);
$mysqli= new mysqli("localhost", "root", "", "diploma");// Right at the top of your script
?>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            $counter=[];
           $Ts=$_SESSION["userid"];
            $sql1="SELECT article.name as Название, article.url as ссылка, articleimg.name as фото,article.id as айди
           from article,articleimg,users,usertags,articletags,tags
           where articleimg.articleid=article.id and articletags.articleid=article.id
           and articletags.tags_id=tags.id
           and usertags.user_id=users.user_id and usertags.user_id=$Ts
             and usertags.tags_id=tags.id";
            if($resultlast = $mysqli->query($sql1)) {
                $rowsCount = $resultlast->num_rows;
                foreach ($resultlast as $row) {
                    $link = $row["ссылка"];
                    $phlink = $row["фото"];
                    $name = $row["Название"];
                    $linkId=$row["айди"];
                    array_push($counter,$linkId);
                    echo "<div class='col'><div class='card shadow-sm h-100'>
                           <a class='shinestuff card-img-top'style='vertical-align: center;width: 100%;height: 100%' href='$link'><img style='vertical-align: center;width: 100%;height: 100%'  src='stuff/img/$phlink' 
                            class='card-img-top'></a>
                        <div class='card-body style='height: 100px'>";
                    echo   "<h6 class='card-title '>$name</h6>
                        </div>
                        <div class='card-footer'>";
                           echo "<div class='btn-group-sm align-content-center'>";
                      echo "<a class='btn btn-warning text-black myclass_btn' href='$link' >Смотреть</a>";
                         echo   "</div>";
                      echo   "</div>";
                 echo   "</div>";
                    echo   "</div>";

                }
            }
            $sql = "SELECT article.name as Название, article.url as ссылка, articleimg.name as фото,article.interest as интерес,article.id as айди from article,articleimg
            where articleimg.articleid=article.id order by интерес desc";
            if($result = $mysqli->query($sql)){
                $rowsCount = $result->num_rows;
                foreach($result as $row){
                    $link=$row["ссылка"];
                    $phlink=$row["фото"];
                    $name=$row["Название"];
                    $linkID=$row["айди"];
                    if(in_array($linkID,$counter))
                    {
                        }
                    else{
                        echo "<div class='col'><div class='card shadow-sm h-100'>
                           <a class='shinestuff' href='$link' style='vertical-align: center;width: 100%;height: 100%'> <img style='vertical-align: center;width: 100%;height: 100%' src='stuff/img/$phlink' 
                            class='card-img-top '></a>
                        <div class='card-body'style='height: 100px'>";
                        echo   "<h6 class='card-title'>$name</h6>
                        </div>
                        <div class='card-footer'>";
                        echo "  <div class='btn-group-sm align-content-center'>";
                        echo "<a  class='btn btn-warning text-black myclass_btn' href='$link' >Смотреть</a>";
                        echo   "</div>";
                        echo   "</div>";
                        echo   "</div>";
                        echo   "</div>";
                }
                }
                echo "</table>";
                $result->free();
            } else{
                echo "Ошибка: " . $mysqli->error;
            }// количество полученных строк
            ?>
        </div>
    </div>
</div>
