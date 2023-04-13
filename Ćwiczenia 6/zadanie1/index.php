<?php

require "dane.php";
require "funkcje.php";

if(isset($_POST['list']) && isset($_POST['liczba_jedzenia']))
{

    $ustawione_boxy = $_POST['checkbox'];


    $_POST['wynik'] = oblicz($_POST['list'], $_POST['liczba_jedzenia'], $ustawione_boxy);
}

if(isset($_POST['wynik']))
{
    $wynik = $_POST['wynik'];
} else {
    $wynik = "Najpierw wszystko wybierz";
}

?>

<BODY>

<form name="form" action="index.php" method="POST">
    <table>
        <TR>
            <TD>Wybierz jedzenie: </TD>
            <TD>
                <select name="list">
                    <?php
                    foreach(get_rodzaje_jedzenia() as $key => $value){ ?>
                        <option> <?php echo $key . " " . $value; ?></option>
                    <?php } ?>
                </select> </TD>
        </TR>
        <TR>
            <TD>Wpisz ilosc glownego jedzenia: </TD>
            <TD><INPUT type= "number" name="liczba_jedzenia"></TD>
        </TR>
        <TR>
            <TD>Dodatki: </TD>
            <TD><?php

                foreach (get_rodzaje_dodatkow() as $key => $value) {
                    echo  $key . " - " . $value;
                    echo '<input type = "checkbox" value="'.$key.'"name = checkbox[]"/>';
                }
                    ?>
            </TD>
        </TR>
        <TR>
            <TD>Wynik: </TD>
            <TD><?php echo $wynik; ?> </TD>
        </TR>
        <TR>
            <TD>&nbsp;</TD>
            <TD><INPUT type="submit" value="Oblicz"></TD>
        </TR>
    </table>
</form>
</BODY>