<?php
//creator: Matthias van der Meer
// purpose: hoogste gtal vermenigvuldigen met 2 en optellen bij het kleinste getal

$a = 15;
$b = 10;

if ($a > $b) {
    $largest = $a;
    $smallest = $b;
} else {
    $largest = $b;
    $smallest = $a;
}

$result = ($largest * 2) + $smallest;

echo "Resultaat: $result";
?>
