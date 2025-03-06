<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $leerling = $_POST['leerling'];
    $cijfer = $_POST['cijfer'];
    $vak = $_POST['vak'];
    $docent = $_POST['docent'];

    $query = $db->prepare("INSERT INTO cijfers (leerling, cijfer, vak, docent) VALUES (?, ?, ?, ?)");
    $query->execute([$leerling, $cijfer, $vak, $docent]);

    echo "<script>alert('leerling toegevoegd');</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = $db->prepare("DELETE FROM cijfers WHERE id = ?");
    $query->execute([$id]);

    echo "<script>alert('leerling verwijdert');</script>";
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

$query = $db->prepare("SELECT * FROM cijfers WHERE leerling LIKE :search");
$query->execute(['search' => "%$search%"]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="get" action="">
    <input type="text" name="search" placeholder="Zoek leerling" value="<?php echo htmlspecialchars($search); ?>">
    <input type="submit" value="Zoeken">
</form>

<form method="post" action="">
    <input type="text" name="leerling" placeholder="Leerling" required>
    <input type="number" name="cijfer" placeholder="Cijfer" step="0.01" required>
    <input type="text" name="vak" placeholder="Vak" required>
    <input type="text" name="docent" placeholder="Docent" required>
    <input type="submit" name="add" value="Toevoegen">
</form>

<table id="cijferTable" border='1px'>
    <tr>
        <th onclick="sortTable(0)">Leerling</th>
        <th onclick="sortTable(1)">Cijfer</th>
        <th onclick="sortTable(2)">Vak</th>
        <th onclick="sortTable(3)">Docent</th>
        <th onclick="sortTable(4)">ID</th>
        <th>Acties</th>
    </tr>
    <?php
    foreach ($result as $data) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($data['leerling']) . "</td>";
        echo "<td>" . htmlspecialchars($data['cijfer']) . "</td>";
        echo "<td>" . htmlspecialchars($data['vak']) . "</td>";
        echo "<td>" . htmlspecialchars($data['docent']) . "</td>";
        echo "<td>" . htmlspecialchars($data['id']) . "</td>";
        echo "<td>
                <form method='post' action='' style='display:inline;'>
                    <input type='hidden' name='id' value='" . htmlspecialchars($data['id']) . "'>
                    <input type='submit' name='delete' value='Verwijderen'>
                </form>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("cijferTable");
        switching = true;
        dir = "asc"; 
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>