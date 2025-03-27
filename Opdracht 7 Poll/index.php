<!DOCTYPE html>
<html>
<head>
    <title>Gastenboek & Poll</title>
</head>
<body>
    <h2>Nieuw Bericht</h2>
    <form method="POST" action="">
        Naam: <input type="text" name="naam" required><br><br>
        Bericht:<br>
        <textarea name="bericht" rows="5" cols="40" required></textarea><br><br>
        <button type="submit" name="verzend">Verzend</button>
    </form>

    <hr>

    <h2>Stem op de poll</h2>
    <form method="POST" action="">
        <?php
        $conn = new mysqli("localhost", "root", "", "gastenboek");

        if ($conn->connect_error) {
            die("Verbinding mislukt: " . $conn->connect_error);
        }

        // Poll-vraag ophalen
        $pollResult = $conn->query("SELECT * FROM poll LIMIT 1");
        if ($pollResult->num_rows > 0) {
            $poll = $pollResult->fetch_assoc();
            echo "<p><strong>" . htmlspecialchars($poll['vraag']) . "</strong></p>";

            // Opties ophalen
            $optieResult = $conn->query("SELECT * FROM optie WHERE poll = " . $poll['id']);
            while ($optie = $optieResult->fetch_assoc()) {
                echo "<label>";
                echo "<input type='radio' name='stem' value='" . $optie['id'] . "' required> ";
                echo htmlspecialchars($optie['optie']);
                echo "</label><br>";
            }
        } else {
            echo "<p>Geen poll beschikbaar.</p>";
        }
            // Stemresultaten tonen
    echo "<h2>Poll Resultaten</h2>";
    $result = $conn->query("SELECT optie, stemmen FROM optie WHERE poll = " . $poll['id'] . " ORDER BY stemmen DESC");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . htmlspecialchars($row['optie']) . ": " . $row['stemmen'] . " stemmen</p>";
        }
    } else {
        echo "<p>Geen stemmen uitgebracht.</p>";
    }

   
        ?>
        <br>
        <button type="submit" name="stem_verzend">Stem</button>
    </form>

    <?php
    // Opslaan van berichten
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verzend'])) {
        $naam = trim($_POST['naam']);
        $bericht = trim($_POST['bericht']);

        $sql = "INSERT INTO berichten (naam, bericht) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $naam, $bericht);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>✅ Bericht succesvol opgeslagen!</p>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "<p style='color:red;'>❌ Fout bij opslaan: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    // Stem opslaan in database
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stem_verzend'])) {
        $stem = $_POST['stem'];

        $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $stem);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>✅ Stem succesvol opgeslagen!</p>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "<p style='color:red;'>❌ Fout bij stemmen: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    // Berichten tonen
    $result = $conn->query("SELECT naam, bericht, datumtijd FROM bezoekers ORDER BY datumtijd DESC");

    echo "<h2>Berichten</h2>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
            echo "<strong>" . htmlspecialchars($row['naam']) . "</strong> ";
            echo "<em>(" . $row['datumtijd'] . ")</em><br>";
            echo nl2br(htmlspecialchars($row['bericht']));
            echo "</div>";
        }
    } else {
        echo "<p>Geen berichten gevonden.</p>";
    }

    $conn->close();
    ?>
</body>
</html>