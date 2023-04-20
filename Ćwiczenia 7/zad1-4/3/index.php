<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
    <title>Galeria obrazów</title>
</head>
<body>
<?php $imgDir = "./imagesSMALL";
//odczytanie parametru
if(isset($_GET['id'])) {
    $imgId = $_GET['id'] * 4;
}
else{
    $imgId = 0;
}
//odczytanie zawarto¶ci katalogu
$dir = scandir($imgDir);
array_shift ($dir);
array_shift ($dir);
$count = count($dir);
//sprawdzenie poprawno ci parametru
if($imgId< 0 || $imgId >= $count || !is_Numeric($imgId)) {
    $imgId = 0;
}
//ustalenie nazwy bież±cego obrazu oraz
//identyfikatorów obrazów dla odno¶ników
$imgName = $dir["$imgId"];
$first = 0;
$last = $count;

if($imgId< $count - 5) {

}
else{
    $next = $count - 1;
}
if($imgId > 0) {
    $prev = $imgId - 4;
}
else{
$prev = 0;
}

$next = $imgId / 4 + 1;
$prev = $imgId / 4 - 1;

$indentyfikatory = array();
while($first < $last)
{
    $indentyfikatory[] = $dir[$first];
    $first++;
}


$last = floor($count / 4);
?>
<div>
    <div id='zdjecia' style='text-align:center'>
        <?php
        for ($index = $imgId, $repeat = 0; $repeat < 4 && $index <= sizeof($indentyfikatory); $index++, $repeat++)
        {
                $value = $indentyfikatory[$index];

            echo "<img src=\"$imgDir/$value\" alt=\"$value\" style = \"height: 100px\"  />";
            echo "<a href=\"zdjecie.php?id=$index\">$value</a> ";
        }
        ?>
    </div>
    <div id = 'nawigacja' style = 'text-align: center'>
        <?php
        echo "<a href=\"index.php?id=$first\">Pierwsza strona</a> </br> ";
        if($prev >= 0)
            echo "<a href=\"index.php?id=$prev\">Poprzednia strona</a> </br>";
        if($next < $count / 4)
            echo "<a href=\"index.php?id=$next\">Nastepna strona</a> </br>";
        echo "<a href=\"index.php?id=$last\">Ostatnia strona</a> </br>";

        ?>
    </div>
</div>
</body>
</html>