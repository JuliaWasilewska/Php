<?php

$miesiac = 2;
$rok = 2024;

if ($miesiac == 2) {
    if (($rok % 4 == 0 && $rok % 100 != 0) || $rok % 400 == 0) {
        echo "Miesiąc ma 29 dni"; // rok przestępny
    } else {
        echo "Miesiąc ma 28 dni"; // zwykły rok
    }
} else if ($miesiac == 4 || $miesiac == 6 || $miesiac == 9 || $miesiac == 11) {
    echo "Miesiąc ma 30 dni"; // kwiecień, czerwiec, wrzesień, listopad mają 30 dni
} else if ($miesiac == 1 || $miesiac == 3 || $miesiac == 5 || $miesiac == 7 || $miesiac == 8 || $miesiac == 10 || $miesiac == 12) {
    echo "Miesiąc ma 31 dni"; // styczeń, marzec, maj, lipiec, sierpień, październik, grudzień mają 31 dni
} else {
    echo "Nieprawidłowy numer miesiąca";
}

?>
