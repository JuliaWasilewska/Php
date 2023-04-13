<?php
session_start();

// wczytanie funkcji koszyka
require_once('funkcje.php');

//wczytujemy produkty
$produkty = odczytaj_produkty();

// usunięcie produktu z koszyka, jeśli przesłano formularz
if (isset($_POST['usun_z_koszyka'])) {
    $produkt_id = $_POST['produkt_id'];

    //Jezeli usuwany produkt jest w ilosci wiekszej niz 1, to usuwamy pojedynczy
    if($_SESSION['koszyk'][$produkt_id] > 1) {
        $_SESSION['koszyk'][$produkt_id]--;
    } else {
        //Produkt pojedynczy. Usuwamy kompletnie.
        usun_z_koszyka($produkt_id);
    }
    header('Location: koszyk.php');
    exit;

}

// wyczyszczenie koszyka, jeśli przesłano formularz
if (isset($_POST['wyczysc_koszyk'])) {
    wyczysc_koszyk();
    header('Location: koszyk.php');
    exit;
}
// wyświetlenie zawartości koszyka
$produkty_w_koszyku = array();
if (isset($_SESSION['koszyk'])) {
    foreach ($_SESSION['koszyk'] as $produkt_id => $ilosc) {
        $produkt = $produkty[$produkt_id];
        $produkt['ilosc'] = $ilosc;
        $produkt['id'] = $produkt_id;
        $produkty_w_koszyku[] = $produkt;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Koszyk</title>
</head>
<body>
    <h1>Koszyk</h1>
    <?php if (empty($produkty_w_koszyku)): ?>
        <p>Koszyk jest pusty.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Nazwa</th>
                <th>Cena</th>
                <th>Ilość</th>
                <th></th>
            </tr>
            <?php foreach ($produkty_w_koszyku as $i => $produkt): ?>
            <tr>
                <td><?= $produkt['nazwa'] ?></td>
                <td><?= $produkt['cena'] ?> zł</td>
                <td><?= $produkt['ilosc'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden"  name="produkt_id" value="<?= $produkt['id'] ?>">
                        <button type="submit" name="usun_z_koszyka">Usuń</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
        <form method="post">
            <button type="submit" name="wyczysc_koszyk">Wyczyść koszyk</button>
        </form>
    <?php endif ?>
    <p><a href="index.php">Wróć do sklepu</a></p>
</body>
</html>
