<?php
// dodanie produktu do koszyka
function dodaj_do_koszyka($produkt_id) {
    if (!isset($_SESSION['koszyk'])) {
        $_SESSION['koszyk'] = array();
    }
    if (!isset($_SESSION['koszyk'][$produkt_id])) {
        $_SESSION['koszyk'][$produkt_id] = 0;
    }
    $_SESSION['koszyk'][$produkt_id]++;
}

// usunięcie produktu z koszyka
function usun_z_koszyka($produkt_id) {
        if(isset($_SESSION['koszyk'][$produkt_id]))
        {
            unset($_SESSION['koszyk'][$produkt_id]);
        }
}

// wyczyszczenie koszyka
function wyczysc_koszyk() {
    unset($_SESSION['koszyk']);
}


function odczytaj_produkty()
{
    $produkty = array();
    if (($handle = fopen("produkty.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $produkty[] = array(
                'nazwa' => $data[0],
                'ilosc' => $data[1],
                'cena' => $data[2]
            );
        }
        fclose($handle);
    }
    return $produkty;
}

