<?php
//creator: Matthias van der Meer
// Functie: om een willekeurige postcode te genereren
function generate_random_postcode() {
    
    $first_part = mt_rand(1000, 9999); 
    
    
    $second_part = chr(mt_rand(65, 90)) . chr(mt_rand(65, 90)); 
    
    
    return $first_part . ' ' . $second_part;
}


echo generate_random_postcode();
?>