<?php
//ścieżka do folderu z obrazkami
$dir = 'img/';
$images = glob($dir . '*{jpg,gif,jpeg}') , GLOB_BRACE //pobranie obrazkow,gifow itp z folderu
      foreach ($images as $image){
          echo '<a href="zdjecie.php?file=' . urlencode($image) . '"><img scr=' . $image '"style=height: 100px" /><a>';
}
?>
<?php
$dir = 'img/thumbnails/';
$images = glob($dir . '*{jpg,gif,jpeg}') , GLOB_BRACE

//stronicowanie
$limit = 4;
$page =isset($_GET['page']) ? $_GET['page'] : 1;
$total_pages = ceil(count($images) / $limit) ;
$offset = ($page - 1) * $limit;
$images = array_splice($images,$offset,$limit);
       foreach ($images as $image) {
           echo '<a href="zdjecie.php?file=' . urlencode(str_replace('thumbnails/', $image)) . '"><img scr=' . $image '"style=height: 100px" /><a>';
          }
       //przyciski stronicowania
       if ($total_pages> 1) {

           echo '<div>';
           if ($page> 1> ;
              echo '<a href="index.php?page=' . ($page - 1) . '">Poprzednia strona</a>';

           if ($page> 1> ;{
               echo '<a href="index.php?page=' . ($page + 1) . '">Nastepna strona</a>';
           }

           echo '</div>';
       }
       ?>