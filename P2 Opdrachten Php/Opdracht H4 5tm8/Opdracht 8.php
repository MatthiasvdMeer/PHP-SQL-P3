<?php

// auteur: Matthias van der Meer
// functie: is de persoon oud genoeg voor een scooter rijbewijs en is de persoon oud genoeg om te stemmen, zo ja heeft hij een stempas?

$leeftijd = 17; 
$heeftStempas = false; 


if ($leeftijd >= 16) {
    echo "Je mag een scooter rijbewijs halen.<br>";
} else {
    echo "Je bent nog te jong om een scooter rijbewijs te halen.<br>";
}


if ($leeftijd >= 18) {
    if ($heeftStempas) {
        echo "Je mag stemmen.<br>";
    } else {
        echo "Je mag niet stemmen omdat je geen stempas hebt ontvangen.<br>";
    }
} else {
    echo "Je bent nog te jong om te stemmen.<br>";
}
?>
