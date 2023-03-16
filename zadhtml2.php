<!DOCTYPE html>
<html>
<head>
    <title>Sprawdź, czy liczba jest liczbą pierwszą</title>
</head>
<body>
<form method="post" action="liczba_pierwsza.php">
    <label>Podaj liczbę całkowitą dodatnią:</label><br>
    <input type="number" name="liczba" required><br>
    <button type="submit">Sprawdź</button>
</form>
</body>
</html>

<?php


if (isset($_POST['liczba'])) {
    $liczba = $_POST['liczba'];

    if (!ctype_digit($liczba) || $liczba < 1) {
        echo "Wprowadzona wartość nie jest liczbą całkowitą dodatnią.";
    } else {
        $start = microtime(true);
        $jest_pierwsza = true;
        for ($i = 2; $i <= sqrt($liczba); $i++) {
            if ($liczba % $i == 0) {
                $jest_pierwsza = false;
                break;
            }
        }
        $koniec = microtime(true);
        $czas_wykonania = $koniec - $start;
        $ile_iteracji = $i - 2;
        if ($jest_pierwsza) {
            echo "Liczba " . $liczba . " jest liczbą pierwszą.";
        } else {
            echo "Liczba " . $liczba . " nie jest liczbą pierwszą.";
        }
        echo "<br>Czas wykonania: " . $czas_wykonania . " sekund.";
        echo "<br>Ilość iteracji pętli: " . $ile_iteracji;
    }
}
?>
