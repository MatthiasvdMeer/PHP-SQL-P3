<?php

// auteur: Matthias van der Meer
// functie: is een gtal even of oneven

$getal = 8; 
function isEvenOrOdd($number) {
    if ($number % 2 == 0) {
        return "Het getal $number is even.";
    } else {
        return "Het getal $number is oneven.";
    }
}

echo isEvenOrOdd($getal);
?>
