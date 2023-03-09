<?php
function mnozenie($size){
    for($i = 1; $i <= $size; $i++){
        for ($j = 1; $j <= $size; $j++) {
            $wynik = $i * $j;
            $Zapiswynik = str_pad($wynik ,4,'', STR_PAD_LEFT);
            echo $Zapiswynik;

        }
echo"\n";
    }

}
mnozenie(10);
?>