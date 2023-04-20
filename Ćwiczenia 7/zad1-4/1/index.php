<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
    <title>Galeria obrazów</title>
</head>
<body>
<?php $imgDir = "./images";
//odczytanie parametru
if(isset($_GET['imgid'])) {
    $imgId = $_GET['imgid'];
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

$indentyfikatory = array();
while($first < $last)
{
    $indentyfikatory[] = $dir[$first];
    $first++;
}

/*if($imgId< $count - 1) {
    $next = $imgId + 1;
}
else{
    $next = $count - 1;
}
if($imgId > 0) {
    $prev = $imgId - 1;
}
else{
$prev = 0;
}*/
?>
<div>
    <div id='obraz' style='text-align:center'>
    <?php
    foreach ($indentyfikatory as $value)
    {
        echo "<img src=\"$imgDir/$value\" alt=\"$value\" style = \"height: 100px\" />";
    }

    ?>
    </div>
    <div id='opis' style='text-align:center'>
    <?php

    $imgId++;
    //echo "obraz $imgName ($imgId z $count)";
    ?>
</div>
<div id='nawigacja' style='text-align:center'>
    <?php
//echo "<a href=\"index.php?imgid=$first\">Pierwszy</a> ";
//echo "<a href=\"index.php?imgid=$prev\">Poprzedni</a>";
//echo "<a href=\"index.php?imgid=$next\">Nastepny</a>";
//echo "<a href=\"index.php?imgid=$last\">Ostatni</a>";
?>
</div>
</div>
</body>
</html>