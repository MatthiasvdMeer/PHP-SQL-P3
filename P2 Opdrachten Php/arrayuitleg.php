<?php
// auteur: Matthias van der Meer
// purpose: array gebruiken

$y = "me";
$z = "not";

$x[0] = "$z";
$x[1] = "$y";

echo $x[0];
echo "<br><br>";

$c = [10, 4, 5, 3, 7, 1];
for ($i = 0; $i < 6; $i++) {
    # code...
echo "Waarde van i: $i cijfer: " . $c[$i] . "<br>";

}
echo "<br>";
echo "Het gemiddelde cijfer:";


?>