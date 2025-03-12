<?php
//creator: Matthias van der Meer
//purpose: wanneer prijs boven 150 euro prijs met 11% omhoog, prijs onder 55 euro 19% omhoog.

$products = [
    "Laptop" => 200,
    "Hoofdtelefoon" => 50,
    "Boek" => 30,
    "Smartphone" => 180,
    "Muismat" => 20,
];


foreach ($products as $product => &$price) {
    $price *= ($price > 150) ? 1.19 : (($price < 55) ? 1.11 : 1);
}
 
echo "<h2>Aangepaste Productprijzen</h2>";
echo "<ul>";
foreach ($products as $product => $price) {
     echo "$product kost $price euro <br><br>";
}
echo "</ul>";
?>
