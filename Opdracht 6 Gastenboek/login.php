<?php
session_start();
require 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT id, username, password, is_admin FROM users WHERE username = ?"); // Updated query to fetch 'id'
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Updated to use 'id' from the database
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['is_admin'] ? 'admin' : 'user';
        
        if ($_SESSION['role'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        echo "Ongeldige inloggegevens.";
    }
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Gebruikersnaam" required>
    <input type="email" name="email" placeholder="E-mailadres" required> <!-- Added email field -->
    <input type="password" name="password" placeholder="Wachtwoord" required>
    <button type="submit" name="login">Inloggen</button>
</form>
<a href="register.php"><button type="submit">Registreren</button></a>

