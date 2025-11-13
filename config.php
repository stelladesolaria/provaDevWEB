<?php
define('DB_PATH', __DIR__ . '/database.sqlite');
define('DB_DSN', 'sqlite:' . DB_PATH);

try {
    $conn = new PDO(DB_DSN);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
