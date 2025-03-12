<?php
// Functie: CRUD Functions
// Auteur: Matthias van der Meer

function CrudBieren() {
    echo "
    <h1>Crud BIER</h1>
    <nav>
        <a href='insert_bier.php'>Insert NEW beer</a>
    </nav>";

    $result = getdata("bier");

    // Print the results in a table
    PrintCrudBier($result);
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
    $dbname = "bieren";

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

function PrintCrudBier($result) {
    if (empty($result)) {
        echo "<p>Geen data gevonden.</p>";
        return;
    }

    $table =  "<table border='1px'>";


    // Print header table
 
    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
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
        <form action='update_bier.php' method='post'>
        <input type='hidden' name='biercode' value='$row[biercode]'>
        <input type='submit' value='change'>
    
    </td>";

    $table .= "<td>
        <a href='delete_bier.php?biercode=$row[biercode]'>Delete</a>
    </td>";

    $table .= "</tr>";
}

// Sluit de tabel na de loop
$table .= "</table>";
echo $table;
}

function InsertBier($post) {

    
    try {
        $conn = ConnectDb();

        $query = $conn->prepare(
        "INSERT INTO bier (naam, soort, stijl, alcohol, brouwcode) 
        VALUES (:naam, :soort, :stijl, :alcohol, :brouwcode)");

    

        $status = $query->execute(
            [
            
            'naam' => $post['naam'],
            'soort' => $post['soort'],
            'stijl' => $post['stijl'],
            'alcohol' => $post['alcohol'],
            'brouwcode' => $post['brouwcode']
            ]);


            echo "insert status: " . $status;
            echo $query->rowCount() . " records inserted";  
    }
    catch(PDOException $e) {
        echo "insert failed: " . $e->getMessage();
    }
}

function DeleteBier($biercode) {

    echo "Delete bier<br>";

    
    try {
        $conn = ConnectDb();

        $query = $conn->prepare("
        DELETE FROM bier 
        WHERE bier . biercode = $biercode");

    

        $status = $query->execute();

    }
    catch(PDOException $e) {
        echo "Deletion failed: " . $e->getMessage();
    }
}

?>
<style>
    a {
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
