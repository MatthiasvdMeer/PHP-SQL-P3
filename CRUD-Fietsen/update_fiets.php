<?php
require_once 'functions.php';

// Test of er op de wijzig-knop is gedrukt 
if(isset($_POST['btn_wzg'])){
    UpdateFiets($_POST);
    echo "<script> location.replace('oefening1.php'); </script>";
    exit();
}

if(isset($_GET['fietscode'])){  
    // Haal alle info van de betreffende fietscode
    $fietscode = $_GET['fietscode'];
    $row = GetFiets($fietscode);
    if ($row) {
?>
<html>
<body>
    <h1>Update Bike Info</h1>
    <h2>This is the place where you can change bike details</h2>
    
    <form method="post">
        <input type="hidden" name="fietscode" value="<?php echo $row['fietscode']; ?>">

        <label for="merk">Merk:</label>
        <br>
        <input type="text" id="merk" name="merk" value="<?php echo $row['merk']; ?>" required>
        <br>

        <label for="soort">Soort:</label>
        <br>
        <input type="text" id="soort" name="soort" value="<?php echo $row['soort']; ?>" required>
        <br>

        <label for="prijs">Prijs:</label>
        <br>
        <input type="number" id="prijs" name="prijs" step="0.01" value="<?php echo $row['prijs']; ?>" required>
        <br>

        <button type="submit" name="btn_wzg">Update Bike</button>
    </form>
    <form action="oefening1.php"><button type="submit">HOME</button></form>
</body>
</html>
<?php
    } else {
        echo "Geen fiets gevonden met de opgegeven fietscode.<br>";
    }
} else {
    echo "Geen fietscode opgegeven.<br>";
}
?>
<style>
    body {
        text-align: center;
        color: darkcyan;
        font-size: 20px;
    }
    input {
        margin-bottom: 15px;
        border-color: darkcyan;
        padding: 3px;
        text-align: center;
        font-size: 15px;
        width: 500px;
        border-radius: 30px;
        margin-top: 5px;
        color: darkcyan;
    }
    label {
        background-color: black;
        border-style: solid;
        border-width: 2px;
        border-color: darkcyan;
        color: white;
        border-radius: 30px;
        padding: 3px;
    }
    button {
        background-color: darkcyan;
        color: white;
        border-style: solid;
        border-width: 2px;
        border-color: black;
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 30px;
        width: auto;
        height: 30px;
        cursor: pointer;
        font-size: 20px;
    }
</style>