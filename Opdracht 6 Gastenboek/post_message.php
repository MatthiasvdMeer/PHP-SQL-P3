
<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    die("Log eerst in! <a href='login.php'>Inloggen</a>");
}

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $stmt = $pdo->prepare("INSERT INTO bezoekers (user_id, bericht) VALUES (?, ?)");
    $stmt->execute([$_SESSION['user_id'], $message]);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    <textarea name="message" required></textarea>
    <button type="submit">Plaatsen</button>
</form>
