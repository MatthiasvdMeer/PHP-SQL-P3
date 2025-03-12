<?php
//creator: Matthias van der Meer
//Functie: Bijhouden hoe vaak je de pagina opent
session_start();

$_SESSION['page_visits'] = ($_SESSION['page_visits'] ?? 0) + 1;


echo "Je hebt deze pagina {$_SESSION['page_visits']} keer bezocht.";
?>