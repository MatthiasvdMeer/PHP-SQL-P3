<?php
// creator: Matthias van der Meer
// purpose: Wanneer is het ochtend, middag, avond, nacht

$date = 4;
$resultaat = match("$date") {
    "6","7","8","9","10","11","12", =>"Ochtend",
    "12","13","14","15","16","17","18", => "Middag",
    "18","19","20","21","22","23","24", =>"Avond",
    "24","1","2","3","4","5","6", =>"Nacht",
};
echo $resultaat;
?>