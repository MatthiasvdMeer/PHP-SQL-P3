
//creator: Matthias van der Meer
//Functie: Korting berekenen

<h1>Korting Berekenen</h1>
    <form method="post" action="">
        <label for="bedrag">Geldbedrag (&euro;):</label>
        <input type="number" name="bedrag" id="bedrag" step="0.01" required>
        <br><br>

        <label for="korting">Kortingspercentage (%):</label>
        <input type="number" name="korting" id="korting" step="0.01" required>
        <br><br>

        <button type="submit" name="bereken">Uitrekenen</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bereken'])) {
        // Haal de invoer op en valideer
        $bedrag = isset($_POST['bedrag']) ? (float) $_POST['bedrag'] : 0;
        $korting = isset($_POST['korting']) ? (float) $_POST['korting'] : 0;

        if ($bedrag > 0 && $korting >= 0) {
            // Bereken het bedrag inclusief korting
            $kortingsbedrag = $bedrag * ($korting / 100);
            $eindbedrag = $bedrag - $kortingsbedrag;

            // Toon het resultaat met number_format
            echo "<p>Het bedrag na een korting van " . number_format($korting, 2) . "% is &euro; " . number_format($eindbedrag, 2) . "</p>";
        } else {
            echo "<p>Voer een geldig bedrag en kortingspercentage in.</p>";
        }
    }
    ?>