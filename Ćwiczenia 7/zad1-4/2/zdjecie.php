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
    if($_GET['imgid'] == -1)
    {
        header("location: index.php");

    } else {
        $imgId = $_GET['imgid'];
    }

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
$last = $count - 1;

if($imgId< $count - 1) {
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
}
?>
<div>
    <div id='obraz' style='text-align:center'>
        <?php
        echo "<img src=\"$imgDir/$imgName\" alt=\"$imgName\" style = \"height: 100px\" />";

        ?>
    </div>
    <div id='opis' style='text-align:center'>
        <?php

        $imgId++;
        echo "obraz $imgName ($imgId z $count)";
        ?>
    </div>
    <div id='nawigacja' style='text-align:center'>
        <?php
        echo "<a href=\"zdjecie.php?imgid=-1\">POWROT</a> ";
        echo "<a href=\"zdjecie.php?imgid=$first\">Pierwszy</a> ";
        echo "<a href=\"zdjecie.php?imgid=$prev\">Poprzedni</a>";
        echo "<a href=\"zdjecie.php?imgid=$next\">Nastepny</a>";
        echo "<a href=\"zdjecie.php?imgid=$last\">Ostatni</a>";
        ?>
    </div>
</div>
</body>
</html>