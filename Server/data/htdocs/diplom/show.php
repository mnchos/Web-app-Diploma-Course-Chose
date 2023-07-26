<?php
$sql = new mysqli('localhost', 'root', '', 'diploma');
$q = $_REQUEST["a"];
echo "Результаты поиска: $q<br><br>";
$show_table = $sql->query('SELECT * FROM article');
while($data =$show_table -> fetch_object())
{
    $mystring = "$data->name";
    $findme   = $q;
    $pos = mb_stripos($mystring, $findme);
    if ($pos === false )
    {
    }
    else
    {
        echo "<a class='shinesearch' ' href=\"$data->url\">" . $data->name . "</a><br>";
    }
}
?>