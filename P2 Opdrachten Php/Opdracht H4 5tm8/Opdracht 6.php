<?php

// auteur: Matthias van der Meer
// functie: Beslis of de airco aan of uit moet

$currentHour = date("H"); 
$temperature = 22; 
$luchtvocht = 88; 

function Aircostatus($currentHour, $temperature, $luchtvocht) {
    if ($currentHour >= 5 || ($temperature < 20 && $luchtvocht < 85)) {
        return "De airco is UIT.";
    } else {
        return "De airco is AAN.";
    }
}

$aircoStatus = Aircostatus($currentHour, $temperature, $luchtvocht);
echo $aircoStatus;
?>
