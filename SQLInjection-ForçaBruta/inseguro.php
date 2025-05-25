<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "meu_banco");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Login bem-sucedido!";
} else {
    echo "Usuário ou senha incorretos.";
}
?>
