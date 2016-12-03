<?php
/**
 * Created by PhpStorm.
 * User: sarahschauppenlehner
 * Date: 03.12.16
 * Time: 13:54
 */


$lala = $_POST['text1'];
$lala = explode("\r\n", $lala);
$size = count($lala);

for ($i = 0; $i < $size; $i++) {
    $lala[$i] = explode(";", $lala[$i]);
}


$size2 = count($lala[0]);
$result = array();

for ($i = 0; $i < $size2; $i++)
{
    $tmp = array();
    for ($j = 0; $j < $size; $j++)
    {
        array_push($tmp,$lala[$j][$i]);
    }
    array_push($result,$tmp);
}

echo json_encode($result);
?>