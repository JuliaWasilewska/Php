<?php
$dzien = 3;
//zmienna przechowująca numer dnia tygodnia



//dni tygodnia
switch ($dzien){
    case 1:
echo "Poniedziałek";
    break;
    case 2:
echo "Wtorek";
    break;
    case 3:
echo "Środa";
    break;
    case 4:
echo "Czwartek";
    break;
    case 5:
echo "Piątek";
    break;
    case 6:
echo " Sobota";
     break;
    case 7:
echo " Niedziela";
     break;
    default:
        echo" Niepoprawny numer dnia tygodnia";
}
?>

//$dzien przechowuje numer dnia tygodnia - potem uzywamy switch'a do słownego wypisania
