<?php
session_start();



// wczytanie funkcji koszyka
require_once('funkcje.php');

// odczytanie produktów z pliku csv
$produkty = odczytaj_produkty();


// dodanie produktu do koszyka, jeśli przesłano formularz
if (isset($_POST['dodaj_do_koszyka'])) {
    $produkt_id = $_POST['produkt_id'];
    dodaj_do_koszyka($produkt_id);
    header('Location: index.php');
    exit;
}

// wyświetlenie listy produktów
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sklep internetowy</title>
</head>
<body>
    <h1>Sklep internetowy</h1>
    <table>
        <tr>
            <th>Nazwa</th>
            <th>ilość</th>
            <th>Cena</th>
            <th></th>
        </tr>
        <?php foreach ($produkty as $i => $produkt): ?>
        <tr>
            <td><?= $produkt['nazwa'] ?></td>
            <td><?= $produkt['ilosc'] ?> zł</td>
            <td><?= $produkt['cena'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="produkt_id" value="<?= $i ?>">
                    <button type="submit" name="dodaj_do_koszyka">Do koszyka</button>
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <p><a href="koszyk.php">Przejdź do koszyka</a></p>
</body>
</html>
