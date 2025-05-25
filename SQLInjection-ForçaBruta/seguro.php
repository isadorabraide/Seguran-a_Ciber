<?php
session_start();

// Conexão com o banco de dados usando PDO (mais seguro)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=meu_banco", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

$username = $_POST['username'];
$password = $_POST['password'];

// Proteção contra força bruta
if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 0;
}
if ($_SESSION['tentativas'] >= 5) {
    die("Muitas tentativas de login. Tente novamente mais tarde.");
}

// Consulta segura com prepared statements (previne SQL Injection)
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    echo "Login bem-sucedido!";
    $_SESSION['tentativas'] = 0; // zera tentativas após login
} else {
    $_SESSION['tentativas'] += 1;
    echo "Usuário ou senha incorretos.";
}
?>
