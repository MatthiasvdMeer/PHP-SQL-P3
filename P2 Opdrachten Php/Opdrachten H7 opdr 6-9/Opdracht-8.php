<?php

// Creator: Matthias van der Meer
//function: Fruitsoorten toevoegen en sorteren
session_start();


if (!isset($_SESSION['fruitsoorten'])) {
    $_SESSION['fruitsoorten'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['toevoegen']) && isset($_POST['fruit']) && !empty(trim($_POST['fruit']))) {
        
        $fruit = trim($_POST['fruit']);
        $_SESSION['fruitsoorten'][] = $fruit;
    } elseif (isset($_POST['sorteren'])) {
        
        sort($_SESSION['fruitsoorten']);
    } elseif (isset($_POST['schudden'])) {
        
        shuffle($_SESSION['fruitsoorten']);
    }
}
?>

    <h1>Fruitsoorten Toevoegen</h1>
    <form method="post" action="">
        <label for="fruit">Voer een fruitsoort in:</label>
        <input type="text" id="fruit" name="fruit">
        <button type="submit" name="toevoegen" value="1">Toevoegen</button>
        <button type="submit" name="sorteren" value="1">Sorteer (A-Z)</button>
        <button type="submit" name="schudden" value="1">Schud</button>
    </form>

    <h2>Huidige Lijst van Fruitsoorten:</h2>
    <?php if (!empty($_SESSION['fruitsoorten'])): ?>
        <ul>
            <?php foreach ($_SESSION['fruitsoorten'] as $fruit): ?>
                <li><?= htmlspecialchars($fruit) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>De lijst is momenteel leeg.</p>
    <?php endif; ?>

