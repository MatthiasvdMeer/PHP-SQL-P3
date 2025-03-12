<?php

// Creator: Matthias van der Meer
//function: Gemiddelde berekenen
session_start();


if (!isset($_SESSION['cijfers'])) {
    $_SESSION['cijfers'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cijfer'])) {
    $cijfer = filter_var($_POST['cijfer'], FILTER_VALIDATE_FLOAT);
    if ($cijfer !== false) {
        $_SESSION['cijfers'][] = $cijfer; 
    } else {
        $error = "Voer een geldig cijfer in.";
    }
}

$aantal = count($_SESSION['cijfers']);
$gemiddelde = $aantal > 0 ? round(array_sum($_SESSION['cijfers']) / $aantal, 1) : 0;

?>

<h1>Gemiddelde Berekenen</h1>
    <form method="post" action="">
        <label for="cijfer">Voer een cijfer in:</label>
        <input type="text" id="cijfer" name="cijfer" required>
        <button type="submit">Toevoegen</button>
    </form>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <h2>Resultaten</h2>
    <p>Aantal ingevoerde cijfers: <?= $aantal ?></p>
    <p>Gemiddelde: <?= $gemiddelde ?></p>