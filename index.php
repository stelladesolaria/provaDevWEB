<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        header("Location: home.php");
        exit;
    } else {
        echo "❌ Email ou senha incorretos!";
    }
}
?>

<h2>Login</h2>
<form method="POST">
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="senha" placeholder="Senha" required><br>
  <button type="submit">Entrar</button>
</form>

<p>Não tem conta? <a href="register.php">Registre-se aqui</a></p>
