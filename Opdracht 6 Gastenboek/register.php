<?php
require 'config.php';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, is_admin) VALUES (?, ?, ?, 0)");
    $stmt->execute([$username, $email, $password]);
    echo "Account aangemaakt! <a href='login.php'>Inloggen</a>";
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Gebruikersnaam" required>
    <input type="email" name="email" placeholder="E-mailadres" required>
    <input type="password" name="password" placeholder="Wachtwoord" required>
    <button type="submit" name="register">Registreren</button>
</form>

