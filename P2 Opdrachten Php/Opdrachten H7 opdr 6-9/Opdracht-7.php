<?php

// Creator: Matthias van der Meer
//function: Berekenen hoelang Geert kan opnemen
function berekenJaren($startbedrag, $rentepercentage, $opnamebedrag) {
    $jaren = 0; 
    $huidigBedrag = $startbedrag;

    while ($huidigBedrag > 0) {
        
        $huidigBedrag += $huidigBedrag * ($rentepercentage / 100);

        
        $huidigBedrag -= $opnamebedrag;

        $jaren++;

        
        if ($jaren > 100) {
            return "Geert kan het bedrag zijn hele leven lang opnemen.";
        }
    }

    return "Geert kan het bedrag opnemen voor $jaren jaar/jaren.";
}


$startbedrag = 100000;
$rentepercentage = 4;
$opnamebedrag = 5000;
$resultaat = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startbedrag = filter_var($_POST['startbedrag'], FILTER_VALIDATE_FLOAT);
    $rentepercentage = filter_var($_POST['rentepercentage'], FILTER_VALIDATE_FLOAT);
    $opnamebedrag = filter_var($_POST['opnamebedrag'], FILTER_VALIDATE_FLOAT);

    if ($startbedrag !== false && $rentepercentage !== false && $opnamebedrag !== false) {
        $resultaat = berekenJaren($startbedrag, $rentepercentage, $opnamebedrag);
    } else {
        $resultaat = "Voer geldige numerieke waarden in voor alle velden.";
    }
}
?>

<h1>Berekening Lotergeld</h1>
    <form method="post" action="">
        <label for="startbedrag">Startkapitaal (€):</label>
        <input type="text" id="startbedrag" name="startbedrag" value="<?= htmlspecialchars($startbedrag) ?>" required>
        <br>
        <label for="rentepercentage">Rentepercentage (%):</label>
        <input type="text" id="rentepercentage" name="rentepercentage" value="<?= htmlspecialchars($rentepercentage) ?>" required>
        <br>
        <label for="opnamebedrag">Jaarlijkse opname (€):</label>
        <input type="text" id="opnamebedrag" name="opnamebedrag" value="<?= htmlspecialchars($opnamebedrag) ?>" required>
        <br>
        <button type="submit">Bereken</button>
    </form>

    <?php if (!empty($resultaat)): ?>
        <h2>Resultaat</h2>
        <p><?= htmlspecialchars($resultaat) ?></p>
    <?php endif; ?>