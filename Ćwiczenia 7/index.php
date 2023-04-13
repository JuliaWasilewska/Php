<?php
$dir = 'img/'; // ścieżka do folderu z obrazkami
$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE); // pobierz obrazki z folderu

foreach ($images as $image) {
    echo '<a href="zdjecie.php?file=' . urlencode($image) . '"><img src="' . $image . '" style="height: 100px" /></a>';
}
?>
<?php
$dir = 'img/thumbnails/';
$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// stronicowanie
$limit = 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$total_pages = ceil(count($images) / $limit);
$offset = ($page - 1) * $limit;
$images = array_slice($images, $offset, $limit);

foreach ($images as $image) {
    echo '<a href="zdjecie.php?file=' . urlencode(str_replace('thumbnails/', 'full/', $image)) . '"><img src="' . $image . '" style="height: 100px" /></a>';
}

// przyciski stronicowania
if ($total_pages > 1) {
    echo '<div>';

    if ($page > 1) {
        echo '<a href="index.php?page=' . ($page - 1) . '">Poprzednia strona</a> ';
    }

    if ($page < $total_pages) {
        echo '<a href="index.php?page=' . ($page + 1) . '">Następna strona</a>';
    }

    echo '</div>';
}
?>
