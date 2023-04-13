<?php
session_start();
function checkVictory($tab){
    for($i = 0; $i < 3; $i++){
        if($tab[$i][0] == $tab[$i][1] and $tab[$i][1] == $tab[$i][2] and $tab[$i][0] != ".."){
            return true;
        }
        if($tab[0][$i] == $tab[1][$i] and $tab[1][$i] == $tab[2][$i] and  $tab[0][$i] != ".."){
            return true;
        }
    }
    if ($tab[0][0] == $tab[1][1] and $tab[1][1] == $tab[2][2] and $tab[0][0] != ".."){
        return true;
    }
    if ($tab[0][2] == $tab[1][1] and $tab[1][1] == $tab[2][0] and $tab[0][2] != ".."){
        return true;
    }
    return false;
}

function printBoard($tab){
    echo (" 0 |  1  |  2  |  3  |");
    echo ("<br/>");
    echo ("1 | " . printsup(0,0,$tab) . " | " . printsup(0,1,$tab) . " | " . printsup(0,2,$tab) . " |");
    echo ("<br/>");
    echo (" 2 | " . printsup(1,0,$tab) . " | " . printsup(1,1,$tab) . " | " . printsup(1,2,$tab) . " |");
    echo ("<br/>");
    echo (" 3 | " . printsup(2,0,$tab) . " | " . printsup(2,1,$tab) . " | " . printsup(2,2,$tab) . " |");
    echo ("<br/>");
}
function printsup($row,$column,$tab){
    if($tab[$row][$column] == ".."){
        return "<INPUT TYPE=radio name='pole' value='$row.$column'>";
    }
    else{
        return $tab[$row][$column];
    }
}
function player($round){
    if($round % 2 == 1){
        return 1;
    }
    else{
        return 2;
    }
}
function ruch($round,$row,$column,$tab){
    if($round % 2 == 1){
        $player = 1;
    }
    else{
        $player = 2;
    }
    if ($tab[$row][$column] == ".."){
        if($player == 1){
            $tab[$row][$column] = "o";
        }
        else{
            $tab[$row][$column] = "x";
        }
    }
    else{
        header("location: Ex3.php");
    }
    return $tab;
}
if(isset($_SESSION["tab"])){
    $tab = $_SESSION["tab"];
    $round = $_SESSION["round"];

    if(isset($_POST['send'])){
        for($row=0;$row < 3;$row++){
            for($column=0;$column<3;$column++){
                if($_POST['pole'] == "$row.$column"){
                    $tab = ruch($round,$row,$column,$tab);
                    $_SESSION["tab"] = $tab;
                    $_SESSION["round"] += 1;
                }
            }
        }
    }
    else{
        $_SESSION["tab"] = [["..","..",".."],["..","..",".."],["..","..",".."]];
        $_SESSION["round"] = 1;
    }
    if(!checkVictory($_SESSION["tab"])){
        if($_SESSION["round"] == 10){
            $_SESSION["tab"] = [["..","..",".."],["..","..",".."],["..","..",".."]];
            $_SESSION["round"] = 1;
            header("location: Ex3.php");
        }
        ?>
        <html>
            <body>
                <?php echo "Player's " . player(player($_SESSION["round"])) . " turn"; ?>
                <form method="post">
                    <?php printBoard($_SESSION["tab"]) ?>
                    <input type="submit" name="send" value="send">
                </form>
            </body>
        </html>
        <?php
    }
    else{
        ?>
        <html>
            <body>
            <?php echo "Player " . player($_SESSION["round"] - 1) . " won!";?>
            </body>
        </html>
        <?php
    }
}
else{
    $_SESSION["tab"] = [["..","..",".."],["..","..",".."],["..","..",".."]];
    $_SESSION["round"] = 0;
    header("location: Ex3.php");
}


