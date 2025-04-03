
<?php
session_start();
require 'config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin')

if (isset($_POST['edit_message'])) {
    $stmt = $pdo->prepare("UPDATE bezoekers SET bericht = ? WHERE id = ?");
    $stmt->execute([$_POST['message'], $_POST['message_id']]);
}
if (isset($_POST['delete_message'])) {
    $stmt = $pdo->prepare("DELETE FROM bezoekers WHERE id = ?");
    $stmt->execute([$_POST['message_id']]);
}

$messages = $pdo->query("SELECT * FROM bezoekers")->fetchAll();
foreach ($messages as $msg) {
    echo "<form method='post'>
            <input type='hidden' name='message_id' value='{$msg['id']}'>
            <input type='text' name='message' value='{$msg['bericht']}'>
            <button type='submit' name='edit_message'>Bewerken</button>
            <button type='submit' name='delete_message'>Verwijderen</button>
          </form>";
          
}
?>
<html>
<body>
<form method="POST" action="logout.php">
<button type="submit">Uitloggen</button>
</form>   
</body>
</html>
