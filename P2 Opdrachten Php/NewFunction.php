<?php


function printjouwinfo($naam, $leeftijd, $woonplaats){
    echo "mijn personal info is: $naam, $leeftijd, $woonplaats <br>";
}

function berekenbtw($bedrag, $perc){
    $uitkomst = $bedrag * (1 + $perc / 100);
    return $uitkomst;
}

?>