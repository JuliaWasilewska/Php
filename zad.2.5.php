<?php
function pole_trojkata() {
    echo "Podaj długość podstawy trójkąta: ";
    $a = readline();
    echo "Podaj wysokość trójkąta: ";
    $h = readline();
    $pole = 0.5 * $a * $h;
    echo "Pole trójkąta wynosi: " . $pole . "\n";
}

function pole_prostokata() {
    echo "Podaj długość boku a: ";
    $a = readline();
    echo "Podaj długość boku b: ";
    $b = readline();
    $pole = $a * $b;
    echo "Pole prostokąta wynosi: " . $pole . "\n";
}

function pole_trapezu() {
    echo "Podaj długość górnej podstawy trapezu: ";
    $a = readline();
    echo "Podaj długość dolnej podstawy trapezu: ";
    $b = readline();
    echo "Podaj wysokość trapezu: ";
    $h = readline();
    $pole = 0.5 * ($a + $b) * $h;
    echo "Pole trapezu wynosi: " . $pole . "\n";
}

echo "Kalkulator pól powierzchni\n";
echo "Wybierz figurę, której pole chcesz obliczyć:\n";
echo "1. Trójkąt\n";
echo "2. Prostokąt\n";
echo "3. Trapez\n";
$figura = readline();

switch ($figura) {
    case 1:
        pole_trojkata();
        break;
    case 2:
        pole_prostokata();
        break;
    case 3:
        pole_trapezu();
        break;
    default:
        echo "Niepoprawna opcja\n";
}
?>

