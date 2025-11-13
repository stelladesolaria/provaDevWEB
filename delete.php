<?php
require 'config.php'; 

if (!isset($_GET['id'])) {
    die("ID inválido!");
}

$id = $_GET['id'];

try {
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: home.php");
    exit;
} catch (PDOException $e) {
    echo "Erro ao excluir: " . $e->getMessage();
}
