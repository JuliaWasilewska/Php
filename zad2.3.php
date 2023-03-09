</php


function ocenzuruj($zdanie, $niepozadane_slowa) {
$slowa = explode(" ", $zdanie); // rozbijanie zdania na słowa
foreach ($slowa as &$slowo) { // dla każdego słowa w zdaniu
if (in_array(strtolower($slowo), $niepozadane_slowa)) { // sprawdzanie, czy słowo jest na liście niepożądanych słów
$dlugosc_slowa = strlen($slowo); // obliczanie długości słowa
$slowo = str_repeat("*", $dlugosc_slowa); // zamiana słowa na gwiazdki o takiej samej długości
}
}
$ocenzurowane_zdanie = implode(" ", $slowa); // łączenie słów w zdanie
return $ocenzurowane_zdanie; // zwracanie ocenzurowanego zdania
}
$zdanie = "To jest niepożądane zdanie z niepożądanymi słowami.";
$niepozadane_slowa = array("niepożądane", "słowa");
$ocenzurowane_zdanie = ocenzuruj($zdanie, $niepozadane_slowa);
echo $ocenzurowane_zdanie; // wyświetli "To jest ********* zdanie z *********** ******."
