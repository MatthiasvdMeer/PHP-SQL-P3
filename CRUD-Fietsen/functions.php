<?php
// Functie: CRUD Functions
// Auteur: Matthias van der Meer

function CrudFietsen() {
    echo "
    <h1>Bikes</h1>
    <nav>
        <a href='insert_fiets.php'>Insert a NEW bike</a>
    </nav>";
    $result = getdata("fietsen");

    // Print the results in a table
    PrintCrudFietsen($result);
}

function getdata($table) {
    // Connect to database
    $conn = ConnectDb();

    // Prepare and execute query
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function ConnectDb() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CrudFietsen";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
}

function PrintCrudFietsen($result) {
    if (empty($result)) {
        echo "<p>Geen data gevonden.</p>";
        return;
    }

    $table =  "<table border='1px'>";

    // Print header table
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=darkcyan>" . $header . "</th>"; 
    }
    $table .= "</tr>";

    // Loop door de rijen heen
    foreach ($result as $row) {
        $table .= "<tr>";

        // Loop door de cellen van de rij heen
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }

        // Extra kolommen toevoegen
        // een form om bieren te wijzigen
        $table .= "<td>
            <a href='update_fiets.php?fietscode={$row['fietscode']}'>Change</a>
        </td>";

        $table .= "<td>
            <a href='delete_fiets.php?fietscode={$row['fietscode']}'>Delete</a>
        </td>";

        $table .= "</tr>";
    }

    // Sluit de tabel na de loop
    $table .= "</table>";
    echo $table;
}

function InsertFiets($post) {
    try {
        $conn = ConnectDb();

        $query = $conn->prepare(
        "INSERT INTO fietsen (merk, soort, prijs) 
        VALUES (:merk, :soort, :prijs)");

        $status = $query->execute([
            'merk' => $post['merk'],
            'soort' => $post['soort'],
            'prijs' => $post['prijs']
        ]);

        echo "Insert status: " . $status;
        echo $query->rowCount() . " records inserted";  
    } catch(PDOException $e) {
        echo "Insert failed: " . $e->getMessage();
    }
}

function DeleteFiets($fietscode) {

    echo "Delete bike<br>";

    
    try {
        $conn = ConnectDb();

        $query = $conn->prepare("
        DELETE FROM fietsen 
        WHERE fietsen . fietscode = $fietscode");

    

        $status = $query->execute();

    }
    catch(PDOException $e) {
        echo "Deletion failed: " . $e->getMessage();
    }
}
function UpdateFiets($data) {
    try {
        $conn = ConnectDb();
        $sql = "UPDATE fietsen SET merk = :merk, soort = :soort, prijs = :prijs WHERE fietscode = :fietscode";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'merk' => $data['merk'],
            'soort' => $data['soort'],
            'prijs' => $data['prijs'],
            'fietscode' => $data['fietscode']
        ]);
    } catch(PDOException $e) {
        echo "Update failed: " . $e->getMessage();
    }
}
function GetFiets($fietscode) {
    $conn = ConnectDb();
    $sql = "SELECT * FROM fietsen WHERE fietscode = :fietscode";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['fietscode' => $fietscode]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
?>


<style>
    a  {
        text-decoration: none;
        font-weight: bold;
        background-color: darkcyan;
        color: white;
        border-style: solid;
        border-width: 2px;
        border-color: black;
        padding-left: 5px;
        padding-right: 5px;
        }
</style>