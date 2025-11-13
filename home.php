<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

require 'config.php'; 

// ---- CRIAR PRODUTO ----
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome'])) {
    $nome  = $_POST['nome'];
    $preco = $_POST['preco'];

    $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
    $stmt->execute([$nome, $preco]);
}

// ---- LISTAR PRODUTOS ----
$produtos = $pdo->query("SELECT * FROM produtos");
?>

<h2>Bem-vindo, <?= htmlspecialchars($_SESSION['nome']) ?>!</h2>
<a href="logout.php">Sair</a>

<h3>Adicionar Produto</h3>
<form method="POST">
  <input type="text" name="nome" placeholder="Nome do produto" required>
  <input type="number" step="0.01" name="preco" placeholder="Preço" required>
  <button type="submit">Adicionar</button>
</form>

<h3>Lista de Produtos</h3>
<table border="1" cellpadding="6">
  <tr>
    <th>ID</th><th>Nome</th><th>Preço</th><th>Ações</th>
  </tr>
  <?php foreach ($produtos as $p): ?>
    <tr>
      <td><?= $p['id'] ?></td>
      <td><?= htmlspecialchars($p['nome']) ?></td>
      <td><?= number_format($p['preco'], 2, ',', '.') ?></td>
      <td>
        <a href="edit.php?id=<?= $p['id'] ?>">Editar</a> |
        <a href="delete.php?id=<?= $p['id'] ?>">Excluir</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
