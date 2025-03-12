<?php
//creator: Matthias van der Meer
// Functie: omtrek en oppervlakte van een cirkel berekenen
function bereken_cirkel($straal) {
    $pi = 3.14;  
    $omtrek = 2 * $pi * $straal;  
    $oppervlakte = $pi * pow($straal, 2);  

   
    return array(
        'omtrek' => $omtrek,
        'oppervlakte' => $oppervlakte
    );
}


$straal = 5;  
$resultaten = bereken_cirkel($straal);


echo "Voor een cirkel met straal $straal:</br>";
echo "Omtrek: " . $resultaten['omtrek'] . "</br>";
echo "Oppervlakte: " . $resultaten['oppervlakte'] . "</br>";
?>