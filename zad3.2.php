<?php
function znajdz($kraj) {
    $narodowosc = array(
        "Polska" => "Polak/Polka",
        "Niemcy" => "Niemiec/Niemka",
        "Francja" => "Francuz/Francuzka",
        "Włochy" => "Włoch/Włoszka",
        "Rosja" => "Rosjanin/Rosjanka"
    );

    if (array_key_exists($kraj, $narodowosc)) {
        return $narodowosc[$kraj];
    } else {
        return "Nieznana narodowość";
    }
}
$narodowosc = znajdz("Polska");
echo $narodowosc; // Wypisze "Polak/Polka"
?>