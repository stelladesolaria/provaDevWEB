<?php
include 'config.php';

$stmt = $pdo->prepare("INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)");
$stmt->execute([$nome, $email, $hash]);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $senha]);
        echo "Usuário cadastrado com sucesso! <a href='index.php'>Fazer login</a>";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>

<h2>Cadastro de Usuário</h2>
<form method="POST">
  <input type="text" name="nome" placeholder="Nome" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="senha" placeholder="Senha" required><br>
  <button type="submit">Cadastrar</button>
</form>
