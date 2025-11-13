<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: index.php");
include 'config.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
}
header("Location: home.php");
exit;
?>
