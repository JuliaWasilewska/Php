<?php $img = imagecreatetruecolor(150, 100);

$bialy = imagecolorallocate($img, 255, 255, 255);
$zielony = imagecolorallocate($img, 0, 255, 0);
$niebieski = imagecolorallocate($img, 0, 0, 255);
$czerwony = imagecolorallocate($img, 255, 0, 0);
$czarny = imagecolorallocate($img, 0, 0, 0);
$zolty = imagecolorallocate($img, 255, 255, 0);

//POLSKA FLAGA
imagefill($img, 0, 0, $bialy);
imagefilledrectangle($img, 0, 50, 150, 100, $czerwony);

//ramka
imageline($img, 0, 0, 150, 0, $czarny);
imageline($img, 149, 0, 149, 100, $czarny);
imageline($img, 150, 99, 0, 99, $czarny);
imageline($img, 0, 100, 0, 0, $czarny);
imagejpeg($img, "obraz1.jpg");
imagedestroy($img);

//FRANCE FLAGA
$img = imagecreatetruecolor(150, 100);

imagefill($img, 0, 0, $bialy);
imagefilledrectangle($img, 0, 0, 50, 100, $niebieski);
imagefilledrectangle($img, 100, 0, 150, 100, $czerwony);

//ramka
imageline($img, 0, 0, 150, 0, $czarny);
imageline($img, 149, 0, 149, 100, $czarny);
imageline($img, 150, 99, 0, 99, $czarny);
imageline($img, 0, 100, 0, 0, $czarny);
imagejpeg($img, "obraz2.jpg");
imagedestroy($img);

//SZWEDZKA FLAGA
$img = imagecreatetruecolor(150, 100);

imagefill($img, 0, 0, $niebieski);
imagefilledrectangle($img, 30, 0, 50, 100, $zolty);
imagefilledrectangle($img, 0, 40, 150, 60, $zolty);

//ramka
imageline($img, 0, 0, 150, 0, $czarny);
imageline($img, 149, 0, 149, 100, $czarny);
imageline($img, 150, 99, 0, 99, $czarny);
imageline($img, 0, 100, 0, 0, $czarny);
imagejpeg($img, "obraz3.jpg");
imagedestroy($img);

//NORWAY FLAGA
$img = imagecreatetruecolor(150, 100);

imagefill($img, 0, 0, $czerwony);
imagefilledrectangle($img, 25, 0, 55, 100, $bialy);
imagefilledrectangle($img, 0, 40, 150, 60, $bialy);
imagefilledrectangle($img, 30, 0, 50, 100, $niebieski);
imagefilledrectangle($img, 0, 43, 150, 57, $niebieski);

//ramka
imageline($img, 0, 0, 150, 0, $czarny);
imageline($img, 149, 0, 149, 100, $czarny);
imageline($img, 150, 99, 0, 99, $czarny);
imageline($img, 0, 100, 0, 0, $czarny);
imagejpeg($img, "obraz4.jpg");
imagedestroy($img);
?>
<body>
<div>
    <div id='obraz' style='text-align:center'>
        <?php
        echo "<img src=\"obraz1.jpg\" alt=\"obraz1.jpg\" style = \"height: 100px\" />";
        echo "<img src=\"obraz2.jpg\" alt=\"obraz2.jpg\" style = \"height: 100px\" />";
        echo "<img src=\"obraz3.jpg\" alt=\"obraz3.jpg\" style = \"height: 100px\" />";
        echo "<img src=\"obraz4.jpg\" alt=\"obraz4.jpg\" style = \"height: 100px\" />";
        ?>
    </div>
    </div>
</div>
</body>

