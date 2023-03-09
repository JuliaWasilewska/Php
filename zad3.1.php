<?php
function get_array_element($index) {
    $array = array(10, 20, 30, 40, 50); // Przykładowa tablica z losowymi liczbami
    return $array[$index];
}
$element = get_array_element(2); // Pobierz element o indeksie 2 (czyli 30)
echo $element; // Wypisz wartość pobranego elementu (30)
?>