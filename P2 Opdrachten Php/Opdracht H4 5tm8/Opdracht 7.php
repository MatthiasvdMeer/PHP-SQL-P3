<?php

// auteur: Matthias van der Meer
// functie: bereken hoeveel ik nog tekort kom voor een telefoon

$spaargeld = 750; 
$telefoonPrijs = 1000; 
$tekort = $telefoonPrijs - $spaargeld;


if ($spaargeld >= $telefoonPrijs) {
    $over = $spaargeld - $telefoonPrijs;
    echo "Gefeliciteerd! Je kunt de telefoon kopen. Je hebt nog €$over over voor een hoesje.";
} elseif ($tekort > 250) {
    echo "Je komt €$tekort tekort. Het is misschien een goed idee om een baantje te zoeken.";
} else {
    echo "Je bent er bijna! Je komt nog €$tekort tekort.";
}
?>
