<?php

$plansza = array(
    array('_', '_', '_'),
    array('_', '_', '_'),
    array('_', '_', '_')
);

$biezacyGRACZ = 'X';

while (true) {
    echo "\nAktualny stan planszy:\n";
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            echo $plansza[$i][$j] . ' ';
        }
        echo "\n";
    }

    echo "\nGracz " . $biezacyGRACZ . ", podaj numer wiersza (0-2): ";
    $row = intval(trim(fgets(STDIN)));

    echo "Gracz " . $biezacyGRACZ . ", podaj numer kolumny (0-2): ";
    $col = intval(trim(fgets(STDIN)));

    if ($plansza[$row][$col] != '_') {
        echo "\nTo pole jest już zajęte, musisz wybrać inne!\n";
        continue;
    }

    $plansza[$row][$col] = $biezacyGRACZ;

    // Sprawdź, czy gra się już powinna zakończyć
    $wygrany = false;
    for ($i = 0; $i < 3; $i++) {
        if ($plansza[$i][0] != '_' && $plansza[$i][0] == $plansza[$i][1] && $plansza[$i][1] == $plansza[$i][2]) {
            $wygrany = true;
        }
    }
    for ($j = 0; $j < 3; $j++) {
        if ($plansza[0][$j] != '_' && $plansza[0][$j] == $plansza[1][$j] && $plansza[1][$j] == $plansza[2][$j]) {
            $wygrany = true;
        }
    }
    if ($plansza[0][0] != '_' && $plansza[0][0] == $plansza[1][1] && $plansza[1][1] == $plansza[2][2]) {
        $wygrany = true;
    }
    if ($plansza[0][2] != '_' && $plansza[0][2] == $plansza[1][1] && $plansza[1][1] == $plansza[2][0]) {
        $wygrany = true;
    }
    $isplanszaFull = true;
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($plansza[$i][$j] == '_') {
                $isplanszaFull = false;
            }
        }
    }

    if ($wygrany) {
        echo "\nGracz " . $biezacyGRACZ . " wygrał!\n";
        break;
    } else if ($isplanszaFull) {
        echo "\nRemis!\n";
        break;
    }

    // zmień gracza
    $biezacyGRACZ = ($biezacyGRACZ == 'X') ? 'O' : 'X';
}

?>