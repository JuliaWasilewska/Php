<?php
$file = $_GET['file']; // pobierz nazwę pliku z parametru GET

if (!file_exists($file)) { // sprawdź, czy plik istnieje
    echo 'Nie znaleziono pliku.';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Zdjęcie</title>
</head>
<body>
<img src="<?php echo $file; ?>" style="max-width: 100%" />

<div>
    <a href="index.php">Powrót</a>

    <?php
    $dir = 'img/';
    $images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    $index = array_search($file, $images);

    if ($index > 0) {
        $prev = $images[$index - 1];
        echo '<a href="zdjecie.php?file=' . urlencode($prev) . '">Poprzednie</a>';
    }

    if ($index < count($images) - 1) {
        $next = $images[$index + 1];
        echo '<a href="zdjecie.php?file=' . urlencode($next) . '">Następne</a>';
    }
    ?>
</div>
</body>
</html>