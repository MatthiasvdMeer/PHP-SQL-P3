<?php

// Creator: Matthias van der Meer
//function: tekst op verschillende manieren laten zien
$resultaat = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputTekst = isset($_POST['tekst']) ? trim($_POST['tekst']) : "";
    $actie = isset($_POST['actie']) ? $_POST['actie'] : "";

    if (!empty($inputTekst) && !empty($actie)) {
        switch ($actie) {
            case 'uppercase':
                $resultaat = strtoupper($inputTekst); 
                break;
            case 'lowercase':
                $resultaat = strtolower($inputTekst); 
                break;
            case 'reverse':
                $resultaat = strrev($inputTekst); 
                break;
            case 'length':
                $resultaat = "De lengte van de tekst is: " . strlen($inputTekst); 
                break;
            default:
                $resultaat = "Ongeldige keuze.";
        }
    } else {
        $resultaat = "Voer tekst in en selecteer een actie.";
    }
}
?>


    <h1>Stringfuncties Oefening</h1>
    <form method="post" action="">
        <label for="tekst">Voer een tekst in:</label><br>
        <textarea id="tekst" name="tekst" rows="4" cols="50" required><?= htmlspecialchars($_POST['tekst'] ?? '') ?></textarea><br><br>

        <label>Kies een uitvoermethode:</label><br>
        <input type="radio" id="uppercase" name="actie" value="uppercase" <?= (isset($_POST['actie']) && $_POST['actie'] === 'uppercase') ? 'checked' : '' ?>>
        <label for="uppercase">Hoofdletters</label><br>

        <input type="radio" id="lowercase" name="actie" value="lowercase" <?= (isset($_POST['actie']) && $_POST['actie'] === 'lowercase') ? 'checked' : '' ?>>
        <label for="lowercase">Kleine letters</label><br>

        <input type="radio" id="reverse" name="actie" value="reverse" <?= (isset($_POST['actie']) && $_POST['actie'] === 'reverse') ? 'checked' : '' ?>>
        <label for="reverse">Omgekeerd</label><br>

        <input type="radio" id="length" name="actie" value="length" <?= (isset($_POST['actie']) && $_POST['actie'] === 'length') ? 'checked' : '' ?>>
        <label for="length">Lengte</label><br><br>

        <button type="submit">Verwerken</button>
    </form>

    <?php if (!empty($resultaat)): ?>
        <h2>Resultaat:</h2>
        <p><?= htmlspecialchars($resultaat) ?></p>
    <?php endif; ?>

