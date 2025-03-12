<?php
// auteur: Matthias van der Meer
// functie: zet de kachel aan

// temp -10 - -1 graden kachel op hoge stand
// temp 0-18 graden kachel normale stand
// temp >18 graden kachel uit

// initialisatie van temperatuur
$temp = 1000000; 
echo" <h1>de temperatuur is: $temp graden <br></h1>";

// temp kleiner dan -10 kachel super hoog
if ($temp <= -10) { echo"kachel op super hoge stand";}

// temp kleiner dan 0 en hoger dan -10 kachel op hoge stand
else if ($temp < 0 && $temp > -10){ echo "kachel aan op hoge stand";}

// temp boven 0 en onder 18 kachel aan op normale stand
else if ($temp <= 18 && $temp > 0){ echo "kachel aan op normale stand";}

// temp boven 18 kachel uit
else if ($temp > 18 && $temp < 50){ echo "kachel uit";}

// temp boven 50 graden freezer mode
else if ($temp > 50 && $temp < 100){ echo "Kachel op freezer mode";}

// temp boven 10000 graden world end
else if ($temp > 10000){ echo "We Gone The world ended in 0.001 milisecond!";}

?>
