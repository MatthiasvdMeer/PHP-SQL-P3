
//creator: Matthias van der Meer
//Functie: Btw berekenen

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $amount = floatval($_POST['amount'] ?? 0);
        $vat = intval($_POST['vat'] ?? 0);

        if ($amount > 0 && ($vat === 9 || $vat === 21)) {
            $total = $amount * (1 + $vat / 100);
            echo "<p>Bedrag exclusief BTW: &euro; " . number_format($amount, 2, ',', '.') . "</p>";
            echo "<p>BTW-percentage: $vat%</p>";
            echo "<p>Bedrag inclusief BTW: &euro; " . number_format($total, 2, ',', '.') . "</p>";
        } else {
            echo "<p style='color: red;'>Ongeldige invoer. Zorg ervoor dat u een positief bedrag en een geldig BTW-percentage invoert.</p>";
        }
    }
    ?>


<h2>BTW Calculator</h2>
    <form method="POST">
        <label for="amount">Bedrag exclusief BTW:</label>
        <input type="text" name="amount" id="amount" placeholder="Voer een bedrag in" required>
        <br><br>

        <label>
            <input type="radio" name="vat" value="9" required>
            9% BTW
        </label>
        <br>
        <label>
            <input type="radio" name="vat" value="21" required>
            21% BTW
        </label>
        <br><br>

        <button type="submit">Uitrekenen</button>
    </form>