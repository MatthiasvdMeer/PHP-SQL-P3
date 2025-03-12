
//creator: Matthias van der Meer
//Functie: Achtergrond kleur veranderen

<?php
    // Controleer of een kleur is geselecteerd
    $backgroundColor = isset($_POST['background_color']) ? htmlspecialchars($_POST['background_color']) : 'white';
    ?>

<div class="container">
        <h1>Kies een achtergrondkleur</h1>
        <form method="POST">
            <div>
                <label>
                    <input type="radio" name="background_color" value="white" <?= $backgroundColor === 'white' ? 'checked' : '' ?>>
                    Wit
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="background_color" value="lightblue" <?= $backgroundColor === 'lightblue' ? 'checked' : '' ?>>
                    Lichtblauw
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="background_color" value="lightgreen" <?= $backgroundColor === 'lightgreen' ? 'checked' : '' ?>>
                    Lichtgroen
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="background_color" value="yellow" <?= $backgroundColor === 'yellow' ? 'checked' : '' ?>>
                    Geel
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="background_color" value="pink" <?= $backgroundColor === 'pink' ? 'checked' : '' ?>>
                    Roze
                </label>
            </div>
            <button type="submit" class="submit-button">Verzend</button>
        </form>
    </div>

<style>
        body {
            background-color: <?= $backgroundColor ?>;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .submit-button {
            margin-top: 20px;
        }
    </style>