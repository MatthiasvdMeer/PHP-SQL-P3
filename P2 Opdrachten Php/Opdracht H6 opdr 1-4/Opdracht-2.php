<?php
//creator: Matthias van der Meer
// functie optellen hoevaak je op de pagina komt
session_start();


if (isset($_SESSION['session_visits'])) {
    
    $_SESSION['session_visits'] += 1;
} else {
 
    $_SESSION['session_visits'] = 1;
}


if (isset($_COOKIE['page_load'])) {
    
    $cookie_visits = $_COOKIE['page_load'] + 1;
} else {
    
    $cookie_visits = 1;
}


setcookie("page_load", $cookie_visits, 0, "/");  


echo "In deze sessie heb je de pagina {$_SESSION['session_visits']} keer bezocht.<br>";
echo "Je hebt deze pagina $cookie_visits keer bezocht (inclusief vorige sessies).";
?>