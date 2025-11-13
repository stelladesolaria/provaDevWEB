<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: index.php");
include 'config.php';

$id = $_GET['id'] ?? null;
if (!$id) die("ID inválido.");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, preco = ? WHERE id = ?");
    $stmt->execute([$nome, $preco, $id]);

    header("Location: home.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$p) die("Produto não encontrado!");
?>

<h2>Editar Produto</h2>

<form method="POST">
  <input type="text" name="nome" value="<?= htmlspecialchars($p['nome']) ?>" required><br>
  <input type="number" step="0.01" name="preco" value="<?= $p['preco'] ?>" required><br>
  <button type="submit">Salvar</button>
</form>

<a href="home.php">Voltar</a>
