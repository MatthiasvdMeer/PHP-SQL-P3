<?php
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 500)) {
    session_unset(); // Unset session variables
    session_destroy(); // Destroy session
    header("Location: login.php");
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity timestamp

$host = 'localhost';
$dbname = 'gastenboek';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}
?>