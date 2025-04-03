<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id']; // Assuming user_id is stored in the session
    $message = $_POST['message'];

    if (!empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO bezoekers (user_id, naam, bericht) VALUES (?, '', ?)");
        $stmt->execute([$userId, $message]);
    }

    // Handle admin actions
    if (isset($_POST['delete_message'])) {
        $messageId = $_POST['message_id'];
        $stmt = $pdo->prepare("DELETE FROM bezoekers WHERE id = ?");
        $stmt->execute([$messageId]);
    } elseif (isset($_POST['edit_message'])) {
        $messageId = $_POST['message_id'];
        $newMessage = $_POST['new_message'];
        $stmt = $pdo->prepare("UPDATE bezoekers SET bericht = ? WHERE id = ?");
        $stmt->execute([$newMessage, $messageId]);
    }
}

// Pagination setup
$messagesPerPage = 5; // Number of messages per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $messagesPerPage;

$totalMessages = $pdo->query("SELECT COUNT(*) FROM bezoekers")->fetchColumn();
$totalPages = ceil($totalMessages / $messagesPerPage);

$messages = $pdo->prepare("SELECT bezoekers.id, bezoekers.bericht, users.username 
                           FROM bezoekers 
                           JOIN users ON bezoekers.user_id = users.id 
                           ORDER BY bezoekers.id DESC 
                           LIMIT :limit OFFSET :offset");
$messages->bindValue(':limit', $messagesPerPage, PDO::PARAM_INT);
$messages->bindValue(':offset', $offset, PDO::PARAM_INT);
$messages->execute();
$messages = $messages->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek</title>
</head>
<body>
    <h1>Gastenboek</h1>

    <form method="POST">
        <textarea name="message" placeholder="Schrijf een bericht..." required></textarea><br>
        <button type="submit">Verstuur</button>
    </form>

    <hr>
    <form method="POST" action="logout.php">
        <button type="submit">Uitloggen</button>
    </form>
    <?php foreach ($messages as $msg): ?>
        <p>
            <strong><?= htmlspecialchars($msg['username']) ?>:</strong> <?= htmlspecialchars($msg['bericht']) ?>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="message_id" value="<?= $msg['id'] ?>">
                    <button type="submit" name="delete_message">Verwijder</button>
                </form>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="message_id" value="<?= $msg['id'] ?>">
                    <input type="text" name="new_message" placeholder="Nieuw bericht" required>
                    <button type="submit" name="edit_message">Bewerk</button>
                </form>
            <?php endif; ?>
        </p>
    <?php endforeach; ?>

    <!-- Pagination links -->
    <div>
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">Vorige</a>
        <?php endif; ?>
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>">Volgende</a>
        <?php endif; ?>
    </div>
</body>
</html>

