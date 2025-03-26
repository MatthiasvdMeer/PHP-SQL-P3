<?php
require_once 'functions.php';

// Haal fiets uit de database
if(isset($_GET['fietscode'])){
    DeleteFiets($_GET['fietscode']);
    echo '<script>alert("Fietscode: ' . $_GET['fietscode'] . ' is verwijderd")</script>';
    echo "<script> location.replace('oefening1.php'); </script>";
}
?>
