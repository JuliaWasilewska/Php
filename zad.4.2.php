<?php
function rollDice($numRolls){
    $redults = array();

    for ($i = 0; $i < $numRolls; $i++)
    {
        $result = rand(1,6);
array_push($results, $result);
    }
    return $results;
}
$results = rollDice(5);
print_r($results);
?>
