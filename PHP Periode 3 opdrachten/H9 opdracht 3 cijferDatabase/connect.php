<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=cijferdatabase", "root", "");
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
?>