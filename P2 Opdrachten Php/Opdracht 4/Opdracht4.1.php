<?php
//creator: Matthias van der Meer
//purpose: zien wat voor tijd het is op de dag
 
$date = 23;
  
    if($date > 6 && $date <12){
        echo"Ochtend";
    }
    else if($date > 12&& $date < 18){
        echo "Middag";
}
else if($date > 18&& $date < 24){
    echo "Avond";
}
else if($date > 24&& $date < 6){
    echo "Nacht";
}
?>