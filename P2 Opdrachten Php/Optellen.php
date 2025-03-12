<?php

// auteur: Matthias
// functie: Optellen getallen (opdracht 4.4.10)

// Vul een array met 4 getallen

$getallen = [10, 345, 34, 4];

$aantal = count($getallen);
echo    "Aantal getallen $aantal<br>";
$som = 0;

echo $getallen[0] . "<br><br>";

// print alle getallen in het array $getallen met een for-loop

for ($i = 0; $i < $aantal; $i++) {

    // tel waarden op
    $som = $getallen[$i] + $som;
    echo $getallen[$i] . "<br>";
}

echo "Som is: $som<br>";


?>