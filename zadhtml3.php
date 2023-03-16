<?php

// Tablica krajów i cen za pobyt 1 osoby przez 1 dzień
$countries = array(
    'Polska' => 100,
    'Niemcy' => 150,
    'Francja' => 200,
    'Włochy' => 250
);

?>
    <form method="POST" action="obliczenia.php">
        <label for="start">Data rozpoczęcia:</label>
        <input type="date" id="start" name="start" required>
        <br>
        <label for="end">Data zakończenia:</label>
        <input type="date" id="end" name="end" required>
        <br>
        <label for="people">Liczba osób:</label>
        <input type="number" id="people" name="people" min="1" required>
        <br>
        <label for="country">Kraj:</label>
        <select id="country" name="country" required>
            <?php
            foreach ($countries as $key => $value) {
                echo "<option value='$key'>$key</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Oblicz">
    </form>
<?php

// Sprawdzenie czy wypełniono wszystkie pola
if (isset($_POST['start']) && isset($_POST['end']) && isset($_POST['people']) && isset($_POST['country'])) {

    // Pobranie danych z formularza
    $start = $_POST['start'];
    $end = $_POST['end'];
    $people = $_POST['people'];
    $country = $_POST['country'];

    // Sprawdzenie czy zakres dat jest prawidłowy
    if ($start < $end) {

        // Obliczenie ceny pobytu
        $days = ceil((strtotime($end) - strtotime($start)) / 86400);
        $price = $days * $people * $countries[$country];

        // Wyświetlenie wyniku
        echo "Cena pobytu wynosi: $price zł.";

    } else {
        echo "Nieprawidłowy zakres dat.";
    }

} else {
    echo "Nie wypełniono wszystkich pól.";
}
?>
