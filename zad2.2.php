<?php
function
srednica_kola($promien) {
    $srednica = 2 *$promien;
    // obliczanie średnicy na postawie podanego promienia
    return $srednica;
    // zwórecnie obliczonej wartości średnicy
}
$promien = 5; // promien koła to 5 jednostek
$srednica = srednica_kola($promien); // obliczanie srednicy koła na podstawie promienia
echo "Średnica koła o promieniu $promien wynosi $srednica.";
// wyświetlenie wyniku obliczen
