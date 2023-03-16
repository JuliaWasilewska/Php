<form method="post" action="obsluga_formularza.php">
    <label for="liczba1">Liczba 1:</label>
    <input type="number" id="liczba1" name="liczba1" required>

    <label for="liczba2">Liczba 2:</label>
    <input type="number" id="liczba2" name="liczba2" required>

    <label for="dzialanie">Działanie:</label>
    <select id="dzialanie" name="dzialanie" required>
        <option value="dodawanie">Dodawanie</option>
        <option value="odejmowanie">Odejmowanie</option>
        <option value="mnozenie">Mnożenie</option>
        <option value="dzielenie">Dzielenie</option>
    </select>

    <button type="submit">Oblicz</button>
</form>

<?php
$liczba1 = $_POST['liczba1'];
$liczba2 = $_POST['liczba2'];
$dzialanie = $_POST['dzialanie'];

switch ($dzialanie) {
    case 'dodawanie':
        $wynik = $liczba1 + $liczba2;
        break;
    case 'odejmowanie':
        $wynik = $liczba1 - $liczba2;
        break;
    case 'mnozenie':
        $wynik = $liczba1 * $liczba2;
        break;
    case 'dzielenie':
        if ($liczba2 == 0) {
            $wynik = 'Nie można dzielić przez zero';
        } else {
            $wynik = $liczba1 / $liczba2;
        }
        break;
    default:
        $wynik = 'Nieznane działanie';
        break;
}

echo "Wynik działania $dzialanie dla liczb $liczba1 i $liczba2 to: $wynik";
?>
