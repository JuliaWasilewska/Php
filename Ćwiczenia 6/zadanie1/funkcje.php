<?php


function oblicz($rodzaj, $ilosc, $dodatki)
{
    $rodzaj = explode(" ", $rodzaj);

    $cena = get_rodzaje_jedzenia()[$rodzaj[0]] * $ilosc;

    foreach ($dodatki as $value)
    {
        $cena += get_rodzaje_dodatkow()[$value];
    }

    return $cena;
}