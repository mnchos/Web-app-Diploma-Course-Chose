<?php
    session_start();

$mysqli = new mysqli("localhost", "root", "", "diploma");// Right at the top of your script
$url=$_SESSION["link"];
echo $url;
$kaf=0;
$sql = "SELECT article.id as Айди,article.interest as коф FROM article WHERE url='$url'";
if ($result = $mysqli->query($sql)) {
    $rowsCount = $result->num_rows;
    foreach ($result as $row) {
        echo "<td>" . $row["Айди"] . "</td>";
        $articleid = $row["Айди"];
        $kaf=$row["коф"];
        break;
    }
    echo $articleid;
    $kaf=$kaf+1;
}
$mysqli= new mysqli("localhost", "root", "", "diploma");
    $stmt = $mysqli->prepare('UPDATE article SET interest = ? WHERE id = ?');
    $stmt->bind_param('ii',$kaf,$articleid);
    $stmt->execute();
    echo 'бебра';
?>